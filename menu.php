<?php
# Scrip do menu:
include('./model/Usuario.php');

session_start();

// Validação da sessão do usuario
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
  <!-- Cabeçalho do pagina de menu, alert + botao fechar nao esta funcionando -->  
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
            <!-- TESTANDO A SETINHA COM TAG <i>, Continuar teste outro dia   -->
              <a clas="list-group-item" href="cad_paciente.php">Cadastro de paciente(icone)<i class="fas fa-angle-right"></i> </a>
            </li>
            <li class="list-group-item">
              <a clas="list-group-item" href="./controll/tabela_teste_novo.php"> Vizualizar tabela de agendametnos</a>  
            </li>
            <li class="list-group-item">
              <a clas="list-group-item" href="./controll/validacao_lista_atd_pct.php?page=cadastro"> Agendar atendimento </a>
            </li>
            <li class="list-group-item">
              <a clas="list-group-item" href="./controll/validacao_lista_atd_pct.php?page=remover"> Remover atendimento </a>
            </li>
            <li class="list-group-item">
              <a clas="list-group-item" href="./controll/lista_pacientes_controller.php"> Listar pacientes </a>
            </li>
            <!-- Ainda falta implementar o back-end --> 
            <li class="list-group-item">
              <a clas="list-group-item" href="./ficha_atendimento.php"> Ficha de Atedimento</a>
            </li>                
            <!-- Fazer o controller dessa funcionalidade --> 
            <li class="list-group-item">
              <a clas="list-group-item" href="./controll/logoff.php"> Sair do sistema </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </body>
</html>

