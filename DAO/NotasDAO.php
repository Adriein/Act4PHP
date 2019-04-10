<?php
require_once("../DAO/DBConnection.php");
class NotasDAO{

  function login($dni, $apellido){
    $conection = new DBConnection();
    $query = "select * from usuario where dni='".$dni."'";
    $result = mysqli_query($conection, $query);
    $numRows = mysqli_num_rows($result);

    if($numRows == 0){
      return 'not found';

    }else{
      while($fila = mysqli_fetch_array($result)){
        extract($fila);

        if($tipo_usuario == 0){
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
    require_once("../variables.php");

    $conection = mysqli_connect($host, $user, $pass, $dbName) or die("Error de conexion a la base de datos");
    $query = "insert into usuario(dni, apellido, tipo_usuario) values ('".$dni."', '".$apellido."', '".$tipo_usuario."')";
    $result = mysqli_query($conection, $query);
    mysqli_close($conection);
    return $result;
  }

  function createSubject($subjectName){
    require_once("../variables.php");

    $conection = mysqli_connect($host, $user, $pass, $dbName) or die("Error de conexion a la base de datos");
    $query = "select * from asignatura where nombre='".$subjectName."'";
    $result = mysqli_query($conection, $query);
    $numRows = mysqli_num_rows($result);

    if($numRows == 0){
      $query = "insert into asignatura(nombre) values ('".$subjectName."')";
      $result = mysqli_query($conection, $query);

    }else{
      $result = false;

    }

    mysqli_close($conection);
    return $result;
  }

  function getAllUsers(){
    require_once("../variables.php");

    $conection = mysqli_connect($host, $user, $pass, $dbName) or die("Error de conexion a la base de datos");
    //$conection = mysqli_connect('localhost', 'root', 'fihoca', 'academia') or die("Error de conexion a la base de datos");
    $query = "select * from usuario";
    $result = mysqli_query($conection, $query);
    $numRows = mysqli_num_rows($result);

    while($fila = mysqli_fetch_array($result)){
      extract($fila);
      if($tipo_usuario != 0){
          $allUsers[] = array($dni => $apellido);
      }

    }
    mysqli_close($conection);
    return $allUsers;
  }

  function deleteUser(){

  }

  function updateUser(){

  }
}

?>
