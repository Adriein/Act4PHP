<?php
  require_once("../Controller/controller.php");
  $controller = new Controller();
  if(isset($_POST['submit']) == 'Login'){
    $controller->submit($_POST['dni'],$_POST['lastName']);

  }
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="index.php" method="post">
      DNI: <br>
      <input type="text" name="dni"> <br>
      Apellido: <br>
      <input type="text" name="lastName"> <br>
      <input type="submit" name="submit" value="Login">
    </form>
    <p><?php echo isset($_GET['message'])? $_GET['message'] : '' ?></p>
  </body>
</html>
