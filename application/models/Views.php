<?php
	class Views extends App {

		public $user;

		public function __construct() {
			
			parent::__construct();

			if (isset($_SESSION['user_id'])) {
				$user = $this->users->get_user($_SESSION['user_id']);
				$this->user = $user;
			}
		}

		public function template($template = null) {
			if ($template) {
				$filename = 'application/'.$this->config->template_dir.'/'.$template.'_view.php';
				if(file_exists($filename)) {
					return $filename;
				}
			} else {
				$filename = 'application/'.$this->config->template_dir.'/template_view.php';
				if(file_exists($filename)) {
					return $filename;
				}
			}
		}
	}