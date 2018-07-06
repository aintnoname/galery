<?php 

	class Comment {

		private $_db;



		public function __construct(){

			$this->_db = DB::getInstance();

		}

		public function create_comment($where, $fields = array()){
				// var_dump($fields);
				$this->_db->insert($where, $fields);

		}


		public function show_comment($id){
			return $this->_db->get('comments', array('photo_id', '=', $id));
		}








	}




 ?>