<?php
require_once("../DAO/DBConnection.php");
class NotasDAO{

  function login($dni, $apellido){
    $conection = new DBConnection();
    $query = "select * from usuario where dni='".$dni."'";
    $conection->executeQuery($query);

    if($conection->getNumRows() == 0){
      return 'not found';

    }else{
      $result = $conection->getRows();
      foreach ($result as $value) {
        if($value['tipo_usuario'] == 0){
          return 'admin';

        }else{
          return 'user';

        }
      }
    }

    $conection->disconect();
  }

  function redirect($page, $message){
    if($page == 'admin'){
      header('Location: ../Views/admin.php?message='.$message);

    }
    if($page == 'user'){
      header('Location: ../Views/user.php?message='.$message);

    }
    if($page == 'not found'){
      header('Location: ../Views/index.php?message='.$message);

    }
    if($page == 'index'){
      header('Location: ../Views/index.php?message='.$message);

    }
  }

  function createUser($dni, $apellido, $tipo_usuario){

    $conection = new DBConnection();
    $query = "insert into usuario(dni, apellido, tipo_usuario) values ('".$dni."', '".$apellido."', '".$tipo_usuario."')";
    $conection->executeQuery($query);

    $conection->disconect();
    return $result;
  }

  function createSubject($subjectName){

    $conection = new DBConnection();
    $query = "select * from asignatura where nombre='".$subjectName."'";
    $conection->executeQuery($query);

    if($conection->getNumRows() == 0){
      $query = "insert into asignatura(nombre) values ('".$subjectName."')";
      $conection->executeQuery($query);

    }else{
      $result = false;

    }

    $conection->disconect();
    return $result;
  }

  function getAllUsers(){

    $conection = new DBConnection();
    $query = "select * from usuario";
    $conection->executeQuery($query);

    foreach ($conection->getRows() as $value) {
      if($value['tipo_usuario'] != 0){
        $allUsers[] = array($value['dni'] => $value['apellido']);

      }
    }

    $conection->disconect();
    return $allUsers;
  }

  function deleteUser(){

  }

  function updateUser(){

  }
}

?>
