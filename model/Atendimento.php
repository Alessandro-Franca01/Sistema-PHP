<?php
# CLASSE DE ATENDIMENTO NO MOMENTO NAO ESTA SENDO NECESSARIA

// Nessa classe posso colocar todos os dados do atendimento incluindo a data
class Atendimento {

    private $idAtendimento = null;
    private $valor = null;
    private $atend_obd = null;

    //Metodo construtor da classe passando o id como parametro: FUNCIONANDO!
    function __construct($id, $valor, $obs){
        $this->idAtendimento = $id;
        $this->valor = $valor;
        $this->atend_obd = $obs;
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