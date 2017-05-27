<?php require_once('../Connections/proven.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "index.php";
  $MM_redirectLoginFailed = "adminlogin.php?failed=yes";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_proven, $proven);
  
  $LoginRS__query=sprintf("SELECT username, password FROM admin WHERE username='%s' AND password='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $proven) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
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
        <title>Proven Ability Panel</title>
		<meta charset=utf-8>
        <meta name="description" content="Animated Content Menu with jQuery" />
        <meta name="keywords" content="jquery, animation, menu, navigation, template, slide out, effect, background image"/>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" type="text/css" href="1AnimatedContentMenu/css/style.css" />
		<link  href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:regular,bold" rel="stylesheet" type="text/css" />
    </head>
    <body>
		<div id="ac_background" class="ac_background">
			<img class="ac_bgimage" src="1AnimatedContentMenu/images/Default.jpg" alt="Background"/>
			<div class="ac_overlay"></div>
			<div class="ac_loading"></div>
		</div>
		<div id="ac_content" class="ac_content">
			<h1><span>Administrator Panel</span><br>Proven Ability Panel</h1>
			<div class="ac_menu">
				<ul>
					<li>
						<a href="1AnimatedContentMenu/images/Appetizers.jpg">Click here to Login</a>
						<div class="ac_subitem">
							<span class="ac_close"></span>
							<h2>Login Here</h2>
							<ul>
								<li>Please carefully insert your login parameters to gain access to the Management section of this website.</li>
								<li>
                                <form method="post" action="<?php $_SERVER['PHP_SELF']  ?>">
                                UserId:<br>
                                <input type=text name="username"><br>
                                Password:<br>
                                <input type="password" name="password"><br><br>
                                <input type="hidden" name="x7tyuz" value="sprintell">
                                <input type="submit" value="LogIn">
                                </form>
                                </li>
							</ul>
						</div>
					</li>
                    
                    <li>
						<a href="1AnimatedContentMenu/images/Specials.jpg">App Help.</a>
						<div class="ac_subitem">
							<span class="ac_close"></span>
							<h2>Proven Ability Panel</h2>
							<ul>
								<li>Welcome to Proven Ability Administrator Panel.This Content Management System was developed to deliver content to visitors of this site in a way that is search engine friendly, easy to manage, straightforward to edit, and so on. <br><br> Websites are built on the basis of interconnected pages, but the days when these were static are long gone. The Web is created from dynamic pages, commonly known as content. <br> <br>Some of this content is built on-demand, some is just served on-demand, and yet more is interlaced with content that is static, surrounded by context- and experience-sensitive dynamic content. Much of this content is also interactive� either directly or after a conversation between the users and the page-generation software. <br><br><em>Developed by Wittybits Systems</em><a href="wittybits.com" target="_blank">Developed by Wittybits Systems</a>
                                </li>
								
							</ul>
						</div>
					</li>
					
				</ul>
			</div>
		</div>
		<!-- The JavaScript -->
	<script type="text/javascript" src="1AnimatedContentMenu/js/jquery.min.js"></script>
		<script type="text/javascript" src="1AnimatedContentMenu/js/jquery.easing.1.3.js"></script>
		<script type="text/javascript">
			$(function() {
				var $ac_background	= $('#ac_background'),
				$ac_bgimage		= $ac_background.find('.ac_bgimage'),
				$ac_loading		= $ac_background.find('.ac_loading'),
				
				$ac_content		= $('#ac_content'),
				$title			= $ac_content.find('h1'),
				$menu			= $ac_content.find('.ac_menu'),
				$mainNav		= $menu.find('ul:first'),
				$menuItems		= $mainNav.children('li'),
				totalItems		= $menuItems.length,
				$ItemImages		= new Array();
				
				/* 
				for this menu, we will preload all the images. 
				let's add all the image sources to an array,
				including the bg image
				*/
				$menuItems.each(function(i) {
					$ItemImages.push($(this).children('a:first').attr('href'));
				});
				$ItemImages.push($ac_bgimage.attr('src'));
					  
				
				var Menu 			= (function(){
					var init				= function() {
						loadPage();
						initWindowEvent();
					},
					loadPage			= function() {
						/*
							1- loads the bg image and all the item images;
							2- shows the bg image;
							3- shows / slides out the menu;
							4- shows the menu items;
							5- initializes the menu items events
						 */
						$ac_loading.show();//show loading status image
						$.when(loadImages()).done(function(){
							$.when(showBGImage()).done(function(){
								//hide the loading status image
								$ac_loading.hide();
								$.when(slideOutMenu()).done(function(){
										$.when(toggleMenuItems('up')).done(function(){
										initEventsSubMenu();
									});
								});
							});
						});
					},
					showBGImage			= function() {
						return $.Deferred(
						function(dfd) {
							//adjusts the dimensions of the image to fit the screen
							adjustImageSize($ac_bgimage);
							$ac_bgimage.fadeIn(1000, dfd.resolve);
						}
					).promise();
					},
					slideOutMenu		= function() {
						/* calculate new width for the menu */
						var new_w	= $(window).width() - $title.outerWidth(true);
						return $.Deferred(
						function(dfd) {
							//slides out the menu
							$menu.stop()
							.animate({
								width	: new_w + 'px'
							}, 700, dfd.resolve);
						}
					).promise();
					},
						/* shows / hides the menu items */
						toggleMenuItems		= function(dir) {
						return $.Deferred(
						function(dfd) {
							/*
							slides in / out the items. 
							different animation time for each one.
							*/
							$menuItems.each(function(i) {
										var $el_title	= $(this).children('a:first'),
											marginTop, opacity, easing;
										if(dir === 'up'){
											marginTop	= '0px';
											opacity		= 1;
											easing		= 'easeOutBack';
										}
										else if(dir === 'down'){
											marginTop	= '60px';
											opacity		= 0;
											easing		= 'easeInBack';
						}
								$el_title.stop()
								.animate({
													marginTop	: marginTop,
													opacity		: opacity
												 }, 200 + i * 200 , easing, function(){
									if(i === totalItems - 1)
										dfd.resolve();
								});
							});
						}
					).promise();
					},
					initEventsSubMenu	= function() {
						$menuItems.each(function(i) {
							var $item		= $(this), // the <li>
							$el_title	= $item.children('a:first'),
							el_image	= $el_title.attr('href'),
							$sub_menu	= $item.find('.ac_subitem'),
							$ac_close	= $sub_menu.find('.ac_close');
							
							/* user clicks one item : appetizers | main course | desserts | wines | specials */
							$el_title.bind('click.Menu', function(e) {
									$.when(toggleMenuItems('down')).done(function(){
									openSubMenu($item, $sub_menu, el_image);
								});
								return false;
							});
							/* closes the submenu */
							$ac_close.bind('click.Menu', function(e) {
								closeSubMenu($sub_menu);
								return false;
							});
						});
					},
					openSubMenu			= function($item, $sub_menu, el_image) {
						$sub_menu.stop()
						.animate({
							height		: '400px',
							marginTop	: '-200px'
						}, 400, function() {
										//the bg image changes
							showItemImage(el_image);
						});
					},
						/* changes the background image */
					showItemImage		= function(source) {
							//if its the current one return
						if($ac_bgimage.attr('src') === source)
							return false;
								
						var $itemImage = $('<img src="'+source+'" alt="Background" class="ac_bgimage"/>');
						$itemImage.insertBefore($ac_bgimage);
						adjustImageSize($itemImage);
						$ac_bgimage.fadeOut(1500, function() {
							$(this).remove();
							$ac_bgimage = $itemImage;
						});
						$itemImage.fadeIn(1500);
					},
					closeSubMenu		= function($sub_menu) {
						$sub_menu.stop()
						.animate({
							height		: '0px',
							marginTop	: '0px'
						}, 400, function() {
							//show items
										toggleMenuItems('up');
						});
					},
						/*
						on window resize, ajust the bg image dimentions,
						and recalculate the menus width
						*/
					initWindowEvent		= function() {
						/* on window resize set the width for the menu */
						$(window).bind('resize.Menu' , function(e) {
							adjustImageSize($ac_bgimage);
							/* calculate new width for the menu */
							var new_w	= $(window).width() - $title.outerWidth(true);
							$menu.css('width', new_w + 'px');
						});
					},
						/* makes an image "fullscreen" and centered */
					adjustImageSize		= function($img) {
						var w_w	= $(window).width(),
						w_h	= $(window).height(),
						r_w	= w_h / w_w,
						i_w	= $img.width(),
						i_h	= $img.height(),
						r_i	= i_h / i_w,
						new_w,new_h,
						new_left,new_top;
							
						if(r_w > r_i){
							new_h	= w_h;
							new_w	= w_h / r_i;
						}
						else{
							new_h	= w_w * r_i;
							new_w	= w_w;
						}
							
						$img.css({
							width	: new_w + 'px',
							height	: new_h + 'px',
							left	: (w_w - new_w) / 2 + 'px',
							top		: (w_h - new_h) / 2 + 'px'
						});
					},
						/* preloads a set of images */
					loadImages			= function() {
						return $.Deferred(
						function(dfd) {
							var total_images 	= $ItemImages.length,
							loaded			= 0;
							for(var i = 0; i < total_images; ++i){
								$('<img/>').load(function() {
									++loaded;
									if(loaded === total_images)
										dfd.resolve();
								}).attr('src' , $ItemImages[i]);
							}
						}
					).promise();
					};
						
					return {
						init : init
					};
				})();
			
				/*
			call the init method of Menu
				 */
				Menu.init();
			});
		</script>
    </body>
</html>