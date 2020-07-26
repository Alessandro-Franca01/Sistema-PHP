<?php
# Script da classe Usuario:

     class Usuario{

        private $id = null;
        private $nome = null;
        private $email = null;
        private $senha = null;

        //Metodo construtor da classe passando o id como parametro: FUNCIONANDO!
        function __construct($id){
            $this->id = $id;
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