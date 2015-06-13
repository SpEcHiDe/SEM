<?php
session_start();
?>
<?php

  if(isset($_SESSION['name'])){
	  $uid = $_SESSION['name'];
	  if($uid){				// admin session id is zero
		 echo "normal";
	  }
	  else{
		  echo "admin";
	  }
  }
  else{
	  echo "no";
  }

?>
