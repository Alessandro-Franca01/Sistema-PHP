<?php
# SCRIPT da Pagina de listagem de paciente

include('./model/Usuario.php'); 
include('./model/paciente.php');

session_start();

if(!$_SESSION['validacao']){
  header('Location: ./index.php?erro=user_nao_logado');
}

// Passando um array associativo:
$paciente = $_SESSION['pct_show'];

/*
     h5{
          text-align: center;
          color: rgb(255, 255, 255);
          background-color: #851944;
          padding: 24px;
          margin: 0;
          white-space: nowrap;
        }

*/
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
      
      <a class="navbar-brand" href="menu.php">
        <img src="./img/icone_show_pct3.png" width="30" height="30" >
        Dados do Paciente
      </a>
      <a href="./lista_pacientes2.php">
        <button class="btn btn-outline-secondary" type="button">Voltar</button>
      </a>
    </nav>
    <div class="container">    
      <div class="row">        
          <div class="card-login">
            <div class="card">
              <div class="card-header">
                Dados do Paciente
              </div>
                  <div class="card-body">   
                             <!-- Melhorar o modelo desse card 'remover o <br>'   -->                 
                      <h5> Nome : <?php echo $paciente['nome']; ?> </h5>
                      <h5> Resposanvel: <?php echo $paciente['responsavel']; ?> </h5>
                      <h5> Email: <?php echo $paciente['email']; ?> </h5>
                      <h5> Telefone: <?php echo $paciente['telefone']; ?> </h5>
                      <h5> Data de Nascimento: <?php echo $paciente['data_nasc']; ?> </h5>
                      <h5> Diagnostico: <?php echo $paciente['diagnostico']; ?> </h5>
                  </div> 
              </div>
          </div>          
       
      </div>
    </div>
  </body>
</html>