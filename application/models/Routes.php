<?php
	class Routes {
		public function get_route($route) {
			$filename = 'application/controllers/'.$route.'_controller.php';
			if(!file_exists($filename)) {
				return 'application/controllers/error404_controller.php';
			}
			return $filename;
		}
	}