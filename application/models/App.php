<?php
	class App {
		function load_classes() {
			$dir = new DirectoryIterator("application/models");
			$classes = array();
			foreach ($dir as $fileinfo) {
			    if ($fileinfo->isFile()) {
			       $classes[strtolower($fileinfo->getBasename(".php"))] = $fileinfo->getBasename(".php");
			    }
			}
			return $classes;
		}

		private $classes;

		private static $objects = array();

		public function __construct() {
			$this->classes = $this->load_classes();
		}

		public function __get($name) {
			if(isset(self::$objects[$name])) {
				return(self::$objects[$name]);
			}
			if(!array_key_exists($name, $this->classes)) {
				return null;
			}
			$class = $this->classes[$name];
			include_once(dirname(__FILE__).'/'.$class.'.php');
			self::$objects[$name] = new $class();
			return self::$objects[$name];
		}
	}