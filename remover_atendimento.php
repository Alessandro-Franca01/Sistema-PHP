<?php
# SCRIPT DA PAGINA DE CADASTRO DO ATENDIMENTO

session_start();

if(!$_SESSION['validacao']){
  header('Location: ./index.php?erro=user_nao_logado');
}

$lista_paciente = $_SESSION['lista_cad_pct'];

?>

<html>
  <head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <title>Remover Atendimento</title>
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
            <label for="select_cad_atendimento">Pacientes</label>
            <select class="form-control" name="nome_rm_paciente" id="nome_rm_paciente">
            <?php foreach($lista_paciente as $paciente) { ?>
              <option><?php  echo $paciente['nome']?></option>
            <?php } ?>
            </select>
            <small id="small_pacinete" class="form-text text-muted">*Campo obrigatório </small>
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

    <script>
      // Script da mensaguem de validação: FUNCINONADO!
        var url_string = window.location.href;
        var url = new URL(url_string);
        if (url.searchParams.get("atendimento") != null){
          var getParamtroCadastro = url.searchParams.get("atendimento");

          if(getParamtroCadastro == "removido"){
            console.log(url); 
            console.log(getParamtroCadastro);
            alert("Atendimento REMOVIDO sucesso!");
          }
          if(getParamtroCadastro == "nao_removido"){ 
            console.log(url); 
            console.log(getParamtroCadastro);
            alert("NÃO foi possível remover o atendimento.");
          }
          else{
            // NÃO É PARA ENTRAR AQUI!
            console.log(url); 
            console.log(getParamtroCadastro);
          }
          
        }
        
    </script>
  </body>
</html>