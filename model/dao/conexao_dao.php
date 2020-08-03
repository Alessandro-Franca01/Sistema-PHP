<?php
# SCRIPT PARA TRATAR DE FUNCÕES SOBRE CONEXAO AO BANCO DE DADOS

// Colocar try-catch na chamada da Funcao: FUNCIONANDO *Tirar esse metodo daqui depois
function bd_conectar(){
    // Variaveis de conexao
    $dns = 'mysql:host=localhost;dbname=test';
    $user = 'root';
    $senha = null; 

    $conexao = new PDO($dns, $user, $senha);
    return $conexao;
}

function bd_encerar_conexao($conexao){
    # codigo de encerramento da conexao!
}







?>