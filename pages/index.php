<?php

  session_start();
  $_SESSION['action'] = 'login';

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  
  <script src="https://kit.fontawesome.com/21df2a399d.js" crossorigin="anonymous"></script>


  <!-- CSS only -->
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../style.css">

  <script src="../script.js"></script>

  <title>Login</title>

</head>
<body>

    <div class="centered content d-flex flex-column">
  
      <div class="login">Login</div>

      <form action="../login.controller.php" method="POST">

        <h6>Username</h6>
        <div class="form">
          <i class="fas fa-user"></i>
          <input type="text" name="user" id="username" placeholder="Type your username" class="input">
          <span id="username-line" class="line"></span>
        </div>

        <h6>Password</h6>
        <div class="form">
          <i class="fas fa-lock"></i>
          <input id="password" type="password" placeholder="Type your password" class="input" name="password">
          <span id="password-line" class="line"></span>
          <div class="forgot d-flex justify-content-end">
            <a href="forgotPassword.php" class="forgot">Forgot password?</a>
          </div>
        </div>

        <button class="button" type="submit">LOGIN</button>

        <?php if(isset($_GET['auth']) && $_GET['auth'] == 'failed') { ?>
          <div class="text-danger text-center mt-2">
            Username or password invalid.
          </div>
        <?php } ?>

        <?php if(isset($_GET['login']) && $_GET['login'] == 'not') { ?>
          <div class="text-danger text-center mt-2">
            Do login before using.
          </div>
        <?php } ?>

      </form>

      <div class="text-center mt-4">Or sign in using</div>
      <div class="d-flex justify-content-center p-2">
        <i style="font-size: 2em; color: #3b5998;" class="fab fa-facebook"></i>
        <i style="font-size: 2em; color: #00acee;" class="fab fa-twitter ml-3 mr-3"></i>
        <i style="font-size: 2em; color: #da301d;" class="fab fa-google"></i>
      </div>

      <div class="mt-4 text-center">
        <i style="color: #9b186f;" class="fas fa-sign-in-alt"></i>
        <a href="signup.php">Create your account</a>
      </div>
  
    </div>
  
  
</body>
</html>