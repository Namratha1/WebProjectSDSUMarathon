<?php

####################################
      # Mandya Subramanya, Namratha
      # Class account - jadrn034
      # Project #3
      # Fall 2017
###################################

function validate_data($params) {
    $msg = "";

    $states = array("AK","AL","AR","AZ","CA","CO","CT","DC",
    "DE","FL","GA","GU","HI","IA","ID","IL","IN","KS","KY","LA","MA",
    "MD","ME","MH","MI","MN","MO","MS","MT","NC","ND","NE","NH","NJ",
    "NM","NV","NY","OH","OK","OR","PA","PR","RI","SC","SD","TN","TX",
    "UT","VA","VT","WA","WI","WV","WY");
    
    
    if(empty($params[0]))
        $msg .= "Please enter the firstname<br />";  
    elseif(strlen($params[2]) == 0)
        $msg .= "Please enter the lastname<br />"; 
    elseif(strlen($params[3]) == 0)
        $msg .= "Please enter the address<br />"; 
    elseif(strlen($params[5]) == 0)
        $msg .= "Please enter the city<br />"; 
    elseif(strlen($params[6]) == 0)
        $msg .= "Please enter the state<br />";  
    elseif(!in_array($params[6],$states))  
        $msg .= "Please enter valid two letter state abbreviation";                   
    elseif(empty($params[7]))
        $msg .= "Zip code may not be empty<br />";
    elseif(strlen($params[7]) < 5)
        $msg .= "Please enter 5 digit zip code<br />";
    elseif(!is_numeric($params[7])) 
        $msg .= "Zip code may contain only numeric digits<br />";
    elseif(empty($params[8]))
        $msg .= "Area code may not be empty<br />";
    elseif(!empty($params[8]) && strlen($params[8]) < 3)
        $msg .= "Please enter 3 digit area code<br/>";
    elseif(strlen($params[9]) == 0)
        $msg .= "Please enter the phone prefix<br />";
    elseif(!empty($params[9]) && strlen($params[9]) < 3)
        $msg .= "Please enter 3 digit phone prefix<br/>";
    elseif(strlen($params[10]) == 0)
        $msg .= "Please enter the phone number<br />";
    elseif(!empty($params[10]) && strlen($params[10]) < 4)
        $msg .= "Please enter 4 digit phone number<br/>";
    elseif(!is_numeric($params[8]) || !is_numeric($params[9]) || !is_numeric($params[10]))
        $msg .= "Phone number may contain only numeric digits <br/>";
    elseif(strlen($params[11]) == 0)
        $msg .= "Please enter email<br />";
    elseif(empty($params[12]))
        $msg .= "Please enter gender<br />";
    elseif(strlen($params[13]) == 0)
        $msg .= "Please enter month<br />";
    elseif(strlen($params[14]) == 0)
        $msg .= "Please enter date<br />";
    elseif(strlen($params[15]) == 0)
        $msg .= "Please enter year<br />";
    elseif(!is_numeric($params[13]) || !is_numeric($params[14]) || !is_numeric($params[15]))
        $msg .= "Date may contain only numeric digits <br/>";
    elseif(!filter_var($params[11], FILTER_VALIDATE_EMAIL))
        $msg .= "Your email appears to be invalid<br/>";
    elseif(empty($params[17]))
        $msg .= "Please select experience level <br/>";
    elseif(empty($params[18]))
        $msg .= "Please select experience category <br/>";         
    if($msg) {
        write_form_error_page($msg);
        exit;
        }
    }
  
 function write_form_error_page($msg) {
    write_header();
    echo "<div id=\"message_line\">",
    $msg,"</div>";
    write_form();
    write_footer();
    }  
    
function write_form() {
    print <<<ENDBLOCK
    <body id="signupbody">
        <div id="page-wrapper">
                <section id="main" class="container 75%">
                    <header>
                        <h2>Please fill the form.</h2>
                    </header>
                    <div class="box">
                        <form name="personal_info" action="process_request.php" method="post">
                            <div id='message_line'> &nbsp; </div>
                            <div>
                                <div>
                                    <label>Runner's Image: <span class="red">*</span></label>
                                    <input type="file" name="img" value="" id="img">
                                </div>
                                <br/>
                                <div>
                                    <label>First Name:<span class="red">*</span></label>
                                    <div class="div_group">
                                        <input type="text" name="firstname" id="firstname" value="$_POST[firstname]" placeholder="First Name"/>
                                    </div>
                                    <div class="div_group">
                                        <label id="middlenamelabel">Middle Name:</label>
                                        <input type="text" name="middlename" id="middlename" value="$_POST[middlename]" placeholder="Middle Name" />
                                    </div>
                                    <div class="div_group">
                                        <label id="lastnamelabel">Last Name:<span class="red">*</span></label>
                                        <input type="text" name="lastname" id="lastname" value="$_POST[lastname]" placeholder="Last Name" />
                                    </div>
                                </div>
                                <br/>
                                <div>
                                    <label> Address 1: <span class="red">*</span></label>
                                    <input class="marginleft" type="text" name="address1" id="address1" value="$_POST[address1]" placeholder="Building Number, Street Name, etc"/>
                                </div>
                                <br/>
                                <div>
                                    <label> Address 2: </label>
                                    <input class="marginleft" type="text" name="address2" id="address2" value="$_POST[address2]" placeholder="Apartment Number, Floor, etc"/>
                                </div>
                                <br/>
                                <div>
                                    <div class="div_group">
                                        <label id="citylabel">City: <span class="red">*</span></label>
                                        <input type="text" name="city" id="city" value="$_POST[city]" placeholder="City"/>
                                    </div>
                                    <div class="div_group">
                                        <label id="statelabel">State: <span class="red">*</span></label>
                                        <input type="text" name="state" id="state" maxlength="2" value="$_POST[state]" placeholder="State"/>
                                    </div>
                                    <div class="div_group">
                                        <label>Zip Code: <span class="red">*</span></label>
                                        <input type="text" name="zipcode" id="zipcode" value="$_POST[zipcode]" maxlength="5" placeholder="Zip Code"/>
                                    </div>
                                </div>
                                <br/>
                                <div>
                                    <label> Phone: <span class="red">*</span></label>
                                    <div class="div_group" id="alignleft">
                                        (<div class="div_group">
                                            <input type="text" name="areacode" id="areacode" value="$_POST[areacode]" placeholder="XXX" maxlength="3"/>
                                        </div>)
                                    </div>
                                    <div class="div_group">
                                        <input type="text" name="phoneprefix" id="phoneprefix" value="$_POST[phoneprefix]" placeholder="XXX" maxlength="3"/>
                                    </div>
                                    <div class="div_group">
                                        <input type="text" name="phonenumber" id="phonenumber" value="$_POST[phonenumber]" placeholder="XXXX" maxlength="4"/>
                                    </div>
                                    <div class="div_group">
                                        <label id="emaillabel"> Email: <span class="red">*</span></label>
                                        <input type="email" name="email" id="email" value="$_POST[email]" placeholder="Email"/>
                                    </div>
                                </div>
                                <br/>   
                                <div>
                                    <label> Gender: <span class="red">*</span></label>
                                    <input type="radio" name="gender" value="male" id="gender"> Male
                                    <input type="radio" name="gender" value="female"> Female
                                </div>
                                <br/>
                                <div>
                                    <label>DOB: <span class="red">*</span></label>
                                    <div class="div_group">
                                        <input type="text" name="month" id="month" value="" placeholder="MM" maxlength="2"/>
                                    </div>
                                    <div class="div_group">
                                        <input type="text" name="dated" id="dated" value="" placeholder="DD" maxlength="2"/>
                                    </div>
                                    <div class="div_group">
                                        <input type="text" name="year" id="year" value="" placeholder="YYYY" maxlength="4"/>
                                    </div>
                                </div>
                                <br/>
                                <div>
                                    <label id="messageid">Medical Conditions: </label>
                                    <textarea name="message" id="message" value="$_POST[message]" placeholder="Enter your medical condition" rows="6"></textarea>
                                </div>
                                <div id="levels">
                                    <label>Experience Level: <span class="red">*</span></label>
                                    <input type="radio" name="level" id="level1" value="expert"> Expert
                                    <input type="radio" name="level" id="level2" value="experienced"> Experienced
                                    <input type="radio" name="level" id="level3" value="novice"> Novice 
                                </div>
                                <br/>
                                <div>
                                    <label>Category: <span class="red">*</span></label>
                                    <input type="radio" id="category1" name="category" value="teen"> Teen
                                    <input type="radio" id="category2" name="category" value="adult"> Adult
                                    <input type="radio" id="category3" name="category" value="senior"> Senior 
                                </div>
                            </div>
                            <br/>
                            <br/>
                            <div>
                                <input type="submit" id="registerBtn" value="Register" />
                                <input type="reset" id="clearBtn" value="Clear" />
                            </div>
                        </form>
                    </div>
                </section>
        </div>
    </body>
ENDBLOCK;
}                        

function process_parameters($params) {
    global $UPLOAD_DIR;
    global $bad_chars;
    $params = array();
    $params[] = trim(str_replace($bad_chars, "",$_POST['firstname']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['middlename']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['lastname']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['address1']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['address2']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['city']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['state']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['zipcode']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['areacode']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['phoneprefix']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['phonenumber']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['email']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['gender']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['month']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['dated']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['year']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['message']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['level']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['category']));
    $params[] = $UPLOAD_DIR.trim(str_replace($bad_chars, "",$_POST['img']));
    return $params;
    }
    
function store_data_in_db($params) {
    
    # get a database connection
    $db = get_db_handle();  ## method in helpers.php
    ##############################################################
    $sql = "SELECT * FROM person WHERE ".
    "firstname='$params[0]' AND ".
    "middlename='$params[1]' AND ".
    "lastname='$params[2]' AND ".
    "address1='$params[3]' AND ".
    "address2 = '$params[4]' AND ".
    "city='$params[5]' AND ".
    "state = '$params[6]' AND ".
    "zipcode = '$params[7]' AND ".
    "areacode='$params[8]' AND ".
    "phoneprefix='$params[9]' AND ".
    "phonenumber='$params[10]' AND ".
    "email = '$params[11]' AND ".
    "gender='$params[12]' AND ".
    "month='$params[13]' AND ".
    "dated='$params[14]' AND ".
    "year='$params[15]' AND ".
    "message='$params[16]' AND ".
    "level='$params[17]' AND ".
    "category='$params[18]' AND ".
    "imgpath='$params[19]';";
##echo "The SQL statement is ",$sql;    
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0) {
        write_form_error_page('This record appears to be a duplicate');
        exit;
    }
##OK, duplicate check passed, now insert
     $sql = "INSERT INTO person(firstname,middlename,lastname,address1,address2,city,state,zipcode,areacode,phoneprefix,phonenumber,email,gender,month,dated,year,message,level,category,imgpath) ".
    "VALUES('$params[0]','$params[1]','$params[2]','$params[3]','$params[4]','$params[5]','$params[6]','$params[7]','$params[8]','$params[9]','$params[10]','$params[11]','$params[12]','$params[13]','$params[14]','$params[15]','$params[16]','$params[17]','$params[18]','$params[19]');";
##echo "The SQL statement is ",$sql;    
    mysqli_query($db,$sql);
    $how_many = mysqli_affected_rows($db);
    echo("There were $how_many rows affected");
    close_connector($db);
    }
        
?>   
