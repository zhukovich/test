<?
	class Users extends App {
		
		public function validate_email($email) {
			if(!!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$query = "SELECT COUNT(email) as count FROM users WHERE email = '$email'";
				$this->database->query($query);
				$result = $this->database->results();
				if($result[0]->count == 0)
					return true;
			} 
		}

		public function validate_pass($pass) {
			if(!count($pass) < 8) {
				return true;
			}
		}

		public function register_this_user($email, $pass) {
			$pass = md5($pass);
			$query = "INSERT INTO users (email, pass) VALUES ('$email', '$pass')";
			$this->database->query($query);
		}

		public function check_password($email, $pass) {
			$pass = md5($pass);
			$query = "SELECT id FROM users WHERE email = '$email' AND pass = '$pass'";
			$this->database->query($query);
			$result = $this->database->results();
			if($result[0]->id) {
				return $result[0]->id;
			} else {
				return false;
			}
		}

		public function get_user($id) {
			$query = "SELECT * FROM users WHERE id = $id";
			$this->database->query($query);
			$result = $this->database->results();
			return $result[0];
		}

	}