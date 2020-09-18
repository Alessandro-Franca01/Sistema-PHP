<?php
# SCRIPT DA PAGINA DE CADASTRO DO ATENDIMENTO

session_start();

if(!$_SESSION['validacao']){
  header('Location: ./index.php?erro=user_nao_logado');
}

//$lista_paciente = $_SESSION['lista_cad_pct'];
$id = $_GET['id'];

?>

<html>
  <head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <title>Sistema Web</title>
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>

  <body>
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="./menu.php">
        <img src="./img/icone_remocao02.jpg" width="30" height="30" >
        Alterar Data
      </a>
      <a href="./lista_pacientes2.php">
        <button class="btn btn-outline-secondary" type="button">Voltar</button>
      </a>
      </nav>
      
    <form class="mt-2" action="./controll/validacao_alter_pct_diag.php?id=<?php echo $id; ?>" method="post">
      
      <div class="form-group">
          <label for="data_atendimento">Novo Diagnóstico</label>
          <textarea type="date" name ="alter_pct_diag" class="form-control" id="id_alter_pct_diag"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Alterar</button>
      <button type="reset" class="btn btn-secundary">Cancelar</button>
    </form>
  </body>
</html>