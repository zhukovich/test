<html>
<head>
	<title></title>
	<link rel="stylesheet" href="/application/assets/css/styles.css">
</head>
<body>

<? if ($app->views->user) { ?>
	You're logged as <b><?=$app->views->user->email; ?></b>
	<a href="/logout">Logout</a><br>
<? } else { ?>
	<a href="/action/register">Registration</a><br>
	<a href="/action/login">Login</a><br>
<? } ?>