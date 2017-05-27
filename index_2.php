<?php require_once('Connections/adio.php'); ?>
<!DOCTYPE html>
<html class="no-js">
<head>

<style type="text/css">

#marqueecontainer{
position:relative;
width: 200px; /*marquee width */
height: 200px; /*marquee height */
background-color: #CCCCFF;
overflow: hidden;
border: 0px solid black;
padding: 2px;
padding-left: 4px;
}

</style>


<script type="text/javascript">

/***********************************************
* Cross browser Marquee II- © Dynamic Drive (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/

var delayb4scroll=2000 //Specify initial delay before marquee starts to scroll on page (2000=2 seconds)
var marqueespeed=2 //Specify marquee scroll speed (larger is faster 1-10)
var pauseit=1 //Pause marquee onMousever (0=no. 1=yes)?

////NO NEED TO EDIT BELOW THIS LINE////////////

var copyspeed=marqueespeed
var pausespeed=(pauseit==0)? copyspeed: 0
var actualheight=''

function scrollmarquee(){
if (parseInt(cross_marquee.style.top)>(actualheight*(-1)+8))
cross_marquee.style.top=parseInt(cross_marquee.style.top)-copyspeed+"px"
else
cross_marquee.style.top=parseInt(marqueeheight)+8+"px"
}

function initializemarquee(){
cross_marquee=document.getElementById("vmarquee")
cross_marquee.style.top=0
marqueeheight=document.getElementById("marqueecontainer").offsetHeight
actualheight=cross_marquee.offsetHeight
if (window.opera || navigator.userAgent.indexOf("Netscape/7")!=-1){ //if Opera or Netscape 7x, add scrollbars to scroll and exit
cross_marquee.style.height=marqueeheight+"px"
cross_marquee.style.overflow="scroll"
return
}
setTimeout('lefttime=setInterval("scrollmarquee()",30)', delayb4scroll)
}

if (window.addEventListener)
window.addEventListener("load", initializemarquee, false)
else if (window.attachEvent)
window.attachEvent("onload", initializemarquee)
else if (document.getElementById)
window.onload=initializemarquee


</script>


<title>Proven Ability Job Portal</title>
 <link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/1/js-image-slider.js" type="text/javascript"></script>
    <link href="generic.css" rel="stylesheet" type="text/css" />
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:300,400,700&amp;subset=latin,latin-ext"/>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome-ie7.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/style_subscribe.css"/>
<link rel="stylesheet" type="text/css" href="css/jquery.combosex.css"/>
<link rel="stylesheet" type="text/css" href="css/jquery.flexslider.css"/>
<link rel="stylesheet" type="text/css" href="css/jquery.scrollbar.css"/>

<!--[if (lte IE 9)]>
    <link rel="stylesheet" type="text/css" href="css/iefix.css"/>
    <![endif]-->
<script type="text/javascript" src="js/jquery.1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.1.7.2.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="js/jquery.combosex.min.js"></script>
<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/jquery.easytabs.min.js"></script>
<script type="text/javascript" src="js/jquery.gmap.min.js"></script>
<script type="text/javascript" src="js/jquery.scrollbar.min.js"></script>
<script type="text/javascript" src="js/jQuery.menutron.js"></script>
<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

<style type="text/css">
<!--
.style1 {color: #000000}
.style2 {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-weight: bold;
}
.style3 {font-family: Georgia, "Times New Roman", Times, serif}
.style4 {color: #000000; font-family: Georgia, "Times New Roman", Times, serif; }
.style5 {
	color: #000000;
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 24px;
	font-weight: bold;
}
.style6 {
	font-size: 18px;
	font-weight: bold;
}
.style7 {font-size: 13px}
#marqueecontainer {position:relative;
width: 290px; /*marquee width */
height: 200px; /*marquee height */
background-color: #F7F7F7;
overflow: hidden;
border: 0px solid black;
padding: 2px;
padding-left: 4px;
}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
</head>
<body>

<!-- Bar -->
<div id="bar">
  <div class="inner"> 
    
    <!-- Language Menu -->
    <ul id="lang-menu">
      <li id="en" class="current">En</li>
      
    </ul>
    <!-- /Language Menu --> 
    
    <!-- User Menu -->
    <ul id="user-menu">
      <li id="login" class="first"><a href="login.php">Login</a></li>
      <li id="register"><a href="register.php">Register</a></li>
      
    </ul>
    <!-- /User Menu --> 
    
  </div>
</div>
<!-- /Bar --> 

<!-- Header -->
<div id="header">
  <div class="inner"> 
    
    <!-- Logo -->
    <div id="logo"> <a href="index.php"><img src="images/Logo.png" width="205" height="50"  alt="logo"/></a><a class="menu-hider"></a></div>
    <!-- /Logo -->
    
    <ul id="navigation">
      <li class="current"> <a href="index.php">Home</a></li>
      <li class="first expanded"><a href="jobs.html">Jobs</a>
        <ul class="submenu">
          <li><a href="jobs.php">Job listing</a></li>
          <li><a href="job.php">Job Details</a></li>
        </ul>
      </li>
      <li class="first expanded"><a href="#">Services</a>
        <ul class="submenu">
          <li><a href="outsourcing.html">Outsourcing</a></li>
          <li><a href="humanresource.html">Human Resource Consultancy</a></li>
<li><a href="humancapital.html">Human capital Development</a></li>
        </ul>
      </li>
      <li><a href="about-us.html">About Us</a></li>
      <li><a href="contact.php">Contact Us</a></li>
    </ul>
  </div>
</div>
<!-- /Header --> 

<!-- Search -->
<div id="search">
  <div class="inner">
    <div id="more-options"></div>
    <div class="clear"></div>
    <!-- Clear Line -->
    
    <div id="options"></div>
  </div>
</div>
<!-- /Search --> 

<!-- Content -->
<div id="content"> 
  
  <!-- Banner Area -->
  <section class="header-banner"> 
    <div class="inner">
        <!-- Panel 3 -->
      <div id="login-panel">
        <div id="sliderFrame">
          
          <div id="slider">  <img src="images/image-slider-1.jpg" alt="Welcome To Proven Ability" /> </a> <img src="images/image-slider-2.jpg" /> <img src="images/image-slider-3.jpg"  /> <img src="images/image-slider-4.jpg"  />  </div>
          <div id="htmlcaption" style="display: none;">  </div>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </div>
        <!-- /Panel 3 --> 
    </div>
  </section>
  <!-- /Banner Area -->  
  <div class="clear"></div>
  
  <div class="inner"> 
    <!-- Content Inner -->
    <div class="content-inner"> 
      
      <!-- Content Center -->
      <div class="content-center frontpage">
        <div class="clear">
          <p align="justify"><img src="images/3799106988_b8f0d001f4_m.jpg" width="188" height="240" align="left"><span class="style1"><span class="style2">Adio Consultancy Group </span></span> <span class="style4">is reputable company with</span><span class="style3 style1"> dedicated team of professionals with  proven performance track record. We bring our wealth of experience into  providing business solutions to problems associated with human resources in the  work place. We have the experience and vision of being the best in human  resource consultancy and outsourcing. Also we are licensed by the Federal  Ministry of Labor and Productivity and a member of Human Capital Providers  Association of Nigeria (HUCAPAN).</span></p>
          <p align="justify"><span class="style1"><span class="style2">Adio Consultancy Group </span></span> <span class="style4">is recruiting for the post of Software Quality Assurance Officer. Interested and qualified applicant can apply here</span><br> 
            <a href="about-us.html" target="_blank"><img src="images/more.png" width="100" height="20" align="right"></a></p>
          <p align="left">&nbsp;</p>
         <form name="form1" method="post" action="scripts/process_subscribe.php">
		  <table width="620" border="2" cellpadding="0" cellspacing="0" bordercolor="#FF0000">
		  
            <tr>
              <td colspan="3"><span class="style6">Newsletter </span></td>
            </tr>
            <tr>
              <td colspan="3"><font color="#999999" class="fontfooter style7">Leave your Name and Email Address with us and we will keep you up to date with 
              the latest  News and Offers</font></td>
            </tr>
            <tr>
              <td><input name="fullname" type="text" id="fullname" size="25" value="Your Name" onFocus="if(this.value=='Your Name'){this.value=''};" onBlur="if(this.value==''){this.value='Your Name'};">                       </td>
              <td><input name="email" type="text" id="email" value="Your Email" onFocus="if(this.value=='Your Email'){this.value=''};" onBlur="if(this.value==''){this.value='Your Email'};"></td>
              <td><input name="submit" type="submit" id="submit"  value="Submit"></td>
            </tr>
          </table>
	      </form>   
          <p align="left">&nbsp;</p>
        </div>
        <!--Latest Jobs Block-->
        <!--/Latest Jobs Block-->
<div class="clear"></div>
        <!--Partners Block-->
        <!--Partners Block-->
<div class="clear"></div>
        <!--Price Table Block-->
        <!--Price Table Block-->
      </div>
      <!-- /Content Center --> 
      
      <!-- Content Right -->
      <div class="content-right">
        <div id="social-like" class="block background">
          <h2 class="title-1">Share Us With Your Friends</h2>
          <div class="block-content">
            <div class="social-like linkedin"><a class="like-button" href="#">LinkedIn</a></div>
            <div class="social-like facebook"><a class="like-button" href="#">Facebook</a></div>
            <div class="social-like twitter"><a class="like-button" href="#">Twitter</a></div>
          </div>
        </div>
        <div id="advertising" class="block border">
          <div class="block-content">
            <!-- <div class="advertising-test">300x250<br/>
              Ad Banner</div>-->
            <p align="center" class="style5">Latest News</p>
            <div id="marqueecontainer" onMouseover="copyspeed=pausespeed" onMouseout="copyspeed=marqueespeed">
              <div id="vmarquee" style="position: absolute; width: 228px; left: 12px; top: 21px; height: 30px;">
                <!--YOUR SCROLL CONTENT HERE-->
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




$queryname= "SELECT * FROM postnews ORDER BY id DESC";
$info = @mysql_query($queryname);
if (!$info) {
 // echo '</table>';
  exit('<p>Error retrieving news from database!<br />'.
      'Error: ' . mysql_error() . '</p>');
}

while ($inf = mysql_fetch_array($info)) {
  
  $news_id = $inf['id'];
  
  echo'<ul>'.'<li>'.'<a href="news.php?id='; ?> <?php echo $news_id . '">'. '-- '.  $inf['title']  . '<br/> <br/>'.'</a>'.'</li>'.'</ul>';
  
}


?>
                <!--YOUR SCROLL CONTENT HERE-->
              </div>
            </div>
            <p align="center" class="style5">&nbsp;</p>
          </div>
        </div>
      </div>
      <!-- /Content Right -->
      
      <div class="clear"></div>
      <!-- Clear Line --> 
      
    </div>
  </div>
</div>
<!-- /Content --> 

<!-- Footer -->
<div id="footer">
  <section class="row-fluid">
    <div id="stories" class="block border">
      <div class="inner">
        <section class="row-fluid"></section>
      </div>
    </div>
    <section class="footer-wrapper">
      <section class="row-fluid">
        <section class="inner">
          <div id="site-description">
            <h3><img src="images/Logo.png" width="205" height="50"  alt=""/></h3>
            <p>Proven  Ability Nigeria Ltd is a  top notch Human Resource Service provider that specializes in classical  outsourcing, Human Resource Consultancy and Human Capital Development .</p>
          </div>
          <div id="footer-menu">
            <div id="nav-menu" class="footer-menu">
              <h2 align="center">Navigation</h2>
              <div class="left">
                <ul>
                  <li><a href="index.html">Home</a></li>
                  <li><a href="job-listing-1.html">Jobs</a></li>
                  <li><a href="partners.html">Partners</a></li>
                  <li><a href="about-us.html">About Us</a></li>
                </ul>
              </div>
              <div class="right">
                <ul>
                  <li><a href="contacts.html">Contact Us</a></li>
                  <li><a href="terms-and-conditions.html">Terms &amp; Conditions</a></li>
                  <li><a href="privacy-policy.html">Privacy Policy</a></li>
                </ul>
              </div>
            </div>
            <div id="fol-menu" class="footer-menu">
              <h2>Follow Us</h2>
              <ul><li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Youtube</a></li>
              </ul>
            </div>
          </div>
        </section>
      </section>
    </section>
  </section>
</div>
<!-- /Footer -->
<div class="clearfix"></div>
<!-- Copyright -->
<div id="copyright">
  <div class="inner">
    <div class="row-fluid"> 
      <!-- Copyright Text -->
      <div id="copyright-text">Copyright 2014 <a href="http://uouapps.com/careers">Proven Ability Nig LTD </a> | </div>
      <!-- /Copyright Text --> 
      <!-- Copyright Social Link -->
      <div id="copyright-link">
        <div class="buttons">
          <ul class="top_soical_icons pull-right	">
            <li> <a href="#"> <i class="fa fa-facebook"></i> </a> </li>
            <li> <a href="#"> <i class="fa fa-google-plus"></i> </a> </li>
            <li> <a href="#"> <i class="fa fa-twitter"></i> </a> </li>
            <li> <a href="#"> <i class="fa fa-linkedin-square"></i> </a> </li>
            <li> <a href="#"> <i class="fa fa-pinterest"></i> </a> </li>
            <li> <a href="#"> <i class="fa fa-dribbble"></i> </a> </li>
          </ul>
        </div>
      </div>
      <!-- /Copyright Social Link --> 
      
      <a class="scrollTop" href="#header" style="display: none;">
      <div id = "up_container"> <span></span> </div>
      </a> </div>
  </div>
</div>
<!-- /Copyright -->

</body>
</html>