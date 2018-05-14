<?php 
	require_once 'models/user.php';
	class User extends Controller
	{
		public function index()
		{
			$title = 'All users';

			View::render('login/users', compact('title'));
		}

		public function login()
		{
			$title = 'Login';

			View::render('login/login', compact('title'));
		}

		public function singup()
		{
			$form = new Registration($_POST);
			if($_POST)
			{
				if($form->validate())
				{
					$user = new UserModel();
					$act = $user->addUser($form);
					
					Mail::send($form->email, "<a href='".URL."/user/activation?code={$act}'>link</a>");
					Session::setMessage('success','Check your email  '.$form->email);
				}
				else
				{
					Session::setMessage('danger','Invalid  data!');
				}
			}



			$title = 'singup';

			View::render('login/singup', compact('title', 'form'));
		}

		function activation ()
		{
			$code = isset($_GET['code'])?$_GET['code']:null;
			if(!empty($code))
			{
				$user = new UserModel();
				if($user->activation($code))
				{
					header('Location:'.URL.'/user/login');
				}
				else
				{
					Session::setMessage('danger','failed activation');
					header('Location:'.URL.'/user/singup');
				}
			}
		}


		public function pdfCreate()
		{
			$user = new UserModel();
			$users = $user->getAll();
			$str = '<table border="1">';
			foreach ($users as $user) {
				$s = file_get_contents(URL.'/views/login/pdf.php');
				$s = str_replace('[name]', $user['firstname'].' '.$user['lastname'], $s);
				$s = str_replace('[email]', $user['email'], $s);
				$str.=$s;
			}
			$str.= '</table>';
			$mpdf = new \Mpdf\Mpdf();
    		$mpdf->WriteHTML($str);
   			$mpdf->Output('lo.pdf', \Mpdf\Output\Destination::FILE);
		}

		public function chekEmail()
		{
			$user = new UserModel();
			echo $user::getEmail($_POST['new_email']);
			#exit();
			
		}
	}



 ?>