<?php
		
		$mysql_host = "mysql2.000webhost.com";
		$mysql_database = "a7089677_iot";
		$mysql_user = "a7089677_iot";
		$mysql_password = "pASSword2014;";
        
        $recv = $_GET['value'];
        $consno = $_GET['uid'];
        
        date_default_timezone_set('Asia/Calcutta');
        $timestampnowdate = date('Y-m-d H:i:s T', time());
        
		$conn = mysql_connect($mysql_host,$mysql_user,$mysql_password) or die("error connecting " . mysqli_error($link)); 	
		mysql_select_db($mysql_database);	

		$query = mysql_query("SELECT * FROM data WHERE CONSNO = '" . $consno . "' ORDER BY DATE DESC") or die("error executing " . mysql_error($conn));

		$row = mysql_fetch_row($query);

		$previous_consumption = $row[2];
		
		if($recv < $previous_consumption ){
			$recv = $previous_consumption + $recv;
			
		}
        //echo $recv;
        try {
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
	
		$conn = null;

        
?>
