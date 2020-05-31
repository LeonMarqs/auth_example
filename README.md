<h3 align="center">Autenticador de login</h3>
  <br>
  <p align="center">
    Um autenticador de login feito com PHP. <br>
    Ações: Cadastrar um novo usuário, fazer login e editar a senha.
  </p>
  
<p align="center">
<img src="https://imgur.com/XmLSyix.png" width="500">
<p>
  
## :hammer: Ferramentas Utilizadas

* Visual Studio Code
* Xampp (MariaDB + Apache)

## :zap: Executar o projeto

1. #### Executar o servidor e o banco de dados
<img src="https://imgur.com/en1HUJU.png" width="350">

2. #### Abrir o PHPMyAdmin no navegador e criar o banco de dados
<img src="https://imgur.com/BRVLXkq.png" width="200">

```sql
CREATE DATABASE auth;

CREATE TABLE tb_users(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  passw VARCHAR(32) NOT NULL,
  email VARCHAR(255) NOT NULL
)
```

3. #### Fazer o clone do repositório na pasta htdocs do xampp
C:\xampp\htdocs\ ```$ git clone https://github.com/LeonMarqs/auth_example.git```

4. #### Abrir a página index no navegador
<img src="https://imgur.com/7Cay2rU.png" width="350">

## :eye: Observações

* Caso queira mudar a tabela do banco de dados, deverá fazer ajustes no arquivo Connection.php e no user.Service.php

* O método de update da senha não é uma forma muito segura de se fazer, foi implementado apenas para testes, pretendo mudar depois.

* Não implementei as APIs para o cadastro com as redes sociais ainda.

<hr>
<h5 align="center"> O projeto é open-source, então se quiser contribuir, fique a vontade.</h5>
