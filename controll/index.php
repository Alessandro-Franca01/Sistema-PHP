<?php
// Iniciando a sessao em php 
session_start();

// Se a Variavel de validaçao da sessao nao existir ou for false vou redirecionar a pagina
if((!isset($_SESSION['validacao'])) || (!$_SESSION['validacao'])){
    header('Location: ../index.php?login=erro_acesso_negado');
}

#echo "Estou na pasta model";
?>