<?php
session_start();
require('db_class.php');
$obj = new Db_Class();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <title>PHP PostgreSQL CRUD teste</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

  <style>
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    footer {
      background-color: #c0c0c0;
      padding: 50px;
    }

    p.ex {
      color:rgb(0,0,255);
      text-align:center;
      padding: 30px;
    }

    .tb {
      width: 100%;
      max-width: 800px;
      margin: auto; 
    }

  </style>
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
      <!-- <a class="navbar-brand" href="#">PHP4EVER</a> -->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a>Crud - PHP - Teste</a></li>        
      </ul>       
    </div>
  </div>
</nav>