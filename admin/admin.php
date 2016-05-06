<?php
	 	$answer =$_POST['msg'];
	 	if ($answer){
	 	
   	try {
        $host = 'localhost';
        $dbname = 'test';
        $user = 'root';
        $pass = 'doa24710';
        # MySQL with PDO_MYSQL
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user,$pass);
    } catch(PDOException $e) {echo $e;} 
	
		
		$sql="insert into iwa2016 (answer, status) values  (:msg, 1)";
	    
	    $q = $conn->prepare($sql);
		$q->bindValue(':msg',$answer);
	    $q->execute();
	  }
	  
	  $type =$_POST['type'];
	  if ($type == "delete"){
		  	
		  	try {
        $host = 'localhost';
        $dbname = 'test';
        $user = 'root';
        $pass = 'doa24710';
        # MySQL with PDO_MYSQL
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user,$pass);
    } catch(PDOException $e) {echo $e;} 
	
		
		$sql="truncate table iwa2016";
	    
	    $q = $conn->prepare($sql);
		
	    $q->execute();
		  
	  }
?>