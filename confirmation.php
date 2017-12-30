<!DOCTYPE HTML>
<html>
    <!--
      Mandya Subramanya, Namratha
      Class account - jadrn034
      Project #3
      Fall 2017
    -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Confirmation</title>
    <link rel="stylesheet" href="Main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<style type="text/css" href="confirmation.css">
</style>
</style>

<body id="signupbody" style="background-image: url('conImage.jpg');">
<div id="page-wrapper">
<?php
echo <<<ENDBLOCK

    <table id="confirmTable">
        <tr>
            <td colspan="2" id="regname">$params[0], thank you for registering.</td>
        </tr>
        <tr>
            <td>Middlename</td>
            <td>$params[1]</td>
        </tr>
        <tr>
            <td>Lastname</td>
            <td>$params[2]</td>
        </tr>
        <tr>
            <td>Address 1</td>
            <td>$params[3]</td>
        </tr>
        <tr>
            <td>Address 2</td>
            <td>$params[4]</td>
        </tr>
        <tr>
            <td>City</td>
            <td>$params[5]</td>
        </tr> 
        <tr>
            <td>State</td>
            <td>$params[6]</td>
        </tr> 
        <tr>
            <td>Zip Code</td>
            <td>$params[7]</td>
        </tr> 
        <tr>
            <td>Area Code</td>
            <td>$params[8]</td>
        </tr> 
        <tr>
            <td>Phone Prefix</td>
            <td>$params[9]</td>
        </tr> 
        <tr>
            <td>Phone Number</td>
            <td>$params[10]</td>
        </tr> 
        <tr>
            <td>Email</td>
            <td>$params[11]</td>
        </tr> 
        <tr>
            <td>Gender</td>
            <td>$params[12]</td>
        </tr> 
        <tr>
            <td>Month</td>
            <td>$params[13]</td>
        </tr> 
        <tr>
            <td>Date</td>
            <td>$params[14]</td>
        </tr>           
        <tr>
            <td>Year</td>
            <td>$params[15]</td>
        </tr> 
        <tr>
            <td>Message</td>
            <td>$params[16]</td>
        </tr> 
        <tr>
            <td>Level</td>
            <td>$params[17]</td>
        </tr> 
        <tr>
            <td>Category</td>
            <td>$params[18]</td>
        </tr>
    </table>                          
ENDBLOCK;


echo "<p>The raw query string that came from the browser is ",
    file_get_contents("php://input"),"</p>";

?>
</div>
</body>
</html>
