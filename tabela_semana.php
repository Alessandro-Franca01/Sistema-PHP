<?php
    # ESSA PAGINA VAI SER PARA TESTAR A TABELA DE AGENDAMENTO, TENHO QUE ORGANIZAR ESSA PAGINA DEPOIS!

    // Começar a implementar a funcionalidade de VISUALIZAR SEMANA
    require('./model/tb_teste.php');
    require('./model/funcoes_data.php');
    
    session_start();

    // Data gerada pelo usuario:
    $data = ' 2020-07-20';

    # TODAS AS FUNÇÕES USADAS CRIADAS NESSE SCRIPT:

    # Funcionando corretamente! 
    function horario($hora){
      echo "<tr>
              <td>{$hora}:00</td>
              <td>DISPONIVEL</td>
              <td>DISPONIVEL</td>
              <td>DISPONIVEL</td>
              <td>DISPONIVEL</td>
              <td>DISPONIVEL</td>
              <td>DISPONIVEL</td>
            </tr>";
    }

    # Funcionando corretamente!
    function horario2($hora){
      echo "<tr>";
          for ($i = 0; $i <= 5; $i++) {
            if($i == 0){
              echo "<td>".$hora.":00</td>";
            }
            // chamar uma função aqui : resultado seria o objeto correto!
            // Depois imprimia o nome do objeto dentro do echo!
            echo "<td>DISPONIVEL</td>";
          }
      echo "</tr>";
    }

    // Gerar os horarios da semana: resultado um array com todos os horarios de cada dia da semana"COMPLETO"
    function gerarHorariosSemana($dias_semana){
      $horarios_semana = array();
      for($i = 0; $i <= 5; $i++){
        $horarios_semana[] = gerarHorarios($dias_semana[$i], 8, 21);
      }
      return $horarios_semana;
    }

    // Gerar os objetos com as datas geradas: posso entrar com uma lista de horarios/Dia
    function gerarObjTabela($array_horarios){
      $lista_tabela = array();
      foreach($array_horarios as $horario){
        $lista_tabela[] = new Tabela("DISPONIVEL", $horario); // add todos os objetos
      }
      return $lista_tabela;
    }

    // Comparando duas listas de objetos: compara as listas e gerar uma nova lista com os objetos iguais: FUNCIONANDO!
    function compararObjTabela($lista_banco, $lista_pagina){
      $lista_comparada = array(); 
      $cont = 0;
      foreach($lista_banco as $objBdTable){
        # Esta entrando no IF: Funcionando!
        foreach($lista_pagina as $objPgTble){
          if($objBdTable->__get("data_hora") == $objPgTble->__get("data_hora")){          
            array_push($lista_comparada, $objBdTable);
          }else{ 
            // echo "Entrou no ELSE";
          }
        }
        
      }
      return $lista_comparada;
    }

    // Gerar um array com todos os objetos Table da semana 
    function gerarAllObjsTable($all_horarios){
      $lista_tabela = array();
      // vou entrar no array do dia, dentro dele vou dá um for ou chamar a outra função!
      foreach($all_horarios as $dia){
        $lista_tabela[] = gerarObjTabela($dia);
      }
      return $lista_tabela;
    }

    # Recebendo o array atendimentos do banco de dados
    //***Lembrar de tirar essa negação!
    if(!isset($_SESSION['tbLista'])){
      print_r($_SESSION['tbLista']);
      echo "<hr>";
    }

    // Funcao gera os horarios de um dia:
    # Essa data vai ser colocada pelo o usuario
    $semana = gerarSemana(new DateTime('2020-07-20')); # Fiz um alteração no espaçamente inicial: entrar com a $data
    $lista_horarios = gerarHorarios($semana[0], 8, 21);
    
    // Resultado: lista de objetos Table de um unico
    $array_teste_tabela = gerarObjTabela($lista_horarios); // Deu certo pq só converte um unico array!
    

    // Objetos da tabela semana:
    $array_horarios_semana = gerarHorariosSemana($semana);
    $objetos_tb_completo = gerarAllObjsTable($array_horarios_semana); // Está dando errado, Criar outra funçao!!

    // Comparando as Listas: FUNCIONADO
    $array_comparacao = compararObjTabela($_SESSION['tbLista'], $array_teste_tabela);

    // TESTAR FUNCAO PARA GERAR LINHA DA TABELA: FUNCIONANDO
    $array_linha_8h = gerarLinha(8, $semana); 
    $array_linha_9h = gerarLinha(9, $semana); 

    // Gerando os objetos da tabela:
    $objetos_linha_8h = gerarObjTabela($array_linha_8h);
    $objetos_linha_9h = gerarObjTabela($array_linha_9h);

    # Imprimindo a lista completa dos horarios da semana
    #print_r($array_comparacao);

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

  <body class = "container-fluid bg-light">
    
      <div class="row">
          <nav class="navbar navbar-light bg-light">
              <a class="navbar-brand" href="#">
                <img src="./img/inc_form_atendimento.jpg" width="30" height="30">
                Agendamentos
              </a>
            </nav>
        </div>

      <div class ="row">

          <table class="table">
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
            <!-- Cada linha vai ser uma funcao php -->
              <?php horario3(8, $objetos_linha_8h, $_SESSION['tbLista']) # FUNCIONANDO ?>
              <?php horario3(9, $objetos_linha_9h, $_SESSION['tbLista']) # FUNCIONANDO ?>
              <tr>
                <td>10:00</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
              </tr>
              <tr>
                <td>11:00</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
              </tr>
              <tr>
                <td>12:00</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
              </tr>
              <tr>
                <td>13:00</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
              </tr>
              <tr>
                <td>14:00</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
              </tr>
              <tr>
                <td>15:00</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
              </tr>
              <tr>
                <td>16:00</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
              </tr>
              <tr>
                <td>17:00</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
              </tr>
              <tr>
                <td>18:00</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
              </tr>
              <tr>
                <td>19:00</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
              </tr>
              <tr>
                <td>20:00</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
              </tr>
              <tr>
                <td>21:00</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
              </tr>              
              <?php horario2(22) ?>
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

