<?php

####################################
      # Mandya Subramanya, Namratha
      # Class account - jadrn034
      # Project #3
      # Fall 2017
###################################

$bad_chars = array('$','%','?','<','>','php');
$UPLOAD_DIR = '_uploadDIR_/';

function check_post_only() {
console.log("Entered check post only");
if(!$_POST) {
    write_error_page("This scripts can only be called from a form.");
    exit;
    }
}

function write_error_page($msg) {
    //write_header();
    echo "<div id=\"message_line\">Sorry, an error occurred<br />",
    $msg,"</h2>";
    //write_footer();
    }
    
function write_header() {
print <<<ENDBLOCK
<!DOCTYPE HTML>
<html>
    <!--
      Mandya Subramanya, Namratha
      Class account - jadrn034
      Project #3
      Fall 2017
    -->
    <head>
        <title>Sign Up</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="Main.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="Form.js"></script>     
        <script type="text/javascript" src="ajax_get_lib.js"></script> 
    </head>
ENDBLOCK;
}

function write_footer() {
    echo "</html>";
    }
    
function get_db_handle() {
    ########################################################
    # DO NOT USE jadrn000, DO NOT MODIFY jadnr000 DATABASE!
    ########################################################            
    $server = 'opatija.sdsu.edu:3306';
    $user = 'jadrn034';
    $password = 'suitcase';
    $database = 'jadrn034';   
    ########################################################
        
    if(!($db = mysqli_connect($server, $user, $password, $database))) {
        write_error_page('SQL ERROR: Connection failed: '.mysqli_error($db));
        }
    return $db;
    }        
       
function close_connector($db) {
    mysqli_close($db);
    }
    
?>
