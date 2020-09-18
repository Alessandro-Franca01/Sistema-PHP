<?php
# SCRIPT DE EXCLUSAO DO PACIENTE:

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
$conv_id_pct = intval($id_paciente);
$resultado_query = null;

//echo $id_paciente;

try{
    $conexao = bd_conectar();
    $array_paciente = bdConsultarPacienteID($conexao, $id_paciente);
    $paciente = new Paciente($array_paciente[0]['IDPaciente'], $array_paciente[0]['nome'], $array_paciente[0]['email'],
                            $array_paciente[0]['data_nasc'], $array_paciente[0]['telefone'], $array_paciente[0]['diagnostico'], $array_paciente[0]['responsavel']);
    // Esta Funcionando, porem só vai 'remover' se o registro não estiver ligado a nenhum outro 
    $resultado_query = bdExcluirPaciente($conexao, $paciente); 
    
}
catch(PDOException $e){
    echo "Erro: ".$e->getCode();
    echo "<br>Messagem: ".$e->getMessage();
}

# Funcionando, fazer depois o redirecionamento!
if($resultado_query){
    header('Location: lista_pacientes_controller.php?origin=remover_pct'); // Testando
}else{
    header('Location: ../lista_pacientes2.php?remocao=nao_removido');
}

?>

