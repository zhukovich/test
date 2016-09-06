<?php
	header('Content-Type: text/html; charset=utf-8');
	function __autoload($class_name) {
        $filename = $class_name . '.php';
        $file = 'application/models/'.$filename;
        if (file_exists($file) == false) {
                return false;
        }
        include ($file);
	}
	$app = new App;
	if(isset($_GET['action'])){
		$action = $_GET['action']; 
		$route = $app->routes->get_route($action);
		require_once($route);
	} else {
		$action = 'index';
		$route = $app->routes->get_route($action);
		require_once($route);
	}