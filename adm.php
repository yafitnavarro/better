	<?php

	session_start();

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title> Main</title>
		<script src="https://apis.google.com/js/platform.js" async defer></script>
	<meta name="google-signin-client_id" content="55624498957-q96asgf7ssnrri7qvv2p9loq8k39sfsa.apps.googleusercontent.com">
	</head>
	<body>
		welcome<?php
		 echo $_SESSION['userName']; ?>!
		<a href="login.php" onclick="signOut();">Sign out</a>
		<script>
 		 function signOut() {
  	  			var auth2 = gapi.auth2.getAuthInstance();
  		  		auth2.signOut().then(function () {
  	    		console.log('User signed out.');
    });
  }
</script>
	</body>


	</html>