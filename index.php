<!DOCTYPE html>
<html>
<meta charset="utf-8">  
<head>  
	
	<title>Live chat help</title>  
	
	

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="jquery/jquery-ui.theme.min.css">
<link rel="stylesheet" href="jquery/jquery-ui.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">

  <script src="jquery/jquery.js"></script>
  <script src="jquery/jquery-ui.min.js"></script>


</head>
<body>
	
		<div id="wait" title="Chat help">Please wait one of our team member will answer your question</div>
	
	<script>
		
		
var currentID = 0;


	function gotAnswer(){
		$.ajax({
			method: 'post',
			url: 'ajax.php',
			data: {type:"gotanswer", id:currentID},
			success: function(data){
			$("#chatbox").html(data);
			
				
			}
		})

	}
	
	function checkStatus(){
		
		$.ajax({
			method:'post',
			url: 'ajax.php',
			data: {type: "statuscheck", id:currentID},
			success: function(data){
				if(data == '1'){
					gotAnswer();
					$("#wait").dialog('close');
				
				}
				
			}	
		})

	}
	
	
	function askquestion(){
		var varMsg= $("#msg").val();
		var varName= $("#name").val();
			
			$.ajax({
				method: "post",
				url: "ajax.php",
				data: {type:"submitquestion" , msg:varMsg,
				name:varName},
				success: function(data){
				currentID = data;
				
				$("#wait").dialog({
					modal: true,
					title: 'Message Sent',
					width: 400,
					buttons : {
					Ok: function() {
                    $(this).dialog("close"); //closing on Ok 					click
                	}
            		},
				});
				
				$("#msg").val('');
				}
					   
			})
			
	}
		
    
   
 //function to get time and date from api (timezoneDB.com)    
    function timeZone(){
    var ZoneName = $("#zone").val();
    
	    $.ajax({
		    method: "GET",
		    url: 'http://api.timezonedb.com/?zone={zone}&format=json&key=WTU4LLBZ20OF'
		    .replace('{zone}', ZoneName),
		    success: function(data){
			 	console.log(data);
			 var unix=data.timestamp;
			 var D = new Date(unix*1000).toUTCString();
			 $("#zoneDisplay").html("<span style='color:blue';font-size:30px'>"+ D +"</span>");
			   
		    }
		    
	    })
		  
	    
}
   	
   	function getquestion(){
	   	$.ajax({
		   	method: "post",
		   	url: "ajax.php",
		   	data: {type:"getquestion"},
		   	success: function(data){
			   	$("#chatbox").html(data);
		   	}
	   	})
   	}
   
   	$(function(){
	   $("#ask").click(function(){
		   askquestion();
		   getquestion();
		   
	   });	
   	});
   	
   	setInterval(function()
    { checkStatus();}, 1000);
    
    
   $(document).ready(function(){
	  $("#header").click(function(){
		 $("#chatbody").slideToggle();
	  }); 
   });
    
    
</script>

<div id="box">
		
		<div id="header">	<h4 align="center" style="color:white">Welcome to Support Center <button id="minchat" style="float:right">-</button></h4></div>
		<div id="chatbody">
		
		<div id="timezone">
			<form>
		 		<div class="form-group">	
			 	 			
			 	SELECT TIME ZONE
	<select class="form-control" name="zone" id="zone" onchange="timeZone();">
		<option>Please select zone</option>
				  <option value="Europe/Dublin">Europe/Dublin</option>
				  <option value="Europe/Andorra">Europe/Andorra</option>
				  <option value="Asia/Dubai">Asia/Dubai</option>
				  <option value="Asia/Kabul">Asia/Kabul</option>
				  <option value="America/Antigua">America/Antigua</option>
				  <option value="Europe/Dublin">Europe/Dublin</option>
				   
				   <option value="Indian/Comoro">Indian/Comoro</option>
				  <option value="Africa/Lagos">Africa/Lagos</option>
				  <option value="Asia/Tokyo">Asia/Tokyo</option>
				  <option value="Europe/Malta">Europe/Malta</option>
				  <option value="Pacific/Efate">Pacific/Efate</option>
			  
			  
			</select>
 				</div>
			</form>
			
		</div>
			<div id="zoneDisplay"></div>
			
			<div id="chatbox"></div>
	
	<div class="input-group">
		

	
		<input class="form-control" type="text" name="name" 
		id="name" placeholder="Your Name">  
		<input class="form-control" type="text" name="msg" 
		id="msg" placeholder="Enter your Question here"> 
		<button class="btn btn-success" type="button" id="ask">Send</button>
	</div>
		
			
		
	</div>	
</div>
</div>

<script>
	$("#wait").hide();
</script>
</body>
</html>
    
    
