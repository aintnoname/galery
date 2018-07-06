<?php 

	class DB {

		private static $_instance = null;
		private $_pdo,
				$_query,
				$_errors = false,
				$_result,
				$_count = 0;
				

		private function __construct(){
			try{
				$this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/db'), Config::get('mysql/user'),Config::get('mysql/password'));
			} catch(PDOException $e){
				die($e->getMessage());
			}

		}

		public static function getInstance(){

			if(!isset(self::$_instance)){

				self::$_instance = new DB();
			}
				return self::$_instance;
		}
		

		public function query($sql, $params = array()){
			$this->_errors = false;
			if($this->_query = $this->_pdo->prepare($sql)){
				$x = 1;
				if(count($params)){
					foreach ($params as $param) {
						$this->_query->bindValue($x,$param);
						$x++;
					}
				}
				if($this->_query->execute()){
					$this->_result = $this->_query->fetchAll(PDO::FETCH_OBJ);
					$this->_count = $this->_query->rowCount();
				}else{
					$this->_errors = true;
				}
			}
			return $this;

		}

		public function action($action, $table, $where = array()){
			if(count($where) === 3){
				$operators = array('=','<','>','<=','>=');

				$field = $where[0];
				$operator = $where[1];
				$value = $where[2];
				if(in_array($operator, $operators)){
					$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
					if($this->query($sql, array($value))->error()){
						return $this;
					}
				}
			}
			return $this;
		}

		public function insert($table, $fields = array()){
			if(count($fields)){
				$keys = array_keys($fields);
				$value = '';
				$x = 1;

				foreach ($fields as $field) {
					$value .= '?';
					if($x<count($fields)){
						$value .= ', ';
					}
					$x++;
				}
				$sql = "INSERT INTO $table (`".implode('`, `', $keys)."`) VALUES ({$value})";
					if(!$this->query($sql, $fields)->error()){
					return true;
			}

			}
			return false;

		}


		public function update($table, $id, $fields = array()){
			$set = '';
			$x = 1;

			if(count($fields)){
				foreach ($fields as $name => $field) {
					$set .= "{$name} = ?";
					if($x<count($fields)){
						$set.= ', ';
					}
					$x++;
				}
				$sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
				if(!$this->query($sql, $fields)->error()){
					return true;
				}
			}
			return false;	
		}

		public function find_all($table){
		$sql = "SELECT * FROM {$table}";

			if($this->_query = $this->_pdo->prepare($sql)){
				if($this->_query->execute()){
					$this->_result = $this->_query->fetchAll(PDO::FETCH_OBJ);
					$this->_count = $this->_query->rowCount();
				}else{
					$this->_error = true;
				}
			}
			return $this;
	}

		public function search_user(){

			$sql = "SELECT * FROM users WHERE username LIKE '%".$_POST["user"]."%'";

			if($this->_query = $this->_pdo->prepare($sql)){
				if($this->_query->execute()){
					$this->_result = $this->_query->fetchAll(PDO::FETCH_OBJ);
					$this->_count = $this->_query->rowCount();
				}else{
					$this->_error = true;
				}
			}
			return $this;
			
		}

		public function get($table, $where){
			return $this->action("SELECT * ", $table, $where);
		}

		public function delete($table, $where){
			return $this->action("DELETE ", $table, $where);
		}


		public function result(){
			return $this->_result;
		}

		public function first(){
			return $this->result()[0];
		}

		public function error(){
			return $this->_errors;
		}

		public function count(){
			return $this->_count;
		}

		
	}

 ?>