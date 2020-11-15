<?php
# SCRIPT DA VALIDAÇÃO DE USUARIO NO SISTEMA! FUNCIONANDO

include_once('../model/Usuario.php'); 
include('../model/dao/user_dao.php');
include('../model/dao/conexao_novo_dao.php');

session_start();
$_SESSION['usuario_logado'] = null;

// Antes de tudo vamos verificar o token do formulario: Funionando!
$csrf_token = $_SESSION['csrf_token'] ?? false;

if (!$csrf_token or $csrf_token !== filter_input(INPUT_POST, '_csrf_token')) {
    die('CSRF token validation fail');
}

// LIMPEZA E VALIDAÇÃO DOS CAMPOS DO FORMULARIO DE LOGIN: SUBIR NO SERVER
$emailLogin = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$senhaLogin = filter_var($_POST['senha'], FILTER_SANITIZE_STRING);

// Verificando NULO: SUBIR NO SERVER
if(($emailLogin == null) || ($senhaLogin == null)){
    header('Location: ../index.php?validacao=campo_em_branco');
    exit('Valores nulos');
}

// Validando EMAIL: SUBIR NO SERVER
$resultado = filter_var($emailLogin, FILTER_VALIDATE_EMAIL);

if(!$resultado){
    //echo "O campo não foi validado!<br>";
    header('Location: ../index.php?login=acesso_invalido');
    exit("Finalizando o script!");
}

/*
------------------------------------ CODIGO IMPLEMENTADO --------------------------------------
$_SESSION['form_user'] = array(
    email => $emailLogin,
    senha => $senhaLogin)
*/

// Variavel de controle de validacao
$var = false;
// Usuario
$array_users = null;
$user_logado = null;

// Iniciar a funcao de conexao
try{
    $conexao = bd_conectar();
    $array_users = bd_consultarUsuarios($conexao);
}
catch(PDOException $e){
    echo "Erro: ".$e->getCode();
    echo "<br>Messagem: ".$e->getMessage();
}

// Validando o usuario: Melhorar esse codigo!!!
foreach($array_users as $user){
    if((strcasecmp($emailLogin, $user['email']) == 0) and ($senhaLogin == $user['senha'])){
        $_SESSION['validacao'] = true; // poderia usar tbm os cookies aqui!
        $var = true;
        $user_logado = new Usuario($user['IDUsuario'], $user['nome'], $user['email'], $user['senha']);
        //Passando o objeto
        $_SESSION['usuario'] = $user_logado;
        $_SESSION['id_user'] = $user['IDUsuario'];
    }
    
}

// Logica de redirecionamento:
if($var){
    header('Location: ../menu.php?login=logado');
}else{
    $_SESSION['validacao'] = false;
    header('Location: ../index.php?login=erro1');
}

?>


