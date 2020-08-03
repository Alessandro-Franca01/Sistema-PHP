<?php
# Script com Ojbeto usando Date como atributo:
 date_default_timezone_set('America/Recife');

// Essa função vai gerar todoas as datas por semana: FUNCIONANDO!
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
                echo "<td>".$first_name."</td>";
            }else{
            echo "<td>".$obj->__get("paciente")."</td>"; // esta errado aqui!
            }
            $cont++;
        }
    echo "</tr>";
  }

?>