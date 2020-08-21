<?php
# CLASSE DE ATENDIMENTO 

// Classe atualizada:
class Atendimento {

    private $idAtendimento = null;
    private $valor = null;
    private $observacao = null;
    private $data_atendimento = null; // DateTime
    private $id_usuario = null;
    private $id_paciente = null;

    //Metodo construtor da classe passando o id como parametro: FUNCIONANDO!
    function __construct($id, $valor, $obs, $data, $id_usuario, $id_paciente){
        $this->idAtendimento = $id;
        $this->valor = $valor;
        $this->data_atendimento = $data;
        $this->observacao = $obs;
        $this->id_usuario = $id_usuario;
        $this->id_paciente = $id_paciente;
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