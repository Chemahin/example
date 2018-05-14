<?php 

	class Registration
	{
		
		public $email;
		public $firstname;
		public $lastname;
		public $password;
		public $passwordConfirm;

		function __construct(Array $data){
			$this->email = isset($data['email'])?$data['email']:null;
			$this->firstname = isset($data['firstname'])?$data['firstname']:null;
			$this->lastname = isset($data['lastname'])?$data['lastname']:null;
			$this->password = isset($data['password'])?$data['password']:null;
			$this->passwordConfirm = isset($data['passwordConfirm'])?$data['passwordConfirm']:null;
		}

		function passwordEqual(){
			return $this->password == $this->passwordConfirm;
		}

		function validate(){
			return !empty($this->email) && !empty($this->firstname) && !empty($this->lastname) && !empty($this->password) && $this->passwordEqual();
		}






	}




 ?>