<?php
    # ESSA PAGINA VAI SER PARA TESTAR A TABELA DE AGENDAMENTO

    // Começar a implementar a funcionalidade de VISUALIZAR SEMANA
    require('./model/tb_teste.php');
    require('./model/funcoes_data.php');
    session_start();

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
            echo "<td>DISPONIVEL</td>";
          }
      echo "</tr>";
  }

    # Recebendo o array atendimentos do banco de dados
    //***Lembrar de tirar essa negação!
    if(!isset($_SESSION['tbLista'])){
      print_r($_SESSION['tbLista']);
      echo "<hr>";
    }

    // Funcao gera os horarios de um dia:
    # Vou ter que dá FOR para gerar todos os horarios...
    $semana = gerarSemana(new DateTime(' 2020-08-12'));
    $lista_horarios = gerarHorarios($semana[0], 8, 21);

    // Gerar os objetos com as datas geradas: posso entrar com uma lista de horarios/Dia
    function gerarObjTabela($array_horarios){
      $lista_tabela = array();
      foreach($array_horarios as $horario){
        $lista_tabela[] = new Tabela("DISPONIVEL", $horario); // add todos os objetos
      }
      return $lista_tabela;
    }
    
    $array_tabela = gerarObjTabela($lista_horarios);
    print_r($array_tabela);
    echo "<hr>";

    // Comparando duas listas de objetos: compara as listas e gerar uma nova lista com os objetos iguais
    function compararObjTabela($lista_banco, $lista_pagina){
      $lista_comparada = array();
      foreach($lista_banco as $list){
        # Aqui eu vou comparar um objeto( um atributo 'data_hora') dentro do array com outros objetos
        
        # TEM QUE FAZER UNS TESTES ANTES DE VOLTAR PARA CÁ!

      }

    }


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
            <!-- *IMPORTANTE: Posso fazer isso tudo com apenas um função -->
              <tr>
                <td>08:00</td>
                <td>ALESSANDRO</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
              </tr>
              <tr>
                <td>09:00</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
                <td>DISPONIVEL</td>
              </tr>
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
              <?php #horario(22) ?>
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

