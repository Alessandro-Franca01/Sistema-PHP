<?php
# Script da classe Usuario:

     class Usuario{

        private $id = null; // Nao dá para usar o private junto com o var
        private $nome = null;
        private $email = null;
        private $senha = null;

        //Metodo construtor da classe: Alterando o metodo
        function __construct($id, $nome, $email, $senha){
            $this->id = $id;
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
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