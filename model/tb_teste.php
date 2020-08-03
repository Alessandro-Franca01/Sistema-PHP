<?php
# AJUSTAR ESSA MODELAGEM PARA MELHORAR O MAPEAMENTO:
class Tabela {
    public $paciente = "DISPONIVEL";
    public $data_hora = null; // Esse atributo é uma composição do objeto DateTime ou só o tipo date!

    // Construtor com todos os parametros
    function __construct($paciente, $data_hora){
        $this->paciente = $paciente;
        $this->data_hora = $data_hora;
    }

     // Unico set e get generico:
     function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    function __get($atributo){
        return $this->$atributo;
    }
    
}
?>