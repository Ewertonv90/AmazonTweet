# AmazonTweet
App imitação do Twitter chamado amazonTweet de nivel avançado em PHP, usando Arquitetura MVC, autenticação via SESSION. Recursos futuros: autenticação via email, cadastro de novos usuários com autenticação via email.


IMGENS USADAS NO PROJETO: www.flaticon.com  by Freepik

Crie um database chamado twitter_clone com mysql 5.7 e com as seguintes tabelas:

create table tweets (

  id bigint NOT NULL primary key AUTO_INCREMENT,
  id_usuario bigint NOT NULL,
  tweet varchar(140) NOT NULL,
  data DATETIME DEFAULT CURRENT_TIMESTAMP

);

create table usuarios_seguidores(
	id bigint not null primary key AUTO_INCREMENT,
  id_usuario bigint not null,
  id_usuario_seguindo bigint not null
	
);

create table usuarios(
   id bigint NOT NULL primary key AUTO_INCREMENT,
   nome varchar(100) NOT NULL,
   email varchar(150) NOT NULL ,
   senha varchar (32) NOT NULL
);

Requisitos:

OBS: Não esqueça de instalar o composer e na pasta principal do projeto no CMD ou powershell dar o "composer install"

Links CDN do JQuery :

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<br/>
Bootstrap 4:

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


Popper:
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>


Awesome Fonts:
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

para iniciar a aplicação entre na pasta "public do projeto através do console e estão dno diretorio digite "php -S localhost:8080" sem as aspas, e abra no navegador o link http://localhost:8080 e faça o cadastro de um usuario para usar a aplicação. Fique a vontade para melhora-la ou usar em seus projetos.
