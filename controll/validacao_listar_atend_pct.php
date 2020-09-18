<?php
# SCRIPT DA LOGICA DA LISTAGEM DO BANCO DE DADOS

//  Includes:
include('../model/dao/conexao_novo_dao.php'); 
include('../model/dao/atendimento_dao.php');
include_once('../model/dao/paciente_dao.php');

// Iniciando a sessao:
session_start();

if(!$_SESSION['validacao']){
  header('Location: ./index.php?erro=user_nao_logado');
}

# Arrays e Variaveis:
$redirecionamento = false;
$resultado = null;
$paciente = null;
$id_paciente = $_GET['id'];
$_SESSION['lista_atendimentos'] = null;

// Abrindo conexao com o banco de dados:
try{
    $conexao = bd_conectar();
    // Logica de consultar todas os atendimentos pelo ID do paciente: FUNCIONANDO!!
    $paciente = bdConsultarPacienteID($conexao, $id_paciente);
    $resultado = consultarAtendimentosByIDpct($conexao, $id_paciente);
    print_r($paciente);
    echo '<br>';
    print_r($resultado);
    $_SESSION['paciente_listar_atend'] =$paciente;
    $_SESSION['lista_atendimentos'] = $resultado;
    
}
catch(PDOException $e){
    echo "Erro: ".$e->getCode();
    echo "<br>Messagem: ".$e->getMessage();
}

// Logica de redirecionamento: ../lista_pacientes2.php?remocao=removido
if(isset($resultado)){
  header('Location: ../listar_atend_pct.php');
}else{
    header('Location: ../menu.php');
  }
/*
elseif(($resultado == true) and ($origen == 'remover_pct')){
  header('Location: ../lista_pacientes2.php?remocao=removido');
}

*/
?>

