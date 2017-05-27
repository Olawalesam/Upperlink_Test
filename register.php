<?php require_once('Connections/ngr.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">



	<script type="text/javascript">
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("photo").files[0]);

  oFReader.onload = function(oFREvent) {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
  };

</script>

	


		<!-- Website CSS style -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<link rel="stylesheet" href="style2.css">
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

		<title>Register</title>
	    <style type="text/css">
<!--
.style2 {
	color: #FFFFFF;
	font-size: 10px;
}
-->
        </style>
</head>
	<body>
		<div class="container">
			<div class="row main">
				<div class="main-login main-center">
				<h5 align="center"><a href="http://www.ngrfunds.com">[Back to Home page]</a><br>
				  <br>
				  <img src="images/logo.png" width="52" height="58"><br>
				  <br>
				  
				  
								<?php
	
//checks if the form has been submitted	
	  
if (isset($_POST['register'])):
	  
	  
$dbcnx = @$ngr;
if (!$dbcnx) {
die( '<p>Unable to connect to the ' .
'database server at this time.</p>' );
}
// Select the ngr database
if (! @mysql_select_db($database_ngr) ) {
die( '<p>Unable to locate the  ' .
'database at this time.</p>' );
}

$today = date("l, F dS Y.");



$fname = $_POST['fname'];
$fname= mysql_real_escape_string($fname);

$email = $_POST['email'];
$email= mysql_real_escape_string($email);


// Avoid Duplication of Email

$sql_check2="select * from register where email LIKE '%$email%'";
$result_check2 = mysql_query($sql_check2) or die(mysql_error());
$rows_check2=mysql_num_rows($result_check2);

if($rows_check2 >= 1)
{

echo ' <font color="red">' . 'Error: ' .   " Duplicate Registration Entry. Check the Email supplied</font>". '<br/>' . '<a href="register.php">Back</a>';

exit;
}


////////////////////////////////////////////////////////////////////////////////////////////////////

$phone = $_POST['phone'];
$phone= mysql_real_escape_string($phone);



$bname = $_POST['bname'];
$bname= mysql_real_escape_string($bname);



$accountname = $_POST['accountname'];
$accountname= mysql_real_escape_string($accountname);


$acctno = $_POST['acctno'];
$acctno= mysql_real_escape_string($acctno);

//if nobody referred the visitor, save it as DIRECT REGISTRATION 
if($_POST['ref_code'] == '')
{

$ref_code ="DIRECT REGISTRATION" ;
$upline = 'NONE';

}




if(isset($_POST['ref_code']) AND $_POST['ref_code'] !='')
{

$ref_code = $_POST['ref_code'];
$ref_code= mysql_real_escape_string($ref_code);

}



// Check if Referral Code exists

$sql_check1="select * from register where referral_code='$ref_code'";
$result_check1 = mysql_query($sql_check1) or die(mysql_error());
$rows_check1=mysql_num_rows($result_check1);

$profile = mysql_fetch_array($result_check1);



//Retrieve the Upliner if the referral code exists
if($rows_check1 == 1)
{

//$ref_code = $profile['referral_code'];
$upline = $profile['fname'];

}

//Flag error if the referral code does not exist
if($rows_check1 == 0 AND $ref_code !='DIRECT REGISTRATION')
{

echo ' <font color="red">' . 'Error: ' .   " Referral Code Supplied does not exist in our database</font>". '<br/>' . '<a href="register.php">Back</a>';

exit;
}


////////////////////////////////////////////////////////////////////////////////////////////////////




$password = $_POST['password'];
$password= mysql_real_escape_string($password);

$confirmpassword = $_POST['confirmpassword'];
$confirmpassword= mysql_real_escape_string($confirmpassword);



   if (!$fname){ 
echo("<font color=red><strong>Error:</strong>Please type Your Full Name</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;} 

      		if ($bname == 'select'){ 
echo("<font color=red><strong>Error:</strong>Please select Bank Name </font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}



   if (!$email){ 
echo("<font color=red><strong>Error:</strong>Email can't be blank</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;} 



   
    if ($email != '')
 {
 
function is_valid_email($email) {
  return preg_match('#^[a-z0-9.!\#$%&\'*+-/=?^_`{|}~]+@([0-9.]+|([^\s]+\.+[a-z]{2,6}))$#si', $email);
}


if (!is_valid_email($email)) {
  echo ('<font color=red><strong>Sorry, invalid email! </font>' . '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
  exit;
}

} // closes if ($email != '')




   if (!$accountname){ 
echo("<font color=red><strong>Error:</strong>Please type Your Account Name</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;} 


   if (!$phone){ 
echo("<font color=red><strong>Error:</strong>Please type your Phone Number</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}
 

     if (is_numeric($phone)) {
        //do nothing
    } else {
       echo("<font color=red><strong>Error:  </strong>Phone Should be in Numbers - No alphabelt or special character is allowed; Type it in the appropriate format </font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}



     if ($bname == 'select') {
       echo("<font color=red><strong>Error:  </strong>Please select the Bank Name</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;
}


   if (!$acctno){ 
echo("<font color=red><strong>Error:</strong>Please type your Account Number</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}
 

     if (is_numeric($acctno)) {
        //do nothing
    } else {
       echo("<font color=red><strong>Error:  </strong>Account Number Should be in digits - No alphabelt or special character is allowed; Type it in the appropriate format </font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}


   if (!$password){ 
echo("<font color=red><strong>Error:</strong>Please type your Password</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}
 

   if ($password != $confirmpassword){ 
echo("<font color=red><strong>Error:</strong>The two Passwords do not match</font>". '<br>' . '<a href="javascript:history.go(-1);">Back </a>');
exit;}
 


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Test for New Photograph Upload script
 
  /*
    if(isset($_FILES['image']))
	{
      $errors= array();
      $file_name = $_FILES['image']['name'];
	  
	  
	   $photo_file_name = str_replace(' ', '_', $_FILES['image']['name']); //shewen added this
	   $photo_path_name = "images/photo/" .  $photo_file_name; //shewen added this
	  
      $file_size =$_FILES['image']['size'];
	  
	// $img_size = getimagesize($file_name);
	  
	  echo $file_size . '<br/>';
	  
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
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
 
 
 */
  
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 

 //////////////////////////////////////////////////
 // Generate a Unique Referral Code
 //////////////////////////////////////////////////

$length = 13;
 $chars ='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			
			//0123456789``-=~!@#$%^&*()_+,./<>?;:[]{}\|'

  $str = '';
  $max = strlen($chars) - 1;

  for ($i=0; $i < $length; $i++)
    $str .= $chars[rand(0, $max)];
	
	$str =ltrim($str);
	 $_SESSION['ref_code'] = $str; 
  //////////////////////////////////////////////////// 
  
 


// otherwise, it's OK to insert the details in the database
//else {

$status="pending";
//$payment_update="pending";
  
  $sql = "INSERT INTO register SET date='$today', fname='$fname', email='$email', phone='$phone', bname='$bname',  accountname='$accountname', acctno='$acctno',referral_code='$str',password='$password',status='$status'";
 
 
  if (@mysql_query($sql)) {
  
  
  
  // Insert into the Referral table
 $sql_ref = "INSERT INTO referral SET date='$today', referral_code='$ref_code', upline='$upline',downline='$fname'";
  if (@mysql_query($sql_ref)) {
    //echo '<p> completed!</p>' ;
  } else {
    echo '<p>Error Inserting into the Referral Table: ' .
         mysql_error() . '</p>';
  }


  
  
  
  $to = "$email";
  $to2 = "shewen18@yahoo.com";
  //$to3 = "dapomakanjuola1st@yahoo.com";




 $subject = "New Registration on NGRFUNDS";
 $body = "Hi,<br/> Thank you for taking your time to register with us on ngrfunds.com <br/>" .   "\n However, to complete your registration, you will have to click the link below:  <br/> ". '<a href="' . 'http://www.ngrfunds.com/login.php?username1=' . $email . '">' . 'Click here' . '</a>';
 
  $body2 = " Registration Notification on NGRFUNDS Website<br/> ==========================================  <br/><br/>" . "Date = " . $today . "<br/><br/>".  "Email = " . $email . "<br/><br/>" . "Full name = " . $fname . "<br/><br/>".  "Phone Number = " . $phone . "<br/><br/>" . "Bank Name =" . $bname . "<br/><br/>". "Account Name = " . $accountname . "<br/><br/>". "Account Number = " . $acctno ;
 
 $headers = 'From: info@ngrfunds.com' . "\r\n" .
    'Reply-To: info@ngrfunds.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

 
         				$from = 'NGRFUNDS <noreply@ngrfunds.com>';
                        $headers = "From: " .($from) . "\r\n";
                        $headers .= "Reply-To: ".($from) . "\r\n";
                        $headers .= "Return-Path: ".($from) . "\r\n";;
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                        $headers .= "X-Priority: 3\r\n";
                        $headers .= "X-Mailer: PHP". phpversion() ."\r\n";
 
 
    
    mail($to, $subject, $body, $headers );
	mail($to2, $subject, $body2, $headers );
	//mail($to3, $subject, $body2, $headers );
	//mail($to, $subject, $body, $headers );

  
  
    echo '<font color="green"><p>Registration Details was submitted successfully! <br/> </p><br/> ' . '<br/><br/><a href="register.php">Back To register Page</a></font>';
  }
  
  
  
  
   else {
    echo '<p>Error Submitting Registration Details: ' .
         mysql_error() . '</p>';
  }







?>

<?php else: // Allow the user to fill the form ?>
		
		
		  
				  
				  Registration Form</h5>
				  
				  
				  
				  
					<form class="" method="POST" action="register.php" enctype="multipart/form-data">
						
						

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"></span>
									<img src="images/icons/mail.jpg">&nbsp;&nbsp;<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>





<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Full Names</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"></span>
									<img src="images/icons/user.png">&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" name="fname" id="fname"  placeholder="Enter your Name"/>
								</div>
							</div>
					  </div>





<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Phone Numbers</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"></span>
									 <img src="images/icons/phone.png">&nbsp;&nbsp;	<input type="text" class="form-control" name="phone" id="phone"  placeholder="Enter your Phone Number"/>
								</div>
							</div>
					  </div>

<!--


						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Photograph</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"></span>
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
								</div>
							</div>
						</div>


-->




	<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Bank Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"></span>									
							 <img src="images/icons/bank.png">&nbsp;&nbsp;	<select type="text" name="bname" id="bank_name" class="form-control mng-input" style="" required="">
                                 <option value="select" selected>--Select Bank--</option>
                                                              <option value="ACCESS">ACCESS BANK PLC</option>
                                                                        <option value="ASO">ASO SAVINGS AND LOANS</option>
                                                                        <option value="Coronation">Coronation Merchant Bank</option>
                                                                        <option value="DIAMOND">DIAMOND BANK PLC</option>
                                                                        <option value="ECOBANK">ECOBANK NIGERIA PLC</option>
                                                                        <option value="FBN Mortgages">FBN Mortgages Limited</option>
                                                                        <option value="FIDELITY">FIDELITY BANK PLC</option>
                                                                        <option value="FBN">FIRST BANK OF NIGERIA PLC</option>
                                                                        <option value="FCMB">FIRST CITY MONUMENT BANK PLC</option>
                                                                        <option value="Fortis">Fortis Microfinance Bank</option>
                                                                        <option value="FSDH">FSDH MERCHANT BANK LIMIT</option>
                                                                        <option value="GTB">Guaranty Trust Bank Plc</option>
                                                                        <option value="HERITAGE">HERITAGE BANK</option>
                                                                        <option value="IMPERIAL">IMPERIAL HOMES MORTGAGE BANK</option>
                                                                        <option value="JAIZ">JAIZ BANK PLC</option>
                                                                        <option value="JUBILEE">JUBILEE LIFE MORTGAGE BANK</option>
                                                                        <option value="KEYSTONE">KEYSTONE BANK</option>
                                                                        <option value="New Prudential">New Prudential Bank</option>
                                                                        <option value="(CITIGROUP)">NIGERIA INTERNATIONAL BANK (CITIGROUP)</option>
                                                                        <option value="NPF">NPF Microfinance Bank</option>
                                                                        <option value="Omoluabi">Omoluabi Savings and Loans Plc</option>
                                                                        <option value="Page">Page MFBank</option>
                                                                        <option value="PARALLEX">PARALLEX MFB</option>
                                                                        <option value="PayAttitude">PayAttitude Online</option>
                                                                        <option value="Safetrust">Safetrust Mortgage bank </option>
                                                                        <option value="SKYE">SKYE BANK PLC</option>
                                                                        <option value="STANBIC IBTC">STANBIC IBTC BANK PLC</option>
                                                                        <option value="STANDARD CHARTERED">STANDARD CHARTERED BANK NIGERIA LTD</option>
                                                                        <option value="STERLING">STERLING BANK PLC</option>
                                                                        <option value="SunTrust">SunTrust Bank</option>
                                                                        <option value="TRUSTBOND">TRUSTBOND MORTGAGE BANK</option>
                                                          <option value="UNION">UNION BANK OF NIGERIA PLC</option>
                                                       <option value="UBA">UNITED BANK FOR AFRICA PLC</option>
                                                                        <option value="UNITY">UNITY BANK PLC</option>
                                                                        <option value="VFD">VFD MICROFINANCE BANK</option>
                                                                        <option value="WEMA">WEMA BANK PLC</option>
                                                                        <option value="ZENITH">ZENITH BANK</option>
                                                                    </select>		
									
									
									
								</div>
							</div>
					  </div>









<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Account Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"></span>
									<img src="images/icons/user.png">&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" name="accountname" id="accountname"  placeholder="Enter your Account Name"/>
								</div>
							</div>
					  </div>







<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Account Number</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"></span>
									<img src="images/icons/acct.jpg">&nbsp;&nbsp;<input type="text" class="form-control" name="acctno" id="acctno"  placeholder="Enter your Account Number"/>
								</div>
							</div>
					  </div>



						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Referral's Code</label>
							<div class="cols-sm-10">
							  <div class="input-group">
									<span class="input-group-addon"></span>
									<img src="images/icons/mail.jpg">&nbsp;&nbsp;<input type="text" class="form-control" name="ref_code" id="ref_code"  placeholder="Enter Referral's Code"/>
                                    <span class="style2">**								<strong>								(Leave Blank if it's not available)</strong></span></div>
							</div>
						</div>



						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"></span>
									<img src="images/icons/password.png">&nbsp;&nbsp;<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"></span>
								<img src="images/icons/password.png">&nbsp;&nbsp;	<input type="password" class="form-control" name="confirmpassword" id="confirmpassword"  placeholder="Confirm your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<button type="submit" class="btn-light button-black" id="btn_submit" name="register">Register</button>
						</div>
						
					</form>
					
					<?php endif; ?>
			  </div>
			</div>
		</div>

		 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	</body>
</html>