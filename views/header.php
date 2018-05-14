<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MVC</title>
    <link href="<?= URL ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= URL ?>/assets/css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?= URL ?>">Home</a></li>
        <li><a href="<?= URL ?>/user">Users</a></li>

	    <li class="dropdown">
	        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Books<span class="caret"></span></a>
	        <ul class="dropdown-menu">
	          <li><a href="<?= URL ?>/book">All Books</a></li>
	          <li><a href="<?= URL ?>/book/add">Add book</a></li>
	          <li><a href="<?= URL ?>/book/categories">Categories</a></li>
	        </ul>
      </li> 

        <li><a href="<?= URL ?>/film/add">Films</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?= URL ?>/user/singup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="<?= URL ?>/user/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>