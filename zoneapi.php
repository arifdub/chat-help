<?php
	
	
			
		$ZoneName = $_POST['zone'];
	
	if ($_POST['zone']){
		
		// get content from api url ...
		
	$urlcontent = file_get_contents ("http://api.timezonedb.com/?zone=$ZoneName&format=json&key=WTU4LLBZ20OF");
		
		//decode json code to get array 
				
		$timeArray = json_decode($urlcontent, true);
		// get ['timestamp'] array from json file
				
		$time_unix = $timeArray ['timestamp'];
		//above time show is unix time `(1461191748)
		$zone = $timeArray ['zoneName'];
		
		$countrycode = $timeArray ['countryCode'];
		// convert unix time into normal datae and time
		
		$time = gmdate("Y-m-d\ T H:i:s \Z", $time_unix);	
		echo $time . "<br>"	;
		echo "<span style='color:red'> Country Code :</span> ". $countrycode ;
		
						
		
		
		
						
	}		
	
?>
