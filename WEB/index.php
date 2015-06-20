<?php
session_start();
?>

<!DOCTYPE html>
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

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimal-ui">

<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700|Questrial" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->
<link href="normalize.css" rel="stylesheet" type="text/css" media="all" />
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
				
				<li class="active"><a href="index.php" accesskey="3" title="">Home</a></li>
				
				<li><a href="status.php" accesskey="5" title="">Status</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="wrapper">
	
	
	<div id="welcome" class="container">
 <!--   	
<div class="title">
	  <h2>Welcome to our website</h2>
		</div> -->
		
		
		
		
		<?php

  if(isset($_POST['submit'])) {

    $mysql_host = "mysql2.000webhost.com";
    $mysql_database = "a7089677_iot";
    $mysql_user = "a7089677_iot";
    $mysql_password = "pASSword2014;";

    $consumerno = $_POST['name'];
    $passwd = $_POST['password'];
	
    $conn = mysql_connect($mysql_host,$mysql_user,$mysql_password) or die("error connecting " . mysqli_error($link)); 	
    mysql_select_db($mysql_database);	

    $query = mysql_query("SELECT * FROM users WHERE USER_ID = '" . $consumerno . "' AND PASSWORD = '" . $passwd . "'") or die("error executing " . mysql_error($conn));

    $row = mysql_fetch_row($query);

    if($row[0] == 0){
      
      $_SESSION['name']=$consumerno;
      header('location:status.php');
    }
    else if(($row[0] != NULL) && ($row[1] != NULL)){
		$_SESSION['name']=$consumerno;
      header('location:usage.php');
	}
    else{
     echo 'You entered an incorrect username or password';
      echo "<form id=\"form\" name=\"form\" method=\"post\">";
	
		echo "<label id=\"user\" for=\"name\">USER ID</label>";
		echo "<input type=\"text\" name=\"name\" id=\"name\" placeholder=\"Username\" required/><br /><br />";
		echo "<label id=\"pass\" for=\"password\">PASSWORD</label>";
		echo "<input type=\"password\" name=\"password\" id=\"password\" placeholder=\"Password\" required /><br /><br />";
		echo "<input type=\"submit\" id=\"submit\" name=\"submit\" value=\"LogIn\"/><br />";
	
		echo "</form>";
    }    
 
  }
  else{
	  echo "<form id=\"form\" name=\"form\" method=\"post\">";
	
		echo "<label id=\"user\" for=\"name\">USER ID</label>";
		echo "<input type=\"text\" name=\"name\" id=\"name\" placeholder=\"Username\" required/><br /><br />";
		echo "<label id=\"pass\" for=\"password\">PASSWORD</label>";
		echo "<input type=\"password\" name=\"password\" id=\"password\" placeholder=\"Password\" required /><br /><br />";
		echo "<input type=\"submit\" id=\"submit\" name=\"submit\" value=\"LogIn\"/><br />";
	
		echo "</form>";
  }
?>

		
</div>
	
	
</div>

</body>
</html>
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
