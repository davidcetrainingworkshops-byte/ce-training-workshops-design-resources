<?php
/**
 * Plugin Name: CE Training Workshops Learning Platform
 * Description: Provides the branded CE Training Workshops learning experience, including video, practice activities, and supporting course interactions.
 * Version: 1.0.0
 * Author: CE Training Workshops
 * Text Domain: ce-training-workshops-learning-platform
 */

if (!defined('ABSPATH')) {
    exit;
}

final class CE_Training_Workshops_Learning_Platform {
    private const SHORTCODE = 'ce_training_experience';
    private const VERSION = '1.0.0';

    public static function boot(): void {
        add_shortcode(self::SHORTCODE, [__CLASS__, 'render_shortcode']);
        add_shortcode('ce_training_platform', [__CLASS__, 'render_shortcode']);
    }

    public static function render_shortcode(): string {
        self::enqueue_assets();

        $assets_url = plugin_dir_url(__FILE__) . 'assets/';
        $template = plugin_dir_path(__FILE__) . 'templates/learning-experience.php';

        if (!file_exists($template)) {
            return '<p>The CE Training Workshops learning-experience template is missing.</p>';
        }

        ob_start();
        include $template;
        return (string) ob_get_clean();
    }

    private static function enqueue_assets(): void {
        $base_path = plugin_dir_path(__FILE__);
        $base_url = plugin_dir_url(__FILE__);
        $css_path = $base_path . 'assets/learning-experience.css';
        $js_path = $base_path . 'assets/learning-experience.js';

        wp_enqueue_style(
            'ce-training-workshops-learning-platform',
            $base_url . 'assets/learning-experience.css',
            [],
            file_exists($css_path) ? (string) filemtime($css_path) : self::VERSION
        );

        wp_enqueue_script(
            'ce-training-workshops-learning-platform',
            $base_url . 'assets/learning-experience.js',
            [],
            file_exists($js_path) ? (string) filemtime($js_path) : self::VERSION,
            true
        );
    }
}

CE_Training_Workshops_Learning_Platform::boot();
