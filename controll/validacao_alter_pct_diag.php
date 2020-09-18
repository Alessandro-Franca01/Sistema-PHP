<?php
# SCRIPT DE VALIDAÇÃO PARA ALTERAR A DATA DE NASCIMENTO DO PACIENTE:

//  Includes:
include('../model/dao/conexao_novo_dao.php'); 
include('../model/dao/paciente_dao.php');
include('../model/paciente.php');

// Iniciando a sessao:
session_start();

// Tratamento de acesso:
if(!$_SESSION['validacao']){
  header('Location: ./index.php?erro=user_nao_logado');
}

// Recuperando valores do metodo POST 
$novo_diagnostico = $_POST['alter_pct_diag'];
$id_paciente = $_GET['id'];

try{
    $conexao = bd_conectar();
    // TESTANDO: FUNCIONANDO!!!
    $resultado = bdAlterarPaciente($conexao, $id_paciente,'diagnostico', $novo_diagnostico );
    echo "<h1> Resultado: $resultado ";

}
catch(PDOException $e){
    echo "Erro: ".$e->getCode();
    echo "<br>Messagem: ".$e->getMessage();
}

# Redirecionamento: TESTANDO
if($resultado == 1){
    header('Location: ../lista_pacientes2.php?alteracao=alterado'); // Testando
}else{
    header('Location: ../lista_pacientes2.php?alteracao=nao_alterado');
}

?>