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
	
		
		$sql="UPDATE iwa2016 SET answer = :msg, status= 1
		where answer='0'";
	    
	    $q = $conn->prepare($sql);
		$q->bindValue(':msg',$answer);
	    $q->execute();
	  }
?>