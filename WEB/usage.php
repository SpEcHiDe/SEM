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
		
		<!--Load the AJAX API-->
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		
		<script type="text/javascript">
		
			// Load the Visualization API and the piechart package.
			google.load('visualization', '1.0', {'packages':['corechart']});

			// Set a callback to run when the Google Visualization API is loaded.
			google.setOnLoadCallback(drawChart);

			
			<?php
				
				$mysql_host = "mysql2.000webhost.com";
				$mysql_database = "a7089677_iot";
				$mysql_user = "a7089677_iot";
				$mysql_password = "pASSword2014;";
				
				$uid = $_SESSION['name'];
				
				$conn = mysql_connect($mysql_host,$mysql_user,$mysql_password) or die("error connecting " . mysqli_error($link)); 	
				mysql_select_db($mysql_database);	
				
				$result = mysql_query("SELECT date,consumption from data WHERE consno = '" . $uid . "' ORDER BY date ASC") or die("error executing " . mysql_error($conn));
				
				$prevValue = 0;
				
				$value=array();
				while($r = mysql_fetch_assoc($result)) {
					$datetime="'" . $r['date'] . "'";
					$consumption=$r['consumption'];
										
					$curValue = $consumption - $prevValue;
					$prevValue = $curValue;					
					
					$val="[".$datetime.",".$curValue."]";
					array_push($value,$val );
				}
				$final_value = implode(",", $value);

			?>
			
			function drawChart() {
				// Create the data table.
				var data = new google.visualization.DataTable();
				
				data.addColumn('string', 'Date Time Stamp');
				
				data.addColumn('number', 'Litres Consumed');				
				
				data.addRows([
					<?php echo $final_value?>
				]);
				
				var options = {
					title: 'Usage Statistics',
					legend: 'none'
				};

				var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
				chart.draw(data, options);
			}
			
		</script>



    </head>
    <body>

	
	<header id ="home" class="wrap clearfix" role="banner">

        <nav role="navigation" > 

            <div class="navicon closed"><i class="fa fa-navicon">
                </i> </div>
            <ul class="navmenu" id="opennav">
                
                <li><a href="usage.php" class="active">Statistics</a></li>
               <?php
					if(isset($_SESSION['name'])){
						echo "<li><a href=\"logout.php\">Log Out</a></li>";
					}
					else{
						echo "<li><a href=\"index.php\">Log In</a></li>";
					}
                
                
                ?>
                <li><a href="status.php">Status</a></li>
                
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
            <h2><i class="fa fa-code"></i>consumption in last 24 hours </h2>
            <?php
				
				if(isset($_SESSION['name'])){
					$uid = $_SESSION['name'];
					if($uid){				// admin session id is zero
						//echo "logged in as " . $uid . "with usage 0 litres";
						
						$mysql_host = "mysql2.000webhost.com";
						$mysql_database = "a7089677_iot";
						$mysql_user = "a7089677_iot";
						$mysql_password = "pASSword2014;";
						
						$conn = mysql_connect($mysql_host,$mysql_user,$mysql_password) or die("error connecting " . mysqli_error($link)); 	
						mysql_select_db($mysql_database);	

						$query = mysql_query("SELECT * FROM data WHERE CONSNO = '" . $uid . "' ORDER BY DATE DESC") or die("error executing " . mysql_error($conn));

						$row = mysql_fetch_row($query);
						if($row){
							echo $row[2] . " milli litres";
						}
						else{
							echo "no usage yet";
						}
							
						
					}
					else{
						//echo "logged in as ADMINISTRATOR. can see all usages";
						echo "administrator area";
					}
				}
				else{
					echo "not logged in.";
				}
			?>
        </div>


         <div class="point">
            <h2><i class="fa fa-code"></i>total amount due</h2>
			<?php
				
				if(isset($_SESSION['name'])){
					$uid = $_SESSION['name'];
					if($uid){				// admin session id is zero
						//echo "logged in as " . $uid . "with usage 0 litres";
						echo "usage * cost per litre = total cost";
					}
					else{
						//echo "logged in as ADMINISTRATOR. can see all usages";
						echo "administrator area";
					}
				}
				else{
					echo "not logged in.";
				}
			?>
        </div>



         <div class="point">
            <h2><i class="fa fa-code"></i>usage graph</h2>
			<?php
				
				if(isset($_SESSION['name'])){
					$uid = $_SESSION['name'];
					if($uid){				// admin session id is zero
						//echo "logged in as " . $uid . "with usage 0 litres";
						//echo "graph not implemented";
						echo "<div id=\"chart_div\" style=\"width: 150%; height: 150%;\"></div>";
					}
					else{
						//echo "logged in as ADMINISTRATOR. can see all usages";
						echo "administrator area";
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
