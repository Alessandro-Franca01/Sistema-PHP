<?php
// Implementando a logica de persistencia da tabela de agendamento

include('./model/dao/paciente_dao.php');
include('./model/dao/conexao_novo_dao.php'); 

session_start();

?>

<html>
                <!-- Ajustar esse codigo para ficar responsivo mobile/notebook -->  
  <head>
    <meta charset="utf-8" />
    <!-- Depois que apliquei essa meta ficou responsivo sem usar a referencia 'sm' -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <title>Atendimento</title>
    <!-- Usando o bootstrap atraves do link, porem nao é responsivo -->
    <!-- Deixar essa pagina responsiva, baixa o bootstrap para usar o diretorio salvo -->    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script>
        function acao(){
          alert('Paciente Cadastrado')
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
      <!-- Nao sei se crio uma div ou deixo assim mesmo? -->
    <nav class="navbar navbar-dark bg-dark ">
      
      <a class="navbar-brand" href="#">
        <img src="./img/inc_form_paciente.png" width="30" height="30" >
        Cadastro de Paciente
      </a>
    </nav>

    <form action="./controll/validacao_cad_paciente.php" method="post">
    <div class="form-group">
        <label for="nome_paciente">Paciente</label>
        <input type="text" class="form-control" id="nome_paciente" placeholder="Nome e Sobre Nome">
        <small id="small_pacinete" class="form-text text-muted">*Não use preposições tipo: de,da,do </small>
    </div>
    <div class="form-group">
        <label for="tx_reponsavel">Responsável</label>
        <input type="text" class="form-control" id="nome_repon" placeholder="Primeiro Nome">
        <small id="help_respon" class="form-text text-muted">*Campo não obrigatorio </small>
    </div>
    <div class="form-group">
        <label for="tx_reponsavel">Telefone</label>
        <input type="text" class="form-control" id="nome_repon" placeholder="Telefone ou Celular">
        <small id="small_telefone" class="form-text text-muted">*Campo não obrigatorio </small>
    </div>
    <div class="form-group">
        <label for="email_paciente">Email</label>
        <input type="email" class="form-control" id="email_paciente" aria-describedby="help_email_pc" placeholder="Email do Paciente">
        <small id="help_email_pc" class="form-text text-muted">*Campo não obrigatorio </small>
    </div>
    <!-- Testar o input tipo data com bootstrap -->
    <div class="form-group">
        <label for="data_nasc">Data de Nascimento</label>
        <input type="date" class="form-control" id="data_nasc">
    </div>
    <button onclick="acao()" type="submit" class="btn btn-primary">Enviar</button>
    <button type="reset" class="btn btn-secundary">Cancelar</button>
    </form>

  </body>
</html>