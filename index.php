<?php require_once('Connections/adio.php'); ?>
<?php

// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['submit'])) {
  $loginUsername=$_POST['email'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "main.php";
  $MM_redirectLoginFailed = "index.php?failed=yes";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_adio, $adio);
  
  $LoginRS__query=sprintf("SELECT username, password FROM admin WHERE username='%s' AND password='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $adio) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username_admin'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>O'brien</title>

             
              <!-- Latest compiled and minified CSS -->
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

          <!-- Optional theme -->
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

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

              .style13 {color: #FF0000}
.style14 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #FFFFFF;
	font-size: 18px;
}
                      </style>
  </head>
  <body>

       

      
            <nav class="navbar navbar-default">
              <!-- /.container-fluid -->
</nav>






     

    <div class="row">
      <div class="col-sm-offset-3 col-sm-6">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">

             
            </ul>



            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="home">
                
                <form id="form1" name="form1" method="post" action="<?php echo $loginFormAction; ?>">
                      <div class="form-group">
                        <table width="550" border="0" align="center">
                          <tr>
                            <td><div align="left"><span class="style14">Adio Consultancy Group </span></div></td>
                          </tr>
                          <tr>
                            <td><?php if (isset($_GET['failed'])) { ?>
                                <span class="style9"> <span class="style13">Wrong Email or password, please try again.</span>
                                <?php } ?></td>
                          </tr>
                        </table>
                        <label for="exampleInputEmail1"><br>
                        Email address</label>
                        <input name="email" type="text" class="form-control" id="exampleInputEmail1" placeholder="Email" />
                   </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" />
                      </div>
                    
                      <input type="submit" name="submit" value="Login to Portal" class="btn btn-default" />
                </form>


              </div>



              <div role="tabpanel" class="tab-pane" id="profile">


        

              </div>
            </div>

      </div>

 </div>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>