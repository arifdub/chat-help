<?php
		
	$type = $_POST['type'];
			
	if ($type == 'submitquestion'){
		submitNewQuestion();
	}else if ($type == 'statuscheck'){
		checkstatus();
	}else if ($type == 'gotanswer'){
		gotanswer();
	}
	function gotanswer(){
		
		
    	try {
        $host = 'localhost';
        $dbname = 'test';
        $user = 'root';
        $pass = 'doa24710';
        # MySQL with PDO_MYSQL
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, 		$pass);
    } catch(PDOException $e) {echo $e;} 

		$id = $_POST['id'];
		
		
	    		
		$sql=  "select * from iwa2016 where id= :currentID";
	    
	    $q = $conn->prepare($sql);
	    $q ->bindValue(':currentID', $id);
	    $q->execute();
	    
	    $row = $q ->fetch(PDO::FETCH_ASSOC);
	    echo $row['question'];
	    
	    
	    
		
	}	
  
    
    	function submitNewQuestion(){ 
	    	
	    	
	    	
    	$question =$_POST['msg'];
    	
    	
    	try {
        $host = 'localhost';
        $dbname = 'test';
        $user = 'root';
        $pass = 'doa24710';
        # MySQL with PDO_MYSQL
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, 		$pass);
    } catch(PDOException $e) {echo $e;} 


	    	
    
		$sql=  "INSERT INTO iwa2016 (question) 
		VALUES (:question)";
	    $q = $conn->prepare($sql);
	   
	    $q->bindValue(':question',  $question);
	    $q->execute();
	   
	   echo $conn ->lastInsertId();
  
}

	function checkstatus(){
		$id= $_POST['id'];
    	
    	try {
        $host = 'localhost';
        $dbname = 'test';
        $user = 'root';
        $pass = 'doa24710';
        # MySQL with PDO_MYSQL
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, 		$pass);
    } catch(PDOException $e) {echo $e;} 

		$sql=  "select status from iwa2016 where id= :currentID;";
	    
	    $q = $conn->prepare($sql);
	    $q ->bindValue(':currentID', $id);
	    $q->execute();
	    
	    $row = $q ->fetch(PDO::FETCH_ASSOC);
	    echo $row['status'];
		
		
}
	