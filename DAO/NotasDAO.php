<?php
require_once("../DAO/DBConnection.php");
require_once("../Model/Alumno.php");
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
      header('Location: ../Views/login.php?message='.$message);

    }
    if($page == 'login'){
      header('Location: ../Views/login.php?message='.$message);

    }
  }

  function createUser($dni, $apellido, $tipo_usuario){
    $conection = new DBConnection();

    if($this->checkIfUserExist($dni, $tipo_usuario)){
      $query = "insert into usuario(dni, apellido, tipo_usuario) values ('".$dni."', '".$apellido."', '".$tipo_usuario."')";
      $conection->executeQuery($query);
      return true;

    }else{
      return false;

    }

    $conection->disconect();
  }

  function createSubject($subjectName){

    $conection = new DBConnection();
    $query = "select * from asignatura where nombre='".$subjectName."'";
    $conection->executeQuery($query);

    if($conection->getNumRows() == 0){
      $query = "insert into asignatura(nombre) values ('".$subjectName."')";
      $conection->executeQuery($query);
      $result = true;

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

    foreach ($conection->getRows() as $user) {
      if($user['tipo_usuario'] != 0){
        $alumno = new Alumno($user['dni'],$user['apellido']);
        $allUsers[] = $alumno;

      }
    }

    $conection->disconect();
    return $allUsers;
  }

  function deleteUser($user){
    $conection = new DBConnection();
    $query = "delete from usuario where dni='".$user."'";
    $conection->executeQuery($query);

    $conection->disconect();

    return true;
  }

  function updateUser($user){
    $conection = new DBConnection();
    $query = "update usuario set apellido='".$user."'where dni='".$user."'";
    $conection->executeQuery($query);

    $query = "select * from usuario where apellido=".$user->getLastName();
    $conection->executeQuery($query);

    if($conection->getRows() == 0){
      return false;

    }else{
      return true;
    }
  }

  function checkIfUserExist($dni,$tipo_usuario){
    $conection = new DBConnection();
    $query = "select * from usuario";
    $conection->executeQuery($query);
    $createUser = true;

    foreach ($conection->getRows() as $user) {
      if($user['dni'] == $dni && $user['tipo_usuario'] == $tipo_usuario){
        $createUser = false;
        break;
      }
    }
    $conection->disconect();
    return $createUser;
  }
}

?>
