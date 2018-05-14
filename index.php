<?php 
    require_once 'libs/config.php';
    // require_once 'libs/router.php';
    // require_once 'libs/controller.php';
    // require_once 'libs/view.php';
    // require_once 'libs/model.php';

	// функция автозагрузки КЛАССОВ


    # 1
		// function __autoload($class)
		// {
		// 	require_once 'libs/'.$class.'.php';
		// }

    # 2

    spl_autoload_register(function ($class){
    	require_once 'libs/'.$class.'.php';
    });
    require 'vendor/autoload.php';
   
   

  
     Router::run();

 ?>

   
    

    
   