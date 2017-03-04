<html>
<head>
</head>
<body>
	<div id="form-signin-container">
		<form id="form-signin" class="box" action="./loging.php" method="POST">
			<h2 id="form-signin-heading">Please Sign In</h2>
			<div class="input-group" style="padding: 10px 0 10px 0;">
				<span class="input-group-addon">Team name</span> <input class="form-control" name="teamname"
					id="teamname" type="text" placeholder="Team ID">
			</div>
			<input type="password" id="password" name="password"
				class="form-control" placeholder="Password" style="margin-bottom: 10px;">
				<br>
			<button class="btn btn-large btn-primary centerh"
				style="width: 100px;" id="btn-login" type="submit" name="submit" value="submit">Sign in</button>
		</form>
	</div>
</body>
