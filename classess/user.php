<?php 

	class User{

		private $_db,
				$_errors = array(),
				$_passed = false,
				$_data,
				$_sessionName,
				$_isLoggedin;

		public function __construct($user = null){
			$this->_db = DB::getInstance();
			$this->_sessionName = Config::get('session/session_name');

			if(!$user){
				if(Session::exists($this->_sessionName)){
					$user = Session::get($this->_sessionName);
					if($this->find($user)){
						$this->_isLoggedin = true;
					}
				}
			}else{
				$this->find($user);
			}		
		}


		public function get($item){

			if(isset($_POST[$item])){

				return $_POST[$item];

			}else if(isset($_GET[$item])){

				return $_GET[$item];
			}
		}

		public function check($source,$items = array()){
			foreach ($items as $item => $rules) {
				foreach ($rules as $rule => $rule_value) {
					$value = trim($_POST[$item]);

					if($rule === 'required' && empty($value)){
						$this->addError("{$item} is required!");
					}else if(!empty($value)){
						switch ($rule) {
							case 'min':
								if(strlen($value) < $rule_value){
								   $this->addError("{$item} lenght must be greater then {$rule_value}");
								}
								break;
							case 'max':
								if(strlen($value) > $rule_value){
									$this->addError("{$item} lenght must be less then {$rule_value}");
								}
								break;
							case 'matches':
								if($value != $source[$rule_value]){
									$this->addError("{$rule_value} must match whit {$item}");
								}
								break;
							case 'unique':
								$check = $this->_db->get($rule_value, array($item, '=', $value));
								if($check->count()){
									$this->addError("{$item} already exists");
								}
								break;
						}
					}
				}
			}
			if(empty($this->_errors)){
				$this->_passed = true;
			}
			return $this;

		}

		public function create($fields = array()){
			if(!$this->_db->insert('users', $fields)){
				throw new Exception("There was a problem creating a new account");
				
			}
		}

		public function update($fields = array(), $id = null){
			if($this->isLoggedin()){
				$id = $this->data()->id;
			}
			if(!$this->_db->update('users',$id, $fields)){
				throw new Exception("There was a problem updating account");
				
			}
		}

		public function update_user_photo($id, $field = array()){
			
		}

		public function find($username){
			$data = $this->_db->get('users',array('username', '=', $username));
			if($data->count()){
				$this->_data = $data->first();
				return true;
			}
		}


		public function login($username, $password){
			$user = $this->find($username);
			if($this->data()->password === Hash::make($password, $this->data()->salt)){
				Session::set($this->_sessionName, $this->data()->username);
				return true;
			}
			return false;
		}

		public function show_user($name){

			$sql = 'SELECT * FROM users WHERE first_name = ?';
			return  $this->_db->query($sql, array($name));
			
		}

		public function user_by_id($id){
			return $this->_db->get('users', array('id', '=', $id));
		}

	

		public function logout(){
			Session::delete($this->_sessionName);
		}

		public static function redirect($where){
			return header('Location: '. $where);
		}

		public function addError($msg){
			 $this->_errors[] = $msg;
		}

		public function passed(){
			return $this->_passed;
		}

		public function error(){
			return $this->_errors;
		}

		public function data(){
			return $this->_data;
		}

		public function isLoggedin(){
			return $this->_isLoggedin;
		}

	}

 ?>