<?php
require_once("../Controller/controller.php");

$controller = new Controller();

echo"
<html lang='es' dir='ltr'>
<head>
  <meta charset='utf-8'>
  <link rel='stylesheet' type='text/css' href='css/main.css'>
  <title></title>
</head>
<body>

  <table>
    <tr>
      <th>Alumno</th>
      <th>Asignatura</th>
      <th>Nota</th>
      </tr>";
      $result = $controller->getSubject($_SESSION['dni']);
      foreach ($result as $value) {
        echo"<tr><td>".$value->getAlumno()."</td><td>".$value->getAsignatura()."</td><td>".$value->getNota()."</td></tr>";
      }

      echo "</table>";

      echo"<form action='admin.php' method='post'>
      <input type='submit' name='submit' value='Cerrar Sesion'><br>
      </form>
    </body>
  </html>";

if(isset($_POST['submit']) == 'Cerrar Sesion'){
  session_destroy();
  $controller->disconect();

}
?>
