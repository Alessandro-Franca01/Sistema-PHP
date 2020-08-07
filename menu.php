<?php
# Scrip do menu:
include('./model/Usuario.php');

session_start();
if(!$_SESSION['validacao']){
  header('Location: ./index.php?erro=user_nao_logado');
}

?>


<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Programa de Darcilene</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }

      .row-test{
        margin-top: 20px;
        margin-left: 0px;
        margin-right: 0px;
      }

      .container-fluid-test{
        margin-bottom: 0px;
      }
      
    </style>
  </head>

  <body>
  <!-- Cabeçalho do pagina de menu-->  
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="./img/menu.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Menu
      </a>
    </nav>
    <!-- Lista com os Links--> 
    <div class="container-fluid-test">    
      <div class="row-test">
        <div class="col-sm-12">
          <ul class="list-group">
            <li class="list-group-item active">
            <?php
              echo "<h2> Bem Vindo: ";
              echo $_SESSION['usuario']->__get('nome'); // funciona normalmente aqui!
            ?>
            </li>
            <li class="list-group-item ">
              <a clas="list-group-item" href="./cad_paciente.php"> Cadastro de Paciente</a>
            </li>
            <li class="list-group-item">
              <a clas="list-group-item" href="./tabela_teste_novo.php"> Vizualizar tabela de agendametnos</a>  
            </li>
            <li class="list-group-item">
              <a clas="list-group-item" href="cad_atendimento.php"> Agendar atendimento </a>
            </li>
            <!-- ARRUMAR ISSO --> 
            <li class="list-group-item">
              <a clas="list-group-item" href="./index.php?erro=logout"> Sair do sistema </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </body>
</html>

