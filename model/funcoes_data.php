<?php
# Script com Ojbeto usando Date como atributo:
 date_default_timezone_set('America/Recife');

// Essa função vai gerar todoas as datas por semana: FUNCIONANDO!

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

function gerarDatas($referencia, $passo, $quant){
    // Só deve passar aqui uma unica vez
    $cont = 0;
    $lista_data[$cont] = $referencia;
    for($i = 0; $i <= $quant; $i++){
        $cont++;
        $lista_data[$cont] = new DateTime($referencia->format('Y-m-d')); 
        $lista_data[$cont]->add(new DateInterval('P'.$passo.'D'));
        $passo = $passo + 7;
    }
    return $lista_data; 
}
// Aqui: vou entrar com uma data e vai ser gerado uma semana 
function gerarSemana($referencia){
    $cont = 0;
    $lista_data[$cont] = $referencia;
    for($i = 0; $i <= 4; $i++){ // sao 6 dias com o sabado "$i <= 5"
        $cont++;
        $lista_data[$cont] = new DateTime($referencia->format('Y-m-d')); 
        $lista_data[$cont]->add(new DateInterval('P'.$cont.'D'));
    }
    return $lista_data;
}

// Implementando o função para gerar os horarios: FUNCIONANDO CORRETAMENTE!
function gerarHorarios($dia, $inicio, $fim){
    $cont = 0;
    //$horarios[$cont] = $dia;
    $horarios = array();
    for($i = 0; $inicio <= $fim ; $inicio++){
        $new_hour = new DateTime($dia->format('Y-m-d')); // novo horario
        $new_hour->add(new DateInterval("PT".$inicio."H"));
        $horarios[$i] = $new_hour;
        $i++;
    }
    return $horarios;
}

// Essa funcao vai gerar cada linha da tabela: FUNCIONANDO!
function gerarLinha($horario, $semana){
    $array_linha = array();
    //$contar = count($semana);
    for($i = 0; $i < count($semana); $i++ ){
    //CRIANDO NOVA DATA ACRECENTANDO HORAS:
    $data_hour = new DateTime($semana[$i]->format('Y-m-d'));
    $data_hour->add(new DateInterval("PT".$horario."H"));
    $array_linha[] = $data_hour;
    }
    return $array_linha;
}

// Automatizar a criação de todas as linhas da tabela(8h as 22h): FUNCIONOU INCORRETAMENTE! Ajustando a repetição...
function gerarArrayDeLinhas($horario_inicial, $horario_final, $semana){ // paramentros default nao funcionou
    $linha = array();
    for($j = $horario_inicial; $j <= $horario_final; $j++){
        $temp_linha = null;
        $temp_linha = array();
        for($i = 0; $i < count($semana); $i++ ){
            //CRIANDO NOVA DATA ACRECENTANDO HORAS:
            $data_hour = new DateTime($semana[$i]->format('Y-m-d'));
            $data_hour->add(new DateInterval("PT".$j."H")); // Funcionando tudo direito!
            $temp_linha[] = $data_hour; 
            //array_push($temp_linha, $data_hour);
            //print_r($data_hour);
            //$temp_linha = array();
            //print_r($data_hour); //parece que aqui esta tudo normal...
            //print_r($linha[count($linha)]);
        }
        $linha[] = $temp_linha;
    }
    //$array_de_linhas = $linha;
    return $linha;
}

// Vamos gerar todos os objetos de cada linha:
function gerarArrayDeTables(){

    echo 'Acho que eu já tenho essa função!';
}

# Função melhorada da funcao 'horario2', imprimos os horarios com os OBJECT TABLE correpondentemente
function horario3($hora, $objetos_linha, $objetos_comparados){
    echo "<tr>";
        $cont = 0;
        foreach($objetos_linha as $obj){
            if($cont == 0){
                echo "<td>".$hora.":00</td>";
            }
            $boll = null;
            $obj_temp = null;
            // Comparando as listas: Funcionando ainda tem um erro, passando um campo a mais!
            foreach($objetos_comparados as $obj_comparado){
                if($obj->__get("data_hora") == $obj_comparado->__get("data_hora") ){
                    $boll = true;
                    $obj_temp = $obj_comparado; // copiando o objeto para o outro foreach
                    
                    break;
                    //echo "<td>".$first_name."</td>";
                }else{
                    $boll = false;
                    // ACHO QUE NAO PRECISO DESSE ELSE!
                }
                
            }
            // o if e else tem que ficar aqui dentro:
            if($boll){
                $nome = $obj_temp->__get("paciente");
                $array_name = explode(' ',$nome);
                $first_name = $array_name[0];
                echo '<td class="text-success">'.$first_name.'</td>';
            }else{
              echo "<td>".$obj->__get("paciente")."</td>"; // esta errado aqui!
            }
            $cont++;
        }
    echo "</tr>";
  }

  function horario4($hora, $linhas_objetos, $objetos_comparados){


    echo "<tr>";
        $cont = 0;
        foreach($objetos_linha as $obj){
            if($cont == 0){
                echo "<td>".$hora.":00</td>";
            }
            $boll = null;
            $obj_temp = null;
            // Comparando as listas: Funcionando ainda tem um erro, passando um campo a mais!
            foreach($objetos_comparados as $obj_comparado){
                if($obj->__get("data_hora") == $obj_comparado->__get("data_hora") ){
                    $boll = true;
                    $obj_temp = $obj_comparado; // copiando o objeto para o outro foreach
                    
                    break;
                    //echo "<td>".$first_name."</td>";
                }else{
                    $boll = false;
                    // ACHO QUE NAO PRECISO DESSE ELSE!
                }
                
            }
            // o if e else tem que ficar aqui dentro:
            if($boll){
                $nome = $obj_temp->__get("paciente");
                $array_name = explode(' ',$nome);
                $first_name = $array_name[0];
                echo "<td>".$first_name."</td>";
            }else{
            echo "<td>".$obj->__get("paciente")."</td>"; // esta errado aqui!
            }
            $cont++;
        }
    echo "</tr>";
  }

?>