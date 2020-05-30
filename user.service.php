<?php 

  class userService {

    private $user;
    private $connection;

    public function __construct(Conexao $connection, User $user) {
      $this->connection = $connection->conectar(); //retorna o link de conexão
      $this->user = $user;
    }

    public function recuperar() {
      $query = '
      select 
        username, passw, id
      from 
        tb_users
      ';
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_NUM);
    }

    public function recuperarPorUser() {
      $_POST['password'] = md5($_POST['password']);
      $query = '
      select 
        username, passw, id
      from 
        tb_users
      where username = :user
      ';
      $stmt = $this->connection->prepare($query);
      $stmt->bindValue(':user', $_POST['user']);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_NUM);
    }

    public function cadastrar() {
      $_POST['password'] = md5($_POST['password']);
      $query = '
      INSERT INTO tb_users(username,passw)
      VALUES(:user, :pass)
      ';
      $stmt = $this->connection->prepare($query);
      $stmt->bindValue(':user', $_POST['user']);
      $stmt->bindValue(':pass', $_POST['password']);
      $stmt->execute();
    }

    public function editarSenha() {
      $query = '
      UPDATE tb_users
      SET passw = :pass
      WHERE tb_users.username = :user;
      ';  
      $stmt = $this->connection->prepare($query);
      $stmt->bindValue(':pass', $_POST['password']);
      $stmt->bindValue(':user', $_POST['user']);
      $stmt->execute();
    }

  }

?>