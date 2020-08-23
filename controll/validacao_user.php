<?php
# SCRIPT DAS OPERAÇÕES COM O USUARIO NO SISTEMA: tudo certo!

include_once('../model/Usuario.php'); 
include('../model/dao/user_dao.php');
include('../model/dao/conexao_novo_dao.php');

session_start();
$_SESSION['usuario_logado'] = null;

// Recuperando valores do metodo GET
$emailLogin = $_POST['email'];
$senhaLogin = $_POST["senha"];

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

// Validando o usuario: FUNCIONANDO NORMALMENTE!.
foreach($array_users as $user){
    if((strcasecmp($emailLogin, $user['email']) == 0) and ($senhaLogin == $user['senha'])){
        $_SESSION['validacao'] = true;
        $var = true;
        # Instanciar isso direito:
        $user_logado = new Usuario($user['IDUsuario'], $user['nome'], $user['email'], $user['senha']);
        //Passando o objeto!
        $_SESSION['usuario'] = $user_logado;
        $_SESSION['id_user'] = $user['IDUsuario']; // para nao ter que passar um objeto de usuario para o dao.
    }
    else{
        echo "Passando pelo ELSE...<br>";
    }
    
}

// Logica de redirecionamento:
if($var){
    header('Location: ../menu.php?login=logado');
}else{
    $_SESSION['validacao'] = false;
    header('Location: ../index.php?login=erro1');
}

// *Faltou fechar a conexao!
?>


