<?php
  require_once("../DAO/NotasDAO.php");
  session_start();

  $dni = $_POST['dni'];
  $pass = $_POST['lastName'];

  $notasDAO = new NotasDAO();

  if($_POST['submit'] == 'Login'){
    if($dni != '' && $pass != ''){
      $page = $notasDAO->login($dni, $pass);

      if($page == 'not found'){
        $notasDAO->redirect($page, "Usuario no encontrado");

      }else{
        $notasDAO->redirect($page, '');

      }
    }else{
      $notasDAO->redirect("index", "Los campos no pueden estar vacios");
    }
  }
  if($_POST['submit'] == 'Register'){
    if($dni != '' && $pass != ''){
      if(isset($_POST['admin'])){
        $tipoUsuario = 0;
        $insert = $notasDAO->createUser($dni, $pass, $tipoUsuario);

        if($insert == false){
          $notasDAO->redirect("admin", "Error, el administrador ya existe");

        }else{
          $notasDAO->redirect("admin", "Administrador registrado correctamente");

        }

      }else{
        $tipoUsuario = 1;
        $insert = $notasDAO->createUser($dni, $pass, $tipoUsuario);

        if($insert == false){
          $notasDAO->redirect("admin", "Error, el usuario ya existe");

        }else{
          $notasDAO->redirect("admin", "Usuario registrado correctamente");
          $notasDAO->getAllUsers();
        }
      }
    }else{
      $notasDAO->redirect("admin", "Los campos no pueden estar vacios");
    }
  }
  if($_POST['submit'] == 'Crear'){
    $subjectName = $_POST['nombre'];
    $insert = $notasDAO->createSubject($subjectName);

    if($insert == false){
      $notasDAO->redirect("admin", "Error, la asignatura ya existe");

    }else{
      $notasDAO->redirect("admin", "Asignatura creada correctamente");

    }
  }

  //echo var_dump($_POST);










 ?>
