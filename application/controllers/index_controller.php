<?php
	
	if ($app->views->user && $file = $app->request->files('file')) {
		$app->files->upload_file($file['tmp_name'], $file['name'], $app->views->user->id);
	}
	$files = $app->files->get_files($app->views->user->id);
	require_once($app->views->template());