<?php
/**
 * Plugin Name: CE Training Lesson 1932
 * Description: Renders the CE Training Workshops lesson video player, practice quiz, and chat replay via shortcode.
 * Version: 1.0.0
 * Author: CE Training Workshops
 * Text Domain: ce-training-lesson-1932
 */

if (!defined('ABSPATH')) {
    exit;
}

final class CE_Training_Lesson_1932 {
    private const SHORTCODE = 'ce_lesson_1932';
    private const VERSION = '1.0.0';

    public static function boot(): void {
        add_shortcode(self::SHORTCODE, [__CLASS__, 'render_shortcode']);
        add_shortcode('ce_training_lesson_1932', [__CLASS__, 'render_shortcode']);
    }

    public static function render_shortcode(): string {
        self::enqueue_assets();

        $assets_url = plugin_dir_url(__FILE__) . 'assets/';
        $template = plugin_dir_path(__FILE__) . 'templates/lesson.php';

        if (!file_exists($template)) {
            return '<p>CE lesson template is missing.</p>';
        }

        ob_start();
        include $template;
        return (string) ob_get_clean();
    }

    private static function enqueue_assets(): void {
        $base_path = plugin_dir_path(__FILE__);
        $base_url = plugin_dir_url(__FILE__);
        $css_path = $base_path . 'assets/lesson.css';
        $js_path = $base_path . 'assets/lesson.js';

        wp_enqueue_style(
            'ce-training-lesson-1932',
            $base_url . 'assets/lesson.css',
            [],
            file_exists($css_path) ? (string) filemtime($css_path) : self::VERSION
        );

        wp_enqueue_script(
            'ce-training-lesson-1932',
            $base_url . 'assets/lesson.js',
            [],
            file_exists($js_path) ? (string) filemtime($js_path) : self::VERSION,
            true
        );
    }
}

CE_Training_Lesson_1932::boot();
