<?
	class Files extends App {
		
		public function upload_file($tmp, $name, $user_id) {
			if(!file_exists($this->config->upload_dir.'/'.$name)) {
				move_uploaded_file($tmp, $this->config->upload_dir.'/'.$name);
				$url = $this->config->upload_dir.'/'.$name;
				$query = "INSERT INTO files (name, url, timestamp) VALUES ('$name', '$url', current_timestamp)";
				$this->database->query($query);
				$query = "SELECT id FROM files WHERE name = '$name'";
				$this->database->query($query);
				$result = $this->database->results();
				$file_id = $result[0]->id;
				$query = "INSERT INTO user_files (user_id, file_id) VALUES ($user_id, $file_id)";
				$this->database->query($query);
			}
		}

		public function get_files($user_id = null) {
			$user_filter = '';
			if($user_id) {
				$user_filter = "AND u.id = $user_id";
			}
			$query = "
			SELECT f.id, f.name, f.url, u.email as user_email FROM files f
			JOIN user_files uf ON f.id = uf.file_id
			JOIN users u ON uf.user_id = u.id
			WHERE 1
			$user_filter
			ORDER BY f.timestamp DESC
			";
			$this->database->query($query);
			return $this->database->results();
		}
		
	}