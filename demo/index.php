 <html>
 <head>
 	<title>
 		Demo - myCaptcha - rapl
 	</title>
 	 	<script>
 			function verifyCaptcha() {
				var http = new XMLHttpRequest();
				var url = "../verify.php";
				var params = "usersAnswer="+document.getElementById('usersAnswer').value;
				http.open("POST", url, false);

				//Send the proper header information along with the request
				http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

				http.onreadystatechange = function() {//Call a function when the state changes.
				    if(http.readyState == 4 && http.status == 200) {
					        if(http.responseText==1){
					        	document.getElementById('usersAnswer')
					        		.setAttribute("style", "border-color: green;");
					        	document.forms["captchaform"].submit()	
					    	}
						    else{
								document.getElementById('usersAnswer')
									.setAttribute("style", "border-color: red;");
								document.getElementById('captchaImage')
					        		.setAttribute("style", "border-color: red;");
						    }
				    }
				}
				http.send(params);
				document.getElementById('captchaImage').src = '../imageGenerate.php?'+new Date().getTime();
				return false;
			}
</script>
 </head>
 <body>
 	<h3>Login Form</h3>
	<form name="captchaform" method="post" action="submit.php" onsubmit="return verifyCaptcha();">
	<label for="usersEmail">Email</label>
	<input type="text" id="usersEmail" name="usersEmail" placeholder="Email" required><br/>
	<label for="usersPassword">Password</label>
	<input type="text" id="usersPassword" name="usersPassword" placeholder="Password" required><br/>
 	<img src="../imageGenerate.php" id="captchaImage" alt="captcha" width="200" height="80" border="1">
 	<br/>
 	<a style="color:blue;cursor:pointer;" onClick="document.getElementById('captchaImage').src = '../imageGenerate.php?'+new Date().getTime();">Try Different Captcha?</a><br/>
	<input type="text" id="usersAnswer" name="usersAnswer" placeholder="Your Answer To Captcha" required>
	<input type="submit" value="Verify And Submit">
 	</form> 



</body>
</html>