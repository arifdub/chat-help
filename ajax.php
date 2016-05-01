<?php
		
	$type = $_POST['type'];
			
	if ($type == 'submitquestion'){
		submitNewQuestion();
	}else if ($type == 'statuscheck'){
		checkstatus();
	}else if ($type == 'gotanswer'){
		gotanswer();
	}
	else if ($type == 'getquestion'){
		getquestion();
	}
	
	function getquestion(){
		
		
    	require_once 'dbconnect.php';

		
		$sql=  "select * ,Date_format(`time`,'%H:%i') as only_time from iwa2016
		 
		order by id desc limit 1 ";
	    
	    $q = $conn->prepare($sql);
	    
	    $q->execute();
	    
	   while($row = $q ->fetch(PDO::FETCH_ASSOC)){
		   
	   
	    
	    echo "<span style='color:red'>".$row['name']. ": </span>" 
	    .$row['question']. "<span style='float:right'>".$row['only_time']."</span><br>";
	}
	}
	
	function gotanswer(){
		
		
    	require_once 'dbconnect.php';

		$id = $_POST['id'];
		$sql=  "select * ,Date_format(`time`,'%H:%i') as only_time from iwa2016 
		where id= :currentID";
	    
	    $q = $conn->prepare($sql);
	    $q ->bindValue(':currentID', $id);
	    $q->execute();
	    
	    while ($row = $q ->fetch(PDO::FETCH_ASSOC)){
	    if ($row['status'] == '1'){
		echo "<span style='color:red'>".$row['name']. ": </span>" 
	    .$row['question'] ."<span style='float:right'>".$row['only_time']."</span><br>";
	    echo "<span style='color:blue'>Member Support Team : </span>" 
	    .$row['answer']."<span style='float:right'>".$row['only_time']."</span>";
		} 
		} 
	}	
  
    
    	function submitNewQuestion(){ 
	 	$question =$_POST['msg'];
	 	$name =$_POST['name'];
	 	
    	if (!$question || !$name){
	    	
    	echo "enter name or message";
    	}else {
    	
    	require_once 'dbconnect.php';


	    	
    
		$sql=  "INSERT INTO iwa2016 (name, question) 
		VALUES (:name, :question)";
	    $q = $conn->prepare($sql);
	   
	    $q->bindValue(':question',  $question);
	    $q->bindValue(':name',  $name);
	    $q->execute();
	   
	   echo $conn ->lastInsertId();
	   }
  
}

	function checkstatus(){
		$id= $_POST['id'];
		
    	require_once 'dbconnect.php';

		$sql=  "select status from iwa2016 where id= :currentID;";
	    
	    $q = $conn->prepare($sql);
	    $q ->bindValue(':currentID', $id);
	    $q->execute();
	    
	    $row = $q ->fetch(PDO::FETCH_ASSOC);
	    echo $row['status'];
		
		
}
	