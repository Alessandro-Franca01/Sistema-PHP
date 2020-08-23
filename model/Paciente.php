<?php
# Script da Classe Paciente

# Faltou o atributo do telefone, vou ter que ajeitar todos os codigos que tenham uma instancia de paciente!
class Paciente {

    private $idPaciente = null;
    private $nomePaciente = null; 
    private $emailPaciente = null;
    private $telefonePaciente = null; 
    private $data_nasc = null;
    private $diagnostico = null;  // alteração 

    function __construct($id, $nome, $email, $data, $telefone, $diagnostico){
        $this->idPaciente = $id;
        $this->nomePaciente = $nome;
        $this->emailPaciente = $email;
        $this->data_nasc = $data;
        $this->telefonePaciente = $telefone;
        $this->diagnostico = $diagnostico;
    }

     // Unico set e get generico:
     function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    function __get($atributo){
        return $this->$atributo;
    }

    // ALTERANDO ...
    function toString(){
        echo "ID: $this->idPaciente, Nome: $this->nomePaciente, Email: $this->emailPaciente, Data de nascimento: $this->data_nasc
            , Telefone: $this->telefonePaciente, Diagnostico: $this->diagnostico";
    }

}


?>