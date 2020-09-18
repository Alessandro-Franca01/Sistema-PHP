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
      
    <title>Atendimento</title>
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script>
        function acao(){
            alert('Atendimento agendado!')
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
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="./img/inc_form_atendimento.jpg" width="30" height="30" >
        Atendimento
      </a>
      <a href="./menu.php">
        <button class="btn btn-outline-secondary" type="button">Voltar ao Menu</button>
      </a>
    </nav>
      <!-- Usar o metodo POST -->
    <form action="./controll/validacao_atendimento.php" method="post">
      <div class="form-group">
            <label for="select_cad_atendimento">Pacientes</label>
            <select class="form-control" name="paciente_atend" id="slt_nome_atend_pct">
            <?php foreach($lista_paciente as $paciente) { ?>
              <option><?php  echo $paciente['nome']?></option>
            <?php } ?>
            </select>
      </div> 
      <div class="form-group">
          <label for="tx_reponsavel">Valor</label>
          <input type="text" class="form-control" name="valor" id="nome_repon" placeholder="Valor do atendimento">
          <small id="small_telefone" class="form-text text-muted">*Campo obrigatorio </small>
      </div>
      <div class="form-group">
          <label for="select_cad_atendimento">Horario do Atendimento</label>
          <select class="form-control" name="horario_atend" id="select_cad_atendimento">
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
      <!-- Usar o campo de seleção para escolher o horario: retirando o js = onclick="acao()"  -->
      <div class="form-group">
          <label for="data_atendimento">Data do Atendimento</label>
          <input type="date" name ="data_atend" class="form-control" id="data_atendimento">
      </div>
      <div class="form-group">
          <label for="obs_agendamento">Observações</label>
          <textarea class="form-control" name="obs_atend" id="obs_agendamento"></textarea>
          <small id="help_obs_ag" class="form-text text-muted">*Campo não obrigatorio </small>
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
      <button type="reset" class="btn btn-secundary">Cancelar</button>
    </form>

    <script>
      // Script da mensaguem de validação: FUNCINONADO!
        var url_string = window.location.href;
        var url = new URL(url_string);
        if (url.searchParams.get("atendimento") != null){
          var getParamtroCadastro = url.searchParams.get("atendimento");

          if(getParamtroCadastro == "efetuado"){
            console.log(url); 
            console.log(getParamtroCadastro);
            alert("Atendimento agendado com sucesso!");
          }
          if(getParamtroCadastro == "nao_efetuado"){ 
            console.log(url); 
            console.log(getParamtroCadastro);
            alert("Atendimento NÃO foi possível de ser agendado.");
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