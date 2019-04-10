<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <h3>Alta Usuario: </h3>
      <form action="../Controller/controller.php" method="post">
          DNI: <br>
          <input type="text" name="dni"><br>
          Apellido: <br>
          <input type="text" name="lastName"><br>
          <input type="checkbox" name="admin" value="admin"> Admin <br>
          <input type="submit" name="submit" value="Register"><br>
      </form>
      <br><br>
      <form action="../Controller/controller.php" method="post">
          Nombre Asignatura: <br>
          <input type="text" name="nombre"><br>
          <input type="submit" name="submit" value="Crear"><br>
      </form>

      <p><?php  echo isset($_GET['message'])? $_GET['message'] : '' ?></p>
  </body>
</html>
