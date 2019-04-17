<?php
require_once("../DAO/DBConnection.php");
require_once("../Model/Alumno.php");
require_once("../Model/Asignatura.php");
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

  function updateSubject($identificador, $subjectName){
    $conection = new DBConnection();
    if($subjectName == ''){
      return false;
    }else{
      $query = "update asignatura set nombre='".$subjectName."' where identificador='".$identificador."'";
      $conection->executeQuery($query);
      $conection->disconect();
      return true;
    }
  }

  function getSubject($alumno){
    $conection = new DBConnection();
    $query = "select asignatura.nombre from nota
                  inner join usuario on nota.alumno = usuario.dni inner join asignatura on nota.asignatura = asignatura.identificador where nota.alumno ='".$alumno."'";
    $conection->executeQuery($query);

    foreach ($conection->getRows() as $result) {
      $asignatura = new Asignatura($result['identificador'],$result['nombre']);
      $allSubjects[] = $asignatura;
    }
    $conection->disconect();
    return $allSubjects;

  }

  function getAllSubjects(){

    $conection = new DBConnection();
    $query = "select * from asignatura";
    $conection->executeQuery($query);

    foreach ($conection->getRows() as $subject) {
      $asignatura = new Asignatura($subject['identificador'],$subject['nombre']);
      $allSubjects[] = $asignatura;

    }

    $conection->disconect();
    return $allSubjects;
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

  function updateUser($user, $dni, $lastName, $tipoUsuario){
    $conection = new DBConnection();
    if($dni ==''){
      $query = "update usuario set apellido='".$lastName."',tipo_usuario='".$tipoUsuario."' where dni='".$user."'";
    }
    if($lastName == ''){
      $query = "update usuario set dni='".$dni."' ,tipo_usuario='".$tipoUsuario."' where dni='".$user."'";
    }
    if($dni =='' && $lastName == ''){
      $query = "update usuario set tipo_usuario='".$tipoUsuario."' where dni='".$user."'";
    }
    if($dni !='' && $lastName !='' && $tipoUsuario != ''){
      $query = "update usuario set apellido='".$lastName."', dni='".$dni."' ,tipo_usuario='".$tipoUsuario."' where dni='".$user."'";
    }
    $conection->executeQuery($query);
    $conection->disconect();
    return true;
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

  function setGrade($alumno, $asignatura, $nota){
    $conection = new DBConnection();
    $query = "select * from nota where alumno='".$alumno."' and asignatura='".$asignatura."' and nota='".$nota."'";
    $conection->executeQuery($query);

    if($conection->getNumRows() == 0){
      $query = "insert into nota(alumno, asignatura, nota) values ('".$alumno."','".$asignatura."','".$nota."')";
      $conection->executeQuery($query);
      return true;

    }else{
      return false;
    }

    $conection->disconect();
  }
}

?>
