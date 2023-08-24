<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Plugin metadata for PDF Class
 *
 * @package     local_certificate
 * @category    local
 * @copyright   2023 by IDEF https://idef21.com UniMoodle P31
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

$functions = [

    'local_certificate_view_quiz' => [
        'classname'     => 'local_certificate_external',
        'methodname'    => 'view_quiz',
        'description'   => 'Returns a list of quizzes in a provided list of courses,
                            if no list is provided all quizzes that the user can view will be returned.',
        'type'          => 'read',
        'capabilities'  => 'mod/quiz:view',
        'services'      => [MOODLE_OFFICIAL_MOBILE_SERVICE]
    ],



  
];
