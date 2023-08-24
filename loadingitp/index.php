<?php

/**
 * MOODLE VERSION INFORMATION
 *
 * This file defines the current version of the core Moodle code being used.
 * This is compared against the values stored in the database to determine
 * whether upgrades should be performed (see lib/db/*.php)
 *
 * @package    local_loadingitp
 * @category local
 * @author  Alberto Marín
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__.'/../../config.php');
require_once($CFG->dirroot.'/local/loadingitp/classes/form/myform.php');

global $DB;

require_login();



$PAGE->set_url(new moodle_url(('/local/loadingitp/index.php')));
$PAGE->set_context(context_system::instance());
$PAGE->set_title('Load ITP Teacher/Controllers');
$context= context_system::instance();


require_capability('local/loadingitp:update', $context);



$form=new myform();



// Form processing and displaying is done here.
if ($form->is_cancelled()) {
    //Redirect to manage.php
    redirect($CFG->wwwroot.'/local/loadingitp/index.php', 'The form has been cancelled');
} else if ($csv_file = $form->get_file_content('csv_file')) {
    // When the form is submitted, and the data is successfully validated,
    // the `get_data()` function will return the data posted in the form.
   $DB->delete_records('ipt_teacher');
    $record=explode(PHP_EOL,$csv_file);
    foreach ($record as $key => $field){
        if ($key>0){ //Discard headers
            $item=explode(';',$field);
            
            //Ensure the record is 8 items and no more
            if (count($item)==8) {
                $recordtoinsert=new stdClass();
                $recordtoinsert->wbs=$item[0];
                $recordtoinsert->name=$item[1];
                $recordtoinsert->start=$item[2];
                $recordtoinsert->end=$item[3];
                $recordtoinsert->nun_alum=$item[4];
                $recordtoinsert->asign=$item[5];
                $recordtoinsert->location=$item[6];
                $recordtoinsert->provider=$item[7];
                
                $DB->insert_record('ipt_teacher',$recordtoinsert);
            }
        }
    }
   
    redirect($CFG->wwwroot.'/local/loadingitp/index.php','The ITP for controllers and teachers has been loaded sucessfully');
} 

echo $OUTPUT->header();

// Display the form.
$form->display();

echo $OUTPUT->footer();


