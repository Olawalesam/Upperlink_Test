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
 // Connect to the database server
  $dbcnx = @$proven;
  if (!$dbcnx) {
    exit('<p>Unable to connect to the ' .
        'database server at this time.</p>');
  }

 
  if (!@mysql_select_db($database_proven)) {
    exit('<p>Unable to locate the page ' .
        'database at this time.</p>');
  }


if (isset($_GET['action'])) {
  $action = $_GET['action'];
} else {
  $action = '';
}

if (($action == 'view' or $action == 'dnld') and isset($_GET['id'])) {
  $id = $_GET['id'];

  // User is retrieving a file
  $sql = "SELECT filename, mimetype, filedata
      FROM postjob WHERE id = '$id' ORDER BY id DESC";
  $result = @mysql_query($sql);
  if (!$result) {
    exit('Database error: ' . mysql_error());
  }
  
  $file = mysql_fetch_array($result);
  if (!$file) {
    exit('File with given id not found in database!');
  }
    
  $filename = $file['filename'];
  $mimetype = $file['mimetype'];
  $filedata = $file['filedata'];
  $disposition = 'inline';
  
  if ($action == 'dnld') {
    $disposition = 'attachment';
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 5') or
        strpos($_SERVER['HTTP_USER_AGENT'], 'Opera 7')) {
      $mimetype = 'application/x-download';
    }
  }
  
  header("content-disposition: $disposition; filename=$filename");
  header("content-type: $mimetype");
  header('content-length: ' . strlen($filedata));
    
  echo($filedata);
  exit();
  
} elseif ($action == 'del' and isset($_GET['id'])) {
  $id = $_GET['id'];
    
  // User is deleting a file
  $sql = "DELETE FROM postjob WHERE id = '$id'";
  $ok = @mysql_query($sql);
  if (!$ok) {
    exit('Database error: ' . mysql_error());
  }

  
}


//check if the starting row variable was passed in the URL or not
if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {
   //we give the value of the starting row to 0 because nothing was found in URL
   $startrow = 0;
//otherwise we take the value from the URL
} else {
   $startrow = (int)$_GET['startrow'];
 }


$sql = "SELECT * FROM postjob ORDER BY id DESC LIMIT $startrow, 10";
$filelist = @mysql_query($sql);
if (!$filelist) {
  exit('Database error: ' . mysql_error());
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
.style1 {	color: #FF0000;
	font-weight: bold;
}
.style26 {color: #FFFFFF}
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
        
      <h2 align="center">View Job Applications </h2>
      <table  border="1" align="center">
        <?php 
		  //check if the starting row variable was passed in the URL or not
if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {
   //we give the value of the starting row to 0 because nothing was found in URL
   $startrow = 0;
//otherwise we take the value from the URL
} else {
   $startrow = (int)$_GET['startrow'];
 }
 ?>
        <tr>
          <td  bgcolor="#66CCFF"><div align="center"><span class="style20">
              <?PHP
 $prev = $startrow - 10;

//only print a "Previous" link if a "Next" was clicked
if ($prev >= 0)
     echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.$prev.'">  <img src="../images/prev.jpg">  </a>' ;
?>
          </span></div></td>
          <td  bgcolor="#66CCFF"><div align="center"><span class="style20">
              <?PHP
//now this is the link..
echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.($startrow+10).'"> <img src="../images/next.jpg"> </a>';  
?>
          </span></div></td>
        </tr>
      </table>
      <br/>
      <center>
        <table width="606" border="2" bordercolor="#000000">
          <tr>
            <th width="61" bgcolor="#6699CC"><span class="style26">Date Uploaded </span></th>
            <th width="52" bgcolor="#6699CC"><span class="style26">Address</span></th>
            <th width="46" bgcolor="#6699CC"><span class="style26">Email</span></th>
            <th width="61" bgcolor="#6699CC"><span class="style26">Phone</span></th>
            <th width="61" bgcolor="#6699CC"><span class="style26">Job Title</span></th>
            <th width="91" bgcolor="#6699CC"><span class="style26">Click To View/Open </span></th>
          </tr>
          <?php

if (mysql_num_rows($filelist) > 0) {
  while ($f = mysql_fetch_array($filelist)) {
    ?>
          <tr valign="top" bgcolor="#CCCCCC">
            <td bgcolor="#66CCFF"><?php echo $f['date']; ?> </td>
            <td bgcolor="#66CCFF"><?php echo $f['address']; ?> </td>
            <td bgcolor="#66CCFF"><?php echo $f['email']; ?> </td>
            <td bgcolor="#66CCFF"><?php echo $f['phone']; ?> </td>
            <td bgcolor="#66CCFF"><?php echo $f['job_title']; ?> </td>
            <td bgcolor="#66CCFF"><a href="<?php echo  $f['filename']; ?>"> view/download CV</a> </td>
          </tr>
          <?php
  }
} else {
  ?>
          <tr bgcolor="#000000">
            <td><span class="style1">No Files!</span></td>
          </tr>
          <?php
}
?>
        </table>
      </center>
      <br/>
      <table  border="1" align="center">
        <tr>
          <td  bgcolor="#66CCFF"><div align="center"><span class="style20">
              <?PHP
 $prev = $startrow - 10;

//only print a "Previous" link if a "Next" was clicked
if ($prev >= 0)
     echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.$prev.'"> <img src="../images/prev.jpg">  </a>' ;
?>
          </span></div></td>
          <td  bgcolor="#66CCFF"><div align="center"><span class="style20">
              <?PHP
//now this is the link..
echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.($startrow+10).'"> <img src="../images/next.jpg"> </a>';  
?>
          </span></div></td>
        </tr>
      </table>
      </p>
      <form action="upload_file.php" method="post"
 enctype="multipart/form-data">
      </form>
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