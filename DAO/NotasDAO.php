<?php



  function login($dni, $apellido){
    require_once("../variables.php");

    $conection = mysqli_connect($host, $user, $pass, $dbName) or die("Error de conexion a la base de datos");
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
  }

  function redirect($page){
    if($page == 'admin'){
      header('Location: ../Views/admin.html');

    }
    if($page == 'user'){
      header('Location: ../Views/user.html');

    }
    if($page == 'not found'){
      header('Location: ../Views/index.html');

    }
  }

  function createUser($dni, $apellido, $tipo_usuario){
    require_once("../variables.php");

    $conection = mysqli_connect($host, $user, $pass, $dbName) or die("Error de conexion a la base de datos");
    $query = "insert into usuario(dni, apellido, tipo_usuario) values ('".$dni."', '".$apellido."', ".$tipo_usuario.");
    $result = mysqli_query($conection, $query);
    
  }

  function deleteUser(){

  }

  function updateUser(){

  }

  function selectUser(){

  }

?>
