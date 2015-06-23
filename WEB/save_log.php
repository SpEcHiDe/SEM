<?php
		
		$mysql_host = "mysql2.000webhost.com";
		$mysql_database = "a7089677_iot";
		$mysql_user = "a7089677_iot";
		$mysql_password = "pASSword2014;";
        
        $recv = $_POST['value'];
        $consno = $_POST['uid'];
        
        try {
			$conn = new PDO("mysql:host=$mysql_host;dbname=$mysql_database", $mysql_user, $mysql_password);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO data (consno, consumption) VALUES ('".$consno."', '".$recv."')";
			// use exec() because no results are returned
			$conn->exec($sql);
			echo "New record created successfully";
		}
		catch(PDOException $e)
		{
			echo $sql . "<br>" . $e->getMessage();
		}
	
		$conn = null;

        
?>
