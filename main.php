<?php require_once('Connections/adio.php'); ?>
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
  $_SESSION['MM_Username_admin'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username_admin']);
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
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username_admin set equal to their username. 
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

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Username_admin'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username_admin'], $_SESSION['MM_UserGroup'])))) {   
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
<!DOCTYPE html>
<html lang="en">
  <head>
  		

  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Adio Group</title>


<!--

              <script type="text/javascript">
$(document).ready(function() { 
  var options = { 
      target:   '#output',   // target element(s) to be updated with server response 
      beforeSubmit:  beforeSubmit,  // pre-submit callback 
      success:       afterSuccess,  // post-submit callback 
      uploadProgress: OnProgress, //upload progress callback 
      resetForm: true        // reset the form after successful submit 
    }; 
    
   $('#MyUploadForm').submit(function() { 
      $(this).ajaxSubmit(options);        
      // always return false to prevent standard browser submit and page navigation 
      return false; 
    }); 
    

//function after succesful file upload (when server response)
function afterSuccess()
{
  $('#submit-btn').show(); //hide submit button
  $('#loading-img').hide(); //hide submit button
  $('#progressbox').delay( 1000 ).fadeOut(); //hide progress bar

}

//function to check file size before uploading.
function beforeSubmit(){
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
  {
    
    if( !$('#FileInput').val()) //check empty input filed
    {
      $("#output").html("Are you kidding me?");
      return false
    }
    
    var fsize = $('#FileInput')[0].files[0].size; //get file size
    var ftype = $('#FileInput')[0].files[0].type; // get file type
    

    //allow file types 
    switch(ftype)
        {
            case 'image/png': 
      case 'image/gif': 
      case 'image/jpeg': 
      case 'image/pjpeg':
      case 'text/plain':
      case 'text/html':
      case 'application/x-zip-compressed':
      case 'application/pdf':
      case 'application/msword':
      case 'application/vnd.ms-excel':
      case 'video/mp4':
                break;
            default:
                $("#output").html("<b>"+ftype+"</b> Unsupported file type!");
        return false
        }



            //Allowed file size is less than 5 MB (1048576)
    if(fsize>5242880) 
    {
      $("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big file! <br />File is too big, it should be less than 5 MB.");
      return false
    }
        
    $('#submit-btn').hide(); //hide submit button
    $('#loading-img').show(); //hide submit button
    $("#output").html("");  
  }
  else
  {
    //Output error to older unsupported browsers that doesn't support HTML5 File API
    $("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
    return false;
  }
}

//progress bar function
function OnProgress(event, position, total, percentComplete)
{
    //Progress bar
  $('#progressbox').show();
    $('#progressbar').width(percentComplete + '%') //update progressbar percent complete
    $('#statustxt').html(percentComplete + '%'); //update status text
    if(percentComplete>50)
        {
            $('#statustxt').css('color','#000'); //change status text to white after 50%
        }
}

//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

}); 



             
              <!-- Latest compiled and minified CSS -->
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

          <!-- Optional theme -->
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">



<!--

<script type="text/javascript">
      jQuery(document).ready(function($) {
        $(".scroll").click(function(event){   
          event.preventDefault();
          $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
        });
      });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        
        var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
        };
        
    $().UItoTop({ easingType: 'easeOutQuart' });



-->






          <!-- Latest compiled and minified JavaScript -->
                      <style type="text/css">
                       body { background-color: #e9caca; 

                       }

                      .navbar {

                            background: #002E6E;
                            color: white;
                            border: none;
                            margin-bottom: 0px;


                      }  




                      .navbar-default .navbar-nav>li>a {

                                  color: #ffe8e8;


                      }

                      .navbar .navbar-nav {

                              display: inline-block;
                              float: none;
                              vertical-align: top;
                      }

                      .navbar .navbar-collapse {
                                        text-align: center;

                      } 


                    form{

                        background: #002E6E;
                        padding: 40px;
                        -webkit-box-shadow:9px 15px 39px -9px rgba(0, 0, 0, 75);
                        -moz-box-shadow: 9px 15px 39px -9px rgba(0, 0, 0, 75);
                        box-shadow:9px 15px 39px -9px rgba(0, 0, 0, 75);
                        color: white;

                    }


               .nav-tabs {

                        margin-left: auto;
                        border-bottom: 1px solid #ddd;
                        margin-right: auto;
                        display: table;
                        margin-bottom: 20px;
                        margin-top: 20px;

               }


              .nav-tabs>li>a {

                        border-radius:0;
                        background: #002E6E;
                        color: white;

              }

               .nav-tabs>li>a:hover {

                        border-radius:0;
                        background: #002E6E;
                        color: white;

              }

                      .style1 {
	color: #0000FF;
	font-weight: bold;
}
                      .style2 {color: #FF0000}
                      </style>

              


	<script type="text/javascript">
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("photo").files[0]);

  oFReader.onload = function(oFREvent) {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
  };

</script>

         

   
  </head>
  <body>

       

      
            <nav class="navbar navbar-default">
                  <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="#"><img src="images/logo.png"></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                 <div class="panel-heading">

                <p> ADIO CONSULTANCY GROUP APPLICATION FORM <br> 4, Assbifi House , Assbifi Road, Alausa CBD, Ikeja, Lagos.</p> <div class="form-group"> 


                 </div>

                
                



                    </div><!-- /.navbar-collapse -->
                  </div>
                    <div align="center">
  <!-- /.container-fluid --> 
  </nav>
                      
                      
                      
                      
                      
                      
                      
                      
                      <div class="row">
                      
                      <center><font color="blue"> Welcome <?php echo $_SESSION['MM_Username_admin'] . '!'; ?></font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="signedout.php">[Log out] 
                      </a>
                      </center>
  </div>
        <h3 class="style1" style="text-align: center;">Application Form</h3>
    <div class="col-sm-offset-3 col-sm-6">

            <!-- Nav tabs -->
            <!-- Tab panes -->
<div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="home">
                

<?php

	
//checks if the form has been submitted	
	  
if (isset($_POST['submit'])):
	  
	  
$dbcnx = @$adio;
if (!$dbcnx) {
die( '<p>Unable to connect to the ' .
'database server at this time.</p>' );
}
// Select the obverify database
if (! @mysql_select_db($database_adio) ) {
die( '<p>Unable to locate the  ' .
'database at this time.</p>' );
}


$operator_name = $_SESSION['MM_Username_admin'];

$today = date("l, F dS Y.");

$bank = $_POST['firstname'];
$bank= mysql_real_escape_string($bank);

$cust_id = $_POST['surname'];
$cust_id= mysql_real_escape_string($cust_id);

$phonenumbers = $_POST['phone_no'];
$phonenumbers = mysql_real_escape_string($phonenumbers);

$email = $_POST['email'];
$email = mysql_real_escape_string($email);
  


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Test for New Photograph Upload script
 
  
    if(isset($_FILES['image']))
	{
      $errors= array();
      $file_name = $_FILES['image']['name'];
	  
	  
	   $photo_file_name = str_replace(' ', '_', $_FILES['image']['name']); //shewen added this
	   $photo_path_name = "images/photo/" .  $photo_file_name; //shewen added this
	  
      $file_size =$_FILES['image']['size'];
	  
	// $img_size = getimagesize($file_name);
	  
	 // echo $file_size . '<br/>';
	  
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG file.";
      }
      
      if($file_size > 2097152){
         echo 'File size must be excately 2 MB';
		 
		 exit;
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/photo/".$file_name);
        // echo "Success";
      }else{
         print_r($errors);
      }
   }
 
 

  
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
	if (!$position){ 
echo("<font color=red><strong>Error:</strong>Please Enter Position</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;} 
  
    if (!$surname){ 
echo("<font color=red><strong>Error:</strong>Please Enter your Surname</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}

if (!$phonenumbers){ 
echo("<font color=red><strong>Error:</strong>Please Enter your Phone Numbers</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}


if (!$email){ 
echo("<font color=red><strong>Error:</strong>Please Enter your E-mail</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}

	
		
	 
	 
	 
	 // check for duplicate username
$checkDuplicate = "SELECT fname FROM register
WHERE cust_id = '$cust_id' AND  fname= '$fname'";

$result = mysql_query($checkDuplicate) or die(mysql_error());
$numRows = mysql_num_rows($result);

// if $numRows is positive, the username is already in use
if ($number_of_Rows_formatted) {
echo '<font color="red">' ."Application closed!" . '</font>'. '<br/><a href="javascript:history.go(-1);">Back </a>';
}
			

// otherwise, it's OK to insert the details into the database
else {
	 
	 
$sql ="INSERT INTO candidate_form SET date='$today_date', firstname='$firstname', surnames='$surname', phonenumbers='$phonenumbers', email='$email', location='$location', photoname='$file', filename ='$pathname' ";
  if (@mysql_query($sql)) {
    echo '<center>' . '<p><font color="blue" size="+3">Dear Applicant, Your application was submitted successfully. </font></a>' . '</center>';


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
    echo '<p>Error Submitting Address Verification Details: ' .
         mysql_error() . '</p>';
  }


}

?>


<?php else: // Allow the user to fill the form ?> 
                
                
                



              <div role="tabpanel" class="tab-pane" id="profile">

                      <form class="" method="POST" action="main.php" enctype="multipart/form-data">
          
          
          

                     <div class="form-group">
                       <label class="control-label" align="center"><strong>APPLICANT INFORMATION:</strong> </label>
                     </div>
                     
                     
                     
                     <?php $today = date("l, F dS Y.");  ?>
                  <div class="form-group">
                      <label class="control-label">Today's Date</label>
                      <input name="date" type="text" class="form-control" id="date"  value ="<?php echo $today; ?>" size="40" readonly />
            </div>
                    
                   <div class="form-group">
                      <label class="control-label">First Name:</label>
                      <input name="firstname" type="firstname" class="form-control" id="firstname" placeholder="FirstName">
                    </div>
					
					<div class="form-group">
                      <label class="control-label">Phone Number:</label>
                      <input name="phone_no" type="phone_no" class="form-control" id="phone_no" placeholder="Phone Number">
                    </div>
					
					<div class="form-group">
                      <label class="control-label">E-mail:</label>
                      <input name="email" type="email" class="form-control" id="email" placeholder="E-mail">
                    </div>
					


           
<br/><br/>

                    <div class="form-group">
                      <label for="exampleInputFile">Upload Your Passport (<span class="style2">**</span>Photograph in jpg only)</label>
                     
                      
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

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>