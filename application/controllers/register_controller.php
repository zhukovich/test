<?
	if($app->request->post('email') && $app->request->post('pass')) {
		if($app->users->validate_email($app->request->post('email')) && $app->users->validate_pass($app->request->post('pass'))) {
			$app->users->register_this_user($app->request->post('email'), $app->request->post('pass'));
			$succes = true;
		} else {
			$error = true;
		}
	}
	require_once($app->views->template());