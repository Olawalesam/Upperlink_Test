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
        
      <h2 align="center">Manage News Section </h2>
      <p align="center"><a href="postnews.php">Click Here To Upload News/Events</a></p>
      <p align="center">View the Current News/Events Below: </p>
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
          <td  bgcolor="#FFFFFF"><div align="center"><span class="style20">
              <?PHP
 $prev = $startrow - 3;

//only print a "Previous" link if a "Next" was clicked
if ($prev >= 0)
     echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.$prev.'">   <img src="images/prev.jpg"> </a>' ;
?>
          </span></div></td>
          <td  bgcolor="#FFFFFF"><div align="center"><span class="style20">
              <?PHP
//now this is the link..
echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.($startrow+3).'"> <img src="images/next.jpg"> </a>';  
?>
          </span></div></td>
        </tr>
      </table>
      <br />
      <table width="590" height="23" border="1" align="center">
        <tr>
          <td width="210" bgcolor="#0099FF"><div align="center"><span class="style20">Cover Image For News </span></div></td>
          <td width="140" bgcolor="#0099FF"><div align="center"><span class="style20">Date Posted </span></div></td>
          <td width="170" bgcolor="#0099FF"><div align="center"><span class="style20">Title (News Headlines) </span></div></td>
          <td width="65" bgcolor="#0099FF"><div align="center"><span class="style20">Edit</span></div></td>
          <td width="91" bgcolor="#0099FF"><div align="center"><span class="style20">Delete</span></div></td>
        </tr>
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


//check if the starting row variable was passed in the URL or not
if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {
   //we give the value of the starting row to 0 because nothing was found in URL
   $startrow = 0;
//otherwise we take the value from the URL
} else {
   $startrow = (int)$_GET['startrow'];
 }


//$id = $_GET['id'];
$pages = @mysql_query(
    "SELECT * FROM postnews ORDER BY id DESC LIMIT $startrow,5");
if (!$pages) {
  exit('Unable to load the page from the database.');
}
if (mysql_num_rows($pages) < 1) {
  exit('<font color="red" size="3"><b>No news at the moment. </b></font>');
}

while ($row = mysql_fetch_array($pages)) {


//$row = mysql_fetch_array($pages);
$id=$row['id'] ;
$title=$row['title'] ;
$date=$row['date'] ;
$storycontent=$row['storycontent'] ;
$photoname=$row['photoname'] ;
$filename=$row['filename'] ;


if($photoname){
  echo '<tr ><td align=center>'. '<img src='. '"'.$filename . '"' .'height=100 width=100> </td>';
   echo( '<td>' . $date . '</td>');
 echo( '<td>' . $title . '</td>');
 echo( '<td><a href= ' . '"' . 'edit_news.php?id='. $id . '"' . '>Edit</a></td>');
 echo( '<td><a href='. '"' . 'delete_news.php?id=' . $id . '"'.  'onclick=' .'"' ."return confirm('Delete this News?')" .';'.'"'. '>Delete</a></td></tr>');

  }
  
    else{
 echo( '<center><tr><td align=center ><img src=' . '"'. 'images/unavail.png' . '"' . ' height=50 width=50> </td>');
  echo( '<td>' . $date . '</td>');
 echo( '<td>' . $title . '</td>');
 echo( '<td><a href= ' . '"' . 'edit_news.php?id='. $id . '"' . '>Edit</a></td>');
 echo( '<td><a href='. '"' . 'delete_news.php?id=' . $id . '"'.  'onclick=' .'"' ."return confirm('Delete this News?')" .';'.'"'. '>Delete</a></td></tr>');

}
  


}// closes the while on line 124

?>
      </table>
      </p>
      <br />
      <table  border="1" align="center">
        <tr>
          <td  bgcolor="#FFFFFF"><div align="center"><span class="style20">
              <?PHP
 $prev = $startrow - 5;

//only print a "Previous" link if a "Next" was clicked
if ($prev >= 0)
     echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.$prev.'">  <img src="images/prev.jpg"> </a>' ;
?>
          </span></div></td>
          <td  bgcolor="#FFFFFF"><div align="center"><span class="style20">
              <?PHP
//now this is the link..
echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.($startrow+5).'"> <img src="images/next.jpg"> </a>';  
?>
          </span></div></td>
        </tr>
      </table>
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