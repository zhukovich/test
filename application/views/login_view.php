<a href="/">Back</a><br>
<? if ($app->views->user) { ?>
	You're logged in
<? } else { ?>
	<h2>Login</h2>
	<form method="post" action="/action/login">
		<input type="email" placeholder="Email" name="email"><br>
		<input type="password" placeholder="Pass" name="pass"><br>
		<input type="submit" id="register" value="Login">
	</form>
<? } ?>
