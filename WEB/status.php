<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Undeviating 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20140322

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Smart Water Meter</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">

<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700|Questrial" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<link href="normalize.css" rel="stylesheet" type="text/css" media="all" />
<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
        	<span class="icon icon-cog"></span>
			<h1><a href="#">Smart Water Meter</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li><a href="usage.php" accesskey="1" title="">Statistics</a></li>
				
				<li><a href="index.php" accesskey="3" title="">Home</a></li>
				
				<li class="active"><a href="status.php" accesskey="5" title="">Status</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="wrapper">
	
	
	
	<div id="three-column" class="container">
		<div><span class="arrow-down"></span></div>
		<div id="tbox1">
			<div class="title">
				<h2>flow meter</h2>
			</div>
			<?php
				
				if(isset($_SESSION['name'])){
					$uid = $_SESSION['name'];
					if($uid){				// admin session id is zero
						echo "logged in as " . $uid . "with usage 0 litres";
					}
					else{
						echo "logged in as ADMINISTRATOR. can see all usages";
					}
				}
				else{
					echo "not logged in.";
				}
			?>
			
		<!--	<p>Nullam non wisi a sem semper eleifend. Donec mattis libero eget urna. Duis pretium velit ac suscipit mauris. Proin eu wisi suscipit nulla suscipit interdum.</p>
			<a href="#" class="button">Learn More</a> --> </div>
		<div id="tbox2">
			<div class="title">
				<h2>microcontroller</h2>
			</div>
			<?php
				
				if(isset($_SESSION['name'])){
					$uid = $_SESSION['name'];
					if($uid){				// admin session id is zero
						echo "logged in as " . $uid . "with usage 0 litres";
					}
					else{
						echo "logged in as ADMINISTRATOR. can see all usages";
					}
				}
				else{
					echo "not logged in.";
				}
			?>
			
		<!--	<p>Proin eu wisi suscipit nulla suscipit interdum. Nullam non wisi a sem semper suscipit eleifend. Donec mattis libero eget urna. Duis  velit ac mauris.</p>
			<a href="#" class="button">Learn More</a> --> </div>
		<div id="tbox3">
			<div class="title">
				<h2>GPRS module</h2>
			</div>
			<?php
				
				if(isset($_SESSION['name'])){
					$uid = $_SESSION['name'];
					if($uid){				// admin session id is zero
						echo "logged in as " . $uid . "with usage 0 litres";
					}
					else{
						echo "logged in as ADMINISTRATOR. can see all usages";
					}
				}
				else{
					echo "not logged in.";
				}
			?>
			
		<!--	<p>Donec mattis libero eget urna. Duis pretium velit ac mauris. Proin eu wisi suscipit nulla suscipit interdum. Nullam non wisi a sem suscipit  eleifend.</p>
			<a href="#" class="button">Learn More</a> --> </div>
	</div>
	
</div>
<div id="footer">
	<div class="container">
		<div class="fbox1">
		<span class="icon icon-map-marker"></span>
			<span>Module No.T-7, 7th Floor, Thejaswini Building ,Technopark, Technopark Campus,
			<br /> Thiruvananthapuram, Kerala 695581</span>
		</div>
		<div class="fbox1">
			<span class="icon icon-phone"></span>
			<span>
				Telephone: +91 471 270 0012
			</span>
		</div>
		<div class="fbox1">
			<span class="icon icon-envelope"></span>
			<span> info@icfoss.in </span>
		</div>
	</div>
</div>
<div id="copyright">
	<p>&copy; All rights reserved.</p>
	<ul class="contact">
		<li><a href="https://twitter.com/fosskerala" class="icon icon-twitter"><span>Twitter</span></a></li>
		<li><a href="https://www.facebook.com/icfossbootcamp" class="icon icon-facebook"><span>Facebook</span></a></li>
		<!--<li><a href="#" class="icon icon-dribbble"><span>Pinterest</span></a></li>-->
		<li><a href="https://plus.google.com/102174442408221199476/" class="icon icon-tumblr"><span>Google+</span></a></li>
		<!--<li><a href="#" class="icon icon-rss"><span>Pinterest</span></a></li>-->
	</ul>
</div>
</body>
</html>
