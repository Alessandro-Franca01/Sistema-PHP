<?php
# SCRIPT da Pagina de listagem de paciente

include('./model/Usuario.php'); 
include('./model/paciente.php');

session_start();

if(!$_SESSION['validacao']){
  header('Location: ./index.php?erro=user_nao_logado');
}

$lista_paciente = $_SESSION['lista_pacientes'];

?>


<html>
                <!-- Ajustar esse codigo para ficar responsivo mobile/notebook -->  
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <title>Programa de Darcilene</title>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 450px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark ">
      
      <a class="navbar-brand" href="#">
        <!-- Ja está responsivo kkkk, mas a img bugo! *class="d-inline-block align-top" alt="" -->
        <img src="./img/incone_formulario.jpg" width="30" height="30" >
        Lista de Pacientes
      </a>
      <a href="./menu.php">
        <button class="btn btn-outline-secondary" type="button">Voltar</button>
      </a>
    </nav>

    <!-- Tenho que usar os cartoes junto com o grid    -->
    <div class="container">    
      <div class="row">
      
      <?php foreach($lista_paciente as $paciente) { ?>
         <!-- Instanciar o objeto Paciente que deve dar certo   -->
          <div class="card-login">
            <div class="card">
              <div class="card-header">
                Dados do Paciente
              </div>
                  <div class="card-body">                    
                      <h5> Nome : <?php echo $paciente['nome']; ?> </h5> 
                      <h5> Resposanvel: <?php echo $paciente['responsavel']; ?></h5>
                      <h5> Email: <?php echo $paciente['email']; ?> </h5>
                      <h5> Telefone: <?php echo $paciente['telefone']; ?> </h5>
                      <h5> Data de Nascimento: <?php echo $paciente['data_nasc']; ?> </h5>
                      <h5> Diagnostico:<?php echo $paciente['diagnostico']; ?> </h5>
                  </div> 
              </div>
          </div>          
      <?php } ?>
       
      </div>
    </div>
  </body>
</html>