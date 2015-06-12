<?php
echo $_SESSION['name'];
  if(isset($_SESSION['name'])){
	  $uid = $_SESSION['name'];
	  if($uid){
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
