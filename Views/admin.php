<?php
  if(isset($_POST['submit']) == 'Register'){
    $controller = new Controller();
    if(isset($_POST['admin'])){
      $controller->register($_POST['dni'],$_POST['lastName'],0);

    }else{
      $controller->register($_POST['dni'],$_POST['lastName'],1);

    }
  }
  if(isset($_POST['submit']) == 'Crear'){
    $controller = new Controller();
    $controller->createSubject($_POST['nombre']);
  }

?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <h3>Alta Usuario: </h3>
      <form action="" method="post">
          DNI: <br>
          <input type="text" name="dni"><br>
          Apellido: <br>
          <input type="text" name="lastName"><br>
          <input type="checkbox" name="admin" value="admin"> Admin <br>
          <input type="submit" name="submit" value="Register"><br>
      </form>
      <br><br>
      <h3>Crear Asignatura: </h3>
      <form action="" method="post">
          Nombre Asignatura: <br>
          <input type="text" name="nombre"><br>
          <input type="submit" name="submit" value="Crear"><br>
      </form>
      <br><br>
      <h3>Consulta Usuario: </h3>
      Usuarios: <br>
      <select name="">
        <?php
        require_once("../Controller/controller.php");
        $controller = new Controller();
        $resultado = $controller->setSelect();
        foreach ($resultado as $clave => $valor) {
          echo "<option value=''>".$valor."</option>";
        }


        ?>
      </select>

      <p><?php  echo isset($_GET['message'])? $_GET['message'] : '' ?></p>


  </body>
</html>
