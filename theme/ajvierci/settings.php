<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

/**
 * Theme AJ Vierci - settings.
 *
 * @package    theme_ajvierci
 * @copyright  2026 Grupo AJ Vierci
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    $settings = new theme_boost_admin_settingspage_tabs('themesettingajvierci',
        get_string('configtitle', 'theme_ajvierci'));

    // ---------- Tab: Home ----------
    $page = new admin_settingpage('theme_ajvierci_home', get_string('hometab', 'theme_ajvierci'));

    $page->add(new admin_setting_configtext('theme_ajvierci/heroeyebrow',
        get_string('heroeyebrow', 'theme_ajvierci'),
        get_string('heroeyebrow_desc', 'theme_ajvierci'),
        'Grupo AJ Vierci', PARAM_TEXT));

    $page->add(new admin_setting_configtext('theme_ajvierci/herotitle',
        get_string('herotitle', 'theme_ajvierci'),
        get_string('herotitle_desc', 'theme_ajvierci'),
        'Portal de Capacitación', PARAM_TEXT));

    $page->add(new admin_setting_configtextarea('theme_ajvierci/herosubtitle',
        get_string('herosubtitle', 'theme_ajvierci'),
        get_string('herosubtitle_desc', 'theme_ajvierci'),
        'Cursos, materiales y evaluaciones para todo el equipo, en un solo lugar.', PARAM_TEXT, 60, 3));

    $page->add(new admin_setting_configcheckbox('theme_ajvierci/herostats',
        get_string('herostats', 'theme_ajvierci'),
        get_string('herostats_desc', 'theme_ajvierci'),
        1));

    $settings->add($page);

    // ---------- Tab: Avanzado ----------
    $page = new admin_settingpage('theme_ajvierci_advanced', get_string('advancedtab', 'theme_ajvierci'));

    $page->add(new admin_setting_configcheckbox('theme_ajvierci/livecssenabled',
        get_string('livecssenabled', 'theme_ajvierci'),
        get_string('livecssenabled_desc', 'theme_ajvierci'),
        1));

    $page->add(new admin_setting_configtext('theme_ajvierci/livecssurl',
        get_string('livecssurl', 'theme_ajvierci'),
        get_string('livecssurl_desc', 'theme_ajvierci'),
        'https://nmorbach.github.io/moodle/live.css', PARAM_URL));

    $setting = new admin_setting_scsscode('theme_ajvierci/scsspre',
        get_string('rawscsspre', 'theme_ajvierci'),
        get_string('rawscsspre_desc', 'theme_ajvierci'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $setting = new admin_setting_scsscode('theme_ajvierci/scss',
        get_string('rawscss', 'theme_ajvierci'),
        get_string('rawscss_desc', 'theme_ajvierci'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);
}
