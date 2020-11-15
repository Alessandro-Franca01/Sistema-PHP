<?php
# PAGINA DE LOGOFF: REDIRECIONANDO O USUARIO PARA OUTRAS PAGIUNAS

// Iniciando a sessão:
session_start();

// Apagando todos os dados da sessão:
$resultado = session_destroy();

// Fechar conexão:


if($resultado == 1){
    header('Location: ../index.php');
}elseif($resultado == 0){
    header('Location: ../index.php?logoff=erro');
}

?>