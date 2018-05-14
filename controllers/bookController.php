<?php 
	require_once 'models/book.php';

	class Book extends Controller
	{
		public function index()
		{
			$title = 'All Books';
			$model = new BookModel();
			$books = BookModel::all();
			View::render('books/book', compact('title', 'books'));
		}

		public function add()
		{
			$m = new BookModel();
			$categories = $m::getCatrgories();
			$themes = $m::getThemes();

			$title = 'Add book';
			View::render('books/add', compact('title', 'categories', 'themes'));


		}

		public function categories()
		{
			$title = 'Categories';
			View::render('books/categories', compact('title'));
		}
		
		public function delete()
		{
			$id = isset($_GET['id'])?$_GET['id']:'';
			if($id!='')
			{
				$m = new BookModel();
				$m::deleteById($id);
			}
			header('Location:'.URL.'/book');
		}
		public function create()
		{
			$name = isset($_POST['name'])?$_POST['name']:'';
			$price = isset($_POST['price'])?$_POST['price']:'';
			$category = isset($_POST['category'])?$_POST['category']:'';
			$themes = isset($_POST['themes'])?$_POST['themes']:'';
			$new = isset($_POST['new'])?1:0;
			
			$m = new BookModel();
			$m::addBook(compact('name','price','ategory','themes','new'));
			
			header('Location:'.URL.'/book');
		}
		
		public function edit()
		{
			
		}
		
		public function changeNew()
		{
			$m = new BookModel();
			echo $m::changeNew($_POST['id_book'], $_POST['new_book']);
			exit();
		}
		public function nextPage()
		{
			$model = new BookModel();
			$books = BookModel::all($_POST['page']);
			echo json_encode($books);

		}


	}



 ?>