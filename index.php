<?php
# INICIAR A APLICAÇÃO DO PROJETO DE DARCILENE 
# ESSA PAGINA NAO TEM NENHUM TRATAMENTO DE ERRO!

session_start();
if(!isset($_GET['login']) ){
  $_SESSION['validacao'] = false;

}

?>

<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <title>Programa de Darcilene</title>   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script>
      // Começar a implementação dos codigos em java script na aplicação:
        function validacao(){
          
        }
    </script>

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
    
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark ">
      
      <a class="navbar-brand" href="#">
        <img src="./img/incone_formulario.jpg" width="30" height="30" >
        Formulario de Login
      </a>
    </nav>

    <div class="container">    
      <div class="row">
        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login 
            </div>
            <div class="card-body">   
              <form action="./controll/validacao_user.php" method="post">
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>
                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
                <!-- "Criando um botao para fazer o cadasro do usuario, *AJEITAR ESSE BOTAO COM LINK" -->                
                <button class="btn btn-lg btn-info btn-block" type="button">
                  <a class="btn btn-lg btn-info btn-block" href="#">
                    Cadastrar-se
                  </a>
                </button>                
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>