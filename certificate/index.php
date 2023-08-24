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

require(__DIR__.'/../../config.php');
//require_once($CFG->libdir.'/adminlib.php');

use local_certificate\mymetadata as metadatainfo;

require_login();

$context = context_system::instance();
require_capability('report/log:view', $context);

$PAGE->set_context($context);

$PAGE->set_url(new moodle_url('/local/certificate/index.php'));
$PAGE->set_pagelayout('report');
$PAGE->set_title(get_string('report'));
$PAGE->set_heading(get_string('pluginname', 'local_certificate'));

echo $OUTPUT->header();  

echo html_writer::start_tag('h3');
echo "P31";
echo html_writer::end_tag('h3');
$username = metadatainfo::get_username($USER->id);

echo $username;

require_once($CFG->libdir . '/phpspreadsheet/vendor/autoload.php');
require_once('../../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;


$spreadsheet = new Spreadsheet();
$spreadsheet->getProperties()
->setCreator($username)
    ->setLastModifiedBy("Alberto Marín")
    ->setTitle("Documento creado por Albertiño")
    ->setSubject("Documento en PDF")
    ->setDescription(
        "Documento de prueba con fines didacticos."
    )
    ->setKeywords("pdf 2023 mpdf php")
    ->setCategory("Resultado del archivo");
    
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'Manolo el chocolatero!');


$writer = new Mpdf($spreadsheet);

$writer->writeAllSheets();
$writer->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);






$writer->save('hello_world.pdf');

echo $OUTPUT->footer();