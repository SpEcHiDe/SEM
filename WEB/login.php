<?php
//	include_once "config/database.php"

//	$consumerno = $_POST['uid'];
//	$passwd = $_POST['pwd'];
	
	//conection: 
	$conn = mysql_connect("localhost:3306","spechide","password;") or die("Error " . mysqli_error($link)); 	
//echo $conn;
	mysql_select_db("spechide");	

	//consultation: 

	$query = "DESC gcm_users"; 

	//execute the query. 

	$result = mysql_query($query,$conn) or die("Error in the consult.." . mysql_error($conn));

	//display information: 

	while($row = mysql_fetch_array($result)) { 
		 echo $row["name"] . "<br>"; 
	} 

?>
