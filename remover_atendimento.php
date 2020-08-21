<?php
# SCRIPT DA PAGINA DE CADASTRO DO ATENDIMENTO

session_start();

if(!$_SESSION['validacao']){
  header('Location: ./index.php?erro=user_nao_logado');
}

?>

<html>
  <head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <title>Remover Atendimento</title>
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script>
        function acao(){
            alert('Atendimento excluido!')
        }
    </script>
  </head>

  <body>
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="./img/icone_remocao02.jpg" width="30" height="30" >
        Excluir Atendimento
      </a>
      <a href="./menu.php">
        <button class="btn btn-outline-secondary" type="button">Voltar</button>
      </a>
      </nav>
      
    <form action="./controll/validacao_rm_atendimento.php" method="post">
      <div class="form-group">
          <label for="nome_paciente">Paciente</label>
          <input type="text" class="form-control" name="nome_rm_paciente" id="nome_rm_paciente" placeholder="Nome e Sobre Nome">
          <small id="small_pacinete" class="form-text text-muted">*Não use preposições tipo: de,da,do </small>
      </div>
      <div class="form-group">
          <label for="select_cad_atendimento">Horario do Atendimento</label>
          <select class="form-control" name="horario_rm_atend" id="select_cad_atendimento">
            <option>08:00</option>
            <option>09:00</option>
            <option>10:00</option>
            <option>11:00</option>
            <option>12:00</option>
            <option>13:00</option>
            <option>14:00</option>
            <option>15:00</option>
            <option>16:00</option>
            <option>17:00</option>
            <option>18:00</option>
            <option>19:00</option>
            <option>20:00</option>
            <option>21:00</option>
        </select>
      </div>
      <div class="form-group">
          <label for="data_atendimento">Data do Atendimento</label>
          <input type="date" name ="data_rm_atend" class="form-control" id="data_atendimento">
      </div>
      <button type="submit" class="btn btn-primary">Remover</button>
      <button type="reset" class="btn btn-secundary">Cancelar</button>
    </form>

  </body>
</html>