<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<div id="ce-purpose-lesson-1932" class="cex">
  <div class="cex-shell">
    <section id="cex-video" class="cex-section" data-start-seconds="900" data-duration-seconds="5100">
      <div class="dlp-view-box">
        <button class="dlp-mode active" type="button" data-mode="split">Side by Side</button>
        <button class="dlp-mode" type="button" data-mode="singleA">Presentation</button>
        <button class="dlp-mode" type="button" data-mode="singleB">Instructor</button>
        <button class="dlp-mode" type="button" data-mode="pip">Picture in Picture</button>
        <button class="dlp-control dlp-pip-swap" type="button" data-action="swap" aria-label="Swap main and small picture in picture videos">Swap View</button>
        <button class="dlp-control" type="button" data-action="fullscreen">Open Full Screen</button>
      </div>

      <div class="dlp-stage-wrap">
        <div class="dlp-stage split">
          <div class="dlp-video dlp-a dlp-primary" data-video="A">
            <iframe id="cex-vimeo-a-1932" src="https://player.vimeo.com/video/1201618263?h=177d1bfae5&amp;title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;controls=0&amp;autopause=0&amp;playsinline=1&amp;api=1&amp;player_id=cex-vimeo-a-1932&amp;cex_start=900&amp;cex_version=1900#t=900s" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen title="From Awareness to Advocacy - Supporting LGBTQ+ Clients presentation"></iframe>
          </div>

          <div class="dlp-video dlp-b dlp-secondary" data-video="B">
            <iframe id="cex-vimeo-b-1932" src="https://player.vimeo.com/video/1201618264?h=a435cc4662&amp;title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;controls=0&amp;autopause=0&amp;playsinline=1&amp;api=1&amp;player_id=cex-vimeo-b-1932&amp;cex_start=900&amp;cex_version=1900#t=900s" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen title="From Awareness to Advocacy - Supporting LGBTQ+ Clients instructor"></iframe>
            <img class="dlp-no-cam-card" data-instructor-placeholder src="<?php echo esc_url($assets_url . 'no-cam-professional.png'); ?>" alt="Instructor's video will return shortly.">
          </div>

          <button type="button" class="dlp-start-overlay" data-video-start-overlay aria-label="Press Play to begin video">
            <span class="dlp-start-card">
              <span class="dlp-start-kicker">Learning Video</span>
              <span class="dlp-start-title">Press Play to begin video</span>
            </span>
          </button>
        </div>

        <div class="dlp-progress" aria-label="Video progress">
          <div class="dlp-progress-top">Time Remaining <span data-video-progress-time>1:25:00</span></div>
          <div class="dlp-progress-track">
            <div class="dlp-progress-fill" data-video-progress-fill></div>
          </div>
        </div>

        <div class="dlp-caption-window" data-caption-window aria-hidden="true">
          <div class="dlp-caption-label">Closed Captions</div>
          <div class="dlp-caption-text" data-caption-text>Captions are off.</div>
        </div>
      </div>

      <input class="cex-chat-toggle" id="cex-chat-toggle-1932" type="checkbox" aria-hidden="true">

      <div class="dlp-controls">
        <button class="dlp-control primary" type="button" data-action="play">Play</button>
        <button class="dlp-control" type="button" data-action="pause">Pause</button>
        <button class="dlp-control" type="button" data-action="restart">Restart</button>
        <button class="dlp-control" type="button" data-action="captions" aria-pressed="false">Closed Captions</button>
        <button class="dlp-control quiz-primary" type="button" data-quiz-open>Practice Quiz</button>
        <label class="dlp-control chat-primary" for="cex-chat-toggle-1932" data-chat-open role="button" tabindex="0">Chat Replay</label>
      </div>

      <div class="cex-quiz-lightbox" data-quiz-lightbox aria-hidden="true">
        <div class="cex-quiz-scrim" data-quiz-close></div>
        <div class="cex-quiz-dialog" role="dialog" aria-modal="true" aria-labelledby="cex-quiz-title-1932">
          <div class="cex-quiz-head">
            <div>
              <div class="cex-quiz-kicker">Practice Check</div>
              <h2 id="cex-quiz-title-1932">LGBTQ+ Affirming Care Quiz</h2>
            </div>
            <button class="cex-quiz-icon" type="button" data-quiz-close aria-label="Close quiz">×</button>
          </div>

          <div class="cex-quiz-actions">
            <button class="cex-quiz-button" type="button" data-quiz-prev>Previous</button>
            <button class="cex-quiz-button primary" type="button" data-quiz-next>Next</button>
            <button class="cex-quiz-button primary" type="button" data-quiz-score>Check Answers</button>
            <button class="cex-quiz-button" type="button" data-quiz-reset>Reset</button>
            <button class="cex-quiz-button" type="button" data-quiz-print>Print Quiz</button>
          </div>

          <div class="cex-quiz-progress" aria-label="Quiz progress">
            <div class="cex-quiz-progress-top">
              <span data-quiz-step>Question 1 of 15</span>
              <span data-quiz-answered>0 answered</span>
            </div>
            <div class="cex-quiz-progress-track">
              <div class="cex-quiz-progress-fill" data-quiz-progress-fill></div>
            </div>
          </div>

          <div class="cex-quiz-result" data-quiz-result aria-live="polite">Choose an answer, then move to the next question.</div>
          <form class="cex-quiz-form" data-quiz-form></form>
        </div>
      </div>

      <div class="cex-chat-lightbox" data-chat-lightbox aria-hidden="true">
        <div class="cex-chat-scrim" data-chat-close></div>
        <div class="cex-chat-window" role="dialog" aria-modal="true" aria-labelledby="cex-chat-title-1932">
          <div class="cex-chat-titlebar">
            <div>
              <div class="cex-chat-kicker">Webinar Reference</div>
              <h2 id="cex-chat-title-1932">Chat Replay</h2>
            </div>
            <label class="cex-chat-close" for="cex-chat-toggle-1932" data-chat-close role="button" tabindex="0" aria-label="Close chat replay">×</label>
          </div>
          <div class="cex-chat-note">This prerecorded chat replay is provided for reference. Participant names have been shortened for privacy.</div>
          <div class="cex-chat-feed" data-chat-feed>
            <div class="cex-chat-empty" data-chat-empty>Chat replay will begin in a few seconds.</div>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Alicia</span><span class="cex-chat-time">00:15:03</span></div>
              <div class="cex-chat-bubble">Alicia LCPC-Idao, LCMHC-Utah, LPC-Oregon, Psychologist- The Netherlands, coming from Amsterdam today</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:31s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Jennifer</span><span class="cex-chat-time">00:15:31</span></div>
              <div class="cex-chat-bubble">Hello from Michigan</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:65s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Colena</span><span class="cex-chat-time">00:16:05</span></div>
              <div class="cex-chat-bubble">Colena, MSW Accent Home Health, Mississippi</div>
            </article>
            <article class="cex-chat-message is-host" data-static-chat="true" style="--chat-delay:222s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">CE Training Workshops</span><span class="cex-chat-time">00:18:42</span></div>
              <div class="cex-chat-bubble">Hello hello! I’m Alex with CE Training Workshops! Thank you for choosing CE Training Workshops for your CE needs. We are so excited to have you join us today. For those of you who may have missed it in the 1-hour reminder email, here is the link to the presentation slides: https://cetrainingworkshops.com/wp-content/uploads/2026/05/Slides-From-Awareness-to-Advocacy.pdf</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:279s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Robin</span><span class="cex-chat-time">00:19:39</span></div>
              <div class="cex-chat-bubble">Hi everyone from Robin in Louisiana</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:313s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Amy</span><span class="cex-chat-time">00:20:13</span></div>
              <div class="cex-chat-bubble">Amy, LAC from Arkansas</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:325s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Eileen</span><span class="cex-chat-time">00:20:25</span></div>
              <div class="cex-chat-bubble">Hi from New Hampshire</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:351s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Bryna</span><span class="cex-chat-time">00:20:51</span></div>
              <div class="cex-chat-bubble">Hi from Salem, MA</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:514s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Monique</span><span class="cex-chat-time">00:23:34</span></div>
              <div class="cex-chat-bubble">So happy to see the court’s ruling on trans people in the military!</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:529s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Tommy</span><span class="cex-chat-time">00:23:49</span></div>
              <div class="cex-chat-bubble">Hello from the Chi!!!</div>
            </article>
            <article class="cex-chat-message is-host" data-static-chat="true" style="--chat-delay:562s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">CE Training Workshops</span><span class="cex-chat-time">00:24:22</span></div>
              <div class="cex-chat-bubble">Hello hello! I’m Alex with CE Training Workshops! Thank you for choosing CE Training Workshops for your CE needs. We are so excited to have you join us today. For those of you who may have missed it in the 1-hour reminder email, here is the link to the presentation slides: https://cetrainingworkshops.com/wp-content/uploads/2026/05/Slides-From-Awareness-to-Advocacy.pdf</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:755s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Alicia</span><span class="cex-chat-time">00:27:35</span></div>
              <div class="cex-chat-bubble">And these are the  ones that reported to the Trevor Project</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1709s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Sarah</span><span class="cex-chat-time">00:43:29</span></div>
              <div class="cex-chat-bubble">Only 3 genders</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1711s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Danyel</span><span class="cex-chat-time">00:43:31</span></div>
              <div class="cex-chat-bubble">It&#39;s limited</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1711s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Jennifer</span><span class="cex-chat-time">00:43:31</span></div>
              <div class="cex-chat-bubble">It’s incomplete</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1711s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Mary</span><span class="cex-chat-time">00:43:31</span></div>
              <div class="cex-chat-bubble">Binary</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1712s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Amy</span><span class="cex-chat-time">00:43:32</span></div>
              <div class="cex-chat-bubble">Why just 3 choices? And Trans?</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1715s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Stacey</span><span class="cex-chat-time">00:43:35</span></div>
              <div class="cex-chat-bubble">Select one</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1716s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Eileen</span><span class="cex-chat-time">00:43:36</span></div>
              <div class="cex-chat-bubble">Limited</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1718s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Mary</span><span class="cex-chat-time">00:43:38</span></div>
              <div class="cex-chat-bubble">“Select one&quot;</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1718s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Banks</span><span class="cex-chat-time">00:43:38</span></div>
              <div class="cex-chat-bubble">“Please select ONE”</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1718s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Laura</span><span class="cex-chat-time">00:43:38</span></div>
              <div class="cex-chat-bubble">not making it optional</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1719s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Monique</span><span class="cex-chat-time">00:43:39</span></div>
              <div class="cex-chat-bubble">Requires a choice</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1719s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Kimberly</span><span class="cex-chat-time">00:43:39</span></div>
              <div class="cex-chat-bubble">too restrictive</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1719s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Barbara</span><span class="cex-chat-time">00:43:39</span></div>
              <div class="cex-chat-bubble">Not enough choices</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1720s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Tawnya</span><span class="cex-chat-time">00:43:40</span></div>
              <div class="cex-chat-bubble">The (please select one)</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1721s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Kylea</span><span class="cex-chat-time">00:43:41</span></div>
              <div class="cex-chat-bubble">Does not reflect non-binary</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1721s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Nicosia</span><span class="cex-chat-time">00:43:41</span></div>
              <div class="cex-chat-bubble">Limiting</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1725s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Amber</span><span class="cex-chat-time">00:43:45</span></div>
              <div class="cex-chat-bubble">select one</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1730s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Laura</span><span class="cex-chat-time">00:43:50</span></div>
              <div class="cex-chat-bubble">Please select one</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1732s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Lauren</span><span class="cex-chat-time">00:43:52</span></div>
              <div class="cex-chat-bubble">Limited</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1733s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Margaret</span><span class="cex-chat-time">00:43:53</span></div>
              <div class="cex-chat-bubble">Queer bi are missing</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1742s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Robin</span><span class="cex-chat-time">00:44:02</span></div>
              <div class="cex-chat-bubble">Limited</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1744s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Ana</span><span class="cex-chat-time">00:44:04</span></div>
              <div class="cex-chat-bubble">limiting</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1755s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Jane</span><span class="cex-chat-time">00:44:15</span></div>
              <div class="cex-chat-bubble">Not enough categories. Someone who is trans has a gender identity.</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1774s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Alicia</span><span class="cex-chat-time">00:44:34</span></div>
              <div class="cex-chat-bubble">they are even asking  in the first place</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:1776s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Amy</span><span class="cex-chat-time">00:44:36</span></div>
              <div class="cex-chat-bubble">Two-Spirit? Incredibly racist!</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:2576s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Jennifer</span><span class="cex-chat-time">00:57:56</span></div>
              <div class="cex-chat-bubble">I’ve taken this and it’s very sobering, challenging, and incredibly helpful.</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:2901s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Rebekah</span><span class="cex-chat-time">01:03:21</span></div>
              <div class="cex-chat-bubble">Replying to &quot;Two-Spirit? Incredibly racist!&quot;
The term &quot;Two-Spirit&quot; is not considered racist. Rather, it is a specific cultural and spiritual identity created by and exclusively for Indigenous peoples. generally. While the term isn&#39;t racist, it is considered cultural appropriation for non-Indigenous people to use it. Because Two-Spirit is deeply tied to the heritage, tribal customs, and colonial history of Indigenous peoples, it is reserved exclusively for them.</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:2913s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Simone</span><span class="cex-chat-time">01:03:33</span></div>
              <div class="cex-chat-bubble">Reacted to &quot;The term &quot;Two-Spirit...&quot; with 💯</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3023s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Nicosia</span><span class="cex-chat-time">01:05:23</span></div>
              <div class="cex-chat-bubble">Reacted to &quot;The term &quot;Two-Spir...&quot; with 👍🏾</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3060s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Stacey</span><span class="cex-chat-time">01:06:00</span></div>
              <div class="cex-chat-bubble">What is HRT</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3074s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Monique</span><span class="cex-chat-time">01:06:14</span></div>
              <div class="cex-chat-bubble">Hormone replacement therapy</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3080s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Stacey</span><span class="cex-chat-time">01:06:20</span></div>
              <div class="cex-chat-bubble">Thanks</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3130s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Alicia</span><span class="cex-chat-time">01:07:10</span></div>
              <div class="cex-chat-bubble">Trauma? Usually! SUD?</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3181s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Amy</span><span class="cex-chat-time">01:08:01</span></div>
              <div class="cex-chat-bubble">Replying to &quot;Two-Spirit? Incredib...&quot;
Thank you for that information. It does seem precarious to use as it probably only applies to some, not all tribes of Indigenous peoples. I would not want to use the term unless I was granted permission to do so by the person I was speaking with.</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3269s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Jane</span><span class="cex-chat-time">01:09:29</span></div>
              <div class="cex-chat-bubble">In my work, reflections on the oppressiveness of environments can be life-changing. We live in the culture that blames people for their suffering. By identifying the source and then fostering re-evaluation of the meanings of the oppression is liberating—can be difficult and can take a long time.</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3500s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Rebekah</span><span class="cex-chat-time">01:13:20</span></div>
              <div class="cex-chat-bubble">Replying to &quot;Two-Spirit? Incredibly racist!&quot;
I will leave space for clients to let me know how they choose to identify. The best practice is definitely not to use any specific identifying term until the individual states how they identify.</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3712s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Kylea</span><span class="cex-chat-time">01:16:52</span></div>
              <div class="cex-chat-bubble">Replying to &quot;Two-Spirit? Incredib...&quot;
There is a book I have been interested in reading called Reclaiming Two-Spirits by Gregory D. Smithers. Could be worth looking into if wanting to further knowledge.</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3869s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Simone</span><span class="cex-chat-time">01:19:29</span></div>
              <div class="cex-chat-bubble">Do you have any resources on questions/procedures that are helpful for vetting organizations and resources for GAC?</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3874s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Shawn</span><span class="cex-chat-time">01:19:34</span></div>
              <div class="cex-chat-bubble">Am I understanding that agencies should not have gendered bathrooms as it relates to being trauma informed?</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3881s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Amy</span><span class="cex-chat-time">01:19:41</span></div>
              <div class="cex-chat-bubble">Replying to &quot;Two-Spirit? Incredib...&quot;
That sounds very interesting! Thank you for the recommendation. ☺️</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3888s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Lori</span><span class="cex-chat-time">01:19:48</span></div>
              <div class="cex-chat-bubble">Not just talking the talk</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3900s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Stacey</span><span class="cex-chat-time">01:20:00</span></div>
              <div class="cex-chat-bubble">acceptance</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3910s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Amy</span><span class="cex-chat-time">01:20:10</span></div>
              <div class="cex-chat-bubble">Walking the walk</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3910s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Tommy</span><span class="cex-chat-time">01:20:10</span></div>
              <div class="cex-chat-bubble">Reacted to acceptance with &quot;👍&quot;</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3913s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Carmen</span><span class="cex-chat-time">01:20:13</span></div>
              <div class="cex-chat-bubble">just doint it</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3918s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Shawn</span><span class="cex-chat-time">01:20:18</span></div>
              <div class="cex-chat-bubble">Reacted to &quot;Not just talking the talk&quot; with 👍</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3922s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Barbara</span><span class="cex-chat-time">01:20:22</span></div>
              <div class="cex-chat-bubble">It is part of the alliance</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3922s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Simone</span><span class="cex-chat-time">01:20:22</span></div>
              <div class="cex-chat-bubble">Actually making a difference</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3934s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Banks</span><span class="cex-chat-time">01:20:34</span></div>
              <div class="cex-chat-bubble">Willingness to create and hold space for a client rather than calling out where the space does not exist or is failing</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3938s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Amy</span><span class="cex-chat-time">01:20:38</span></div>
              <div class="cex-chat-bubble">Actively standing up for others and not just calling yourself an ally</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3960s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Jane</span><span class="cex-chat-time">01:21:00</span></div>
              <div class="cex-chat-bubble">Gender-affirming care reveals the lies our culture tells us and provides us with strategies for transformation of our understandings of our culture and ourselves.</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3963s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Tommy</span><span class="cex-chat-time">01:21:03</span></div>
              <div class="cex-chat-bubble">Free from judgment</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3967s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Barbara</span><span class="cex-chat-time">01:21:07</span></div>
              <div class="cex-chat-bubble">I tell my clients this space has to be safe for both of us</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3982s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Jamila</span><span class="cex-chat-time">01:21:22</span></div>
              <div class="cex-chat-bubble">Treat everyone as a human being first and foremost</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3982s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Tifany</span><span class="cex-chat-time">01:21:22</span></div>
              <div class="cex-chat-bubble">supporting the client while understanding the struggles that the client has been through as well as the realities of the current society</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:3993s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Kylea</span><span class="cex-chat-time">01:21:33</span></div>
              <div class="cex-chat-bubble">You are backing up your belief with action that shows you actually care. I also think it shows how much you care when you use whatever privilege you have to do better for the community.</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4012s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Susan</span><span class="cex-chat-time">01:21:52</span></div>
              <div class="cex-chat-bubble">Reacted to &quot;You are backing up y...&quot; with 👍</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4352s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Simone</span><span class="cex-chat-time">01:27:32</span></div>
              <div class="cex-chat-bubble">To better serve the community I&#39;m a part of</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4354s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Kelsey</span><span class="cex-chat-time">01:27:34</span></div>
              <div class="cex-chat-bubble">To do better</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4364s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Susan</span><span class="cex-chat-time">01:27:44</span></div>
              <div class="cex-chat-bubble">Make positive changes</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4368s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Banks</span><span class="cex-chat-time">01:27:48</span></div>
              <div class="cex-chat-bubble">Helping individuals finding purpose in their growth and healing.</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4375s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Jane</span><span class="cex-chat-time">01:27:55</span></div>
              <div class="cex-chat-bubble">Commitment to dignity, worth, case, justice, and self-determination.</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4376s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Amy</span><span class="cex-chat-time">01:27:56</span></div>
              <div class="cex-chat-bubble">Because I care about people, their individuality, and what matters to them.</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4377s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Kylea</span><span class="cex-chat-time">01:27:57</span></div>
              <div class="cex-chat-bubble">Fundamental belief that everyone deserves to be safe and respected no matter who they are.</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4390s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Tawnya</span><span class="cex-chat-time">01:28:10</span></div>
              <div class="cex-chat-bubble">To come from a place of knowing</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4394s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Jane</span><span class="cex-chat-time">01:28:14</span></div>
              <div class="cex-chat-bubble">Replying to &quot;Commitment to dignit...&quot;
Care</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4396s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Lauren</span><span class="cex-chat-time">01:28:16</span></div>
              <div class="cex-chat-bubble">Because I care</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4398s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Lori</span><span class="cex-chat-time">01:28:18</span></div>
              <div class="cex-chat-bubble">compassion and kiundness to all hospice LCSW</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4402s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Simone</span><span class="cex-chat-time">01:28:22</span></div>
              <div class="cex-chat-bubble">To be an advocate the best way I know how</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4406s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Aimee</span><span class="cex-chat-time">01:28:26</span></div>
              <div class="cex-chat-bubble">Safe and respectful spaces</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4409s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Alicia</span><span class="cex-chat-time">01:28:29</span></div>
              <div class="cex-chat-bubble">Why-because I hate disciminatory practices</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4409s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Mary</span><span class="cex-chat-time">01:28:29</span></div>
              <div class="cex-chat-bubble">Our calling to be a safe haven and secure base for our clients helps them to know they belong as they are</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4411s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Nancy</span><span class="cex-chat-time">01:28:31</span></div>
              <div class="cex-chat-bubble">life affirming</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4419s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Barbara</span><span class="cex-chat-time">01:28:39</span></div>
              <div class="cex-chat-bubble">I’ve been out for 52 years, I work with college students. Seeing and working with this group affirms what I went through in the 70’s</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4421s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Nicole</span><span class="cex-chat-time">01:28:41</span></div>
              <div class="cex-chat-bubble">Safe Space</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4471s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Carmen</span><span class="cex-chat-time">01:29:31</span></div>
              <div class="cex-chat-bubble">it shows the need to keep in mind client center; and to keep working from their resilience and strength base.</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4495s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Catherine</span><span class="cex-chat-time">01:29:55</span></div>
              <div class="cex-chat-bubble">Safe and supportive space</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4638s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Rosemary</span><span class="cex-chat-time">01:32:18</span></div>
              <div class="cex-chat-bubble">Should there be an age limit to for adolescents to go through the transgendered process</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4672s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Jennifer</span><span class="cex-chat-time">01:32:52</span></div>
              <div class="cex-chat-bubble">I lived in Germany 30 years ago and there were all gender bathrooms with fully closed in stalls. It was a slight adjustment, but became very “normal”.</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4702s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Rosemary</span><span class="cex-chat-time">01:33:22</span></div>
              <div class="cex-chat-bubble">Rosemary&#39;s Question above</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4709s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Tifany</span><span class="cex-chat-time">01:33:29</span></div>
              <div class="cex-chat-bubble">how do we encourage more queer and trans people into this field? As a trans therapist, I am seeing such a huge need for us in this profession.</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4725s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Alicia</span><span class="cex-chat-time">01:33:45</span></div>
              <div class="cex-chat-bubble">Replying to &quot;I lived in Germany...&quot;
this is still how the NL works</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4730s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Barbara</span><span class="cex-chat-time">01:33:50</span></div>
              <div class="cex-chat-bubble">Reacted to &quot;how do we encourage more queer and trans people into this field? As a trans therapist, I am seeing such a huge need for us in this profession.&quot; with 👍</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4877s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Alicia</span><span class="cex-chat-time">01:36:17</span></div>
              <div class="cex-chat-bubble">and advanced degree is not eligible for loan repayment now</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:4919s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Alicia</span><span class="cex-chat-time">01:36:59</span></div>
              <div class="cex-chat-bubble">dept of education excludes counseling now</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5191s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Ana</span><span class="cex-chat-time">01:41:31</span></div>
              <div class="cex-chat-bubble">thank you</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5193s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Tommy</span><span class="cex-chat-time">01:41:33</span></div>
              <div class="cex-chat-bubble">Replying to &quot;Commitment to dignit...&quot;
 This was absolutely 💯 👌</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5193s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Susan</span><span class="cex-chat-time">01:41:33</span></div>
              <div class="cex-chat-bubble">Thank you</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5194s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Danyel</span><span class="cex-chat-time">01:41:34</span></div>
              <div class="cex-chat-bubble">Thank you for the training!</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5195s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Nicosia</span><span class="cex-chat-time">01:41:35</span></div>
              <div class="cex-chat-bubble">Thank You!!!</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5195s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Tifany</span><span class="cex-chat-time">01:41:35</span></div>
              <div class="cex-chat-bubble">Thanks!</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5196s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Jennifer</span><span class="cex-chat-time">01:41:36</span></div>
              <div class="cex-chat-bubble">Thank you!</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5197s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Barbara</span><span class="cex-chat-time">01:41:37</span></div>
              <div class="cex-chat-bubble">Thanks</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5197s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Amber</span><span class="cex-chat-time">01:41:37</span></div>
              <div class="cex-chat-bubble">thank you</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5197s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Toni</span><span class="cex-chat-time">01:41:37</span></div>
              <div class="cex-chat-bubble">Thank you so much.</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5197s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Nancy</span><span class="cex-chat-time">01:41:37</span></div>
              <div class="cex-chat-bubble">thank you for this training</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5198s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Tommy</span><span class="cex-chat-time">01:41:38</span></div>
              <div class="cex-chat-bubble">Replying to &quot;Commitment to dignit...&quot;
 Thank you</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5198s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Amy</span><span class="cex-chat-time">01:41:38</span></div>
              <div class="cex-chat-bubble">Wonderful presentation!! Thank you!</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5198s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Banks</span><span class="cex-chat-time">01:41:38</span></div>
              <div class="cex-chat-bubble">Thank you very much!</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5198s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Sarah</span><span class="cex-chat-time">01:41:38</span></div>
              <div class="cex-chat-bubble">Thank you</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5198s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Natalie</span><span class="cex-chat-time">01:41:38</span></div>
              <div class="cex-chat-bubble">Thanks!</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5200s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Kimberly</span><span class="cex-chat-time">01:41:40</span></div>
              <div class="cex-chat-bubble">thank you!</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5201s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Jana</span><span class="cex-chat-time">01:41:41</span></div>
              <div class="cex-chat-bubble">Thank you</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5201s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Xavious</span><span class="cex-chat-time">01:41:41</span></div>
              <div class="cex-chat-bubble">Thank you so much</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5201s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Eileen</span><span class="cex-chat-time">01:41:41</span></div>
              <div class="cex-chat-bubble">Thank you</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5202s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Tawana</span><span class="cex-chat-time">01:41:42</span></div>
              <div class="cex-chat-bubble">This was so informative!</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5203s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Kelly</span><span class="cex-chat-time">01:41:43</span></div>
              <div class="cex-chat-bubble">Thank you!</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5204s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Tawnya</span><span class="cex-chat-time">01:41:44</span></div>
              <div class="cex-chat-bubble">Thank you!</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5204s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Aimee</span><span class="cex-chat-time">01:41:44</span></div>
              <div class="cex-chat-bubble">Thank you!</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5205s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Jamila</span><span class="cex-chat-time">01:41:45</span></div>
              <div class="cex-chat-bubble">Thank you</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5207s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Kelsey</span><span class="cex-chat-time">01:41:47</span></div>
              <div class="cex-chat-bubble">Bye! Thank you!</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5208s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Catherine</span><span class="cex-chat-time">01:41:48</span></div>
              <div class="cex-chat-bubble">Thank you!</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5210s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Carmen</span><span class="cex-chat-time">01:41:50</span></div>
              <div class="cex-chat-bubble">thanks</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5211s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Simone</span><span class="cex-chat-time">01:41:51</span></div>
              <div class="cex-chat-bubble">Thank you</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5212s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Reagan</span><span class="cex-chat-time">01:41:52</span></div>
              <div class="cex-chat-bubble">Thank you!</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5215s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Nicole</span><span class="cex-chat-time">01:41:55</span></div>
              <div class="cex-chat-bubble">Thank you</div>
            </article>
            <article class="cex-chat-message" data-static-chat="true" style="--chat-delay:5219s">
              <div class="cex-chat-meta"><span class="cex-chat-speaker">Robin</span><span class="cex-chat-time">01:41:59</span></div>
              <div class="cex-chat-bubble">Thank you</div>
            </article>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
