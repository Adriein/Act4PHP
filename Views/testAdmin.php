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

  echo "<html lang='es' dir='ltr'>
    <head>
      <meta charset='utf-8'>
      <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
      <link rel='stylesheet' type='text/css' href='css/main.css'>
      <title>Admin</title>
    </head>
    <body>
        <div class='container'>

          <div class='row'>
            <div class='col-sm-4'>
              <div class='card'>
                <div class='card-header text-center'>
                  <h3>Alta Usuario: </h3>
                </div>
                <div class='card-body'>
                  <div class='form-login'>
                    <form action='admin.php' method='post'>
                      <div class='row'>
                        <input class='col-sm-12' type='text' name='dni' placeholder='DNI'><br>
                      </div>
                      <div class='row'>
                        <input class='col-sm-12' type='text' name='lastName'  placeholder='Apellido'><br>
                      </div>
                      <div class='row'>
                        <input class='col-sm-12' type='checkbox' name='admin' value='admin'> Admin <br>
                      </div>
                      <div class='row'>
                        <input class='col-sm-12' type='submit' name='submit' value='Register'><br>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class='col-sm-4'>
              <div class='card'>
                <div class='card-header text-center'>
                  <h3>Crear Asignatura: </h3>
                </div>
                <div class='card-body'>
                  <div class='form-login'>
                    <form action='admin.php' method='post'>
                      <div class='row'>
                        <input class='col-sm-12' type='text' name='nombre' placeholder='Nombre asignatura'><br>
                      </div>
                      <div class='row'>
                        <input class='col-sm-12' type='submit' name='submit' value='Crear'><br>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>";
            require_once('../Controller/controller.php');
            $controller = new Controller();
            echo "<div class='col-sm-4'>
              <div class='card'>
                <div class='card-header text-center'>
                  <h3>Alta Nota: </h3>
                </div>
                <div class='card-body'>
                  <div class='form-login'>
                    <form action='admin.php' method='post'>
                      <div class='row'>
                        <select class='col-sm-12' name='alumnSelected'>
                          <option value=''></option>";
                            $resultado = $controller->setSelect();
                            foreach ($resultado as $alumno){
                              echo "<option value=".$alumno->getDni().">".$alumno->getLastName()."</option>";
                            }

                        echo "</select> <br>
                      </div>
                      <div class='row'>
                        <select class='col-sm-12' name='subjectSelected'>
                          <option value=''></option>";
                            $asignaturas = $controller->getAllSubjects();
                            foreach ($asignaturas as $asignatura){
                              echo "<option value=".$asignatura->getPK().">".$asignatura->getNombre()."</option>";
                            }
                        echo "</select><br>
                      </div>
                      <div class='row'>
                        <input class='col-sm-12' type='text' name='nota'><br>
                      </div>
                      <div class='row'>
                        <input class='col-sm-12' type='submit' name='submit' value='Alta Nota'><br>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
      </body>
    </html>";
?>
