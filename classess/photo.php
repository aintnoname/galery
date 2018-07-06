<?php 

	class Photo{
		private $_db = null,
				$_photo;

		public $tmp_name,
			   $filename,
			   $errors = array();

		public $upload_errors_array = array(

			UPLOAD_ERR_OK 			=> 'There is no error',
			UPLOAD_ERR_INI_SIZE		=> 'The uploaded file exceeds the upload_max_filesize..',
			UPLOAD_ERR_FORM_SIZE 	=> 'The uploaded file exceeds the 	MAX_FILE_SIZE directory',
			UPLOAD_ERR_PARTIAL 		=> 'The uploaded file was only partialy uploaded',
			UPLOAD_ERR_NO_FILE 		=> 'No file was uploaded',
			UPLOAD_ERR_NO_TMP_DIR	=> 'Missing a temporary folder',
			UPLOAD_ERR_CANT_WRITE   => 'Failed to write file to disk',
			UPLOAD_ERR_EXTENSION    => 'A PHP extension stoppped the file upload'

	);


		public function __construct(){

			$this->_db = DB::getInstance();
		}

	public function picture_path(){
		return $this->filename;
	}


	public function set_file($file){

		if(empty($file) || !$file || !is_array($file)){
			$this->errors[] = 'There was no file uploaded';
			return false;
		}elseif($file['error'] != 0){
			$this->errors[] = $this->upload_errors_array[$file['error']];
			return false;
		}else{
			$this->tmp_name = $file['tmp_name'];
			$this->fillename = basename($file['name']);
		}
	}

	public function upload_photo($fields = array()){

		//echo $fields['tmp_name'];

			if(!empty($fields)){

				
				$target_path = SITE_ROOT.S.'images'.S.$fields['filename'];

				if(move_uploaded_file($this->tmp_name, $target_path)){
					$this->_db->insert('photos', $fields);
					unset($this->tmp_name);
					User::redirect('users.php');
					return true;
				}
			}	
	}

	public function all_photos($table){
		return $this->_db->find_all($table);
	}

	public function photos_by_id($id){

		//return $id;

		return $this->_db->get('photos', array('user_id', '=', $id));

		// $photo =  $this->_db->get('photos', array('user_id', '=', $id));
		// if($photo->count()){
		// 	$this->_photo = $photo->result();
		// 	// return true;
		// }
	}

	public function photo_by_id($id){

		return $this->_db->get('photos', array('id', '=', $id));
	}




	

	public function delete_photo($id){

		$sql = "SELECT filename FROM photos WHERE id = ?";
		$file =  $this->_db->query($sql, array($id));
		$file_name = $file->first()->filename;

		if($this->_db->delete('photos', array('id', '=', $id))){
			
			return unlink("images/".$file_name);

			
		}
	}

	public function error(){
		return $this->errors;
	}

	

}

 ?>