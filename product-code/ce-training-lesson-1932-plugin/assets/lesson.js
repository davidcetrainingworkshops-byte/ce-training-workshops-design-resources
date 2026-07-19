(() => {
  const initVideoControls = () => {
  const root = document.getElementById("ce-purpose-lesson-1932");
  if (!root) return false;
  if (root.dataset.videoControlsReady === "true") return true;
  root.dataset.videoControlsReady = "true";

  const section = root.querySelector("#cex-video");
  const stage = root.querySelector(".dlp-stage");
  const videoA = root.querySelector('.dlp-video[data-video="A"]');
  const videoB = root.querySelector('.dlp-video[data-video="B"]');
  const frameA = root.querySelector("#cex-vimeo-a-1932");
  const frameB = root.querySelector("#cex-vimeo-b-1932");
  const startOverlay = root.querySelector("[data-video-start-overlay]");
  const progressTime = root.querySelector("[data-video-progress-time]");
  const progressFill = root.querySelector("[data-video-progress-fill]");
  const captionWindow = root.querySelector("[data-caption-window]");
  const captionText = root.querySelector("[data-caption-text]");
  const modeButtons = root.querySelectorAll("[data-mode]");
  const actionButtons = root.querySelectorAll("[data-action]");
  const pipSwapButton = root.querySelector(".dlp-pip-swap");
  if (!section || !stage || !videoA || !videoB || !frameA || !frameB) {
    delete root.dataset.videoControlsReady;
    return false;
  }

  const startSeconds = Number(section.dataset.startSeconds || 0);
  const durationSeconds = Number(section.dataset.durationSeconds || 5100);
  let playerA = null;
  let playerB = null;
  let captionsOn = false;
  let currentMode = "split";
  let pipSwapped = false;
  let isReady = false;
  let localClockTimer = 0;
  let localClockBaseSeconds = startSeconds;
  let localClockStartedAt = 0;

  const loadVimeoApi = () => {
    if (window.Vimeo && window.Vimeo.Player) return Promise.resolve();
    if (window.__cexVimeoReady) return window.__cexVimeoReady;
    window.__cexVimeoReady = new Promise((resolve, reject) => {
      const existing = document.querySelector('script[src="https://player.vimeo.com/api/player.js"]');
      if (existing) {
        existing.addEventListener("load", resolve, { once: true });
        existing.addEventListener("error", reject, { once: true });
        return;
      }
      const script = document.createElement("script");
      script.src = "https://player.vimeo.com/api/player.js";
      script.onload = resolve;
      script.onerror = reject;
      document.head.appendChild(script);
    });
    return window.__cexVimeoReady;
  };

  const formatTime = (seconds) => {
    const safeSeconds = Math.max(0, Math.ceil(seconds));
    const hours = Math.floor(safeSeconds / 3600);
    const minutes = Math.floor((safeSeconds % 3600) / 60);
    const secs = safeSeconds % 60;
    if (hours > 0) return `${hours}:${String(minutes).padStart(2, "0")}:${String(secs).padStart(2, "0")}`;
    return `${minutes}:${String(secs).padStart(2, "0")}`;
  };

  const updateProgress = (absoluteSeconds) => {
    const elapsed = Math.max(0, Math.min(durationSeconds, absoluteSeconds - startSeconds));
    const boundedSeconds = startSeconds + elapsed;
    const remaining = durationSeconds - elapsed;
    section.dataset.currentSeconds = String(boundedSeconds);
    root.dispatchEvent(new CustomEvent("cex-video-time", { detail: { seconds: boundedSeconds } }));
    if (progressTime) progressTime.textContent = formatTime(remaining);
    if (progressFill) progressFill.style.width = `${(elapsed / durationSeconds) * 100}%`;
    if (elapsed >= durationSeconds && playerA && playerB) {
      Promise.allSettled([playerA.pause(), playerB.pause()]);
      stopLocalClock();
    }
  };

  const currentLessonSeconds = () => {
    const savedSeconds = Number(section.dataset.currentSeconds || localClockBaseSeconds || startSeconds);
    return Number.isFinite(savedSeconds) ? savedSeconds : startSeconds;
  };

  const stopLocalClock = () => {
    if (!localClockTimer) return;
    window.clearInterval(localClockTimer);
    localClockTimer = 0;
  };

  const startLocalClock = (baseSeconds = currentLessonSeconds()) => {
    stopLocalClock();
    localClockBaseSeconds = Math.max(startSeconds, baseSeconds);
    localClockStartedAt = Date.now();
    updateProgress(localClockBaseSeconds);
    localClockTimer = window.setInterval(() => {
      const seconds = localClockBaseSeconds + ((Date.now() - localClockStartedAt) / 1000);
      updateProgress(seconds);
    }, 250);
  };

  const updateLocalClockFromPlayer = (seconds) => {
    const safeSeconds = Math.max(startSeconds, seconds || startSeconds);
    updateProgress(safeSeconds);
    if (localClockTimer) {
      localClockBaseSeconds = safeSeconds;
      localClockStartedAt = Date.now();
    }
  };

  const syncToStart = () => Promise.allSettled([
    playerA.setCurrentTime(startSeconds),
    playerB.setCurrentTime(startSeconds)
  ]).then(() => updateProgress(startSeconds));

  const revealPlayback = () => {
    if (startOverlay) startOverlay.classList.add("is-hidden");
  };

  const playBoth = () => {
    revealPlayback();
    startLocalClock();
    if (isReady && playerA && playerB) {
      Promise.allSettled([playerA.play(), playerB.play()]);
    }
  };

  const pauseBoth = () => {
    stopLocalClock();
    if (isReady && playerA && playerB) {
      Promise.allSettled([playerA.pause(), playerB.pause()]);
    }
  };

  const restartBoth = () => {
    revealPlayback();
    stopLocalClock();
    const restartClock = () => {
      startLocalClock(startSeconds);
      if (isReady && playerA && playerB) {
        return Promise.allSettled([playerA.play(), playerB.play()]);
      }
      return Promise.resolve();
    };
    if (isReady && playerA && playerB) {
      syncToStart().then(restartClock);
    } else {
      updateProgress(startSeconds);
      restartClock();
    }
  };

  const clearPipInlineStyles = () => {
    [videoA, videoB].forEach((video) => {
      ["display", "position", "inset", "top", "right", "width", "height", "aspect-ratio", "z-index", "transform", "transition", "transform-origin"].forEach((property) => {
        video.style.removeProperty(property);
      });
    });
  };

  const setImportantStyle = (element, styles) => {
    Object.entries(styles).forEach(([property, value]) => {
      element.style.setProperty(property, value, "important");
    });
  };

  const applyPipPaneStyles = (mainPane, insetPane) => {
    setImportantStyle(mainPane, {
      display: "block",
      position: "absolute",
      inset: "0",
      width: "100%",
      height: "100%",
      "z-index": "1"
    });
    setImportantStyle(insetPane, {
      display: "block",
      position: "absolute",
      inset: "auto",
      top: "12px",
      right: "12px",
      width: "min(32%, 360px)",
      height: "auto",
      "aspect-ratio": "16 / 9",
      "z-index": "5"
    });
  };

  const animatePipSwap = (beforeRects) => {
    [videoA, videoB].forEach((video) => {
      const before = beforeRects.get(video);
      const after = video.getBoundingClientRect();
      if (!before || !after.width || !after.height) return;
      const deltaX = before.left - after.left;
      const deltaY = before.top - after.top;
      const scaleX = before.width / after.width;
      const scaleY = before.height / after.height;

      video.style.setProperty("transition", "none", "important");
      video.style.setProperty("transform-origin", "top left", "important");
      video.style.setProperty("transform", `translate(${deltaX}px, ${deltaY}px) scale(${scaleX}, ${scaleY})`, "important");
    });

    requestAnimationFrame(() => {
      [videoA, videoB].forEach((video) => {
        video.style.setProperty("transition", "transform .48s cubic-bezier(.2,.82,.2,1)", "important");
        video.style.setProperty("transform", "translate(0, 0) scale(1, 1)", "important");
      });
    });

    window.setTimeout(() => {
      [videoA, videoB].forEach((video) => {
        video.style.removeProperty("transform");
        video.style.removeProperty("transition");
        video.style.removeProperty("transform-origin");
      });
      setPipRoles();
    }, 540);
  };

  const setPipRoles = () => {
    videoA.classList.toggle("dlp-primary", !pipSwapped);
    videoA.classList.toggle("dlp-secondary", pipSwapped);
    videoB.classList.toggle("dlp-primary", pipSwapped);
    videoB.classList.toggle("dlp-secondary", !pipSwapped);
    applyPipPaneStyles(pipSwapped ? videoB : videoA, pipSwapped ? videoA : videoB);
    if (pipSwapButton) {
      pipSwapButton.textContent = "Swap View";
      pipSwapButton.setAttribute(
        "aria-label",
        pipSwapped ? "Make presentation the large picture" : "Make instructor the large picture"
      );
    }
  };

  const setMode = (mode) => {
    currentMode = mode;
    section.classList.toggle("cex-pip-mode", mode === "pip");
    stage.classList.remove("split", "single", "pip");
    videoA.classList.remove("dlp-active");
    videoB.classList.remove("dlp-active");
    if (mode !== "pip") clearPipInlineStyles();

    if (mode === "split") {
      stage.classList.add("split");
    } else if (mode === "singleA") {
      stage.classList.add("single");
      videoA.classList.add("dlp-active");
    } else if (mode === "singleB") {
      stage.classList.add("single");
      videoB.classList.add("dlp-active");
    } else {
      stage.classList.add("pip");
      setPipRoles();
    }

    modeButtons.forEach((button) => {
      button.classList.toggle("active", button.dataset.mode === mode);
    });
  };

  const swapVideos = () => {
    if (currentMode !== "pip") return;
    const beforeRects = new Map([
      [videoA, videoA.getBoundingClientRect()],
      [videoB, videoB.getBoundingClientRect()]
    ]);
    pipSwapped = !pipSwapped;
    setPipRoles();
    animatePipSwap(beforeRects);
  };

  const toggleCaptions = (button) => {
    captionsOn = !captionsOn;
    if (captionWindow) {
      captionWindow.classList.toggle("is-visible", captionsOn);
      captionWindow.setAttribute("aria-hidden", captionsOn ? "false" : "true");
    }
    if (captionText) {
      captionText.textContent = captionsOn
        ? "Captions are available through the Vimeo player when provided for this video."
        : "Captions are off.";
    }
    if (button) button.setAttribute("aria-pressed", captionsOn ? "true" : "false");
  };

  const toggleFullscreen = () => {
    if (document.fullscreenElement || document.webkitFullscreenElement) {
      if (document.exitFullscreen) document.exitFullscreen();
      else if (document.webkitExitFullscreen) document.webkitExitFullscreen();
      section.classList.remove("cex-expanded-player");
      return;
    }

    const request = section.requestFullscreen || section.webkitRequestFullscreen;
    if (request) {
      request.call(section).catch(() => section.classList.add("cex-expanded-player"));
    } else {
      section.classList.toggle("cex-expanded-player");
    }
  };

  modeButtons.forEach((button) => {
    button.addEventListener("click", () => setMode(button.dataset.mode));
  });

  actionButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const action = button.dataset.action;
      if (action === "play") playBoth();
      if (action === "pause") pauseBoth();
      if (action === "restart") restartBoth();
      if (action === "swap") swapVideos();
      if (action === "captions") toggleCaptions(button);
      if (action === "fullscreen") toggleFullscreen();
    });
  });

  if (startOverlay) startOverlay.addEventListener("click", playBoth);
  document.addEventListener("fullscreenchange", () => {
    if (!document.fullscreenElement) section.classList.remove("cex-expanded-player");
  });

  loadVimeoApi().then(() => {
    playerA = new window.Vimeo.Player(frameA);
    playerB = new window.Vimeo.Player(frameB);
    return Promise.allSettled([playerA.ready(), playerB.ready()]);
  }).then(() => {
    isReady = true;
    setMode("split");
    updateProgress(startSeconds);
    return syncToStart();
  }).then(() => {
    playerA.on("timeupdate", (event) => updateLocalClockFromPlayer(event.seconds));
    playerA.on("seeked", (event) => updateLocalClockFromPlayer(event.seconds));
  }).catch(() => {
    if (captionText) captionText.textContent = "Video controls are still loading. Please refresh if they do not respond.";
  });
  return true;
  };

  if (initVideoControls()) return;
  const retryVideoControls = window.setInterval(() => {
    if (initVideoControls()) window.clearInterval(retryVideoControls);
  }, 250);
  window.setTimeout(() => window.clearInterval(retryVideoControls), 10000);
  document.addEventListener("DOMContentLoaded", initVideoControls, { once: true });
})();

(() => {
  const initInstructorPlaceholder = () => {
  const root = document.getElementById("ce-purpose-lesson-1932");
  if (!root) return false;
  if (root.dataset.instructorPlaceholderReady === "true") return true;
  root.dataset.instructorPlaceholderReady = "true";

  const instructorPane = root.querySelector('.dlp-video[data-video="B"]');
  const instructorFrame = root.querySelector("#cex-vimeo-b-1932");
  if (!instructorPane || !instructorFrame) {
    delete root.dataset.instructorPlaceholderReady;
    return false;
  }

  /*
    Add any moments where the instructor camera is off or someone other than
    the main speaker is visible. Times are original Vimeo timestamps in seconds.
    Example: { start: 1832, end: 1904 }
  */
  const instructorReplacementRanges = [];

  const shouldShowPlaceholder = (seconds) => instructorReplacementRanges.some((range) => (
    seconds >= range.start && seconds < range.end
  ));

  const setPlaceholder = (seconds) => {
    instructorPane.classList.toggle("show-no-cam", shouldShowPlaceholder(seconds));
  };

  const attachVimeoWatcher = () => {
    if (!window.Vimeo || !window.Vimeo.Player) return;
    const instructorPlayer = new window.Vimeo.Player(instructorFrame);
    instructorPlayer.on("timeupdate", (event) => setPlaceholder(event.seconds || 0));
    instructorPlayer.on("seeked", (event) => setPlaceholder(event.seconds || 0));
    instructorPlayer.getCurrentTime().then(setPlaceholder).catch(() => {});
  };

  if (window.Vimeo && window.Vimeo.Player) {
    attachVimeoWatcher();
    return;
  }

  if (window.__cexVimeoReady) {
    window.__cexVimeoReady.then(attachVimeoWatcher).catch(() => {});
    return;
  }

  window.__cexVimeoReady = new Promise((resolve, reject) => {
    const existing = document.querySelector('script[src="https://player.vimeo.com/api/player.js"]');
    if (existing) {
      existing.addEventListener("load", resolve, { once: true });
      existing.addEventListener("error", reject, { once: true });
      return;
    }
    const script = document.createElement("script");
    script.src = "https://player.vimeo.com/api/player.js";
    script.onload = resolve;
    script.onerror = reject;
    document.head.appendChild(script);
  });
  window.__cexVimeoReady.then(attachVimeoWatcher).catch(() => {});
  return true;
  };

  if (initInstructorPlaceholder()) return;
  const retryInstructorPlaceholder = window.setInterval(() => {
    if (initInstructorPlaceholder()) window.clearInterval(retryInstructorPlaceholder);
  }, 250);
  window.setTimeout(() => window.clearInterval(retryInstructorPlaceholder), 10000);
  document.addEventListener("DOMContentLoaded", initInstructorPlaceholder, { once: true });
})();

(() => {
  const initChatReplay = () => {
  const root = document.getElementById("ce-purpose-lesson-1932");
  if (!root) return false;
  if (root.dataset.chatReady === "true") return true;
  root.dataset.chatReady = "true";

  const webinarChatMessages = [{"time":"00:15:03","speaker":"Alicia","message":"Alicia LCPC-Idao, LCMHC-Utah, LPC-Oregon, Psychologist- The Netherlands, coming from Amsterdam today"},{"time":"00:15:31","speaker":"Jennifer","message":"Hello from Michigan"},{"time":"00:16:05","speaker":"Colena","message":"Colena, MSW Accent Home Health, Mississippi"},{"time":"00:18:42","speaker":"CE Training Workshops","message":"Hello hello! I’m Alex with CE Training Workshops! Thank you for choosing CE Training Workshops for your CE needs. We are so excited to have you join us today. For those of you who may have missed it in the 1-hour reminder email, here is the link to the presentation slides: https://cetrainingworkshops.com/wp-content/uploads/2026/05/Slides-From-Awareness-to-Advocacy.pdf"},{"time":"00:19:39","speaker":"Robin","message":"Hi everyone from Robin in Louisiana"},{"time":"00:20:13","speaker":"Amy","message":"Amy, LAC from Arkansas"},{"time":"00:20:25","speaker":"Eileen","message":"Hi from New Hampshire"},{"time":"00:20:51","speaker":"Bryna","message":"Hi from Salem, MA"},{"time":"00:23:34","speaker":"Monique","message":"So happy to see the court’s ruling on trans people in the military!"},{"time":"00:23:49","speaker":"Tommy","message":"Hello from the Chi!!!"},{"time":"00:24:22","speaker":"CE Training Workshops","message":"Hello hello! I’m Alex with CE Training Workshops! Thank you for choosing CE Training Workshops for your CE needs. We are so excited to have you join us today. For those of you who may have missed it in the 1-hour reminder email, here is the link to the presentation slides: https://cetrainingworkshops.com/wp-content/uploads/2026/05/Slides-From-Awareness-to-Advocacy.pdf"},{"time":"00:27:35","speaker":"Alicia","message":"And these are the  ones that reported to the Trevor Project"},{"time":"00:43:29","speaker":"Sarah","message":"Only 3 genders"},{"time":"00:43:31","speaker":"Danyel","message":"It's limited"},{"time":"00:43:31","speaker":"Jennifer","message":"It’s incomplete"},{"time":"00:43:31","speaker":"Mary","message":"Binary"},{"time":"00:43:32","speaker":"Amy","message":"Why just 3 choices? And Trans?"},{"time":"00:43:35","speaker":"Stacey","message":"Select one"},{"time":"00:43:36","speaker":"Eileen","message":"Limited"},{"time":"00:43:38","speaker":"Mary","message":"“Select one\""},{"time":"00:43:38","speaker":"Banks","message":"“Please select ONE”"},{"time":"00:43:38","speaker":"Laura","message":"not making it optional"},{"time":"00:43:39","speaker":"Monique","message":"Requires a choice"},{"time":"00:43:39","speaker":"Kimberly","message":"too restrictive"},{"time":"00:43:39","speaker":"Barbara","message":"Not enough choices"},{"time":"00:43:40","speaker":"Tawnya","message":"The (please select one)"},{"time":"00:43:41","speaker":"Kylea","message":"Does not reflect non-binary"},{"time":"00:43:41","speaker":"Nicosia","message":"Limiting"},{"time":"00:43:45","speaker":"Amber","message":"select one"},{"time":"00:43:50","speaker":"Laura","message":"Please select one"},{"time":"00:43:52","speaker":"Lauren","message":"Limited"},{"time":"00:43:53","speaker":"Margaret","message":"Queer bi are missing"},{"time":"00:44:02","speaker":"Robin","message":"Limited"},{"time":"00:44:04","speaker":"Ana","message":"limiting"},{"time":"00:44:15","speaker":"Jane","message":"Not enough categories. Someone who is trans has a gender identity."},{"time":"00:44:34","speaker":"Alicia","message":"they are even asking  in the first place"},{"time":"00:44:36","speaker":"Amy","message":"Two-Spirit? Incredibly racist!"},{"time":"00:57:56","speaker":"Jennifer","message":"I’ve taken this and it’s very sobering, challenging, and incredibly helpful."},{"time":"01:03:21","speaker":"Rebekah","message":"Replying to \"Two-Spirit? Incredibly racist!\"\nThe term \"Two-Spirit\" is not considered racist. Rather, it is a specific cultural and spiritual identity created by and exclusively for Indigenous peoples. generally. While the term isn't racist, it is considered cultural appropriation for non-Indigenous people to use it. Because Two-Spirit is deeply tied to the heritage, tribal customs, and colonial history of Indigenous peoples, it is reserved exclusively for them."},{"time":"01:03:33","speaker":"Simone","message":"Reacted to \"The term \"Two-Spirit...\" with 💯"},{"time":"01:05:23","speaker":"Nicosia","message":"Reacted to \"The term \"Two-Spir...\" with 👍🏾"},{"time":"01:06:00","speaker":"Stacey","message":"What is HRT"},{"time":"01:06:14","speaker":"Monique","message":"Hormone replacement therapy"},{"time":"01:06:20","speaker":"Stacey","message":"Thanks"},{"time":"01:07:10","speaker":"Alicia","message":"Trauma? Usually! SUD?"},{"time":"01:08:01","speaker":"Amy","message":"Replying to \"Two-Spirit? Incredib...\"\nThank you for that information. It does seem precarious to use as it probably only applies to some, not all tribes of Indigenous peoples. I would not want to use the term unless I was granted permission to do so by the person I was speaking with."},{"time":"01:09:29","speaker":"Jane","message":"In my work, reflections on the oppressiveness of environments can be life-changing. We live in the culture that blames people for their suffering. By identifying the source and then fostering re-evaluation of the meanings of the oppression is liberating—can be difficult and can take a long time."},{"time":"01:13:20","speaker":"Rebekah","message":"Replying to \"Two-Spirit? Incredibly racist!\"\nI will leave space for clients to let me know how they choose to identify. The best practice is definitely not to use any specific identifying term until the individual states how they identify."},{"time":"01:16:52","speaker":"Kylea","message":"Replying to \"Two-Spirit? Incredib...\"\nThere is a book I have been interested in reading called Reclaiming Two-Spirits by Gregory D. Smithers. Could be worth looking into if wanting to further knowledge."},{"time":"01:19:29","speaker":"Simone","message":"Do you have any resources on questions/procedures that are helpful for vetting organizations and resources for GAC?"},{"time":"01:19:34","speaker":"Shawn","message":"Am I understanding that agencies should not have gendered bathrooms as it relates to being trauma informed?"},{"time":"01:19:41","speaker":"Amy","message":"Replying to \"Two-Spirit? Incredib...\"\nThat sounds very interesting! Thank you for the recommendation. ☺️"},{"time":"01:19:48","speaker":"Lori","message":"Not just talking the talk"},{"time":"01:20:00","speaker":"Stacey","message":"acceptance"},{"time":"01:20:10","speaker":"Amy","message":"Walking the walk"},{"time":"01:20:10","speaker":"Tommy","message":"Reacted to acceptance with \"👍\""},{"time":"01:20:13","speaker":"Carmen","message":"just doint it"},{"time":"01:20:18","speaker":"Shawn","message":"Reacted to \"Not just talking the talk\" with 👍"},{"time":"01:20:22","speaker":"Barbara","message":"It is part of the alliance"},{"time":"01:20:22","speaker":"Simone","message":"Actually making a difference"},{"time":"01:20:34","speaker":"Banks","message":"Willingness to create and hold space for a client rather than calling out where the space does not exist or is failing"},{"time":"01:20:38","speaker":"Amy","message":"Actively standing up for others and not just calling yourself an ally"},{"time":"01:21:00","speaker":"Jane","message":"Gender-affirming care reveals the lies our culture tells us and provides us with strategies for transformation of our understandings of our culture and ourselves."},{"time":"01:21:03","speaker":"Tommy","message":"Free from judgment"},{"time":"01:21:07","speaker":"Barbara","message":"I tell my clients this space has to be safe for both of us"},{"time":"01:21:22","speaker":"Jamila","message":"Treat everyone as a human being first and foremost"},{"time":"01:21:22","speaker":"Tifany","message":"supporting the client while understanding the struggles that the client has been through as well as the realities of the current society"},{"time":"01:21:33","speaker":"Kylea","message":"You are backing up your belief with action that shows you actually care. I also think it shows how much you care when you use whatever privilege you have to do better for the community."},{"time":"01:21:52","speaker":"Susan","message":"Reacted to \"You are backing up y...\" with 👍"},{"time":"01:27:32","speaker":"Simone","message":"To better serve the community I'm a part of"},{"time":"01:27:34","speaker":"Kelsey","message":"To do better"},{"time":"01:27:44","speaker":"Susan","message":"Make positive changes"},{"time":"01:27:48","speaker":"Banks","message":"Helping individuals finding purpose in their growth and healing."},{"time":"01:27:55","speaker":"Jane","message":"Commitment to dignity, worth, case, justice, and self-determination."},{"time":"01:27:56","speaker":"Amy","message":"Because I care about people, their individuality, and what matters to them."},{"time":"01:27:57","speaker":"Kylea","message":"Fundamental belief that everyone deserves to be safe and respected no matter who they are."},{"time":"01:28:10","speaker":"Tawnya","message":"To come from a place of knowing"},{"time":"01:28:14","speaker":"Jane","message":"Replying to \"Commitment to dignit...\"\nCare"},{"time":"01:28:16","speaker":"Lauren","message":"Because I care"},{"time":"01:28:18","speaker":"Lori","message":"compassion and kiundness to all hospice LCSW"},{"time":"01:28:22","speaker":"Simone","message":"To be an advocate the best way I know how"},{"time":"01:28:26","speaker":"Aimee","message":"Safe and respectful spaces"},{"time":"01:28:29","speaker":"Alicia","message":"Why-because I hate disciminatory practices"},{"time":"01:28:29","speaker":"Mary","message":"Our calling to be a safe haven and secure base for our clients helps them to know they belong as they are"},{"time":"01:28:31","speaker":"Nancy","message":"life affirming"},{"time":"01:28:39","speaker":"Barbara","message":"I’ve been out for 52 years, I work with college students. Seeing and working with this group affirms what I went through in the 70’s"},{"time":"01:28:41","speaker":"Nicole","message":"Safe Space"},{"time":"01:29:31","speaker":"Carmen","message":"it shows the need to keep in mind client center; and to keep working from their resilience and strength base."},{"time":"01:29:55","speaker":"Catherine","message":"Safe and supportive space"},{"time":"01:32:18","speaker":"Rosemary","message":"Should there be an age limit to for adolescents to go through the transgendered process"},{"time":"01:32:52","speaker":"Jennifer","message":"I lived in Germany 30 years ago and there were all gender bathrooms with fully closed in stalls. It was a slight adjustment, but became very “normal”."},{"time":"01:33:22","speaker":"Rosemary","message":"Rosemary's Question above"},{"time":"01:33:29","speaker":"Tifany","message":"how do we encourage more queer and trans people into this field? As a trans therapist, I am seeing such a huge need for us in this profession."},{"time":"01:33:45","speaker":"Alicia","message":"Replying to \"I lived in Germany...\"\nthis is still how the NL works"},{"time":"01:33:50","speaker":"Barbara","message":"Reacted to \"how do we encourage more queer and trans people into this field? As a trans therapist, I am seeing such a huge need for us in this profession.\" with 👍"},{"time":"01:36:17","speaker":"Alicia","message":"and advanced degree is not eligible for loan repayment now"},{"time":"01:36:59","speaker":"Alicia","message":"dept of education excludes counseling now"},{"time":"01:41:31","speaker":"Ana","message":"thank you"},{"time":"01:41:33","speaker":"Tommy","message":"Replying to \"Commitment to dignit...\"\n This was absolutely 💯 👌"},{"time":"01:41:33","speaker":"Susan","message":"Thank you"},{"time":"01:41:34","speaker":"Danyel","message":"Thank you for the training!"},{"time":"01:41:35","speaker":"Nicosia","message":"Thank You!!!"},{"time":"01:41:35","speaker":"Tifany","message":"Thanks!"},{"time":"01:41:36","speaker":"Jennifer","message":"Thank you!"},{"time":"01:41:37","speaker":"Barbara","message":"Thanks"},{"time":"01:41:37","speaker":"Amber","message":"thank you"},{"time":"01:41:37","speaker":"Toni","message":"Thank you so much."},{"time":"01:41:37","speaker":"Nancy","message":"thank you for this training"},{"time":"01:41:38","speaker":"Tommy","message":"Replying to \"Commitment to dignit...\"\n Thank you"},{"time":"01:41:38","speaker":"Amy","message":"Wonderful presentation!! Thank you!"},{"time":"01:41:38","speaker":"Banks","message":"Thank you very much!"},{"time":"01:41:38","speaker":"Sarah","message":"Thank you"},{"time":"01:41:38","speaker":"Natalie","message":"Thanks!"},{"time":"01:41:40","speaker":"Kimberly","message":"thank you!"},{"time":"01:41:41","speaker":"Jana","message":"Thank you"},{"time":"01:41:41","speaker":"Xavious","message":"Thank you so much"},{"time":"01:41:41","speaker":"Eileen","message":"Thank you"},{"time":"01:41:42","speaker":"Tawana","message":"This was so informative!"},{"time":"01:41:43","speaker":"Kelly","message":"Thank you!"},{"time":"01:41:44","speaker":"Tawnya","message":"Thank you!"},{"time":"01:41:44","speaker":"Aimee","message":"Thank you!"},{"time":"01:41:45","speaker":"Jamila","message":"Thank you"},{"time":"01:41:47","speaker":"Kelsey","message":"Bye! Thank you!"},{"time":"01:41:48","speaker":"Catherine","message":"Thank you!"},{"time":"01:41:50","speaker":"Carmen","message":"thanks"},{"time":"01:41:51","speaker":"Simone","message":"Thank you"},{"time":"01:41:52","speaker":"Reagan","message":"Thank you!"},{"time":"01:41:55","speaker":"Nicole","message":"Thank you"},{"time":"01:41:59","speaker":"Robin","message":"Thank you"}];
  const section = root.querySelector("#cex-video");
  const frame = root.querySelector("#cex-vimeo-a-1932");
  const openButton = root.querySelector("[data-chat-open]");
  const lightbox = root.querySelector("[data-chat-lightbox]");
  const feed = root.querySelector("[data-chat-feed]");
  const chatToggle = root.querySelector("#cex-chat-toggle-1932");
  const emptyState = root.querySelector("[data-chat-empty]");
  if (!openButton || !lightbox || !feed || !section) {
    delete root.dataset.chatReady;
    return false;
  }

  const startSeconds = Number(section.dataset.startSeconds || 0);
  let currentVideoSeconds = startSeconds;
  let visibleCount = 0;
  let player = null;
  let chatPollTimer = 0;
  let chatFallbackBaseSeconds = startSeconds;
  let chatFallbackStartedAt = 0;
  let hasExternalTime = false;
  const hasStaticChatMessages = feed.querySelectorAll("[data-static-chat]").length > 0;

  const timeToSeconds = (time) => {
    const parts = String(time).split(":").map(Number);
    return (parts[0] * 3600) + (parts[1] * 60) + parts[2];
  };

  const messageSeconds = webinarChatMessages.map((entry) => timeToSeconds(entry.time));

  const appendMessage = (entry, index) => {
    if (hasStaticChatMessages) return;
    if (emptyState) emptyState.style.display = "none";
    const item = document.createElement("article");
    item.className = "cex-chat-message" + (entry.speaker === "CE Training Workshops" ? " is-host" : "");
    item.style.animationDelay = "0ms";

    const meta = document.createElement("div");
    meta.className = "cex-chat-meta";

    const speaker = document.createElement("span");
    speaker.className = "cex-chat-speaker";
    speaker.textContent = entry.speaker;

    const time = document.createElement("span");
    time.className = "cex-chat-time";
    time.textContent = entry.time;

    const bubble = document.createElement("div");
    bubble.className = "cex-chat-bubble";
    bubble.textContent = entry.message;

    meta.append(speaker, time);
    item.append(meta, bubble);
    feed.appendChild(item);
    if (chatToggle && chatToggle.checked) {
      window.setTimeout(() => { feed.scrollTop = feed.scrollHeight; }, 20);
    }
  };

  const syncChatToVideo = (seconds) => {
    currentVideoSeconds = Math.max(startSeconds, seconds || startSeconds);
    while (visibleCount < webinarChatMessages.length && messageSeconds[visibleCount] <= currentVideoSeconds) {
      appendMessage(webinarChatMessages[visibleCount], visibleCount);
      visibleCount += 1;
    }
  };

  const setFallbackClock = (seconds = currentVideoSeconds) => {
    chatFallbackBaseSeconds = Math.max(startSeconds, seconds || startSeconds);
    chatFallbackStartedAt = Date.now();
  };

  const fallbackClockSeconds = () => {
    if (!chatFallbackStartedAt) setFallbackClock(currentVideoSeconds);
    return chatFallbackBaseSeconds + ((Date.now() - chatFallbackStartedAt) / 1000);
  };

  const resetChatAfterSeek = (seconds) => {
    if ((seconds || startSeconds) < currentVideoSeconds) {
      feed.querySelectorAll(".cex-chat-message").forEach((node) => node.remove());
      visibleCount = 0;
      if (emptyState) emptyState.style.display = "block";
    }
    syncChatToVideo(seconds);
  };

  const refreshFromPlayer = () => {
    const lessonSeconds = Number(section.dataset.currentSeconds || currentVideoSeconds || startSeconds);
    if (Number.isFinite(lessonSeconds) && lessonSeconds > currentVideoSeconds + 0.15) {
      hasExternalTime = true;
      setFallbackClock(lessonSeconds);
      syncChatToVideo(lessonSeconds);
    } else {
      syncChatToVideo(fallbackClockSeconds());
    }
    if (!player || !player.getCurrentTime) return;
    player.getCurrentTime().then((seconds) => {
      if (Number.isFinite(seconds) && seconds > currentVideoSeconds + 0.15) {
        hasExternalTime = true;
        setFallbackClock(seconds);
        syncChatToVideo(seconds);
      }
    }).catch(() => {});
  };

  const startChatPolling = () => {
    if (hasStaticChatMessages) return;
    if (!hasExternalTime) setFallbackClock(currentVideoSeconds);
    refreshFromPlayer();
    if (chatPollTimer) return;
    chatPollTimer = window.setInterval(refreshFromPlayer, 1000);
  };

  const stopChatPolling = () => {
    if (!chatPollTimer) return;
    window.clearInterval(chatPollTimer);
    chatPollTimer = 0;
  };

  const openChat = () => {
    if (chatToggle) chatToggle.checked = true;
    lightbox.classList.add("is-open");
    lightbox.setAttribute("aria-hidden", "false");
    openButton.setAttribute("aria-expanded", "true");
    startChatPolling();
    window.setTimeout(() => { feed.scrollTop = feed.scrollHeight; }, 60);
  };

  const closeChat = () => {
    if (chatToggle) chatToggle.checked = false;
    lightbox.classList.remove("is-open");
    lightbox.setAttribute("aria-hidden", "true");
    openButton.setAttribute("aria-expanded", "false");
  };

  const setChatOpenState = () => {
    const isOpen = Boolean(chatToggle && chatToggle.checked);
    if (isOpen) {
      openChat();
    } else {
      closeChat();
    }
  };

  const loadVimeoApi = () => {
    if (window.Vimeo && window.Vimeo.Player) return Promise.resolve();
    if (window.__cexVimeoReady) return window.__cexVimeoReady;
    window.__cexVimeoReady = new Promise((resolve, reject) => {
      const existing = document.querySelector('script[src="https://player.vimeo.com/api/player.js"]');
      if (existing) {
        existing.addEventListener("load", resolve, { once: true });
        existing.addEventListener("error", reject, { once: true });
        return;
      }
      const script = document.createElement("script");
      script.src = "https://player.vimeo.com/api/player.js";
      script.onload = resolve;
      script.onerror = reject;
      document.head.appendChild(script);
    });
    return window.__cexVimeoReady;
  };

  if (chatToggle) {
    chatToggle.addEventListener("change", setChatOpenState);
  }

  openButton.addEventListener("click", (event) => {
    event.preventDefault();
    openChat();
  });

  root.querySelectorAll("[data-chat-close]").forEach((button) => {
    button.addEventListener("click", (event) => {
      event.preventDefault();
      closeChat();
    });
  });

  root.addEventListener("keydown", (event) => {
    const trigger = event.target.closest("[data-chat-open], [data-chat-close]");
    if (!trigger || (event.key !== "Enter" && event.key !== " ")) return;
    event.preventDefault();
    if (trigger.matches("[data-chat-open]")) openChat();
    if (trigger.matches("[data-chat-close]")) closeChat();
  });

  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && chatToggle && chatToggle.checked) {
      closeChat();
    }
  });

  root.addEventListener("cex-video-time", (event) => {
    const seconds = event.detail && event.detail.seconds;
    hasExternalTime = true;
    setFallbackClock(seconds);
    syncChatToVideo(seconds);
  });

  loadVimeoApi().then(() => {
    if (!frame || !window.Vimeo || !window.Vimeo.Player) return;
    player = new window.Vimeo.Player(frame);
    player.on("timeupdate", (event) => syncChatToVideo(event.seconds));
    player.on("seeked", (event) => resetChatAfterSeek(event.seconds));
    refreshFromPlayer();
  }).catch(() => {});

  closeChat();
  startChatPolling();
  return true;
  };

  if (initChatReplay()) return;
  const retryChatReplay = window.setInterval(() => {
    if (initChatReplay()) window.clearInterval(retryChatReplay);
  }, 250);
  window.setTimeout(() => window.clearInterval(retryChatReplay), 10000);
  document.addEventListener("DOMContentLoaded", initChatReplay, { once: true });
})();

(() => {
  const initPracticeQuiz = () => {
  const root = document.getElementById("ce-purpose-lesson-1932");
  if (!root) return false;
  if (root.dataset.quizReady === "true") return true;
  root.dataset.quizReady = "true";

  const questions = [
    { prompt: "It is best practice to assume someone's gender and not ask them.", options: ["True", "False"], answer: "False" },
    { prompt: "When building an inclusive intake process, best practices dictate replacing open-ended text fields for gender identity with static checkboxes to make data collation easier.", options: ["True", "False"], answer: "False" },
    { prompt: "In an inclusive intake form, a clinician should ask for sex, gender, or sexual orientation on every single document, regardless of whether it is directly relevant or necessary to care.", options: ["True", "False"], answer: "False" },
    { prompt: "What is a common way to overcome bias?", options: ["Slowing decision making.", "Welcoming diverse perspectives.", "Building awareness.", "All these choices are correct."], answer: "All these choices are correct." },
    { prompt: "Validating an offensive comment with a brief, polite laugh signals to the speaker that the comment is acceptable to you.", options: ["True", "False"], answer: "True" },
    { prompt: "Family rejection shows a high correlation with suicide risk among transgender individuals.", options: ["True", "False"], answer: "True" },
    { prompt: "Incorporating your pronouns into your standard email signature and professional profiles signals to clients that pronouns are a routine, intentional element of clinical care.", options: ["True", "False"], answer: "True" },
    { prompt: "If an offensive or derogatory remark occurs and the situation escalates into a debate, what boundary guidance does the presentation suggest?", options: ["Keep debating until the other party changes their perspective.", "Passively remain silent to prevent further friction.", "Recognize your own personal limits and do not feel guilty for shutting down the conversation.", "Shift immediately to explaining the problem on behalf of the group targeted."], answer: "Recognize your own personal limits and do not feel guilty for shutting down the conversation." },
    { prompt: "The \"Neutrality Myth\" and \"Internalized Heteronormativity\" are key concepts that clinicians must navigate when moving from basic awareness to active advocacy.", options: ["True", "False"], answer: "True" },
    { prompt: "In an inclusive demographic form, utilizing \"Chosen Family\" designations under emergency contacts is important for LGBTQ+ clients who may face estrangement from biological kin.", options: ["True", "False"], answer: "True" },
    { prompt: "Which of the following is identified as a common \"Pitfall\" in this work?", options: ["Intentionally seeking out accountability partners.", "Expecting LGBTQ+ clients to teach you everything.", "Normalizing clinical and casual corrections.", "Utilizing a separate field for legal and preferred names on forms."], answer: "Expecting LGBTQ+ clients to teach you everything." },
    { prompt: "When making an apology to repair a mistake, which words or structures should explicitly be avoided?", options: ["Direct acknowledgments of wrongdoing.", "Expressions of gratitude (\"Thank you\").", "Defensive formatting, such as utilizing \"but\" or \"if\" statements.", "Clear descriptions of the future behavioral adjustments you will implement."], answer: "Defensive formatting, such as utilizing \"but\" or \"if\" statements." },
    { prompt: "Focusing on good intentions is enough in this work.", options: ["True", "False"], answer: "False" },
    { prompt: "It is important to slow down your body's defensive reactions before moving into action.", options: ["True", "False"], answer: "True" },
    { prompt: "What is an aspect of providing affirming care?", options: ["Be open and welcoming.", "Use client's language and identities.", "Incorporate a motivational interviewing-spirit.", "All these choices are correct."], answer: "All these choices are correct." }
  ];

  const openButton = root.querySelector("[data-quiz-open]");
  const lightbox = root.querySelector("[data-quiz-lightbox]");
  const form = root.querySelector("[data-quiz-form]");
  const result = root.querySelector("[data-quiz-result]");
  const closeButtons = root.querySelectorAll("[data-quiz-close]");
  const prevButton = root.querySelector("[data-quiz-prev]");
  const nextButton = root.querySelector("[data-quiz-next]");
  const scoreButton = root.querySelector("[data-quiz-score]");
  const resetButton = root.querySelector("[data-quiz-reset]");
  const printButton = root.querySelector("[data-quiz-print]");
  const stepText = root.querySelector("[data-quiz-step]");
  const answeredText = root.querySelector("[data-quiz-answered]");
  const progressFill = root.querySelector("[data-quiz-progress-fill]");
  let currentIndex = 0;
  if (!openButton || !lightbox || !form || !result || !prevButton || !nextButton || !scoreButton || !resetButton || !printButton || !stepText || !answeredText || !progressFill) {
    delete root.dataset.quizReady;
    return false;
  }

  const escapeHtml = (value) => String(value).replace(/[&<>"']/g, (char) => ({
    "&": "&amp;",
    "<": "&lt;",
    ">": "&gt;",
    "\"": "&quot;",
    "'": "&#39;"
  })[char]);

  form.innerHTML = questions.map((question, index) => `
    <fieldset class="cex-quiz-question${index === 0 ? " is-active" : ""}" data-quiz-question="${index}">
      <legend class="cex-quiz-prompt">${index + 1}. ${escapeHtml(question.prompt)}</legend>
      <div class="cex-quiz-options">
        ${question.options.map((option) => `
          <label class="cex-quiz-option">
            <input type="radio" name="cex-quiz-${index}" value="${escapeHtml(option)}">
            <span>${escapeHtml(option)}</span>
          </label>
        `).join("")}
      </div>
      <div class="cex-quiz-feedback" data-quiz-feedback></div>
    </fieldset>
  `).join("");

  const getAnsweredCount = () => questions.reduce((count, question, index) => (
    form.querySelector(`input[name="cex-quiz-${index}"]:checked`) ? count + 1 : count
  ), 0);

  const updateQuizView = () => {
    form.querySelectorAll(".cex-quiz-question").forEach((question, index) => {
      question.classList.toggle("is-active", index === currentIndex);
    });
    stepText.textContent = `Question ${currentIndex + 1} of ${questions.length}`;
    answeredText.textContent = `${getAnsweredCount()} answered`;
    progressFill.style.width = `${((currentIndex + 1) / questions.length) * 100}%`;
    prevButton.disabled = currentIndex === 0;
    nextButton.textContent = currentIndex === questions.length - 1 ? "Last Question" : "Next";
    nextButton.disabled = currentIndex === questions.length - 1;
  };

  const goToQuestion = (index) => {
    currentIndex = Math.max(0, Math.min(questions.length - 1, index));
    updateQuizView();
  };

  const openQuiz = () => {
    lightbox.classList.add("is-open");
    lightbox.setAttribute("aria-hidden", "false");
    openButton.setAttribute("aria-expanded", "true");
    updateQuizView();
    nextButton.focus();
  };

  const closeQuiz = () => {
    lightbox.classList.remove("is-open");
    lightbox.setAttribute("aria-hidden", "true");
    openButton.setAttribute("aria-expanded", "false");
    openButton.focus();
  };

  const scoreQuiz = () => {
    let score = 0;
    questions.forEach((question, index) => {
      const wrapper = form.querySelector(`[data-quiz-question="${index}"]`);
      const selected = form.querySelector(`input[name="cex-quiz-${index}"]:checked`);
      const feedback = wrapper.querySelector("[data-quiz-feedback]");
      const isCorrect = selected && selected.value === question.answer;
      wrapper.classList.remove("is-correct", "is-incorrect");
      wrapper.classList.add("has-feedback", isCorrect ? "is-correct" : "is-incorrect");
      if (isCorrect) score += 1;
      feedback.textContent = isCorrect
        ? "Correct."
        : `Correct answer: ${question.answer}`;
    });
    result.textContent = `Score: ${score} out of ${questions.length}.`;
    const firstMissed = [...form.querySelectorAll(".cex-quiz-question.is-incorrect")][0];
    if (firstMissed) goToQuestion(Number(firstMissed.dataset.quizQuestion));
  };

  const resetQuiz = () => {
    form.reset();
    currentIndex = 0;
    result.textContent = "Choose an answer, then move to the next question.";
    form.querySelectorAll(".cex-quiz-question").forEach((question) => {
      question.classList.remove("is-correct", "is-incorrect", "has-feedback");
    });
    form.querySelectorAll("[data-quiz-feedback]").forEach((feedback) => {
      feedback.textContent = "";
    });
    form.querySelectorAll(".cex-quiz-option").forEach((option) => {
      option.classList.remove("is-selected");
    });
    updateQuizView();
  };

  const printQuiz = () => {
    const printWindow = window.open("", "_blank", "width=900,height=700");
    if (!printWindow) {
      window.print();
      return;
    }

    const quizHtml = questions.map((question, index) => `
      <section class="question">
        <h2>${index + 1}. ${escapeHtml(question.prompt)}</h2>
        <ul>
          ${question.options.map((option) => `
            <li class="${option === question.answer ? "correct" : ""}">
              ${escapeHtml(option)}${option === question.answer ? " <strong>(Correct answer)</strong>" : ""}
            </li>
          `).join("")}
        </ul>
      </section>
    `).join("");

    printWindow.document.write(`
      <!doctype html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>LGBTQ+ Affirming Care Practice Quiz</title>
          <style>
            body { font-family: Arial, sans-serif; color: #1d252c; line-height: 1.35; margin: 28px; }
            h1 { color: #005c87; font-size: 24px; margin: 0 0 16px; }
            .question { break-inside: avoid; border-bottom: 1px solid #d9e2ea; padding: 10px 0; }
            h2 { font-size: 15px; margin: 0 0 8px; }
            ul { margin: 0 0 0 20px; padding: 0; }
            li { margin: 3px 0; }
            .correct { color: #005c87; font-weight: 700; }
            @media print { body { margin: 18mm; } }
          </style>
        </head>
        <body>
          <h1>LGBTQ+ Affirming Care Practice Quiz - Answer Key</h1>
          ${quizHtml}
        </body>
      </html>
    `);
    printWindow.document.close();
    printWindow.focus();
    printWindow.print();
  };

  openButton.addEventListener("click", openQuiz);
  closeButtons.forEach((button) => button.addEventListener("click", closeQuiz));
  prevButton.addEventListener("click", () => goToQuestion(currentIndex - 1));
  nextButton.addEventListener("click", () => goToQuestion(currentIndex + 1));
  scoreButton.addEventListener("click", scoreQuiz);
  resetButton.addEventListener("click", resetQuiz);
  printButton.addEventListener("click", printQuiz);
  form.addEventListener("change", (event) => {
    if (!event.target.matches("input[type='radio']")) return;
    const groupName = event.target.name;
    form.querySelectorAll(`input[name="${groupName}"]`).forEach((input) => {
      input.closest(".cex-quiz-option").classList.toggle("is-selected", input.checked);
    });
    result.textContent = currentIndex === questions.length - 1
      ? "You are on the last question. Check your answers when ready."
      : "Answer saved. Move to the next question when ready.";
    updateQuizView();
  });
  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && lightbox.classList.contains("is-open")) closeQuiz();
  });
  updateQuizView();
  return true;
  };

  if (initPracticeQuiz()) return;
  const retryPracticeQuiz = window.setInterval(() => {
    if (initPracticeQuiz()) window.clearInterval(retryPracticeQuiz);
  }, 250);
  window.setTimeout(() => window.clearInterval(retryPracticeQuiz), 10000);
  document.addEventListener("DOMContentLoaded", initPracticeQuiz, { once: true });
})();
