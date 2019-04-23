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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/main.css">
  </head>
  <body id="loginBody">
    <div class="container">
      <div class="form-login">
        <form action="index.php" method="post">
          <div class="row">
            <input class="col" id="input" type="text" name="dni" placeholder="DNI"> <br>
          </div>
          <div class="row">
            <input class="col" id="input" type="text" name="lastName" placeholder="Apellido"> <br>
          </div>
          <div class="row">
            <input id="submit" type="submit" name="submit" value="Login" class="btn btn-light">
          </div>
        </form>
      </div>
    </div>

    <p><?php echo isset($_GET['message'])? $_GET['message'] : '' ?></p>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
