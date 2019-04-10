<?php
class DBConnection{

  private static $host = '127.0.0.1';
  private static $user = 'root';
  private static $pass = 'fihoca';
  private static $dbName = 'academia';

  private $connection;
  private $resultado;
  private $numRows;

  public function __construct(){
    $this->connection = new mysqli(self::$host, self::$user, self::$pass, self::$dbName) or die("Error de conexion a la base de datos");
    return connection;
  }

  public function disconect(){
    $this->connection->close();

  }

  public function executeQuery($sqlSentence){
    $this->resultado = $this->connection->query($sqlSentence);
    $this->numRows = $this->resultado->num_rows;
  }
}
?>
