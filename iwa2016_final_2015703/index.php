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
		<div id="gotanswer" title="Chat help">You have got an Answer</div>
	
	<script>
		
		
var currentID = 0;
	
	
	// for answer function
	
	function gotAnswer(){
		$.ajax({
			method: 'post',
			url: 'ajax.php',
			data: {type:"gotanswer", id:currentID},
			success: function(data){
			
			
				
			}
		})

	}
	// staus function for answer
	
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
	
	// function to send question to database and get current id back as last insert id
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
	//jquery function for sending question when enter key is press 
	
	$(function(){
	
	$("#msg").keypress(function(e){
		if (e.which == 13){
			
			askquestion();
		}
	});
		
   }); 
   
   
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
			 var time = new Date(unix*1000).toUTCString();
			 $("#zoneDisplay").html("<span style='color:blue';font-size:30px'>"+ time +"</span>");
			   
		    }
		    
	    })
		  
	    
}
   	
   	
   // setinterval every 1 second to check status of answer
   	
   	setInterval(function()
    { checkStatus();}, 1000);
   // set interval for getting answer and question displayed every 3 second
    
    setInterval(function()
    { $("#chatbox").load("admin/getchat.php");}, 3000);
    
  //minimize chat windows  
   $(document).ready(function(){
	  $("#header").click(function(){
		 $("#chatbody").slideToggle();
	  }); 
	  // close chat window 
	  $("#closechat").click(function(){
		 $("#box").hide();
	  }); 
	  
   });
    
    
</script>

<div id="box">
		
		<div id="header">	<h4 align="center" style="color:white">Welcome to Support Center <span id="closechat">x</span><span id="minchat">-</span></h4></div>
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
		<button class="btn btn-success" type="button" id="ask" onclick="askquestion();">Ask Question</button>
	</div>
		
			
		
	</div>	
</div>
</div>

<script>
	$("#wait").hide();
	$("#gotanswer").hide();
</script>
</body>
</html>
    
    
