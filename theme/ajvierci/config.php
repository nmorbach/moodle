<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

/**
 * Theme AJ Vierci - config. Child of Boost: inherits layouts and templates.
 *
 * @package    theme_ajvierci
 * @copyright  2026 Grupo AJ Vierci
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once(__DIR__ . '/lib.php');

$THEME->name = 'ajvierci';
$THEME->parents = ['boost'];
$THEME->sheets = [];
$THEME->editor_sheets = [];
$THEME->usefallback = true;

// SCSS pipeline: pre (tokens) + Boost preset + post (our rules) + custom setting.
$THEME->scss = function($theme) {
    return theme_ajvierci_get_main_scss_content($theme);
};
$THEME->prescsscallback = 'theme_ajvierci_get_pre_scss';
$THEME->extrascsscallback = 'theme_ajvierci_get_extra_scss';

// If our SCSS ever fails to compile, Moodle serves Boost's precompiled CSS
// instead of an unstyled page.
$THEME->precompiledcsscallback = 'theme_boost_get_precompiled_css';

$THEME->yuicssmodules = [];
$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->requiredblocks = '';
$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;
$THEME->iconsystem = \core\output\icon_system::FONTAWESOME;
$THEME->haseditswitch = true;
$THEME->usescourseindex = true;
$THEME->activityheaderconfig = [
    'notitle' => true,
];
