<?
	if($app->request->post('email') && $app->request->post('pass')) {
		if($user_id = $app->users->check_password($app->request->post('email'), $app->request->post('pass'))) {
			$_SESSION['user_id'] = $user_id;
		}
	}
	if($app->request->get('logout')) {
		unset($_SESSION['user_id']);
	}
	require_once($app->views->template());