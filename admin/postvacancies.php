<?php require_once('../Connections/proven.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "signedout.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
//include("scripts/sessions.php");
include("../scripts/dbconf.php");
//include("../scripts/subscribers.php");
//include("../scripts/admin_info.php");
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "adminlogin.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
$dbcnx = @$proven;
if (!$dbcnx) {
die( '<p>Unable to connect to the ' .
'database server at this time.</p>' );
}
// Select the proven database
if (! @mysql_select_db($database_proven) ) {
die( '<p>Unable to locate the  ' .
'database at this time.</p>' );
}

//checks if the form has been submitted

if (isset($_POST['upload'])) {

$date = $_POST['date'];

$day = date("d");

$month_posted = date("F");

$job_desig = $_POST['job_desig'];
$job_desig= mysql_real_escape_string($job_desig);

$location = $_POST['location'];
$location= mysql_real_escape_string($location);

$job_sector = $_POST['job_sector'];
$job_sector= mysql_real_escape_string($job_sector);

$start_date = $_POST['start_date'];
$start_date = mysql_real_escape_string($start_date);

$salary = $_POST['salary'];
$salary = mysql_real_escape_string($salary);

$closing_date = $_POST['closing_date'];
$closing_date = mysql_real_escape_string($closing_date);

$work_experience = $_POST['work_experience'];
$work_experience = mysql_real_escape_string($work_experience);

$skill= $_POST['skill'];
$skill = mysql_real_escape_string($skill);

$job_description = $_POST['job_description'];
$job_description = mysql_real_escape_string($job_description);


// define a constant for the maximum upload size
define ('MAX_FILE_SIZE', 500000);

if (array_key_exists('upload', $_POST)) {
  // define constant for upload folder
  define('UPLOAD_DIR', 'images/vacancy/');
  // replace any spaces in original filename with underscores
  // at the same time, assign to a simpler variable
  $file = str_replace(' ', '_', $_FILES['image']['name']);
  // creating the full pathname
  $pathname = UPLOAD_DIR.$file;
  // convert the maximum size to KB
  $max = number_format(MAX_FILE_SIZE/1024, 1).'KB';
  // create an array of permitted MIME types
  $permitted = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png');
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
  
  
   if (!$job_desig){ 
echo("<font color=red><strong>Error:</strong>Please Enter the Job Designation</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}

   if (!$location){ 
echo("<font color=red><strong>Error:</strong>Please Enter the Job Location</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}

	if ($job_sector == 'sector'){ 
echo("<font color=red><strong>Error:</strong>Please Select The Job Industry</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}
		
 if (!$start_date){ 
echo("<font color=red><strong>Error:</strong>Please Enter the Job Start Date</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}


	 if (!$salary){ 
echo("<font color=red><strong>Error:</strong>Please Enter the Job Salary</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}
	


 if (!$closing_date){ 
echo("<font color=red><strong>Error:</strong>Please Enter the Job Closing Date</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}


 if (!$work_experience){ 
echo("<font color=red><strong>Error:</strong>Please Enter the Job Years of Work Experience </font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}

 if (!$skill){ 
echo("<font color=red><strong>Error:</strong>Please Enter the skills Required </font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}


 if (!$job_description){ 
echo("<font color=red><strong>Error:</strong>Please Enter the Job Description </font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}



		

// otherwise, it's OK to insert the details into the database
else {
  
  
  
$sql = "INSERT INTO postvacancy SET date='$date',day='$day', month_posted='$month_posted', job_desig='$job_desig',location='$location', job_sector='$job_sector',start_date='$start_date', salary='$salary',closing_date='$closing_date',work_experience='$work_experience',skill='$skill',job_description='$job_description', photoname='$file',filename ='$pathname'";
if ( @mysql_query($sql)) {
echo('<font color="yellow"><center><h3>You have successfully uploaded the Job Vacancy.</h3></center></font>');
}
 } 
 
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Control Page</title>
<link rel="stylesheet" type="text/css" href="stylevergepluse.css" />
<script type="text/javascript" src="js3/clockp.js"></script>
<script type="text/javascript" src="js3/clockh.js"></script> 
<script type="text/javascript" src="js3/jquery.min.js"></script>
<script type="text/javascript" src="js3/ddaccordion.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>

<script type="text/javascript" src="js3/jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	
</script>
<style type="text/css">
<!--
.style2 {
	font-size: 14;
	color: #FF0000;
}
.style4 {color: #FFFFFF; font-weight: bold; }
.style8 {
	color: #00FF00;
	font-weight: bold;
}
body {
	background-color: #FFFFFF;
}
.style10 {color: #000066}
.style11 {
	color: #000099;
	font-weight: bold;
}
.style12 {color: #0000FF}
.style16 {font-size: 12px; color: #000000;}
.style20 {font-size: 12px; color: #000000; font-weight: bold; }
.style21 {font-size: 18px}
.style22 {color: #000000}
.style23 {font-size: 12px; color: #FFFFFF; font-weight: bold; }
.style26 {font-family: Georgia, "Times New Roman", Times, serif;
	font-weight: bold;
}
.style27 {color: #FFFFFF}
.style28 {font-family: Verdana, Arial, Helvetica, sans-serif; }
-->
</style>
</head>
<body>
<div id="main_container">

  <div class="header">
    <div class="logo"></div>
    
    <div class="right_header style2"><span class="style8"><span class="style10">Welcome to Proven Ability's AdminSection</span> <span class="style10">|</span> </span></div>
     <a href="<?php echo $logoutAction ?>" >Logout</a>
    <div id="clock_a"></div>
    <span class="main_content"><span class="logo"><a href="#"></a></span></span><img src="../images/Logo.png" width="205" height="50" /></div>
    
    <div class="main_content">
      <div class="menu">
                    <ul>
                    <li><a class="current" href="index.php">Admin Home</a></li>
                    <li><a href="list.html"><!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
                        </ul>
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
                  
                        <ul>
                       
                            <ul>
                      
                        
                                <!--[if lte IE 6]><table><tr><td><![endif]-->
                                    <ul>
                                    </ul>
                        
                                <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                                </li>
                            </ul>
                        <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                        </li>
                        </ul>
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
                   
                        <ul>
                   
                        
                            <ul>
                             
                                    <ul>
                                    </ul>
                        
                                <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                                </li>
                            </ul>
                        <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                        </li>
                        </ul>
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
                    
                        <ul>
                      
					  
                      
                            <ul>
                           
                                    <ul>
                                    </ul>
                        
                                <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                                </li>
                            </ul>
                        <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                        </li>
                        </ul>
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
                  
              
                    <li><a href="<?php echo $logoutAction ?>">logout</a></li>
                    </ul>
      </div> 
                    
                    
                    
                    
    <div class="center_content">  
    
    
    
    <div class="left_content">
    
   		<div class="sidebar_search">
          <form>
              <a href="account_admin.php">
            <input type="text" name="" class="search_input" value="search keyword" onclick="this.value=''" />
            <input type="image" class="search_submit" src="images/search.png" />
              </a>
          </form>            
        </div>
    
        <div class="sidebarmenu">
            
                   <a href="" class="submenuheader menuitem" ><strong><img src="images/admin.jpeg" width="20" height="20" align="absmiddle" /> Manage Admin </strong></a>
                   <div class="submenu">
                    <ul>
                    <li><a href="account_admin.php"><img src="images/view.jpg" width="20" height="20" align="absmiddle" />View  Admin User Account </a></li>
                    <li><a href="createadmin.php"><img src="images/create.jpeg" width="20" height="20" align="absmiddle" />Create Admin User </a></li>
                    <li><a href="account_admin.php"><img src="images/delete2.jpg" width="20" height="20" align="absmiddle" />Delete Admin User Acount </a></li>
                  </ul>
          </div>
		  
		  
                <a href="" class="submenuheader menuitem"><strong><img src="images/admin.jpeg" width="20" height="20" align="absmiddle" /> Manage News  </strong></a>
                <div class="submenu">
                    <ul>
                    <li><a href="postnews.php"><img src="images/upload.jpg" width="20" height="20" align="absmiddle" />Upload News  </a></li>
                    <li><a href="managenews.php"><img src="images/view.jpg" width="20" height="20" align="absmiddle" />View Available News  </a></li>
                    <li><a href="managenews.php"><img src="images/edit.jpeg" width="20" height="20" align="absmiddle" />Edit News </a></li>
                    <li><a href="managenews.php"><img src="images/delete2.jpg" width="20" height="20" align="absmiddle" />Delete News </a></li>
                    </ul>
          </div>
				     
		  
		  
		  
                <a href="" class="submenuheader menuitem"><strong><img src="images/admin.jpeg" width="20" height="20" align="absmiddle" /> Manage Contacts  </strong></a>
                <div class="submenu">
                    <ul>
                    <li><a href="view_contact.php"><img src="images/view.jpg" width="20" height="20" align="absmiddle" />View Contacts  </a></li>
                    <li><a href="view_contact_delete.php"><img src="images/delete2.jpg" width="20" height="20" align="absmiddle" />Delete Contacts </a></li>
                    </ul>
          </div>  
		
		  
		        <a href="" class="submenuheader menuitem"><strong><img src="images/admin.jpeg" width="20" height="20" align="absmiddle" /> Manage CVs  </strong></a>
                <div class="submenu">
                    <ul>
                    <li><a href="view_cvs.php"><img src="images/view.jpg" width="20" height="20" align="absmiddle" />View CVs  </a></li>
                    <li><a href="cvs_delete.php"><img src="images/delete2.jpg" width="20" height="20" align="absmiddle" />Delete CVs </a></li>
                    </ul>
          </div>  
		  
		  
                <a href="" class="submenuheader menuitem"><strong><img src="images/admin.jpeg" width="20" height="20" align="absmiddle" /> Manage  Members</strong></a>
                <div class="submenu">
                    <ul>
			
					<li><a href="view_members.php"><img src="images/view.jpg" width="20" height="20" align="absmiddle" />View Registered Member   </a></li>
					
                    <li><a href="view_members.php"><img src="images/delete2.jpg" width="20" height="20" align="absmiddle" />Delete Member Companies  </a></li>
				
                    
                    </ul>
          </div>  
		  
		  
		       
			  <a href="" class="submenuheader menuitem"><strong><img src="images/admin.jpeg" width="20" height="20" align="absmiddle" /> Manage Vacancies </strong></a>
                  <div class="submenu">
                     <ul>
					    <li><a href="view_job_apply.php"><img src="images/upload.jpg" width="20" height="20" align="absmiddle" />View Job Applications  </a></li>
                    <li><a href="postvacancies.php"><img src="images/upload.jpg" width="20" height="20" align="absmiddle" />Upload Vacancies  </a></li>
                    <li><a href="managevacancies.php"><img src="images/view.jpg" width="20" height="20" align="absmiddle" />View Vacancies  </a></li>
                    <li><a href="managevacancies.php"><img src="images/edit.jpeg" width="20" height="20" align="absmiddle" />Edit Vacancies</a></li>
                    <li><a href="managevacancies.php"><img src="images/delete2.jpg" width="20" height="20" align="absmiddle" />Delete Vacancies </a></li>
                    </ul>
          </div>
				
				
					  <a href="" class="submenuheader menuitem"><strong><img src="images/admin.jpeg" width="20" height="20" align="absmiddle" /> Manage Newsletters  </strong></a>
                  <div class="submenu">
                    <ul>
		                 <li><a href="view_newsletters.php"><img src="images/view.jpg" width="20" height="20" align="absmiddle" />View all The Sent Newsletter  </a></li>
                   <li><a href="view_subscribers.php"><img src="images/view.jpg" width="20" height="20" align="absmiddle" />View Subscribers  </a></li>
				   <li><a href="sendmail.php"><img src="images/mail.jpg" width="20" height="20" align="absmiddle" />Send Bulk Mail  </a></li>
				   
                    <li><a href="view_subscribers_delete.php"><img src="images/delete2.jpg" width="20" height="20" align="absmiddle" />Delete Subscribers</a></li>
                    </ul>
          </div>
		  
		  
				
				
					  	  
	
		  
        </div>
            
            
               
    
    </div>  
    
    <div class="right_content">            
        
      <h2 align="center"><span class="style26">UPLOAD JOB VACANCY</span></h2>
      <center>
        <form action="" method="post" enctype="multipart/form-data" name="uploadImage" id="uploadImage">
          <p><a href="managevacancies.php">[Back To Manage vacancies]</a></p>
          <table width="600" border="1" align="center" cellpadding="4" cellspacing="0" bordercolor="#999999" bgcolor="#6699FF">
            <tr bgcolor="#EFEFEF">
              <td colspan="2" bordercolor="#000000" bgcolor="#66CCFF" class="style20"><div align="center" class="style21 style22">FILL THE JOB VACANCY DETAILS </div></td>
            </tr>
            <tr>
              <td width="256" bordercolor="#000000" bgcolor="#66CCFF" class="style16"><span class="style27"><strong>TODAY'S DATE</strong></span></td>
              <?php $today = date("l, F dS Y.");  ?>
              <td width="328" bordercolor="#000000" bgcolor="#66CCFF" class="style20"><input name="date" type="text" id="date" value ="<?php echo $today; ?>" size="40" /></td>
            </tr>
            <tr>
              <td bordercolor="#000000" bgcolor="#66CCFF" class="style23">JOB DESIGNATION </td>
              <td bordercolor="#000000" bgcolor="#66CCFF" class="style20"><span class="style27">
                <label>
                <input name="job_desig" type="text" id="job_desig" size="40" />
                </label>
              </span></td>
            </tr>
            <tr>
              <td bordercolor="#000000" bgcolor="#66CCFF" class="style23">LOCATION</td>
              <td bordercolor="#000000" bgcolor="#66CCFF" class="style27"><input name="location" type="text" id="location" size="40" /></td>
            </tr>
            <tr>
              <td bordercolor="#000000" bgcolor="#66CCFF" class="style23">JOB INDUSTRY </td>
              <td bordercolor="#000000" bgcolor="#66CCFF" class="style27"><span class="style28" style="color: #FFFFFF; font-weight: bold">
                <select name="job_sector" id="job_sector">
                  <option selected="selected" value="sector">-Select Job Sector- </option>
                  <option value="Acct">Accounting/Finance</option>
                  <option value="Administrative">Administrative</option>
                  <option value="Advert">Advertising</option>
                  <option value="Agric">Agriculture/Poultry/Fishing</option>
                  <option value="Airline">Airlines/Avionics/Aerospace</option>
                  <option value="Architecture">Architectural</option>
                  <option value="Automotive">Automotive</option>
                  <option value="Banking">Banking/Finance</option>
                  <option value="Biotech">Biotechnology</option>
                  <option value="Building Desgin">Building Design/Architecture</option>
                  <option value="Civil">Civil/Construction</option>
                  <option value="Cleared Jobs">Cleared Jobs</option>
                  <option value="Communications">Communications</option>
                  <option value="Computer">Computer/IT</option>
                  <option value="Construction">Construction</option>
                  <option value="Real Estate">Construction / Real Estate</option>
                  <option value="Consulting">Consulting</option>
                  <option value="biz strategy">Consulting/Business Strategy &amp; Planning</option>
                  <option value="Art design">Creatives/Art/Design</option>
                  <option value="Customer Service">Customer Service</option>
                  <option value="Ecommerce">Ecommerce/Internet</option>
                  <option value="Education">Education</option>
                  <option value="Engineering">Engineering</option>
                  <option value="Executive">Executive / Top Management</option>
                  <option value="FMCG">FMCG</option>
                  <option value="Food Services ">Food Services</option>
                  <option value="Govt">Government / Defence</option>
                  <option value="Health">Healthcare / Pharmaceutical</option>
                  <option value="Hospitality">Hospitality/Leisure</option>
                  <option value="Human Resources">Human Resources</option>
                  <option value="Insurance">Insurance</option>
                  <option value="Legal">Legal</option>
                  <option value="Logistics">Logistics / Transportation</option>
                  <option value="Mgt">Management</option>
                  <option value="Manufacturing">Manufacturing / Production</option>
                  <option value="Media">Media</option>
                  <option value="NGO">NGO</option>
                  <option value="Oil&amp;Gas">Oil&amp;Gas</option>
                  <option value="Power">Power/Energy</option>
                  <option value="Project Mgt">Project / Programme Management</option>
                  <option value="Research">Research</option>
                  <option value="Retail">Retail / Wholesales</option>
                  <option value="Sales">Sales/Business Development</option>
                  <option value="Trade">Trade / Services</option>
                  <option value="Travels">Travels/Tours</option>
                  <option value="Others">Others</option>
                </select>
              </span></td>
            </tr>
            <tr>
              <td bordercolor="#000000" bgcolor="#66CCFF" class="style23">START DATE </td>
              <td bordercolor="#000000" bgcolor="#66CCFF" class="style27"><input name="start_date" type="text" id="start_date" size="40" /></td>
            </tr>
            <tr>
              <td bordercolor="#000000" bgcolor="#66CCFF" class="style23">SALARY</td>
              <td bordercolor="#000000" bgcolor="#66CCFF" class="style27"><input name="salary" type="text" id="salary" size="40" /></td>
            </tr>
            <tr>
              <td bordercolor="#000000" bgcolor="#66CCFF" class="style23">CLOSING DATE </td>
              <td bordercolor="#000000" bgcolor="#66CCFF" class="style27"><input name="closing_date" type="text" id="closing_date" size="40" /></td>
            </tr>
            <tr>
              <td bordercolor="#000000" bgcolor="#66CCFF" class="style23">WORK EXPEREINCE </td>
              <td bordercolor="#000000" bgcolor="#66CCFF" class="style27"><input name="work_experience" type="text" id="work_experience" size="40" /></td>
            </tr>
            <tr>
              <td bordercolor="#000000" bgcolor="#66CCFF" class="style23">SKILLS REQUIRED </td>
              <td bordercolor="#000000" bgcolor="#66CCFF" class="style27"><input name="skill" type="text" id="skill" size="40" /></td>
            </tr>
            <tr>
              <td bordercolor="#000000" bgcolor="#66CCFF" class="style23">DESCRIPTIVE IMAGE </td>
              <td bordercolor="#000000" bgcolor="#66CCFF" class="style27"><input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_FILE_SIZE; ?>" />
                  <input type="file" name="image" id="image" /></td>
            </tr>
            <tr>
              <td bordercolor="#000000" bgcolor="#66CCFF" class="style23">BRIEF JOB DESCRIPTION </td>
              <td bordercolor="#000000" bgcolor="#66CCFF" class="style27"><label>
                <textarea name="job_description" cols="50" rows="5" id="job_description"></textarea>
              </label></td>
            </tr>
          </table>
          <p>
            <input type="submit" name="upload" id="upload" value="Upload" />
          </p>
        </form>
      </center>
      <p align="center"></p>
      </p>
<p>&nbsp;</p>
    <p>&nbsp;</p>
    </div>
    <!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
  </div> <!--end of main content-->
	
    
    <div class="">
    
    	<div class="">
    	  <div align="center"><span class="style11 style10">All Rights Reserved | &copy; Copyright 2014 <img src="../images/logo.png" width="70" height="25" /></span></div>
    	</div>
  </div>
</div>		
</body>
</html>