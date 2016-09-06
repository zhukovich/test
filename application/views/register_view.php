<a href="/">Back</a><br>
<? if ($app->views->user) { ?>
	You're logged in
<? } else { ?>
	<h2>Registration</h2>
	<? if($succes) { ?>
		Succes!
	<? } ?>
	<? if($error) { ?>
		Error!
	<? } ?>
	<form action="/action/register" method="post">
		<input type="email" value="" placeholder="Email" name="email" required=""><br>
		<label>least 8 characters</label><br>
		<input type="password" value="" placeholder="Pass" name="pass" required><br>
		<input type="submit" id="register" value="Registration" disabled="true">
	</form>
<? } ?>