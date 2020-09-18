<?php
# SCRIIPT DE CONTROLE DAS AÇÕES DE ALTERAÇÃO DO CRUD DE PACIENTE

//  Includes:
include('../model/dao/conexao_novo_dao.php'); 
include('../model/dao/paciente_dao.php');
include('../model/paciente.php');

// Iniciando a sessao:
session_start();

if(!$_SESSION['validacao']){
  header('Location: ./index.php?erro=user_nao_logado');
}

$id_paciente = $_GET['id'];
$resultado_query = null;

try{
    $conexao = bd_conectar();
    $array_paciente = bdConsultarPacienteID($conexao, $id_paciente);
    // Como o id é passado pelo proprio sistema nao precisa de fazer o tratamento:
    $paciente = new Paciente($array_paciente[0]['IDPaciente'], $array_paciente[0]['nome'], $array_paciente[0]['email'],
                            $array_paciente[0]['data_nasc'], $array_paciente[0]['telefone'], $array_paciente[0]['diagnostico'], $array_paciente[0]['responsavel']);
    $resultado_query = bdExcluirPaciente($conexao, $paciente); 
    
}
catch(PDOException $e){
    echo "Erro: ".$e->getCode();
    echo "<br>Messagem: ".$e->getMessage();
}



?>
