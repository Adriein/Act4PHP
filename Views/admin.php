<?php
require_once("../Controller/controller.php");
  if(isset($_POST['submit'])){
    $controller = new Controller();

    if($_POST['submit'] == 'Register'){
      if(isset($_POST['admin'])){
        $controller->register($_POST['dni'],$_POST['lastName'],0);

      }else{
        $controller->register($_POST['dni'],$_POST['lastName'],1);

      }

    }
    if($_POST['submit'] == 'Crear'){
      $controller->createSubject($_POST['nombre']);

    }
    if($_POST['submit'] == 'Modificar'){
      $controller->updateUser($_POST['alumnSelected']);

    }
    if($_POST['submit'] == 'Eliminar'){
      $controller->deleteUser($_POST['alumnSelected']);

    }
  }
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
</style>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <h3>Alta Usuario: </h3>
      <form action="admin.php" method="post">
          DNI: <br>
          <input type="text" name="dni"><br>
          Apellido: <br>
          <input type="text" name="lastName"><br>
          <input type="checkbox" name="admin" value="admin"> Admin <br>
          <input type="submit" name="submit" value="Register"><br>
      </form>
      <br><br>
      <h3>Crear Asignatura: </h3>
      <form action="admin.php" method="post">
          Nombre Asignatura: <br>
          <input type="text" name="nombre"><br>
          <input type="submit" name="submit" value="Crear"><br>
      </form>
      <br><br>
      <h3>Consulta Usuario: </h3>
      Usuarios: <br>
      <form action="admin.php" method="post">
        <!--<select name="alumnSelected">
          <option value=""></option>-->
          <table>
            <tr>
              <th>Alumno</th>
              <th>Asignatura</th>
              <th>Nota</th>
            </tr>
          <?php
          require_once("../Controller/controller.php");
          $controller = new Controller();
          $resultado = $controller->setSelect();
          foreach ($resultado as $alumno) {
            //echo "<option value=".$alumno->getDni().">".$alumno->getLastName()."</option>";
            echo "<tr><td contenteditable='true'>".$alumno->getLastName()."</td></tr>";
          }


          ?>
          </table>
        <!--</select> <br>
        <input type="submit" name="submit" value="Modificar"><br>
        <input type="submit" name="submit" value="Eliminar"><br>-->
      </form>

      <p><?php  echo isset($_GET['message'])? $_GET['message'] : '' ?></p>


  </body>
</html>
