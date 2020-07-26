<?php
# Copia do Script antigo de Validar_usuario caso precise...
include('../model/Usuario.php');
session_start();
$_SESSION['usuario_logado'] = null;

// Variaveis de conexao
$dns = 'mysql:host=localhost;dbname=teste_php';
$user = 'root';
$senha = 'Sandro_20';

// Recuperando valores do metodo GET
$emailLogin = $_GET['email'];
$senhaLogin = $_GET["senha"];

// Variavel de controle de validacao
$var = false;
// Usuario
$usuario = null;

// Conectando ao banco: ESSE CODIGO VAI PARA A CAMADA DAO... AQUI VOU DA UM INCLUDE!
try{
    $conexao = new PDO($dns, $user, $senha);

    // Executando query de manipulaçao: 
    //$linhas_afettadas = $conexao->exec($sql);

    // Consultando os registros no banco: FUNCIONANDO
    $sql = 'SELECT * FROM usuario';
    $resultado = $conexao->query($sql);
   
    $array_consulta = $resultado->fetchAll();
    print_r($array_consulta);

    // OBS: VER COMO FAÇO PARA RECUPERAR UM VALOR DENTRO DO INCLUDE!

    // Validando usuario:FUNCIONANDO!
    foreach($array_consulta as $user){
        if((strcasecmp($emailLogin == $user['email']) == 0) and ($senhaLogin == $user['senha'])){
            $_SESSION['validacao'] = "SIM";
            $var = true;
            $_SESSION['usuario_logado'] = $user; // recebendo o usuario na variavel de sessao
            print_r($user);
            echo "<br>";
            $usuario = new Usuario($user['id']); # FUNCIONANDO!
            echo "ID do usuario: ".$usuario->__get('id');
            echo "<br>";
        }
        else{
            echo "Passando pelo ELSE...<br>";
        }
        
    }
    
}catch(PDOException $e){
    echo "Erro: ".$e->getCode();
    echo "<br>Messagem: ".$e->getMessage();
}finally{
    //$conexao->dba_close(); #Tenho que fecha a conexao aqui!
}

/*if($var){
    header('Location: ../menu.php?login=logado');
}else{
    $_SESSION['validacao'] = "NAO";
    header('Location: ../index.php?login=erro1');
}*/


?>


