<?php
# SCRIPT DA LOGICA DA LISTAGEM DO BANCO DE DADOS

//  Includes:
include('../model/dao/conexao_novo_dao.php'); 
include('../model/dao/paciente_dao.php');

// Iniciando a sessao:
session_start();

if(!$_SESSION['validacao']){
  header('Location: ./index.php?erro=user_nao_logado');
}

$origin = $_GET['remover_pct'];

# Arrays e Variaveis:
$array_users = array();
$lista_paciente = array();
$redirecionamento = false;

// Abrindo conexao com o banco de dados:
try{
    $conexao = bd_conectar();
    $lista_paciente = bdConsultarTodosPacientes($conexao);
    $redirecionamento = true;
    $_SESSION['lista_pacientes'] = $lista_paciente; // Gambiarra ( Mudar isso!)
    
}
catch(PDOException $e){
    echo "Erro: ".$e->getCode();
    echo "<br>Messagem: ".$e->getMessage();
}

// Logica de redirecionamento: ../lista_pacientes2.php?remocao=removido
if(($redirecionamento == true) and (!isset($origen))){
  header('Location: ../lista_pacientes2.php');
}
elseif(($redirecionamento == true) and ($origen == 'remover_pct')){
  header('Location: ../lista_pacientes2.php?remocao=removido');
}
else{
  header('Location: ../menu.php');
}

?>

