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
<html lang='es' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
    <!--<link rel='stylesheet' type='text/css' href='css/main.css'>-->
    <title>Admin</title>
  </head>
  <body>
    <div class="row">
      <input class="col-8" id="myInput" type="text" name="search" placeholder="Search...">
      <button class=" col-2 offset-md-2 btn btn-light" type="button" name="button">Añadir</button>
    </div>
    <div class="row">
      <table id="myTable" class="table table-bordered">
        <tr>
          <th>Alumno</th>
          <th>Asignatura</th>
          <th>Nota</th>
          <th>Editar/Borrar</th>
        </tr>
        <?php
          $controller = new Controller();
          $allUsers = $controller->showAllAlumnosAndGrades();
          foreach ($allUsers as $user){
            echo "<tr>
              <td contenteditable>".$user->getAlumno()."</td>
              <td contenteditable>".$user->getAsignatura()."</td>
              <td contenteditable>".$user->getNota()."</td>
              <td><button class='btn btn-light'>Editar</button><button class='btn btn-light'>Borrar</button></td>
            </tr>";
          }
        ?>
      </table>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/search.js" charset="utf-8"></script>
  </body>
</html>
