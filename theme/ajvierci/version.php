<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

/**
 * Theme AJ Vierci - version.
 *
 * @package    theme_ajvierci
 * @copyright  2026 Grupo AJ Vierci
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$plugin->component = 'theme_ajvierci';
$plugin->version   = 2026102906;
$plugin->release   = '1.3.0';
$plugin->requires  = 2022041900; // Moodle 4.0+.
$plugin->maturity  = MATURITY_STABLE;
$plugin->dependencies = [
    'theme_boost' => 2022041900,
];
