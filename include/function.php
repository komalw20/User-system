<?php
ini_set('display_errors','1'); 

function getPDOObject()
	{
		$dsn = "mysql:host=localhost; dbname=db2;";
		$db_user = "root";
		$db_password = "";
		

			try {
			$con= new PDO($dsn, $db_user, $db_password );

				if ($con) {
					return $con;
				}
			} catch (PDOException $e) {
				echo "Connection failed" .$e->getMessage();
			}
	}
?>