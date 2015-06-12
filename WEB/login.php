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

    if($row){
      session_start();
      $_SESSION['name']=$consumerno;
      header('location:welcome.php');
    }
    else{
      echo 'You entered an incorrect username or password';
    }    
 
  }
?>
