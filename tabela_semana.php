<?php
    # ESSA PAGINA VAI SER PARA TESTAR A TABELA DE AGENDAMENTO, TENHO QUE ORGANIZAR ESSA PAGINA DEPOIS!

    // Começar a implementar a funcionalidade de VISUALIZAR SEMANA
    require('./model/table.php');
    require('./model/funcoes_data.php');
    
    session_start();

    // Data gerada pelo usuario: Na pratica
    //$data = ' 2020-09-07';

    # Recebendo o array atendimentos do banco de dados
    //***Lembrar de tirar essa negação!
    if(!isset($_SESSION['tbLista'])){
      print_r($_SESSION['tbLista']);
      echo "<hr>";
    }

    // Funcao gera os horarios de um dia:
    # Essa data vai ser colocada pelo o usuario: Gerando semana automaticamente ( FUNCIONANDO/EM TESTE !!!)
    $semana = gerarSemana(new DateTime('last Monday')); # Fiz um alteração no espaçamente inicial: entrar com a $data
    $lista_horarios = gerarHorarios($semana[0], 8, 21);
    
    // Resultado: lista de objetos Table de um unico
    $array_teste_tabela = gerarObjTabela($lista_horarios); // Deu certo pq só converte um unico array!
    

    // Objetos da tabela semana:
    //$array_horarios_semana = gerarHorariosSemana($semana);
    //$objetos_tb_completo = gerarAllObjsTable($array_horarios_semana); // Está dando errado, Criar outra funçao!!

    // Comparando as Listas: FUNCIONADO
    $array_comparacao = compararObjTabela($_SESSION['tbLista'], $array_teste_tabela);

    // GERANDO TODAS AS LINHAS DA TABELA: MANUALMENTE!
    $array_linha_8h = gerarLinha(8, $semana); 
    $array_linha_9h = gerarLinha(9, $semana);
    $array_linha_10h = gerarLinha(10, $semana); 
    $array_linha_11h = gerarLinha(11, $semana);
    $array_linha_12h = gerarLinha(12, $semana); 
    $array_linha_13h = gerarLinha(13, $semana);
    $array_linha_14h = gerarLinha(14, $semana); 
    $array_linha_15h = gerarLinha(15, $semana);
    $array_linha_16h = gerarLinha(16, $semana); 
    $array_linha_17h = gerarLinha(17, $semana);
    $array_linha_18h = gerarLinha(18, $semana); 
    $array_linha_19h = gerarLinha(19, $semana); 
    $array_linha_20h = gerarLinha(20, $semana);
    $array_linha_21h = gerarLinha(21, $semana); 
    $array_linha_22h = gerarLinha(22, $semana); 

    // Gerando os objetos da tabela: AUTOMATIZA DEPOIS!
    $objetos_linha_8h = gerarObjTabela($array_linha_8h);
    $objetos_linha_9h = gerarObjTabela($array_linha_9h);
    $objetos_linha_10h = gerarObjTabela($array_linha_10h); 
    $objetos_linha_11h = gerarObjTabela($array_linha_11h);
    $objetos_linha_12h = gerarObjTabela($array_linha_12h); 
    $objetos_linha_13h = gerarObjTabela($array_linha_13h);
    $objetos_linha_14h = gerarObjTabela($array_linha_14h); 
    $objetos_linha_15h = gerarObjTabela($array_linha_15h);
    $objetos_linha_16h = gerarObjTabela($array_linha_16h); 
    $objetos_linha_17h = gerarObjTabela($array_linha_17h);
    $objetos_linha_18h = gerarObjTabela($array_linha_18h); 
    $objetos_linha_19h = gerarObjTabela($array_linha_19h); 
    $objetos_linha_20h = gerarObjTabela($array_linha_20h);
    $objetos_linha_21h = gerarObjTabela($array_linha_21h); 
    //$objetos_linha_22h = gerarObjTabela($array_linha_22h); 
    

    // Testar nova funçao de gerar todas as linhas da semana:
    #$all_linhas_tabela = gerarArrayDeLinhas(8, 22, $semana); // FUNCIONANDO NORMALMENTE!
    #$all_obj_tables = gerarAllObjsTable($all_linhas_tabela); // FUNCIONANDO NORMALMENTE!

?>

<!doctype html>
<html lang="pt-br">
  <head>

    <title>Tabelas</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS *<div class="container-fluid bg-dark">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>
  
  <body class = "bg-light">
    
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
        <!-- Usando icones do proprio bootstrap: FUNCIONANDO -->
        <!-- <img src="./img/inc_form_atendimento.jpg" width="30" height="30"> --> 
          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar-week" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
          </svg>
          <!-- Ficou bem melhor assim -->
        </a>
        <div class="navbar-brand mr-auto">
          Agendamentos
        </div>
        <form action="./menu.php">
          <button class="btn btn-outline-secondary" type="submit">Voltar ao Menu</button>
        </form>
        
    </nav>

      <div>

          <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th>horario</th>
                <th>Segunda</th>
                <th>Terça</th>
                <th>Quarta</th>
                <th>Quinta</th>
                <th>Sexta</th>
                <th>Sabado</th>
              </tr>
            </thead>
            <tbody>
            <!-- Cada funcao vai ler uma linha da tabela: FUNCIONANDO NORMALMENTE -->
              <?php horario3(8, $objetos_linha_8h, $_SESSION['tbLista']) ?>
              <?php horario3(9, $objetos_linha_9h, $_SESSION['tbLista']) ?>
              <?php horario3(10, $objetos_linha_10h, $_SESSION['tbLista']) ?>
              <?php horario3(11, $objetos_linha_11h, $_SESSION['tbLista']) ?>
              <?php horario3(12, $objetos_linha_12h, $_SESSION['tbLista']) ?>
              <?php horario3(13, $objetos_linha_13h, $_SESSION['tbLista']) ?>
              <?php horario3(14, $objetos_linha_14h, $_SESSION['tbLista']) ?>
              <?php horario3(15, $objetos_linha_15h, $_SESSION['tbLista']) ?>
              <?php horario3(16, $objetos_linha_16h, $_SESSION['tbLista']) ?>
              <?php horario3(17, $objetos_linha_17h, $_SESSION['tbLista']) ?>
              <?php horario3(18, $objetos_linha_18h, $_SESSION['tbLista']) ?>
              <?php horario3(19, $objetos_linha_19h, $_SESSION['tbLista']) ?>
              <?php horario3(20, $objetos_linha_20h, $_SESSION['tbLista']) ?>
              <?php horario3(21, $objetos_linha_21h, $_SESSION['tbLista']) ?>
              
            </tbody>
            <tfoot class="thead-dark">
                <tr>
                    <th>horario</th>
                    <th>Segunda</th>
                    <th>Terça</th>
                    <th>Quarta</th>
                    <th>Quinta</th>
                    <th>Sexta</th>
                    <th>Sabado</th>
                </tr>
            </tfoot>
          </table>

      </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV29J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

