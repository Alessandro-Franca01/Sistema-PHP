<?php
# SCRIPT PARA GERAR A LISTA AUTOMATICA DE PACIENTES PARA CADASTRAR E REMOVER ATENDIMENTOS

//  Includes:
include('../model/dao/conexao_novo_dao.php'); 
include('../model/dao/paciente_dao.php');

// Iniciando a sessao:
session_start();

if(!$_SESSION['validacao']){
  header('Location: ./index.php?erro=user_nao_logado');
}

# Arrays e Variaveis:
$pagina = $_GET['page'];
//$pagina = $_GET['origin'];
$array_users = array();
$lista_paciente = array();
$redirecionamento = false;

// Abrindo conexao com o banco de dados:
try{
    $conexao = bd_conectar();
    $lista_paciente = bdConsultarTodosPacientes($conexao);
    $redirecionamento = true;
    $_SESSION['lista_cad_pct'] = $lista_paciente; // Gambiarra ( Mudar isso!)
    
}
catch(PDOException $e){
    echo "Erro: ".$e->getCode();
    echo "<br>Messagem: ".$e->getMessage();
}

// Logica de redirecionamento: To lembrado bem desses codigos não!!
if(($redirecionamento == true) and ($pagina =='cadastro')){
  header('Location: ../cad_atendimento.php');
}elseif(($redirecionamento == true) and ($pagina == 'remover')){
  header('Location: ../remover_atendimento.php');
}else{
  header('Location: ../menu.php');
}

?>

