	<!DOCTYPE html>
	<html>
	<head>
		<title> Main</title>
		<script src="https://apis.google.com/js/platform.js" async defer></script>
	<meta name="google-signin-client_id" content="55624498957-q96asgf7ssnrri7qvv2p9loq8k39sfsa.apps.googleusercontent.com">
	</head>
	<body>
	<div class="g-signin2" data-onsuccess="onSignIn"></div>
	<br>
		<br>

	<br>

	<br>


	<p id='msg'> </p> 
	<script>
		function onSignIn(googleUser) {
  		  var profile = googleUser.getBasicProfile();
		  var userID = profile.getId();
		  var userName = profile.getName();
		  var userPicture = profile.getImageUrl();
		  var userEmail = profile.getEmail();
		  var userToken = googleUser.getAuthResponse().id_token;

			//document.getElementById('msg').innerHTML=userEmail;
}
			if(userName!==''){
				var dados={
						userID:userID,
						userName:userName,
						userPicture:userPicture
						userEmail:userEmail

				};
				$.post('valid.php',dados,function(retorna)){
					if(retorna==='"error"'){

					var msg="user not permission";	
					document.getElementById('msg').innerHTML = msg;

					}else{
						window.location.href=retorna;
					}
				document.getElementById('msg').innerHTML = retorna;

				}
			}
			else{
				var msg="error!";
				document.getElementById('msg').innerHTML = msg;
			}
			}


		</script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
		</script>
</body>
</html>

