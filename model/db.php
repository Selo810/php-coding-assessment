<?php   

    
    $dsn = 'mysql:host=localhost;dbname=assessment_db';
	$user = 'root';
	$pass = '';
  
    	try {
    		$dbh = new \PDO('mysql:host=localhost;dbname=assessment_db', 'root', '');
    		return $dbh;
    	} catch (PDOException $e) {
    		$error_message = $e -> getMessage();
    		exit();
    	}        


?>