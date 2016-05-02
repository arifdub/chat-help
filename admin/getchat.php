<?php
	 	
	 	
	 	
   	try {
        $host = 'localhost';
        $dbname = 'test';
        $user = 'root';
        $pass = 'doa24710';
        # MySQL with PDO_MYSQL
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user,$pass);
    } catch(PDOException $e) {echo $e;} 
	
		
		$sql=  "select * ,Date_format(`time`,'%H:%i') as only_time from iwa2016
		 
		order by id desc limit 1 ";
	    
	    $q = $conn->prepare($sql);
	    
	    $q->execute();
	    
	   while($row = $q ->fetch(PDO::FETCH_ASSOC)){
		   
	   
	    
	    echo "<span style='color:red'>".$row['name']. ": </span>" 
	    .$row['question']. "<span style='float:right'>".$row['only_time']."</span><br>";
	    }
?>	   
	   