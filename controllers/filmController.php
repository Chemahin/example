<?php 

	require_once 'models/film.php';

	use Sunra\PhpSimple\HtmlDomParser;
	class Film extends Controller
	{
		
		public function index()
		{
			$m = new FilmModel();
			$m = FilmModel::all();
			View::render('films/films', compact('m'));

		}

		function add()
		{
			$numP=1;

			// if(isset($_COOKIE["more"]))
			// {
			// 	$numP = $_COOKIE["more"]+1;
			// 	if(isset($_POST['name']))
			// 	{
			// 		setcookie("more", $numP*1+1 , time() + 3600);
			// 	}				
			// }
			// else
			// {
			// 	setcookie("more", 1, time() + 3600);
			// 	$numP = 1;
			// }
			// //$numP = 1;
			
			if(isset($_POST['name']))
				{
					if(isset($_COOKIE["more"]))
					{
						$numP = $_COOKIE["more"]*1+1;
						setcookie("more", $numP , time() + 3600);
					}
					else
					{
						$numP = 1;
						setcookie("more", $numP, time() + 3600);
						
					}
				}	
			
			
			$str = file_get_contents('http://kinogo.cc/page/'.$numP.'/');

			
			$dom = HtmlDomParser::str_get_html($str);

			$arrFilms = [
				'name'=>[],
				'info'=>[],
			];



			$h2 = $dom->find('.zagolovki');
			foreach ($h2 as $name) {
				$arrFilms['name'][]=$name->plaintext;
			}

		

			$desc = $dom->find('.shortimg');
			foreach ($desc as $info) {
				$st = $info->plaintext;
				$pos = strpos($st,'Год');
				$st = substr($st, 0, $pos);
				$arrFilms['info'][]= $st;	
			}
			
			$m = new FilmModel();
			$m::addFilm($arrFilms);
			header('Location:'.URL.'/film');


			
		}



	}




	