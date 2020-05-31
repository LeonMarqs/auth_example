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
        id, username, email, passw
      from 
        tb_users
      ';
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function recuperarPorEmail() {
      $_POST['password'] = md5($_POST['password']);
      $query = '
      select 
        username, passw, id, email
      from 
        tb_users
      where email = :email
      ';
      $stmt = $this->connection->prepare($query);
      $stmt->bindValue(':email', $_POST['email']);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_NUM);
    }

    public function cadastrar() {
      $_POST['password'] = md5($_POST['password']);
      $query = '
      INSERT INTO tb_users(username,passw, email)
      VALUES(:user, :pass, :email)
      ';
      $stmt = $this->connection->prepare($query);
      $stmt->bindValue(':user', $_POST['user']);
      $stmt->bindValue(':pass', $_POST['password']);
      $stmt->bindValue(':email', $_POST['email']);
      $stmt->execute();
    }

    public function editarSenha() {
      $query = '
      UPDATE tb_users
      SET passw = :pass
      WHERE tb_users.email = :email;
      ';  
      $stmt = $this->connection->prepare($query);
      $stmt->bindValue(':pass', $_POST['password']);
      $stmt->bindValue(':email', $_POST['email']);
      $stmt->execute();
    }

  }

?>