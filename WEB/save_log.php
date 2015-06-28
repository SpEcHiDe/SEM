<?php
		
		// database credentials
		$mysql_host = "mysql2.000webhost.com";
		$mysql_database = "a7089677_iot";
		$mysql_user = "a7089677_iot";
		$mysql_password = "pASSword2014;";
		// database credentials
        
        // value passed to PHP script
        $recv = $_GET['value'];
        $consno = $_GET['uid'];
        
        // set the time zone for the PHP script
        date_default_timezone_set('Asia/Calcutta');
        $timestampnowdate = date('Y-m-d H:i:s T', time());
        
        // instantiate connection to MySQL server
		$conn = mysql_connect($mysql_host,$mysql_user,$mysql_password) or die("error connecting " . mysqli_error($link)); 	
		// instantiate connection to database
		mysql_select_db($mysql_database);	

		// execute the MySQL query
		$query = mysql_query("SELECT * FROM data WHERE CONSNO = '" . $consno . "' ORDER BY DATE DESC") or die("error executing " . mysql_error($conn));

		// fetch the rows corresponding to the query
		$row = mysql_fetch_row($query);

		// previous consumption stored in a variable
		$previous_consumption = $row[2];
		
		// check if the device has been reset
		if($recv < $previous_consumption ){
			$recv = $previous_consumption + $recv;
			
		}
		
        //echo $recv;
        
        // insert the values into the database
        try {
			// instantiate connection to database
			$conn = new PDO("mysql:host=$mysql_host;dbname=$mysql_database", $mysql_user, $mysql_password);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO data (date, consno, consumption) VALUES ('".$timestampnowdate."', '".$consno."', '".$recv."')";
			// use exec() because no results are returned
			$conn->exec($sql);
			echo "new record created successfully";
		}
		
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
		// remove the connection
		$conn = null;

?>
