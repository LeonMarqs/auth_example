<?php 

  session_start();
  $_SESSION['user'] = session_id();
  unset($_SESSION['action']);
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website</title>
</head>
<body>

  <h1>Hello World!</h1>
  
</body>
</html>