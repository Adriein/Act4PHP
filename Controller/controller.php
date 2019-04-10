<?php
  require_once("../DAO/NotasDAO.php");
  session_start();

  $dni = $_POST['dni'];
  $pass = $_POST['lastName'];

  if($_POST['submit'] == 'Login'){
    if($dni != '' && $pass != ''){
      $page = login($dni, $pass);

      if($page == 'not found'){
        redirect($page, "Usuario no encontrado");

      }else{
        redirect($page, '');
      }
    }else{
      redirect("index", "Los campos no pueden estar vacios");
    }
  }
  if($_POST['submit'] == 'Register'){
    if($dni != '' && $pass != ''){
      if(isset($_POST['admin'])){
        $tipoUsuario = 0;
        $insert = createUser($dni, $pass, $tipoUsuario);

        if($insert == false){
          redirect("admin", "Error, el administrador ya existe");

        }else{
          redirect("admin", "Administrador registrado correctamente");
        }

      }else{
        $tipoUsuario = 1;
        $insert = createUser($dni, $pass, $tipoUsuario);

        if($insert == false){
          redirect("admin", "Error, el usuario ya existe");

        }else{
          redirect("admin", "Usuario registrado correctamente");
        }
      }
    }else{
      redirect("admin", "Los campos no pueden estar vacios");
    }
  }
  if($_POST['submit'] == 'Crear'){
    $subjectName = $_POST['nombre'];
    $insert = createSubject($subjectName);

    if($insert == false){
      redirect("admin", "Error, la asignatura ya existe");

    }else{
      redirect("admin", "Asignatura creada correctamente");

    }
  }

  echo var_dump($_POST);










 ?>
