<?php

  session_start();
  $_SESSION['action'] = 'updatePassword';

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

  <title>Update your password</title>

</head>
<body>

    <div class="centered content d-flex flex-column">
  
      <div class="update">Update your password</div>

      <form action="../login.controller.php" method="POST">

        <h6>Username</h6>
        <div class="form">
          <i class="fas fa-user"></i>
          <input type="text" name="user" id="username" placeholder="Type your username" class="input">
          <span id="username-line" class="line"></span>
        </div>

        <h6>New password</h6>
        <div class="form">
          <i class="fas fa-lock"></i>
          <input id="password" type="password" placeholder="Type your password" class="input" name="password">
          <span id="password-line" class="line"></span>
        </div>

        <h6>Confirm your new password</h6>
        <div class="form">
          <i class="fas fa-lock"></i>
          <input id="password2" type="password" placeholder="Confirm your password" class="input" name="passwordConfirm">
          <span id="password-line2" class="line"></span>
        </div>

        <button class="button" type="submit">UPDATE</button>

        <?php if(isset($_GET['signup']) && $_GET['signup'] == 'passwordError') { ?>
          <div class="text-danger text-center mt-2">
            passwords do not match, check again.
          </div>
        <?php } ?>

        <?php if(isset($_GET['signup']) && $_GET['signup'] == 'invalidInput') { ?>
          <div class="text-danger text-center mt-2">
            One or more required fields have not been filled in.
          </div>
        <?php } ?>

        <?php if(isset($_GET['signup']) && $_GET['signup'] == 'minLength') { ?>
          <div class="text-danger text-center mt-2">
            Min length(password): 8 characters.
          </div>
        <?php } ?>

        <?php if(isset($_GET['signup']) && $_GET['signup'] == 'unregistered') { ?>
          <div class="text-danger text-center mt-2">
          unregistered user
          </div>
        <?php } ?>

        <?php if(isset($_GET['signup']) && $_GET['signup'] == 'success') { ?>
          <div class="text-success text-center mt-2">
            Password updated successfully
          </div>
        <?php } ?>

      </form>


      <div class="mt-2 text-center">
        <i style="color: #9b186f;" class="fas fa-sign-in-alt"></i>
          <a href="index.php">Back to login</a>
      </div>
      
    </div>
  
</body>
</html>