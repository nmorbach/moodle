<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

namespace theme_ajvierci\output;

use moodle_url;

/**
 * Core renderer: replaces the plain page header on the site home with a hero.
 *
 * @package    theme_ajvierci
 * @copyright  2026 Grupo AJ Vierci
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class core_renderer extends \theme_boost\output\core_renderer {

    /**
     * Head HTML: adds the "live CSS" stylesheet after the theme CSS, so visual
     * changes published to GitHub Pages apply without reinstalling the theme.
     *
     * @return string HTML
     */
    public function standard_head_html() {
        $output = parent::standard_head_html();

        $settings = \theme_config::load('ajvierci')->settings;
        $enabled = !isset($settings->livecssenabled) || !empty($settings->livecssenabled);
        $url = !empty($settings->livecssurl) ? trim($settings->livecssurl) : '';

        if ($enabled && $url !== '' && preg_match('#^https://#i', $url)) {
            $output .= '<link rel="stylesheet" href="' . s($url) . '" id="ajv-live-css">' . "\n";
        }
        return $output;
    }

    /**
     * Page header. On the site home we render the hero instead.
     *
     * @return string HTML
     */
    public function full_header() {
        if ($this->page->pagelayout === 'frontpage') {
            return $this->ajvierci_hero();
        }
        return parent::full_header();
    }

    /**
     * Builds the hero for the site home.
     *
     * @return string HTML
     */
    protected function ajvierci_hero() {
        global $USER, $DB, $SITE;

        $theme = \theme_config::load('ajvierci');
        $settings = $theme->settings;

        $loggedin = isloggedin() && !isguestuser();

        $eyebrow = !empty($settings->heroeyebrow) ? $settings->heroeyebrow : format_string($SITE->shortname);
        $title = !empty($settings->herotitle) ? $settings->herotitle : get_string('herotitledefault', 'theme_ajvierci');
        $subtitle = !empty($settings->herosubtitle) ? $settings->herosubtitle
            : get_string('herosubtitledefault', 'theme_ajvierci');

        $context = [
            'eyebrow' => format_string($eyebrow),
            'title' => format_string($title),
            'subtitle' => format_string($subtitle),
            'greeting' => $loggedin ? get_string('herogreeting', 'theme_ajvierci', format_string($USER->firstname)) : '',
            'loggedin' => $loggedin,
            'primaryurl' => $loggedin
                ? (new moodle_url('/my/courses.php'))->out(false)
                : (new moodle_url('/login/index.php'))->out(false),
            'primarytext' => $loggedin
                ? get_string('heromycourses', 'theme_ajvierci')
                : get_string('herologin', 'theme_ajvierci'),
            'catalogurl' => (new moodle_url('/course/index.php'))->out(false),
            'catalogtext' => get_string('herocatalog', 'theme_ajvierci'),
            'showstats' => false,
        ];

        if ($loggedin && !empty($settings->herostats)) {
            global $CFG;
            require_once($CFG->libdir . '/completionlib.php');

            $courses = enrol_get_my_courses('enablecompletion');
            $completed = 0;
            foreach ($courses as $course) {
                $info = new \completion_info($course);
                if ($info->is_enabled() && $info->is_course_complete($USER->id)) {
                    $completed++;
                }
            }
            $mine = count($courses);
            $available = $DB->count_records_select('course', 'visible = 1 AND id <> :siteid', ['siteid' => SITEID]);

            $mycoursesurl = (new moodle_url('/my/courses.php'))->out(false);
            $kpi = function(string $key, int $value, string $url) {
                return [
                    'key' => $key,
                    'is' . $key => true,
                    'value' => $value,
                    'label' => get_string('kpi' . $key, 'theme_ajvierci'),
                    'hint' => get_string('kpi' . $key . '_hint', 'theme_ajvierci'),
                    'url' => $url,
                ];
            };

            $context['showstats'] = true;
            $context['kpis'] = [
                $kpi('mine', $mine, $mycoursesurl),
                $kpi('progress', $mine - $completed, $mycoursesurl),
                $kpi('done', $completed, $mycoursesurl),
                $kpi('catalog', $available, $context['catalogurl']),
            ];
        }

        return $this->render_from_template('theme_ajvierci/hero', $context);
    }
}
