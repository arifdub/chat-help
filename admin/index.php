<!DOCTYPE html>
<html>
<meta charset="utf-8">  
<head>  
	
	<title>Live chat help</title>  
	
	

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="../jquery/jquery-ui.theme.min.css">
<link rel="stylesheet" href="../jquery/jquery-ui.min.css">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">

  <script src="../jquery/jquery.js"></script>
  <script src="../jquery/jquery-ui.min.js"></script>


</head>
<body>
	

<script>
	function sendanswer(){
		var varMsg= $("#msg-admin").val();
		
			
			$.ajax({
				method: "post",
				url: "admin.php",
				data: {msg:varMsg},
				success: function(data){
					
				$("#msg-admin").val('');
				}
					   
			})
			
	}
	setInterval(function(){
		$("#chatbox").load('getchat.php');
	}, 1000)
			
		
    
</script>

<div id="box">
			<div id="zoneDisplay"></div>
			
			<div id="chatbox"></div>
	
	<div class="input-group">
		

	
		
		<input class="form-control" type="text" name="msg-admin" 
		id="msg-admin" placeholder="Enter your Anwer here"> 
		<button class="btn btn-success" type="button" onclick="sendanswer();" id="ask">Send</button>
	</div>
		
			
		
	</div>	
</div>

<script>
	</script>
</body>
</html>