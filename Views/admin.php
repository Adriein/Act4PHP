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
    if($_POST['submit'] == 'Alta Nota'){
      $controller->setGrade($_POST['alumnSelected'],$_POST['subjectSelected'],$_POST['nota']);

    }
    if($_POST['submit'] == 'Modificar Alumno'){
      if(isset($_POST['admin'])){
        $controller->updateUser($_POST['alumnSelected'], $_POST['dni'], $_POST['lastName'], 0);

      }else{
        $controller->updateUser($_POST['alumnSelected'], $_POST['dni'], $_POST['lastName'], 1);
      }
    }
    if($_POST['submit'] == 'Modificar Asignatura'){
      $controller->updateSubject($_POST['subjectSelected'], $_POST['subjectName']);

    }
    if($_POST['submit'] == 'Modificar Nota'){
      $controller->updateGrade($_POST['alumnSelected'], $_POST['subjectSelected'], $_POST['grade']);

    }
    if($_POST['submit'] == 'Eliminar Usuario'){
      $controller->deleteUser($_POST['alumnSelected']);

    }
    if($_POST['submit'] == 'Eliminar Asignatura'){
      $controller->deleteSubject($_POST['subjectSelected']);

    }
    if($_POST['submit'] == 'Eliminar Nota'){
      $controller->deleteGrade($_POST['alumnSelected'], $_POST['subjectSelected']);

    }
    if($_POST['submit'] == 'Mostrar Notas'){
      echo"<table>
        <tr>
          <th>Alumno</th>
          <th>Asignatura</th>
          <th>Nota</th>
        </tr>";
        $result = $controller->getSubject($_POST['alumnSelected']);
        foreach ($result as $value) {
          echo"<tr><td>".$value->getAlumno()."</td><td>".$value->getAsignatura()."</td><td>".$value->getNota()."</td></tr>";
        }

      echo "</table>";

    }
    if($_POST['submit'] == 'Cerrar Sesion'){
      $controller->disconect();

    }
  }
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="css/main.css">
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
      <?php
        require_once("../Controller/controller.php");
        $controller = new Controller();
        echo"<h3>Alta Nota: </h3>
        <form action='admin.php' method='post'>
          Alumno:
          <select name='alumnSelected'>
            <option value=''></option>";
              $resultado = $controller->setSelect();
              foreach ($resultado as $alumno){
                echo "<option value=".$alumno->getDni().">".$alumno->getLastName()."</option>";
              }

          echo "</select> <br>
          Asignatura:
          <select name='subjectSelected'>
            <option value=''></option>";
              $asignaturas = $controller->getAllSubjects();
              foreach ($asignaturas as $asignatura){
                echo "<option value=".$asignatura->getPK().">".$asignatura->getNombre()."</option>";

              }

          echo "</select><br>
          Nota:
          <input type='text' name='nota'> <br>
          <input type='submit' name='submit' value='Alta Nota'><br>
        </form>";
        echo"<h3>Modificar Alumno: </h3>
        <form action='admin.php' method='post'>
          Alumno:
          <select name='alumnSelected'>
            <option value=''></option>";
              $resultado = $controller->setSelect();
              foreach ($resultado as $alumno){
                echo "<option value=".$alumno->getDni().">".$alumno->getLastName()."</option>";
              }

          echo "</select> <br>
          DNI:
          <input type='text' name='dni'><br>
          Apellido:
          <input type='text' name='lastName'> <br>
          <input type='checkbox' name='admin' value='admin'> Admin <br>
          <input type='submit' name='submit' value='Modificar Alumno'><br>
        </form>";
        echo"<h3>Modificar Asignatura: </h3>
        <form action='admin.php' method='post'>
          Asignatura:
          <select name='subjectSelected'>
            <option value=''></option>";
              $asignaturas = $controller->getAllSubjects();
              foreach ($asignaturas as $asignatura){
                echo "<option value=".$asignatura->getPK().">".$asignatura->getNombre()."</option>";

              }
          echo "</select> <br>
          Nombre:
          <input type='text' name='subjectName'><br>
          <input type='submit' name='submit' value='Modificar Asignatura'><br>
        </form>";
        echo"<h3>Modificar Nota: </h3>
        <form action='admin.php' method='post'>
          Alumno:
          <select name='alumnSelected'>
            <option value=''></option>";
              $resultado = $controller->setSelect();
              foreach ($resultado as $alumno){
                echo "<option value=".$alumno->getDni().">".$alumno->getLastName()."</option>";
              }

        echo "</select> <br>
          Asignatura:
          <select name='subjectSelected'>
            <option value=''></option>";
              $asignaturas = $controller->getAllSubjects();
              foreach ($asignaturas as $asignatura){
                echo "<option value=".$asignatura->getPK().">".$asignatura->getNombre()."</option>";

              }
          echo "</select> <br>
          Nota:
          <input type='text' name='grade'><br>
          <input type='submit' name='submit' value='Modificar Nota'><br>
        </form>";
        echo"<h3>Eliminar Usuario: </h3>
        <form action='admin.php' method='post'>
          Usuario:
          <select name='alumnSelected'>
            <option value=''></option>";
              $resultado = $controller->setSelect();
              foreach ($resultado as $alumno){
                echo "<option value=".$alumno->getDni().">".$alumno->getLastName()."</option>";
              }

        echo "</select> <br>
          <input type='submit' name='submit' value='Eliminar Usuario'><br>
        </form>";
        echo"<h3>Eliminar Asignatura: </h3>
        <form action='admin.php' method='post'>
          Asignatura:
          <select name='subjectSelected'>
            <option value=''></option>";
              $asignaturas = $controller->getAllSubjects();
              foreach ($asignaturas as $asignatura){
                echo "<option value=".$asignatura->getPK().">".$asignatura->getNombre()."</option>";

              }
          echo "</select> <br>
          <input type='submit' name='submit' value='Eliminar Asignatura'><br>
        </form>";
        echo"<h3>Eliminar Nota: </h3>
        <form action='admin.php' method='post'>
          Alumno:
          <select name='alumnSelected'>
            <option value=''></option>";
              $resultado = $controller->setSelect();
              foreach ($resultado as $alumno){
                echo "<option value=".$alumno->getDni().">".$alumno->getLastName()."</option>";
              }

        echo "</select> <br>
          Asignatura:
          <select name='subjectSelected'>
            <option value=''></option>";
              $asignaturas = $controller->getAllSubjects();
              foreach ($asignaturas as $asignatura){
                echo "<option value=".$asignatura->getPK().">".$asignatura->getNombre()."</option>";

              }
          echo "</select> <br>
          <input type='submit' name='submit' value='Eliminar Nota'><br>
        </form>";
        echo"<h3>Mostrar Notas: </h3>
        <form action='admin.php' method='post'>
          Usuario:
          <select name='alumnSelected'>
            <option value=''></option>";
              $resultado = $controller->setSelect();
              foreach ($resultado as $alumno){
                echo "<option value=".$alumno->getDni().">".$alumno->getLastName()."</option>";
              }

        echo "</select> <br>
          <input type='submit' name='submit' value='Mostrar Notas'><br>
        </form> <br>";

        echo"<form action='admin.php' method='post'>
          <input type='submit' name='submit' value='Cerrar Sesion'><br>
        </form>";

      ?>
      <p class='message'><?php  echo isset($_GET['message'])? $_GET['message'] : '' ?></p>


  </body>
</html>
