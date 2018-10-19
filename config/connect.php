<?php
		$host="localhost";
		$user="root";
		$password="";
		$db=mysql_connect($host, $user, $password);
		if (!$db) {
				//echo "Oh no";
			//	exit;
		} else { 
				//echo "OK"; 
		}
		
		mysql_select_db("payrolldb");
		mysql_query("SET CHARACTER SET utf8");
		//mysql_query('SET CHARACTER SET tis620'); 
		
		//mysql_query("SET character_set_results=utf8");
		//mysql_query("SET character_set_client=utf8");
		//mysql_query("SET character_set_connection=utf8");
?>