<?php
# INICIAR A APLICAÇÃO DO PROJETO DE DARCILENE 

// Usando session_start() configurado:
//session_start();

// Esse comando vai passar a sessao já com as configurações: FUNCIONOU NORMAL
require __DIR__.'\model\dao\session.php';

if(!isset($_GET['login']) ){
  $_SESSION['validacao'] = false;
}

$_SESSION['csrf_token'] = sha1(rand(1, 20000));


?>

<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <title>Programa de Darcilene</title>   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript"></script>

    <link rel="shortcut icon" href="./img/menu.png" >

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
                <input type="hidden" name="_csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <div class="form-group">
                  <input name="email" type="text" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>
                <!-- Fazer a implementação de feedback de erro de login --> 
                <?php
                if(isset($_GET["login"])){
                  echo '<p class="text-danger text-center">'.'Email ou senha inválida(s)!'.'</p>';
                }elseif(isset($_GET["validacao"])){
                  echo '<p class="text-danger text-center">'.'Campo(s) em branco!'.'</p>';
                }
                ?>
                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>                                
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