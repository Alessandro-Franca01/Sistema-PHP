<?php
# Script do novo modelo do banco de dados

// Conectando com o banco e retornando uma instancia de PDO: TESTAR!
function bd_conectar(){
    // Variaveis de conexao
    $dns = 'mysql:host=localhost;dbname=projeto_php';
    $user = 'root';
    $senha = null; 

    $conexao = new PDO($dns, $user, $senha);
    return $conexao;
}

// Da uma olhado como faço para encerrar a conexao com o banco:
function bd_encerar_conexao($conexao){
    # codigo de encerramento da conexao!
}



?>