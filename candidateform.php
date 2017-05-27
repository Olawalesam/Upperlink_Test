<?php require_once('Connections/adio.php'); ?>
 
<!DOCTYPE html>
<html>
<head>
<title>Adio Group</title>
<meta charset="iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="layout/styles/main.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/mediaqueries.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/scripts/responsiveslides.js-v1.53/responsiveslides.css" rel="stylesheet" type="text/css" media="all">



<style type="text/css">

.main {
width:200px;
border:1px solid black;
}

.month {
background-color:black;
font:bold 12px verdana;
color:white;
}

.daysofweek {
background-color:gray;
font:bold 12px verdana;
color:white;
}

.days {
font-size: 12px;
font-family:verdana;
color:black;
background-color: white;
padding: 2px;
}

.days #today{
font-weight: bold;
color: red;
}

</style>


<script type="text/javascript" src="basiccalendar.js">

</script> 





</head>

<body class="">
<div style="height:10px;" class="wrapper row1">
  <header id="header" class="full_width clear">
  <a href="http://www.u-connect-ng.com"><img src="images/demo/logo.png" width="10" height="5"></a>
 
    <div class="fl_right">
	<nav id="topnav">
    <ul class="clear">
      <li class="active"> <a href="index.php"><font face="" size="" color="ff0000"><b><font color="#1E73BE">| Home |</font></b></font></a></li>
      <li><a href="#"><font face="" size="" color="ff0000"><font color="#1E73BE">| About Us |</font></font></a>
        <ul>
          <li><a href="AboutUs.php"><font color="#000000">ABOUT U-CONNECT-NG</font></a></li>
          <li><a href="overview.php"><font color="#000000">OVERVIEW</font></a></li>
          <li><a href="framework.php"><font color="#000000">FRAMEWORK</font></a></li>
		  <li><a href="faqs.php"><font color="#000000">FAQs</font></a></li>
		  <li><a href="gallery.php"><font color="#000000">GALLERY</font></a></li>
        </ul>
      </li>
      <li><a href="#"><font face="" size="" color="ff0000"><font color="#1E73BE">| OBJECTIVES |</font></font></a>
        <ul>
          <li><a href="people.php"><font color="#000000">PEOPLE</font></a></li>
          <li><a href="process.php"><font color="#000000">PROCESS</font></a></li>
          <li><a href="training.php"><font color="#000000">TRAINING</font></a></li>
		  <li><a href="technology.php"><font color="#000000">TECHNOLOGY</font></a></li>
        </ul>
      </li>
	  <li><a href="#"><font face="" size="" color="ff0000"><font color="#1E73BE">| Services |</font></font></a>
        <ul>
           <li><a href="recruitment.php"><font color="#000000">RECRUITMENT</font></a></li>
          <li><a href="outsourcing.php"><font color="#000000">OUTSOURCING</font></a></li>
          <li><a href="customer-service.php"><font color="#000000">CUSTOMER SERVICES</font></a></li>
		  <li><a href="training.php"><font color="#000000">TRAINING</font></a></li>
		  <li><a href="pre-assessment.php"><font color="#000000">PRE-ASSESSMENT</font></a></li>
		  <li><a href="mystery-shopping-survey.php"><font color="#000000">MYSTERY SHOPPING SURVEY</font></a></li>
		  <li><a href="human-resource-consulting.php"><font color="#000000">HR CONSULTING</font></a></li>
		  <li><a href="payroll.php"><font color="#000000">PAYROLL SERVICES</font></a></li>
        </ul>
      </li>
	  <li><a href="#"><font face="" size="" color="ff0000"><font color="#1E73BE">| Partners |</font></font></a>
        <ul>
          <li><a href="sahara-group.php"><font color="#000000">Sahara Group</font></a></li>
          <li><a href="ey.php"><font color="#000000">EY</font></a></li>
          <li><a href="nigerian-breweries.php"><font color="#000000">Nigerian Breweries</font></a></li>
		  <li><a href="nigeria-lng-limited.php"><font color="#000000">Nigeria LNG Limited</font></a></li>
		   <li><a href="cipm.php"><font color="#000000">CIPM</font></a></li>
          <li><a href="lagos-business-school.php"><font color="#000000">Lagos Business School</font></a></li>
          <li><a href="mansard.php"><font color="#000000">Mansard</font></a></li>
		  <li><a href="main-one.php"><font color="#000000">Main One</font></a></li>
        </ul>
      </li>
	  <li><a href="career.php"><font face="" size="" color="ff0000"><b><font color="#1E73BE">| Careers |</font></b></font></a></li>
	  <li><a href="contact.php"><font face="" size="" color="ff0000"><b><font color="#1E73BE">| Contact Us |</font></b></font></a></li>
	  <li><a href="#"><font face="" size="" color="ff0000"><b><font color="#1E73BE">| APPLY NOW |</font></b></font></a>
	  <ul>
          <li><a href="candidate_form.php"><font color="#000000">APPLY FOR JOB</font></a></li>
          
		  </ul>
		  </li>
	  
      </ul>
  </nav>
	
	
    </div>
	<a href="U-Connect-Training-Calendar-NEW-2017-EDITED-Tuesday.pdf"><img src="images/demo/cal.jpg" width="10" height="5"></a>
  </header>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <nav id="topnav">
    <ul class="clear">
      </ul>
  </nav>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <!-- ################################################################################################ -->
  <div class="rslides_container clear">
    <ul class="rslides clear" id="rslides">
      <li><img src="images/demo/slider/1.jpg" alt=""></li>
      <li><img src="images/demo/slider/2.jpg" alt=""></li>
      <li><img src="images/demo/slider/3.jpg" alt=""></li>
	  <li><img src="images/demo/slider/4.jpg" alt=""></li>
	  <li><img src="images/demo/slider/5.jpg" alt=""></li>
	  <li><img src="images/demo/slider/6.jpg" alt=""></li>
      <li><img src="images/demo/slider/7.jpg" alt=""></li>
      <li><img src="images/demo/slider/8.jpg" alt=""></li>
	  <li><img src="images/demo/slider/9.jpg" alt=""></li>
	  <li><img src="images/demo/slider/10.jpg" alt=""></li>
    </ul>
  </div>
  <!-- ################################################################################################ -->
  <table bgcolor="ffffff">
  <tr>
  <td>
  
  </td>
  </tr>
  </table>
  
   
  <div>
  <h1>WELCOME TO U-CONNECT</h1>
  <P align="center"> GET STARTED</P>
  <br><center>We are a leading provider of HR Services.</center></br>
  
  </div>
  
  
  
</div>

<img src="images/demo/222.jpg">

<!-- content -->
<div class="wrapper row3">
  <div id="container">
    <!-- ################################################################################################ -->
   
      <!-- ################################################################################################ -->
      
    </div>
	
	
	
    <!-- ################################################################################################ -->
    
  </div>
</div>
<!-- Footer -->
<div class="wrapper row2">
  
  <div id="" class="clear">
    
	
    
	
    
	<div class="one_quarter">
      
      
	  
    </div>
    
	
	
  </div>
 
 
 <h1><font face="" size="" color="#1e73be"><center>CANDIDATE REGISTRATION FORM</center></font></h1>
 
 
 <p><ul type=disc>
  
     <li  style="color: #ffffff;"><span style="color: #919191"> </span></li>
 
<p>Customer Surveys allow you to collect valuable data from your customer base while simultaneously reinforcing perceptions that your organization genuinely cares about their opinions and welcomes their feedback. If your organization does not have a process in place to gather this invaluable information, it should do so quickly with the help of a customer survey. By listening to the voice of your clientele, you are ideally situating your organization to develop or maintain a competitive advantage.</p>

<p>U-Connect's Customer Surveys provide business leaders with critical input for short- and long-term strategy development. They may also help the organization develop or enhance products and services, establish policy and procedure decisions, reward employee behaviour, and much more.</p>



<br>



<h3 class="style1" style="text-align: center;">Address Verification Form</h3>
<div class="col-sm-offset-3 col-sm-6">

            <!-- Nav tabs -->
            <!-- Tab panes -->
<div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="home">
                

<?php
	
//checks if the form has been submitted	
	  
if (isset($_POST['submit']))
 $dbcnx = @$adio;
  if (!$dbcnx) {
    exit('<p>Unable to connect to the ' .
        'database server at this time.</p>');
  }
  
  if (!@mysql_select_db($database_adio)) {
    exit('<p>Unable to locate the uconnect ' .
        'database at this time.</p>');  
		}
		
$today = date("l, F dS Y.");
    
  $surname = $_POST['surname'];
  $surname = mysql_real_escape_string($surname);
  
   
  $phonenumbers = $_POST['phone_no'];
  $phonenumbers = mysql_real_escape_string($phonenumbers);
  
  $sex = $_POST['sex'];
  $sex = mysql_real_escape_string($sex);
  
  $dateofbirth = $_POST['dateofbirth'];
  $dateofbirth = mysql_real_escape_string($dateofbirth);
  
  $maritalstatus = $_POST['maritalstatus'];
  $maritalstatus = mysql_real_escape_string($maritalstatus);
  
  $nextofkin = $_POST['nextofkin'];
  $nextofkin = mysql_real_escape_string($nextofkin);
  
  $qualification = $_POST['qualification'];
  $qualification = mysql_real_escape_string($qualification);
  
  
  $courseofstudy = $_POST['courseofstudy'];
  $courseofstudy = mysql_real_escape_string($courseofstudy);
  
  $highestqualification = $_POST['highestqualification'];
  $highestqualification = mysql_real_escape_string($highestqualification);
  
   $yeargraduated = $_POST['yeargraduated'];
  $yeargraduated = mysql_real_escape_string($yeargraduated);
  
  
  $grade = $_POST['grade'];
  $grade = mysql_real_escape_string($grade);
  
  $currentaddress = $_POST['currentaddress'];
  $currentaddress = mysql_real_escape_string($currentaddress);
  
   $city = $_POST['city'];
  $city = mysql_real_escape_string($city);
  
  
  $last_currentplaceofwork = $_POST['last_currentplaceofwork'];
  $last_currentplaceofwork = mysql_real_escape_string($last_currentplaceofwork);
  
  $role = $_POST['role'];
  $role = mysql_real_escape_string($role);
  
   $last_currentsalary = $_POST['last_currentsalary'];
  $last_currentsalary = mysql_real_escape_string($last_currentsalary);
  
  
  $yearofworkingexperience = $_POST['yearofworkingexperience'];
  $yearofworkingexperience = mysql_real_escape_string($yearofworkingexperience);
  
  $fluentlanguage = $_POST['fluentlanguage'];
  $fluentlanguage = mysql_real_escape_string($fluentlanguage);
  
 
  $stateoforigin = $_POST['stateoforigin'];
  $stateoforigin = mysql_real_escape_string($stateoforigin);
  
  
  $email = $_POST['email'];
  $email = mysql_real_escape_string($email);
  
  
  $location = $_POST['location'];
  $location = mysql_real_escape_string($location);
  
  
  // define a constant for the maximum upload size
define ('MAX_FILE_SIZE', 5000000);

if (array_key_exists('candidateform', $_POST)) {
  // define constant for upload folder
  define('UPLOAD_DIR', 'images/job/');
  // replace any spaces in original filename with underscores
  // at the same time, assign to a simpler variable
  $file = str_replace(' ', '_', $_FILES['image']['name']);
  // creating the full pathname
  $pathname = UPLOAD_DIR.$file;
  // convert the maximum size to KB
  $max = number_format(MAX_FILE_SIZE/1024, 1).'KB';
  // create an array of permitted MIME types
  $permitted = array('application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document','application/vnd.openxmlformats-officedocument.wordprocessingml.template', 'application/pdf');
  // begin by assuming the file is unacceptable
  $sizeOK = false;
  $typeOK = false;
  
  // check that file is within the permitted size
  if ($_FILES['image']['size'] > 0 && $_FILES['image']['size'] <= MAX_FILE_SIZE) {
    $sizeOK = true;
	}

  // check that file is of an permitted MIME type
  foreach ($permitted as $type) {
    if ($type == $_FILES['image']['type']) {
      $typeOK = true;
	  break;
	  }
	}
  
  if ($sizeOK && $typeOK) {
    switch($_FILES['image']['error']) {
	  case 0:
        // check if a file of the same name has been uploaded
		if (!file_exists($pathname)) {
		  // move the file to the upload folder and rename it
		  $success = move_uploaded_file($_FILES['image']['tmp_name'], $pathname);
		  }
		else {
		  // get the date and time
		  ini_set('date.timezone', 'Europe/London');
		  $now = date('Y-m-d-His');
          $pathename = $pathname.$now;
		  $success = move_uploaded_file($_FILES['image']['tmp_name'], $pathname);
		  }
		if ($success) {
          $result = "$file uploaded successfully";
	      }
		else {
		  $result = "Error uploading $file. Please try again.";
		  }
	    break;
	  case 3:
		$result = "Error uploading $file. Please try again.";
	  default:
        $result = "System error uploading $file. Contact webmaster.";
	  }
    }
  elseif ($_FILES['image']['error'] == 4) {
    $result = 'No file selected';
	}
  else {
    $result = "$file cannot be uploaded. Maximum size: $max. Acceptable file types: gif, jpg, png.";
	}
  }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  if (!$company){ 
echo("<font color=red><strong>Error:</strong>Please Enter Company</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}
    if (!$position){ 
echo("<font color=red><strong>Error:</strong>Please Enter Position</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;} 
  
    if (!$surname){ 
echo("<font color=red><strong>Error:</strong>Please Enter your Surname</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}
        if (!$othernames){ 
echo("<font color=red><strong>Error:</strong>Please Enter your Othernames</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}
  
     if (!$phonenumbers){ 
echo("<font color=red><strong>Error:</strong>Please Enter your Phone Numbers</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}

      if (!$sex){ 
echo("<font color=red><strong>Error:</strong>Please Enter your Sex</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}
  
        if (!$dateofbirth){ 
echo("<font color=red><strong>Error:</strong>Please Enter your Date of Birth</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}

        if (!$maritalstatus){ 
echo("<font color=red><strong>Error:</strong>Please Enter your Marital Status</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}

        if (!$nextofkin){ 
echo("<font color=red><strong>Error:</strong>Please Enter your Next of Kin</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}

 if (!$qualification){ 
echo("<font color=red><strong>Error:</strong>Please Enter your Qualification</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}

      if (!$courseofstudy){ 
echo("<font color=red><strong>Error:</strong>Please Enter your Course of Study</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}
  
        if (!$highestqualification){ 
echo("<font color=red><strong>Error:</strong>Please Enter your Other Qualification</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}

 if (!$yeargraduated){ 
echo("<font color=red><strong>Error:</strong>Please Enter your Year Graduattion</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}

      if (!$grade){ 
echo("<font color=red><strong>Error:</strong>Please Enter your Grade</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}

 if (!$currentaddress){ 
echo("<font color=red><strong>Error:</strong>Please Enter your Current Address</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}

      if (!$city){ 
echo("<font color=red><strong>Error:</strong>Please Enter your City</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}
  
        if (!$last_currentplaceofwork){ 
echo("<font color=red><strong>Error:</strong>Please Enter your Last/Current Place of Work</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}

 if (!$role){ 
echo("<font color=red><strong>Error:</strong>Please Enter your Role</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}

      if (!$last_currentsalary){ 
echo("<font color=red><strong>Error:</strong>Please Enter your Last Current Salary</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}
  
        if (!$yearofworkingexperience){ 
echo("<font color=red><strong>Error:</strong>Please Enter your Year of Working Experience</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}

 if (!$fluentlanguage){ 
echo("<font color=red><strong>Error:</strong>Please Enter your Fluent Language</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}

      if (!$stateoforigin){ 
echo("<font color=red><strong>Error:</strong>Please Enter your State of Origin</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}
  
     if (!$email){ 
echo("<font color=red><strong>Error:</strong>Please Enter your E-mail</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}

      if (!$location){ 
echo("<font color=red><strong>Error:</strong>Please Enter your Location</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}


  //trying to send e-mail 


$to1 = "info@u-connect-ng.com";
$to2 = "olawalesam@yahoo.com";
$to3 = "leololawale@yahoo.ca";
$to4 = "info@u-connect-ng.com";
$to5 = "b.ladipo@gr8jobsng.com";
$to6 = "c.uchendu@gr8jobsng.com";
$to7 = "n.dike@u-connect-ng.com";



 $subject1 = "Application Received via www.u-connect-ng.com";
 $body1 = "Hi,\n\n This is to notify you of an application sent via http://www.u-connect-ng.com/ \n \n  Thank you. ";

 $subject2 = "Application Received via www.u-connect-ng.com";
 $body2 = "Hi,\n\nJust to notify you that an application form was sent via http://www.u-connect-ng.com/ \n \n The application details are as listed below: \n\n" .  "Date: " . $today_date . "\n\n". "Company: " . $company . "\n\n". "Position Allied For: " . $position . "\n\n". "Surname: " . $surname . "\n\n". "Othernames: " . $othernames . "\n\n".  "Phone Numbers: " . $phonenumbers ."\n\n".  "Sex: " . $sex .  "\n\n".  "Date of Birth: " . $dateofbirth . "\n\n". "Marital Status: " . $maritalstatus . "\n\n". "Next of Kin: " . $nextofkin . "\n\n".  "Qualification: " . $qualification . "\n\n".  "Course of Study: " . $courseofstudy . "\n\n".  "Other Qualification: " . $highestqualification . "\n\n".  "Year Graduated: " . $yeargraduated . "\n\n".  "Grade: " . $grade . "\n\n".  "Current Address: " . $currentaddress . "\n\n".  "City: " . $city . "\n\n".  "Last/Current Place of Work: " . $last_currentplaceofwork . "\n\n".  "Role: " . $role . "\n\n".  "Last/Current Salary: " . $last_currentsalary . "\n\n".  "Year of Working Experience: " . $yearofworkingexperience ."\n\n".  "Fluent Languages: " . $fluentlanguage .  "\n\n".  "State of Origin: " . $stateoforigin ."\n\n".  "email: " . $email .  "\n\n".  "\n\n". "Location: " . $location . "\n\n" ;
 
 /*
 $headers .= "Organization: u-connect-ng.com \r\n";
 $headers .= "Reply-To: info@terabitsystems.org" . "\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
  $headers .= "X-Priority: 3\r\n";
  $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
 */
 
 
	                    $from = 'www.u-connect-ng.com <noreply@u-connect-ng.com>';
                        $headers = "From: " .($from) . "\r\n";
                        $headers .= "Reply-To: ".($from) . "\r\n";
                        $headers .= "Return-Path: ".($from) . "\r\n";;
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                        $headers .= "X-Priority: 3\r\n";
                        $headers .= "X-Mailer: PHP". phpversion() ."\r\n";
	
  mail($to1, $subject1, $body1, $headers);
  mail($to2, $subject2, $body2, $headers);
  mail($to3, $subject2, $body2, $headers);
  mail($to4, $subject2, $body2, $headers);
  mail($to5, $subject2, $body2, $headers);
  mail($to6, $subject2, $body2, $headers);
  mail($to7, $subject2, $body2, $headers);
  mail($to8, $subject2, $body2, $headers);
  
  
  
  $sql ="INSERT INTO candidate_form SET date='$today_date', company='$company', position='$position', surname='$surname', othernames='$othernames', phonenumbers='$phonenumbers', sex='$sex', dateofbirth='$dateofbirth', maritalstatus='$maritalstatus', nextofkin='$nextofkin', qualification='$qualification', courseofstudy='$courseofstudy', highestqualification='$highestqualification', yeargraduated='$yeargraduated', grade='$grade', currentaddress='$currentaddress', city='$city', last_currentplaceofwork='$last_currentplaceofwork', role='$role', last_currentsalary='$last_currentsalary', yearofworkingexperience='$yearofworkingexperience', fluentlanguage='$fluentlanguage', stateoforigin='$stateoforigin',  email='$email', location='$location', photoname='$file', filename ='$pathname' ";
  if (@mysql_query($sql)) {
    echo '<center>' . '<p><font color="blue" size="+3">Dear Applicant, Your application was submitted successfully.

Thank you!</font></p>' . '<a href="index.php"><font color="blue" size="+3">Back to Home Page...</font></a>' . '<br>' .'<br>' . '<a href="index.php"><font color="blue" size="+3">THANK YOU!</font></a>' . '</center>';
  } else {
    echo '<p>Error Making request: ' .
         mysql_error() . '</p>';
  }
    }
	 
  /*
  
  $to = "$gfaktor_97@yahoo.com";
  $to2 = "adeboyesamuelbamidele@gmail.com";
  //$to3 = "dapomakanjuola1st@yahoo.com";




 $subject = "New registration on Obrien Address Verification Form";
 $body = "Hi,<br/> Thank you for taking your time to register with us on our address verification portal<br/>";
 
  $body2 = " obverifyistration Notification on obverifyFUNDS Website<br/> ==========================================  <br/><br/>" . "Date = " . $today . "<br/><br/>".  "Email = " . $email . "<br/><br/>" . "Full name = " . $fname . "<br/><br/>".  "Phone Number = " . $phone . "<br/><br/>" . "Bank Name =" . $bname . "<br/><br/>". "Account Name = " . $accountname . "<br/><br/>". "Account Number = " . $acctno ;
 
 $headers = 'From: info@obriencompliance.com' . "\r\n" .
    'Reply-To: info@obriencompliance.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

         				$from = 'obriencompliance <noreply@obverincompliance.
                         $headers .= "Reply-To: ".($from) . "\r\n";
com>';
                        $headers = "From: " .($from) . "\r\n";
                        $headers .= "Return-Path: ".($from) . "\r\n";;
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                        $headers .= "X-Priority: 3\r\n";
                        $headers .= "X-Mailer: PHP". phpversion() ."\r\n";
 
 
    
    mail($to, $subject, $body, $headers );
	mail($to2, $subject, $body2, $headers );
	//mail($to3, $subject, $body2, $headers );
	//mail($to, $subject, $body, $headers );

*/  
  

 
  }
  
  
  
  
   else {
    echo '<p>Error Submitting Candidate Form Details: ' .
         mysql_error() . '</p>';
  }


}

?>


<?php else: // Allow the user to fill the form ?>
                
                
                



              <div role="tabpanel" class="tab-pane" id="profile">

                      <form class="" method="POST" action="candidateform.php" enctype="multipart/form-data">
          
          
          

                     <div class="form-group">
                       <label class="control-label" align="center"><strong>GENERAL INFORMATION:</strong> </label>
                     </div>
                     
                     
                     
                     <?php $today = date("l, F dS Y.");  ?>
                  <div class="form-group">
                      <label class="control-label">Today's Date</label>
                      <input name="date" type="text" class="form-control" id="date"  value ="<?php echo $today; ?>" size="40" readonly />
            </div>
                    
                    <div class="form-group">
                                            <label class="control-label"  align="right">Company:</label>
                                           <select class="form-control" id="company" name="company" required>
                                            <option value="select" selected> ---Select Company--- </option>
                                                    <option value="DIAMOND BANK">DIAMOND BANK</option>
	                                                <option value="GTBANK">GTBANK</option>
													<option value="STANBIC IBTC">STANBIC IBTC</option>
	                                                <option value="SAHARA GROUP">SAHARA GROUP</option>
													<option value="NIGERIAN BREWERIES">NIGERIAN BREWERIES</option>
													<option value="EY">EY</option>
	                                                <option value="NIGERIA LNG LIMITED">NIGERIA LNG LIMITED</option>
													<option value="CIPMN">CIPMN</option>
													<option value="LAGOS BUSINESS SCHOOL">LAGOS BUSINESS SCHOOL</option>
													<option value="MANSARD">MANSARD</option>
													<option value="MAIN ONE">MAIN ONE</option>
													<option value="MICROSOFT">MICROSOFT</option>
													<option value="DBN">DBN</option>
                                            
                                           </select>  
            </div>


                       <div class="form-group">
                                            <label class="control-label"  align="right">Position Applied For: </label>
                                           <select class="form-control" id="position" name="position" required>
                                            <option value="select" selected> ---Select Position Applied For--- </option>
                                                    <option value="RECRUITMENT DAY">RECRUITMENT DAY</option>
				                                    <option value="AREA MANAGER (DIAMOND BANK)">AREA MANAGER (DIAMOND BANK)</option>
													<option value="BRANCH MANAGER (DIAMOND BANK)">BRANCH MANAGER (DIAMOND BANK)</option>
													<option value="ACCOUNT OFFICER EMERGING BUSINESS (DIAMOND BANK)">ACCOUNT OFFICER EMERGING BUSINESS (DIAMOND BANK)</option>
													<option value="ACCOUNT OFFICER EXCLUSIVE (DIAMOND BANK)">ACCOUNT OFFICER EXCLUSIVE (DIAMOND BANK)</option>
													<option value="CONCIERGE (DIAMOND BANK)">CONCIERGE (DIAMOND BANK)</option>
													<option value="SALES SERVICE OFFICER (DIAMOND BANK)">SALES SERVICE OFFICER (DIAMOND BANK)</option>
													<option value="CONTACT CENTRE EXECUTIVES (GTBANK)">CONTACT CENTRE EXECUTIVES (GTBANK)</option>
													<option value="TRANSACTION OFFICERS (GTBANK)">TRANSACTION OFFICERS (GTBANK)</option>
													<option value="SALES EXECUTIVE">SALES EXECUTIVE</option>
													<option value="QUALITY ASSURANCE STAFF(Customer Service)">QUALITY ASSURANCE STAFF(Customer Service)</option>
													<option value="CALL CENTRE SUPERVISOR(Customer Service)">CALL CENTRE SUPERVISOR(Customer Service)</option>
													<option value="EMAIL AND SOCIAL MEDIA AGENTS(Customer Service)">EMAIL AND SOCIAL MEDIA AGENTS(Customer Service)</option>
													<option value="CALL CENTER AGENT(Customer Service)">CALL CENTER AGENT(Customer Service)</option>
													<option value="COUNTRY SALES MANAGER(Sales/Business Development )">COUNTRY SALES MANAGER(Sales/Business Development )</option>
													<option value="Air Cabin Crew(Hospitality/Leisure/Travels)">Air Cabin Crew(Hospitality/Leisure/Travels)</option>
													<option value="Air Traffic Controller(Logistics/Transportation)">Air Traffic Controller(Logistics/Transportation)</option>
													<option value="COMPUTER ENGINEERING(Engineering)">COMPUTER ENGINEERING(Engineering)</option>
													<option value="Health and Safety Advicer (Construction)">Health and Safety Advicer (Construction)</option>
													<option value="Team Lead(Information Technology)">Team Lead(Information Technology)</option>
													<option value="QUALITY ASSURANCE STAFF">QUALITY ASSURANCE STAFF</option>
													<option value="ICT Technician(Banking/Finance/Insurance)">ICT Technician(Banking/Finance/Insurance)</option>
													<option value="Air conditioning and Refrigeration Technician(Engineering)">Air conditioning and Refrigeration Technician(Engineering)</option>
													<option value="Cashier(Sales/Business Development)">Cashier(Sales/Business Development)</option>
													<option value="Company Cashier(Banking/Finance/Insurance)">Company Cashier(Banking/Finance/Insurance)</option>
													<option value="Head Cashier(Manufacturing/Production)">Head Cashier(Manufacturing/Production)</option>
                                                    <option value="Public Health Officer(Healthcare/Pharmaceutical)">Public Health Officer(Healthcare/Pharmaceutical)</option>
													<option value="Health Technologist(Healthcare/Pharmaceutical)">Health Technologist(Healthcare/Pharmaceutical)</option>
													<option value="Health Officer(Healthcare/Pharmaceutical)">Health Officer(Healthcare/Pharmaceutical)</option>
													<option value="Healthcare Assistance(Healthcare/Pharmaceutical)">Healthcare Assistance(Healthcare/Pharmaceutical)</option>
													<option value="Vocational/Semi-Skilled">Vocational/Semi-Skilled</option>
													<option value="Customer Service Manager(Customer Service)">Customer Service Manager(Customer Service)</option>
	                                                <option value="Undergraduate Internship/Vocational Job">Undergraduate Internship/Vocational Job</option>
													<option value="Fresh Graduate/Entry Level/Graduate Internship">Fresh Graduate/Entry Level/Graduate Internship</option>
	                                                <option value="Experienced (Non-Manager)">Experienced (Non-Manager)</option>
													<option value="Executive (Director/CEO/CFO/COO)">Executive (Director/CEO/CFO/COO)</option>
                                            
                                           </select>  
            </div>


                    
                    <div class="form-group">
                      <label class="control-label">Surname:</label>
                      <input name="surname" type=customerid" class="form-surname" id="customerid" placeholder="Surname">
                    </div>


                      <div class="form-group">
                      <label class="control-label">Other Names:</label>
                      <input name="othernames" type="othernames" class="form-control" id="othernames" placeholder="Other Names">
                    </div>
					
					
					<div class="form-group">
                      <label class="control-label">Mobile Numbers:</label>
                      <input name="telephone"type="telephone" class="form-control" id="telephone" placeholder="Mobile Numbers">

                    </div>

                      
					<div class="form-group">
                                            <label class="control-label"  align="right">Gender:</label>
                                           <select class="form-control" id="sex" name="sex" required>
                                            <option value="select" selected> ---Select Gender--- </option>
                                                    <option value="Male">Male</option>
	                                                <option value="Female">Female</option>
                                            
                                           </select>  
            </div>

					  
					  
					  
                      <div class="form-group">
                      <label class="control-label">Date of Birth(dd/mm/yy):</label>
                      <input name="dateofbirth" type="dateofbirth" class="form-control" id="dateofbirth" placeholder="Date of Birth(dd/mm/yy)">
                    </div>


                    <div class="form-group">
                      <label class="control-label">Marital Status:</label>
                      <input name="maritalstatus" type="maritalstatus" class="form-control" id="maritalstatus" placeholder="Marital Status">
                    </div>


                     <div class="form-group">
                      <label class="control-label">Marital Status:</label>
                      <div class="controls">
                      </div>

                         

                    <label class="radio-inline">
       <input type="radio" name="maritalstatus" id="inlineRadio1" value="option1">Single
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="maritalstatus" id="inlineRadio2" value="option2">Married
                    </label>
                                         
                  <br/>   <br/>




                    <div class="form-group">
                      <label class="control-label">Next of Kin:</label>
                      <input name="nextofkin" type="nextofkin" class="form-control" id="nextofkin" placeholder="Next of Kin">

                    </div>


                    <div class="form-group">
                                            <label class="control-label"  align="right">Qualification:</label>
                                           <select class="form-control" id="qualification" name="qualification" required>
                                            <option value="select" selected> ---Select Qualification--- </option>
                                                    <option value="OND">OND</option>
	                                                <option value="HND">HND</option>
													<option value="BSc">BSc</option>
	                                                <option value="B.TECH">B.TECH</option>
													<option value="B.ENG">B.ENG</option>
													<option value="B.ENG">MBA</option>
													<option value="B.ENG">Ph.D</option>
	              </select>

                    </div>


                     <div class="form-group">
                      <label class="control-label">Course of Study:</label>
                      <input name="courseofstudy" type="courseofstudy" class="form-control" id="courseofstudy" placeholder="Course of Study">
                    </div>


                    <div class="form-group">
                      <label class="control-label">Other Qualification:</label>
                      <input name="highestqualification" type="highestqualification" class="form-control" id="highestqualification" placeholder="Other Qualifications">
                    </div>



                     <div class="form-group">
                                            <label class="control-label"  align="right">Year Graduated:</label>
                                           <select class="form-control" id="yeargraduated" name="yeargraduated" required>
                                            <option value="select" selected> ---Select Year Graduated--- </option>
                                                    <option value="2000">2016</option>
	                                                <option value="2001">2015</option>
													<option value="2001">2014</option>
													<option value="2001">2013</option>
													<option value="2001">2012</option>
													<option value="2001">2011</option>
													<option value="2001">2010</option>
													<option value="2001">2009</option>
													<option value="2001">2008</option>
													<option value="2001">2007</option>
													<option value="2001">2006</option>
													<option value="2001">2005</option>
													<option value="2001">2004</option>
													<option value="2001">2003</option>
													<option value="2001">2002</option>
													<option value="2001">2001</option>
													<option value="2001">2000</option>
	              </select>
            </div>


                          <div class="form-group">
                                            <label class="control-label"  align="right">Grade:</label>
                                           <select class="form-control" id="grade" name="grade" required>
                                            <option value="select" selected> ---Select Grade--- </option>
                                                    <option value="1st Class Honours">1st Class Honours</option>
	                                                <option value="2nd Class Upper Division">2nd Class Upper Division</option>
													<option value="2nd Class Lower Division">2nd Class Lower Division</option>
	                                                <option value="3rd Class">3rd Class</option>
													<option value="Pass">Pass</option>
													<option value="Distinction">Distinction</option>
													<option value="Upper Credit">Upper Credit</option>
													<option value="Lower Credit">Lower Credit</option>
													<option value="Pass">Pass</option>
                                            
                                           </select>  
            </div>


                     <div class="form-group">
                      <label class="control-label">Current Address:</label>
                      <input name="currentaddress" type="currentaddress" class="form-control" id="currentaddress" placeholder="Current Address">
                    </div>



                    <div class="form-group">
                      <label class="control-label">City:</label>
                      <input name="city" type="city" class="form-control" id="city" placeholder="City">

                    </div>






                      <hr>
                     <div class="form-group">
                       <label class="control-label" align="center"><strong>PREVIOUS/CURRENT WORK INFORMATION:</strong> </label>
                     </div>

                        <hr>


                    <div class="form-group">
                      <label class="control-label">Last/Current Place of Work:</label>
                      <input name="last_currentplaceofwork" type="last_currentplaceofwork" class="form-control" id="last_currentplaceofwork" placeholder="Last/Current Place of Work">
                    </div>


                    <div class="form-group">
                      <label class="control-label">Last/Current Role:</label>
                      <input name="role" type="role" class="form-control" id="role" placeholder="Last/Current Role">
                    </div>


                    <div class="form-group">
                      <label class="control-label">Last/Current Salary:</label>
                      <input name="last_currentsalary" type="last_currentsalary" class="form-control" id="last_currentsalary" placeholder="Last/Current Salary">
                    </div>


                    <div class="form-group">
                      <label class="control-label">Year(s) of Working Experience:</label>
                      <input name="yearofworkingexperience" type="yearofworkingexperience" class="form-control" id="yearofworkingexperience" placeholder="Last/Current Place of Work">
                    </div>


                    <div class="form-group">
                      <label class="control-label">Fluent Languages:</label>
                      <input name="fluentlanguage" type="fluentlanguage" class="form-control" id="fluentlanguage" placeholder="Fluent Languages">
                    </div>



                                    <div class="form-group">
                                            <label class="control-label"  align="right">State of Origin:</label>
                                            <select class="form-control" id="stateoforigin" name="stateoforigin" required>
                                            <option value="select" selected> ---Select State of Origin--- </option>
                                                    <option value="Abia">Abia</option>
	                                                <option value="Adamawa">Adamawa</option>
													<option value="Akwa Ibom">Akwa Ibom</option>
	                                                <option value="Anambra">Anambra</option>
													<option value="Bauchi">Bauchi</option>
													<option value="Bayelsa">Bayelsa</option>
	                                                <option value="Benue">Benue</option>
													<option value="Borno">Borno</option>
	                                                <option value="Cross River">Cross River</option>
													<option value="Delta">Delta</option>
													<option value="Ebonyi">Ebonyi</option>
	                                                <option value="Edo">Edo</option>
													<option value="Ekiti">Ekiti</option>
	                                                <option value="Enugu">Enugu</option>
													<option value="Federal Capital Territory">Federal Capital Territory</option>
													<option value="Gombe">Gombe</option>
	                                                <option value="Imo">Imo</option>
													<option value="Jigawa">Jigawa</option>
	                                                <option value="Kaduna">Kaduna</option>
													<option value="Kano">Kano</option>
													<option value="Katsina">Katsina</option>
	                                                <option value="Kebbi">Kebbi</option>
													<option value="Kogi">Kogi</option>
	                                                <option value="Kwara">Kwara</option>
													<option value="Lagos">Lagos</option>
													<option value="Delta">Delta</option>
													<option value="Nasarawa">Nasarawa</option>
	                                                <option value="Niger">Niger</option>
													<option value="Ogun">Ogun</option>
	                                                <option value="Ondo">Ondo</option>
													<option value="Osun">Osun</option>
													<option value="Oyo">Oyo</option>
	                                                <option value="Plateau">Plateau</option>
													<option value="Rivers">Rivers</option>
	                                                <option value="Sokoto">Sokoto</option>
													<option value="Taraba">Taraba</option>
													<option value="Yobe">Yobe</option>
	                                                <option value="Zamfara">Zamfara</option>
	              </select>
            </div>




                    <div class="form-group">
                      <label class="control-label">E-mail:</label>
                      <input name="email" type="email" class="form-control" id="email" placeholder="E-mail">
                    </div>



                   <div class="form-group">
                      <label class="control-label">Preferred Location:</label>
                      <input name="location" type="location" class="form-control" id="location" placeholder="Preferred Location">
                    </div>


                    



                         
                    

                                           

           
<br/><br/>

                    <div class="form-group">
                      <label for="exampleInputFile">UPLOAD YOUR CV</label>
                     
                      
                    </div>
                
         <img src="images/icons/photo.png">&nbsp;&nbsp; <img id="uploadPreview" style="width: 150px; height: 150px;" /><input name="image" type="file" id="photo" onChange="PreviewImage();"/>
 <script type="text/javascript">
  function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("photo").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
  };
</script>
                <br/><br/>

                
                      <button type="submit" name="submit" class="btn btn-default">Submit</button>
          </form>

<?php endif; ?>
                </div>
            </div>

      </div>

 </div>
	  
	  


  
  <table>
<tr>
<td>

</td>
</tr>
</table>
</div>

<table>
<tr>
<td>

</td>
</tr>
</table>

<div class="wrapper row4">
<div id="copyright" class="clear">
  <section class="one_quarter">
      <h2 class="title"><font color="#ffffff">CONTACT INFO </font></h2>
      <article>
        <header>
		<address>
          <font color="#ffffff">U-Connect Human Resources Limited,</font>
          </address>
         <font color="#ffffff"> Head Office: 5, Ogbunike Street, Off Admiralty Way Lekki Phase 1, Lagos Nigeria. </font>
          <address>
          <font color="#ffffff">Abuja Office: 8 Dakala Street, Off Parakou Crescent, Wuse II, Abuja, Nigeria.</font>
          </address>
          <address><font color="#ffffff">Tel: +234-0-8125278883; +234-1-461 6837</font></address>
        </header>
        <p><font color="#ffffff">E-mail: info@u-connect-ng.com <br>        Website: www.u-connect-ng.com </font></p>
      </article>
    </section>
    <section class="one_quarter">
      <h2 class="title"><font color="#ffffff">QUICK LINKS</font></h2>
      <nav>
        <ul>
          <li><a href="#"><font color="#ffffff">HR CONSULTING</font></a></li><br>
          <li><a href="#"><font color="#ffffff">CUSTOMER SERVICE SURVEY</font></a></li><br>
          <li><a href="#"><font color="#ffffff">RECRUITMENT</font></a></li><br>
          <li><a href="#"><font color="#ffffff">OUTSOURCING</font></a></li><br>
          <li class="last"><a href="#"><font color="#ffffff">PRE-ASSESSMENT TEST</font></a></li>
        </ul>
      </nav>
    </section>
	
	 <section class="one_quarter">
      <h2 class="title"><font color="#ffffff">LATEST TWEETS</font></h2>
      <article>
        <header>
		<address>
          
          </address>
          
          <address>
         
          </address>
          <address></address>
        </header>
        <p> </p>
      </article>
    </section>
    <section class="one_quarter">
      <h2 class="title"><font color="#ffffff"> &nbsp; &nbsp; &nbsp; CALENDAR</font></h2>
      <script type="text/javascript">

var todaydate=new Date()
var curmonth=todaydate.getMonth()+1 //get current month (1-12)
var curyear=todaydate.getFullYear() //get current year

document.write(buildCal(curmonth ,curyear, "main", "month", "daysofweek", "days", 1));
</script>
    </section>
	
	 
  
  
  
  
  
    </div>

  <div id="copyright" class="clear">
  <center><font color="#ffffff">U-CONNECT HUMAN RESOURCES LIMITED, 5, OGBUNIKE STREET, LEKKI PHASE 1, LAGOS. +2348125278883, +2348186299147 <a href="https://www.facebook.com/uconnect/"><img src="images/social/facebook.gif" alt="" /></a>
          <a href="https://twitter.com/uconnect"><img src="images/social/twitter.gif" alt="" /></a>
          <a href="https://www.youtube.com/channel/UCvylUZqsxpt3hozUEir7gtA"><img src="images/social/youtube.gif" alt="" /></a>
          <a href="https://www.u-connect-ng.com/blog/comments/feed"><img src="images/social/rss.gif" alt="" /></a></font></center>
    </div>
	<div id="copyright" class="clear">
   <p class="fl_left"><font face="" color="#ffffff" size="">Copyright &copy; 2017 - U-Connect-Ng - All Rights Reserved</font></p>
    <p class="fl_right"><font face="" color="#ffffff" size="">Designed and hosted by:<a href="http://www.u-connect-ng.com/">U-Connect-Ng</a></font></p>
  </div>
</div>
<!-- Scripts -->
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
<script>window.jQuery || document.write('<script src="layout/scripts/jquery-latest.min.js"><\/script>\
<script src="layout/scripts/jquery-ui.min.js"><\/script>')</script>
<script>jQuery(document).ready(function($){ $('img').removeAttr('width height'); });</script>
<script src="layout/scripts/responsiveslides.js-v1.53/responsiveslides.min.js"></script>
<script src="layout/scripts/jquery-mobilemenu.min.js"></script>
<script src="layout/scripts/custom.js"></script>
</body>
</html>