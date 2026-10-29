<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

/**
 * Theme AJ Vierci - lib.
 *
 * @package    theme_ajvierci
 * @copyright  2026 Grupo AJ Vierci
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Boost lib provides theme_boost_get_precompiled_css() used as fallback.
if (file_exists(__DIR__ . '/../boost/lib.php')) {
    require_once(__DIR__ . '/../boost/lib.php');
}

/**
 * Main SCSS: Boost default preset followed by our own rules.
 *
 * @param theme_config $theme
 * @return string
 */
function theme_ajvierci_get_main_scss_content($theme) {
    global $CFG;

    $scss = '';
    $preset = $CFG->dirroot . '/theme/boost/scss/preset/default.scss';
    if (file_exists($preset)) {
        $scss .= file_get_contents($preset);
    }
    $scss .= "\n" . file_get_contents(__DIR__ . '/scss/post.scss');
    return $scss;
}

/**
 * Pre SCSS: design tokens and Bootstrap variable overrides (loaded before Bootstrap).
 *
 * @param theme_config $theme
 * @return string
 */
function theme_ajvierci_get_pre_scss($theme) {
    $scss = file_get_contents(__DIR__ . '/scss/pre.scss');
    if (!empty($theme->settings->scsspre)) {
        $scss .= "\n" . $theme->settings->scsspre;
    }
    return $scss;
}

/**
 * Extra SCSS: custom rules typed in the theme settings (loaded last).
 *
 * @param theme_config $theme
 * @return string
 */
function theme_ajvierci_get_extra_scss($theme) {
    return !empty($theme->settings->scss) ? $theme->settings->scss : '';
}
