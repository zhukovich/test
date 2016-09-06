<?php
	class Database extends App {
		public function __construct() {
			parent::__construct();
			$this->connect();
		}
		public function __destruct() {
			$this->disconnect();
		}
		public function connect() {
			if(!empty($this->mysqli)) {
				return $this->mysqli;
			} else {
				$this->mysqli = new mysqli($this->config->db_server, $this->config->db_user, $this->config->db_password, $this->config->db_name);
				$this->mysqli->set_charset("utf8");
			}	
		}
		public function disconnect() {
			if(!@$this->mysqli->close())
				return true;
			else
				return false;
		}
		public function query($sql) {
			if(is_object($this->res))
				$this->res->free();
			return $this->res = $this->mysqli->query($sql);
		}
		public function results($res = null) {
			$results = array();
			if(!$this->res) {
				trigger_error($this->mysqli->error, E_USER_WARNING); 
				return false;
			}
			if($this->res->num_rows == 0)
				return array();
			while($row = $this->res->fetch_object()){
				if(!empty($field) && isset($row->$field))
					array_push($results, $row->$field);				
				else
					array_push($results, $row);
			}
			return $results;
		}
	}