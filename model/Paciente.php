<?php
# Script da Classe Paciente

// Adicionar novo atributo RESPONSAVEL:
class Paciente {

    # TENHO QUE ACRESENTAR O ATRIBUTO "RESPONSAVEL";
    private $idPaciente = null;
    private $nomePaciente = null; 
    private $emailPaciente = null;
    private $telefonePaciente = null; 
    private $data_nasc = null;
    private $diagnostico = null; // Mesmo se colocar aqui uma String nao vai sair no card dos pacientes!
    private $responsavel = null;

    function __construct($id, $nome, $email, $data, $telefone, $diagnostico, $responsavel){
        $this->idPaciente = $id;
        $this->nomePaciente = $nome;
        $this->emailPaciente = $email;
        $this->data_nasc = $data;
        $this->telefonePaciente = $telefone;
        $this->diagnostico = $diagnostico;
        $this->responsavel = $responsavel;
    }

     // Unico set e get generico:
     function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    function __get($atributo){
        return $this->$atributo;
    }

    // Falta o atributo 'responsavel'
    function toString(){
        echo "ID: $this->idPaciente, Nome: $this->nomePaciente, Email: $this->emailPaciente, Data de nascimento: $this->data_nasc
            , Telefone: $this->telefonePaciente, Diagnostico: $this->diagnostico";
    }

}


?>