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

function gerarSemana($referencia){
    $cont = 0;
    $lista_data[$cont] = $referencia;
    for($i = 0; $i <= 4; $i++){
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


?>