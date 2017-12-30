<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>A Login Example</title>
    <meta http-equiv="content-type" 
        content="text/html;charset=utf-8" />                 
<style type="text/css" href="report_process.css">
</style>                
</head>
<body>
<h1>Roster report</h1>
<?php

//$user = $_POST['user'];
$pass = $_POST['password'];
$valid = false;

$raw = file_get_contents('passwords.dat');
$data = explode("\n",$raw);
foreach($data as $item) {
    if(crypt($pass,$item) === $item) 
            $valid = true;            
    }  #end foreach

    
if($valid)
    {
    $server = 'opatija.sdsu.edu:3306';
    $user = 'jadrn034';
    $password = 'suitcase';
    $database = 'jadrn034';
    if (!($db = mysqli_connect($server, $user, $password, $database)))
        echo "ERROR in connection " . mysqli_error($db);
    else {
        $sql = "select firstname, lastname, level, email, TIMESTAMPDIFF(YEAR, concat(year,'-',month,'-',dated), CURDATE()),imgpath from person
                ORDER BY level DESC ;";
        $result = mysqli_query($db, $sql);
        if (!result){
            echo "ERROR in query" . mysqli_error($db);
        }
        echo "<table>";
        echo "<tr><td>First Name</td><td>Last Name</td><td>Experience Level</td><td>Email</td><td>Age</td><td>Runner Image</td></tr>";
        while ($row = mysqli_fetch_row($result)) {
            echo "<tr>";
            $columnValuesToDisplay = array_slice($row, 0);
            $imageName = end($columnValuesToDisplay);
            foreach ($columnValuesToDisplay as $item)
                if($item == $imageName){
                    //$photoId = "    imageUploads/".$item;
                    echo"<td align=\"center\"><img src=\"$imageName\" width='75' align='middle'></td>";
                }
                else{
                    echo "<td>$item</td>";
                }
            echo "</tr>\n";
        }
        mysqli_close($db);
    }
    }
else
    echo "Login Unsuccessful.";     
?>
</body>
</html>