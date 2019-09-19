<?php
 
// Connecting disconnecting Database
 

function connect_db(){
		static $connection;

		if (!isset($connection)) {
		
			$connection = mysqli_connect('localhost','root','','db_connext');
			
		}

		if ($connection===false) {
			
			return mysqli_connect_error();
			
		}
		return $connection;
}
?>