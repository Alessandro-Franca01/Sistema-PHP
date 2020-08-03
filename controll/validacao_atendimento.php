<?php
# SCRIPT DE VALIDAÇÃO DAS REQUISIÇÕES DE ATENDIMENTO

session_start();

//  Includes:
include('../model/dao/conexao_dao.php');
include('../model/dao/paciente_dao.php'); 
include('../model/Usuario.php');
include('../model/paciente.php');
include('../model/atendimento.php');

if(!$_SESSION['validacao']){
  header('Location: ./index.php?erro=user_nao_logado');
}

// Recuperando valores do metodo POST 
$nome_paciente = $_POST['paciente_atend'];
$valor = $_POST['valor'];
$horario = $_POST['horario_atend'];
$data_atend = $_POST['data_atend'];
$obsercao = $_POST['obs_atend'];

// array de paciente:
$array_paciente = array();
$validar_paciente = false;
$paciente = null;

try{
  $conexao = bd_conectar();
  // is_array() não dá certo, usano o isset() passando a posição 0
  $array_paciente = bdConsultarPaciente($conexao, $nome_paciente); // SEM TRATAMENTO DE DADOS
  if(isset($array_paciente[0])){ // Arrumar isso aqui depois!!!
    $validar_paciente = true;
    $paciente = new Paciente($array_paciente[0]['IDPaciente'], $array_paciente[0]['nome'], $array_paciente[0]['email'], $array_paciente[0]['data_nasc']);
    $paciente->toString();
  }
}
catch(PDOException $e){
  echo "Erro: ".$e->getCode();
  echo "<br>Messagem: ".$e->getMessage();
}// USAR O FINALLY PARA FECHAR A CONEXAO E CRIAR A FUNCAO DE ENCERRAR CONEXAO


# EXEMPLO DE INSERTS DO BANCO DE DADOS:
// INSERT INTO agendamento(IDAgendamento, data_marcada, observacao) VALUES(2,'2020-07-20 20:00:00', null);

//INSERT INTO atendimento(valor, observacao, ID_Usuario, ID_Paciente, ID_Agendamento) VALUES(80.00, null, 2, 1, 2);




?>