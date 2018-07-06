<?php 

	class Config{

	/*funkcija koja vadi elemente global niza*/

		public static function get($path){

		$config = $GLOBALS['config'];

		$path = explode('/', $path);

		foreach ($path as $part) {  		/*prolazimo kroz niz $path*/
			if(isset($config[$part])){
				$config = $config[$part];
			}
		}
		return $config;
		
	}
}



 ?>