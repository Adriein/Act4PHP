<?php
class Asignatura{

  private $pKey;
  private $nombre;

  public function __construct($pKey, $nombre){
    $this->pKey = $pKey;
    $this->nombre = $nombre;

  }

  public function getPK(){
    return $this->pKey;

  }

  public function getNombre(){
    return $this->nombre;

  }

}
?>
