<?php

  session_start();

  
  
  require_once "Connection.php";
  require_once "User.model.php";
  require_once "user.service.php";

  $user = new User();
  $conexao = new Conexao();
  $userService = new userService($conexao, $user);
  
  // verificar login
  $users = $userService->recuperar();
  $continue = true;
  echo '<pre>';
  print_r($users);
  echo '</pre>';
  
  if(isset($_SESSION['action']) && $_SESSION['action'] == 'login') {
      
    foreach ($users as $key => $user) {
  
      if($_POST['user'] == $user['username'] && md5($_POST['password']) == $user['passw']) {
        $_SESSION['user'] = $_POST['user'];
        header('Location: pages/index2.php');
        $id = $user['id'];
        $continue = false;
      } 
    } 
  
    if($continue) {
      header('Location: pages/index.php?auth=failed');
    }

  }

  // cadastrar novo usuário
  if(isset($_SESSION['action']) && $_SESSION['action'] == 'signup') {

    //valores menores que o determinado
    if(strlen($_POST['user']) < 5 || strlen($_POST['password']) < 8) {
      header('Location: pages/signup.php?signup=minLength');
      $continue = false;
    }

    //valores vazios
    if($_POST['user'] == '' || $_POST['password'] == '' || $_POST['email'] == '') {
      header('Location: pages/signup.php?signup=invalidInput');
      $continue = false;
    }

    //email invalido
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      header('Location: pages/signup.php?signup=invalidEmail');
      $continue = false;
    }

    //usuário já existe
    foreach ($users as $key => $user) {
  
      if($_POST['user'] == $user['username'] ) {
        header('Location: pages/signup.php?signup=failed');
      $continue = false;
      } 

      if($_POST['email'] == $user['email'] ) {
        header('Location: pages/signup.php?signup=failed');
      $continue = false;
      }
    }

    if($continue) {
      $signup = $userService->cadastrar();
      header('Location: pages/signup.php?signup=success');
    }

  };

  // atualizar senha
  if(isset($_SESSION['action']) && $_SESSION['action'] == 'updatePassword') {

    //senha menor que o determinado
    if(strlen($_POST['password']) < 8) {
      header('Location: pages/forgotPassword.php?signup=minLength');
      $continue = false;
    }

    // senhas nao conferem
    if($_POST['password'] != $_POST['passwordConfirm']) {
      header('Location: pages/forgotPassword.php?signup=passwordError');
      $continue = false;
    }
  
    //usuario não existe
    $user = $userService->recuperarPorEmail();
    if(count($user) != 1) {
      header('Location: pages/forgotPassword.php?signup=unregistered');
    $continue = false;
    }

    if($continue) {
      $signup = $userService->editarSenha();
      header('Location: pages/forgotPassword.php?signup=success');
    }

  }
  
  //sair 
  if(isset($_SESSION['action']) && $_SESSION['action'] == 'sair') {

    session_start();
    session_destroy();
    header('Location: pages/index.php');

  }

?>
