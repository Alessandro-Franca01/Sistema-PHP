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
$nova_data_nasc = $_POST['alter_pct_data'];
$id_paciente = $_GET['id'];

echo "<h1> Nova Data: $nova_data_nasc </h1>";

try{
    $conexao = bd_conectar();
    // TESTANDO: FUNCIONANDO!!!
    $resultado = bdAlterarPaciente($conexao, $id_paciente,'data_nasc', $nova_data_nasc );
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