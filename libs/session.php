<?php 

	class Session
	{
		static function init(){
			session_start();
		}
		
		static function set($key, $value){
			$_SESSION[$key] = $value;
		}

		static function get($key){
			if(isset($_SESSION[$kay]))
				return $_SESSION[$key];
		}

		static function delete($key){
			if(isset($_SESSION[$key]))
				return $_SESSION[$key];
		}

		static function setMessage($type, $text){
			$_SESSION['message'] = [$type, $text];
		}

		static function getMessageType(){
			if(isset($_SESSION['message']))
				return $_SESSION['message'][0];
		}

		static function getMessageText(){
			if(isset($_SESSION['message'])){
				$m =  $_SESSION['message'][1];
				self::delete('message');
				return $m;
			}
		}

		static function isSetSession($key){
				return isset($_SESSION[$key]);
			}
		}








	















 ?>