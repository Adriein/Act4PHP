<?php
require_once("../DAO/NotasDAO.php");

class Controller{
  private $dni;
  private $pass;
  private $notasDAO;

  public function __construct(){
    $this->notasDAO = new NotasDAO();

  }

  public function submit($dni, $pass){
    $this->dni = $dni;
    $this->pass = $pass;

    if($this->dni != '' && $this->pass != ''){
      $page = $this->notasDAO->login($this->dni, $this->pass);

      if($page == 'not found'){
        $this->notasDAO->redirect($page, "Usuario no encontrado");

      }else{
        $this->notasDAO->redirect($page, '');

      }
    }else{
      $this->notasDAO->redirect("index", "Los campos no pueden estar vacios");
    }
  }

  public function register($dni, $pass, $tipoUsuario){

    if($dni != '' && $pass != ''){
      if($tipoUsuario == 0){
        $insert = $this->notasDAO->createUser($dni, $pass, $tipoUsuario);

        if($insert == false){
          $this->notasDAO->redirect("admin", "Error, el administrador ya existe");

        }else{
          $this->notasDAO->redirect("admin", "Administrador registrado correctamente");

        }

      }else{
        $insert = $this->notasDAO->createUser($dni, $pass, $tipoUsuario);

        if($insert == false){
          $this->notasDAO->redirect("admin", "Error, el usuario ya existe");

        }else{
          $this->notasDAO->redirect("admin", "Usuario registrado correctamente");

        }
      }
    }else{
      $this->notasDAO->redirect("admin", "Los campos no pueden estar vacios");
    }
  }

  public function createSubject($subjectName){
    $insert = $this->notasDAO->createSubject($subjectName);

    if($insert == false){
      $this->notasDAO->redirect("admin", "Error, la asignatura ya existe");

    }else{
      $this->notasDAO->redirect("admin", "Asignatura creada correctamente");

    }
  }

  public function setSelect(){
    return $this->notasDAO->getAllUsers();
  }

  public function updateUser($user){
    $update = $this->notasDAO->updateUser($user);

    if($update == false){
      $this->notasDAO->redirect("admin","Error modificando el alumno");

    }else{
      $this->notasDAO->redirect("admin","Alumno modificado correctamente");
    }
  }

  public function deleteUser($user){
    $delete = $this->notasDAO->deleteUser($user);

    if($delete == false){
      $this->notasDAO->redirect("admin","Error borrando el alumno");

    }else{
      $this->notasDAO->redirect("admin","Alumno borrando correctamente");
    }
  }
  //echo var_dump($_POST);



}
?>
