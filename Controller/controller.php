<?php
session_start();
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
        if($page == 'user'){

          $_SESSION['dni']=$this->dni;

        }
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

  public function updateUser($user, $dni, $lastName, $tipoUsuario){
    $update = $this->notasDAO->updateUser($user, $dni, $lastName, $tipoUsuario);

    if($update){
      $this->notasDAO->redirect("admin","Alumno modificado correctamente");
    }
  }

  public function deleteUser($user){
    $delete = $this->notasDAO->deleteUser($user);

    if($delete == false){
      $this->notasDAO->redirect("admin","Error borrando el alumno");

    }else{
      $this->notasDAO->redirect("admin","Alumno borrado correctamente");
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

  public function updateSubject($asignatura, $subjectName){
    $update = $this->notasDAO->updateSubject($asignatura, $subjectName);
    if($update == false){
      $this->notasDAO->redirect("admin", "Error no puedes dejar campos vacios");
    }else{
      $this->notasDAO->redirect("admin", "Asignatura modificada correctamente");
    }

  }

  public function deleteSubject($asignatura){
    $delete = $this->notasDAO->deleteSubject($asignatura);

    if($delete == false){
      $this->notasDAO->redirect("admin","Error borrando el alumnola asignatura");

    }else{
      $this->notasDAO->redirect("admin","Asignatura borrada correctamente");
    }
  }

  public function getSubject($alumno){
    return $this->notasDAO->getSubject($alumno);

  }

  public function getAllSubjects(){
    return $this->notasDAO->getAllSubjects();
  }

  public function setGrade($alumno, $asignatura ,$nota){
    $insert = $this->notasDAO->setGrade($alumno, $asignatura, $nota);
    if($insert == false){
        $this->notasDAO->redirect("admin", "Error al introducir la nota");

    }else{
        $this->notasDAO->redirect("admin", "Nota agregada correctamente");

    }

  }

  public function updateGrade($alumno, $asignatura, $nota){
    $update = $this->notasDAO->updateGrade($alumno, $asignatura, $nota);

    if($update == false){
      $this->notasDAO->redirect("admin", "Error al modificar la nota, el alumno no esta matriculado a esa asignatura");

    }else{
      $this->notasDAO->redirect("admin", "Nota modificada correctamente");
    }
  }

  public function deleteGrade($alumno, $asignatura){
    $delete = $this->notasDAO->deleteGrade($alumno, $asignatura);

    if($delete == false){
      $this->notasDAO->redirect("admin", "Error al eliminar la nota, el alumno no esta matriculado a esa asignatura");

    }else{
      $this->notasDAO->redirect("admin", "Nota eliminada correctamente");
    }
  }

  public function setSelect(){
    return $this->notasDAO->getAllUsers();
  }

  public function disconect(){
    $this->notasDAO->redirect("index","");
  }


  //echo var_dump($_POST);



}
?>
