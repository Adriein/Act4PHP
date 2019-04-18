<?php
class Nota{

  private $alumno;
  private $asignatura;
  private $nota;

  public function __construct($alumno, $asignatura, $nota){
    $this->alumno = $alumno;
    $this->asignatura = $asignatura;
    $this->nota = $nota;
  }

  public function getAlumno(){
    return $this->alumno;
  }

  public function getAsignatura(){
    return $this->asignatura;
  }

  public function getNota(){
    return $this->nota;
  }
}

 ?>
