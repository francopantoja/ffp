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

    'local_certificate_view_pdf' => [  // local_PLUGINNAME_FUNCTIONNAME is the name of the web service function that the client will call.
        'classname'     => 'local_certificate_external',  // create this class in componentdir/classes/external
        'methodname'    => 'view_pd',  // implement this function into the above class
        'description'   => 'This documentation will be displayed in the generated API documentation               (Administration > Plugins > Webservices > API documentation)',
        'type'          => 'read', // the value is 'write' if your function does any database change, otherwise it is 'read'.
        'capabilities'  => 'local/certificate:view',
        'services'      => [MOODLE_OFFICIAL_MOBILE_SERVICE]  // Optional, only available for Moodle 3.1 onwards. List of built-in services (by shortname) where the function will be included. Services created manually via the Moodle interface are not supported.
    ],



  
];
 
);