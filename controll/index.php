<?php
// Script de proteção ao acesso direto em diretorios do sistema 
/*session_start();

// Se a Variavel de validaçao da sessao nao existir ou for false vou redirecionar a pagina
if((!isset($_SESSION['validacao'])) || (!$_SESSION['validacao'])){
    header('Location: ../index.php?login=erro_acesso_negado');
}*/
exit('SISTEMA PROTEJIDO!!');

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
  <!-- Melhorar o desnign dessa pagina de segurança -->    
  <body class = bg-back>

  </body>
</html>