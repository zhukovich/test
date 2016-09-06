<?php
	
	if ($app->views->user && $file = $app->request->files('file')) {
		$app->files->upload_file($file['tmp_name'], $file['name'], $app->views->user->id);
	}
	$all_files = $app->files->get_files();
	require_once($app->views->template());