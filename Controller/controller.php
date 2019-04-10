<?php
  require_once("../DAO/NotasDAO.php");
  session_start();

  $dni = $_POST['dni'];
  $pass = $_POST['lastName'];

  if($_POST['submit'] == 'Login'){
    $page = login($dni, $pass);
    redirect($page);

  }
  if($_POST['submit'] == 'Register'){
    echo"from admin page";
  }

  echo var_dump($_POST);










 ?>
