<?php
// Esse SCRIPT VOU TER QUE VER COMO VOU FAZER PARA ALTERAR MAIS DE UM CAMPO
/* 
1- Posso usar mais de um SRICPT PARA CADA TIPO DE ALTERAÇÃO
2- Isso vai possibilitar usar apenas um metodo
3- Cada tipo de alteração vai para sua respectiva pagina
4- Exemplos: tipos Data,Email,Diagnostico, etc;
Outra Opção: FAZER TUDO ISSO NUMA PAGINA SÓ COM CHECKBOX
*/

include('./model/dao/paciente_dao.php');
include('./model/dao/conexao_novo_dao.php'); 

session_start();

// Posso fazer uma logica aqui para caso o paciente já exista no banco de dados:
if(isset($_GET['consulta_pct'])){
  echo "GET recebido, Valor: {$_GET['consulta_pct']}";
}


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
    <nav class="navbar navbar-dark bg-dark ">
            <a class="navbar-brand" href="./menu.php">
                <img src="./img/inc_form_paciente.png" width="30" height="30" >
                Alterar Dados
            </a>
            <a href="./lista_pacientes2.php">
                <button class="btn btn-outline-secondary" type="button">Voltar</button>
            </a>
        </nav>        
        <form action="#" method="post">
            <div class="form-group">
                <label for="cad_pct_nome">Nome</label>
                <input type="text" class="form-control" name="nome_teste" id="cad_pct_nome" placeholder="Nome e Sobre Nome">
                <small id="small_pacinete" class="form-text text-muted">Campo obrigatória </small>
            </div>                 
            <div class="form-group">
                    <label for="obs_agendamento">Diagnóstico</label>
                    <textarea class="form-control" name="cad_pct_dgn" id="cad_diagnostico"></textarea>
                    <small id="cad_pct_dgn" class="form-text text-muted">*Campo não obrigatorio </small>
            </div>
            <div class="form-group">
                <label for="cad_pct_telefone">Telefone</label>
                <input type="text" class="form-control" name="cad_pct_telefone" id="cad_pct_telefone" placeholder="Telefone ou Celular">
                <small id="small_telefone" class="form-text text-muted">*Campo não obrigatorio </small>
            </div>
            
            <!-- Testar o input tipo data com bootstrap -->
            <div class="form-group">
                <label for="data_nasc">Data de Nascimento</label>
                <input type="date" class="form-control" name="cad_pct_data_nasc" id="data_nasc">
            </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
                <button type="reset" class="btn btn-secundary">Cancelar</button>
        </form>
        <form action="#" id="form_data" method="post">
            <div class="form-group">
                <label for="cad_pct_email">Email</label>
                <input type="email" class="form-control" name="cad_pct_email" id="cad_pct_email" aria-describedby="help_email_pc" placeholder="Email do Paciente">
                <small id="help_email_pc" class="form-text text-muted">*Campo não obrigatorio </small>
            </div>
        </form>
    </body>
</html>