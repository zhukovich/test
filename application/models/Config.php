<?php
	class Config {
		public $config_file = 'application/configs/config.php';

		private $vars = array();
		
		public function __construct() {
			$ini = parse_ini_file($this->config_file);
			foreach($ini as $var=>$value) 
				$this->vars[$var] = $value;
		}

		public function __get($name)
		{
			if(isset($this->vars[$name]))
				return $this->vars[$name];
			else
				return null;
		}
	}