<?php
# Essa classe vai servir como teste para modelar a tabela : FUNCIONANDO CORRETAMENTE!

# AJUSTAR ESSA MODELAGEM PARA MELHORAR O MAPEAMENTO:
class Tabela {
    public $paciente = "DISPONIVEL";
    public $data_hora = null; // *O nome do atributo se torna indice do objeto!

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