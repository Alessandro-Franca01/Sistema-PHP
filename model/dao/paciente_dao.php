<?php
# VAMOS TESTAR A VALIDAÇAO: TUDO INDICA QUE O INCLUDE NAO FUNCIONA
include("./Usuario.php");
//include('../../model/dao/dao_user.php'); // Melhor usado o outro metodo 'require'

session_start();
$_SESSION['usuario_logado'] = null;
// Recuperando valores do metodo GET
$emailLogin = $_GET['email'];
$senhaLogin = $_GET["senha"];

// Variavel de controle de validacao
$var = false;
// Usuario
$array_users = null;
$user_logado = null;

echo "Tentado usar o include em scripts na area privada";

echo "<br> KKKKKKKKKKKKKKKK";


?>