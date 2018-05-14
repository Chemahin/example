<?php 

	class UserModel extends Model
	{
		
		private  static $salt='dsfbsku4378fb743c82r2xx8%$^ng6%$#$^R^*)cjdhfsdufsgs1234567890-=qwertyuiopasdfgnbvcxzh76568ijyg%$&()*^$@!@@#';




		function addUser($form)
		{
			$password = md5(md5(self::$salt).$form->password);
			$activation = md5($form->email.time());

			$st = self::$pdo->prepare("INSERT INTO users(email,firstname,lastname,password,activation) VALUES(:email, :firstname, :lastname, :password, :activation)");
			//вернулся объект
			$st->bindParam(':email', $form->email, PDO::PARAM_STR);
			$st->bindParam(':firstname', $form->firstname, PDO::PARAM_STR);
			$st->bindParam(':lastname', $form->lastname, PDO::PARAM_STR);
			$st->bindParam(':password', $password, PDO::PARAM_STR);
			$st->bindParam(':activation', $activation, PDO::PARAM_STR);

			$st->execute();
			return $activation;
		}

		function activation($code)
		{
			$st = self::$pdo->prepare("UPDATE users SET status=1 WHERE activation=?");
			$st->execute([$code]);
			return $st->rowCount();
		}

		function getAll()
		{
			$res = self::$pdo->query("SELECT firstname, lastname, email FROM users;");
			
			return $res->fetchAll(PDO::FETCH_ASSOC);
		}
		
		static function getEmail($email)
		{
			
			$st = self::$pdo->prepare("SELECT email FROM users WHERE email=:email;");
			$st->bindParam(':email', $email, PDO::PARAM_STR);
			$st->execute();
			return $st->rowCount();// вернет количество затронутых строк последним запросом
			
		}
	}





 ?>