<?php
session_start();
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Smart Water Meter</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Make sure the page is responsive --> 
<!--Step 1--> 
       
        <!-- Touch func --> 
		
		<link rel="stylesheet" href="css/main.css"/>
		<link rel="stylesheet" href="css/normalize.min.css"/>
		<link rel="stylesheet" href="css/font-awesome.css">
		
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/style_01.css">
        <!-- <link rel="stylesheet" href="css/stylev2.css"> -->		
		
		
		<script type="text/javascript" src="js/modernizr.js"> </script>
		<script type="text/javascript" src="js/jquery.js"> </script>



    </head>
    <body>

	
	<header id ="home" class="wrap clearfix" role="banner">

        <nav role="navigation" > 

            <div class="navicon closed"><i class="fa fa-navicon">
                </i> </div>
            <ul class="navmenu" id="opennav">
                
                <li><a href="usage.php">Statistics</a></li>
                <?php
					if(isset($_SESSION['name'])){
						echo "<li><a href=\"logout.php\">Log Out</a></li>";
					}
					else{
						echo "<li><a href=\"index.php\">Log In</a></li>";
					}
                ?>
                <li><a href="status.php" class="active">Status</a></li>
               
            </ul>
        </nav>

        <div class="logo_title">
            <img src="img/image.jpg" alt="logo" width="96"  class="logo">
            
        </div>
        <div class="name">
			<h3>Smart Water Meter</h3>
			<h6>an application to monitor the water usage of a household remotely</h6>
        </div>



     </header>
	 
	 <main role="main" class="clearfix">
	 
	
	
     <section id="about" class="clearfix wrap">

        
        
        <div id="space"></div>

        <!--Adding info about workshops! -->

        <div class="point">
            <h2><i class="fa fa-code"></i>smart meter module</h2>
            <?php
				
				if(isset($_SESSION['name'])){
					$uid = $_SESSION['name'];
					if($uid){				// admin session id is zero
						//echo "logged in as " . $uid . "with usage 0 litres";
						echo "Authentication ERROR !<br /> <sub>Only administartor can see the status of the devices installed.</sub>";
					}
					else{
						//echo "logged in as ADMINISTRATOR. can see all usages";
						echo "STATUS : OK";
					}
				}
				else{
					echo "not logged in.";
				}
			?>
        </div>

        		
	</main>
	
 	
	<!-- What about a footer now? -->
    <div class="footer" >
    <footer role="complementary" class="clearfix wrap">

        <div class="copyright">&copy; 2015. All Rights Reserved.</div>
        <div class="social"> 

            <div class="icon">
                <a href="https://twitter.com/fosskerala" target="_blank"><i class="fa fa-twitter-square"></i></a>
            </div>

            <div class="icon">
                <a href="https://www.facebook.com/icfossbootcamp" target="_blank"><i class="fa fa-facebook-square"></i></a>
            </div>

            <div class="icon">
                <a href="#" target="_blank"><i class="fa fa-phone-square"></i></a>
            </div>

        </div>

    </footer>
    </div>

	<script src="js/rwd.js"></script> 
	
    </section>	

 </body>
</html>
