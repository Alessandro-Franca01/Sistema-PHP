<?php
# Script da Classe Paciente

class Paciente {

    private $idPaciente = null;
    private $nomePaciente = null; 
    private $emailPaciente = null;
    private $data_nasc = null;

    function __construct($id, $nome, $email, $data){
        $this->idPaciente = $id;
        $this->nomePaciente = $nome;
        $this->emailPaciente = $email;
        $this->data_nasc = $data;
    }

     // Unico set e get generico:
     function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    function __get($atributo){
        return $this->$atributo;
    }

    // FUNCIONANDO!
    function toString(){
        echo "ID: $this->idPaciente, Nome: $this->nomePaciente, Email: $this->emailPaciente, Data de nascimento: $this->data_nasc";
    }

}


?>