 <html>
 <head>
 	<title>
 		myCaptcha - rapl
 	</title>
 	 	<script>
 			function verifyCaptcha(user) {
				var http = new XMLHttpRequest();
				var url = "verify.php";
				var params = "usersAnswer="+document.getElementById('usersAnswer').value;
				http.open("POST", url, false);

				//Send the proper header information along with the request
				http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

				http.onreadystatechange = function() {//Call a function when the state changes.
				    if(http.readyState == 4 && http.status == 200) {
					        if(http.responseText==1){
					        	document.getElementById('usersAnswer')
					        		.setAttribute("style", "border-color: green;");
					        		return true;
					    	}
						    else{
								document.getElementById('usersAnswer')
									.setAttribute("style", "border-color: red;");
						    }
				    }
				}
				http.send(params);
				document.getElementById('captchaImage').src = 'imageGenerate.php?'+new Date().getTime();
				return false;
			}
</script>
 </head>
 <body>
 	<h3>myCaptcha</h3>
 	<img src="imageGenerate.php" id="captchaImage" alt="captcha" width="200" height="80" border="1">
 	<br/>
 	<a style="color:blue;cursor:pointer;" onClick="document.getElementById('captchaImage').src = 'imageGenerate.php?'+new Date().getTime();">Reload</a>
 	<form method="post" action="" onsubmit="return verifyCaptcha();">
 		<input type="text" id="usersAnswer" name="usersAnswer" placeholder="Your Answer" required>
 		<input type="submit" value="Verify">
 	</form> 



</body>
</html>