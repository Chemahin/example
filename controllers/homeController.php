<?php 
	class Home extends Controller
	{
		public function index()
		{
			// echo __CLASS__.''.__METHOD__;
			$title = 'Welcome!';
			$user = [
				'name'=>'Victor',
				'age'=>20
			];
			//View::render('home/main', ['title'=>$title,'user'=>$user]);
			View::render('home/main', compact('title','user')); //то же самое что и выше. СОМПАКТ создает аасоциотивный массив, который в ключах содержит переданные строки, а в значениях - содержимое переменных 
		}
	}



 ?>