<?php
# SCRIPT DA LOGICA DA LISTAGEM DO BANCO DE DADOS

//  Includes:
include('../model/dao/conexao_novo_dao.php'); 
include('../model/dao/paciente_dao.php');
include('../model/Usuario.php'); 
include('../model/paciente.php');


// Iniciando a sessao:
session_start();

if(!$_SESSION['validacao']){
  header('Location: ./index.php?erro=user_nao_logado');
}

# Arrays e Variaveis:
$array_users = array();
$lista_paciente = array();
$redirecionamento = false;

// Abrindo conexao com o banco de dados:
try{
    $conexao = bd_conectar();
    $lista_paciente = bdConsultarTodosPacientes($conexao);
    $redirecionamento = true;
    $_SESSION['lista_pacientes'] = $lista_paciente;

    //var_dump($lista_paciente);
    //echo '<hr>';
    
}
catch(PDOException $e){
    echo "Erro: ".$e->getCode();
    echo "<br>Messagem: ".$e->getMessage();
}

// Logica de redirecionamento:
if($redirecionamento){
  header('Location: ../lista_pacientes.php');
}else{
  header('Location: ../lista_pacientes.php');
}

?>

