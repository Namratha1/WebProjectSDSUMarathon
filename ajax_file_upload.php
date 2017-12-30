<?php
    $UPLOAD_DIR = '_uploadDIR_/';
    $COMPUTER_DIR = '/home/jadrn034/public_html/proj3/_uploadDIR_/';
    $fname = $_FILES['img']['name'];
    $message = "";

        
    if($_FILES['img']['error'] > 0) {
        $err = $_FILES['img']['error'];  
        if($err == 4) {
            $message = "Please upload image";
        }
        else
            $message .= "Error Code: $err ";
        }     
             
    else {
        move_uploaded_file($_FILES['img']['tmp_name'], "$UPLOAD_DIR".$fname);
        $message = "Success! Your file has been uploaded to the server</br >\n";
    }         
    echo $message;
?>  

