<?php
# SCRIPT DA PAGINA DE CADASTRO DO ATENDIMENTO

session_start();

if(!$_SESSION['validacao']){
  header('Location: ./index.php?erro=user_nao_logado');
}

//$lista_paciente = $_SESSION['lista_cad_pct'];
$id = $_GET['id'];

// mx-sm-3

?>

<html>
  <head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <title>Programa Agendamento </title>
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>

  <body>
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="./menu.php">
        <img src="./img/icone_remocao02.jpg" width="30" height="30" >
        Alterar Dados
      </a>
      <a href="./lista_pacientes2.php">
        <button class="btn btn-outline-secondary" type="button">Voltar</button>
      </a>
      </nav>
      <!--  Formulario de alteração do NOME do paciente: FUCIONANDO -->
      <form action="./controll/validacao_alter_pct_outros.php?id=<?php echo $id; ?>" id="form_nome" method="post">
            <label for="form_nome"> Digite Nome e Sobrenome </label>
            <div class="input-group input-group-auto">                
                <input type="text" placeholder="Nome do paciente" class="form-control" name="alter_nome_pct">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Alterar</button>
                </div>
            </div>
        </form>

        <!--  Formulario de alteração do EMAIL do paciente: FUCIONANDO  -->
        <form action="./controll/validacao_alter_pct_outros.php?id=<?php echo $id; ?>" id="form_email" method="post">
            <label for="form_nome"> Digite o email </label>
            <div class="input-group input-group-auto">                
                <input type="text" placeholder="E-mail do paciente" class="form-control" name="alter_email_pct">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Alterar</button>
                </div>
            </div>
        </form>
        <!--  Formulario de alteração do RESPONSAVEL do paciente  -->
        <form action="./controll/validacao_alter_pct_outros.php?id=<?php echo $id; ?>" id="form_responsavel" method="post">
            <label for="form_nome"> Responsável </label>
            <div class="input-group input-group-auto">                
                <input type="text" placeholder="Nome do responsavel" class="form-control" name="alter_resp_pct">
                <div class="input-group-append">
                    <button type="submit" for="form_responsavel" class="btn btn-primary">Alterar</button>
                </div>
            </div>
        </form>
        <!--  Formulario de alteração do TELEFONE do paciente  -->
        <form action="./controll/validacao_alter_pct_outros.php?id=<?php echo $id; ?>" id="form_telefone" method="post">
            <label for="form_nome"> Digite o Telefone </label>
            <div class="input-group input-group-auto">                
                <input type="text" placeholder="Telefone do paciente" class="form-control" name="alter_telefone_pct">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Alterar</button>
                </div>
            </div>
        </form>
  </body>
</html>