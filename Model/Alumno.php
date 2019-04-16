<?php
class Alumno{

  private $dni;
  private $lastName;

  public function __construct($dni, $lastName){
    $this->dni = $dni;
    $this->lastName = $lastName;

  }

  public function getDni(){
    return $this->dni;
  }

  public function getLastName(){
    return $this->lastName;
  }
}
?>
