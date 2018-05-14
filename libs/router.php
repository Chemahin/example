<?php 
	class Router{
		public static function run()
		{
			$url = isset($_GET['url'])?$_GET['url']:'home';
			$url = explode('/', $url);
			/*
						- $url[0]='home' прилетит если в строке ничего нет
			
			/user 	 	- $url[0]='user' прилетит если в строке /user
			
			/user/add 	- $url[0]='user' прилетит если в строке /user/add 
						- $url[1]='add'
			*/
			$fileController = 'controllers/'.$url[0].'Controller.php'; //путь к контроллеру
			if(file_exists($fileController))
			{
				require_once $fileController;
				$controller = new $url[0]();
				$method = isset($url[1])?$url[1]:'index';
				if(method_exists($controller, $method))
					{$controller->$method();}
				else {echo "page not found!";}
				
			}
			else
			{
				echo "page not found!";
			}
		}
	}




 ?>