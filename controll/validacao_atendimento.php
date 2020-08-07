<?php
# SCRIPT DE VALIDAÇÃO DAS REQUISIÇÕES DE ATENDIMENTO

//  Includes:
include('../model/dao/conexao_novo_dao.php'); 
include('../model/dao/paciente_dao.php');
include('../model/dao/atendimento_dao.php');
include('../model/Usuario.php');
include('../model/paciente.php');
include('../model/atendimento.php');

// Iniciando a sessao:
session_start();

if(!$_SESSION['validacao']){
  header('Location: ./index.php?erro=user_nao_logado');
}

// Recuperando valores do metodo POST 
$nome_paciente = $_POST['paciente_atend'];
$valor = $_POST['valor'];
$horario = $_POST['horario_atend'].':00'; // Concatenando para o formato com os segundos
$data_atend = $_POST['data_atend'];
$obsercao = $_POST['obs_atend'];
// Data no formato sql:
$data = $data_atend.' '.$horario;

// array de paciente:
$array_paciente = array();
$validar_paciente = false;
$usuario = $_SESSION['usuario']; 
$paciente = null;

try{
  $conexao = bd_conectar();
  // is_array() não dá certo, usano o isset() passando a posição 0
  $array_paciente = bdConsultarPaciente($conexao, $nome_paciente); // SEM TRATAMENTO DE DADOS
  if(isset($array_paciente[0])){ // Arrumar isso aqui depois!!!
    $validar_paciente = true;
    $paciente = new Paciente($array_paciente[0]['IDPaciente'], $array_paciente[0]['nome'], $array_paciente[0]['email'], $array_paciente[0]['data_nasc']);
    $paciente->toString();
    echo '<br>';
    print_r($_POST);
    echo "<br> data formato sql: $data";
    echo '<br>';
    print_r($_SESSION['usuario']); 

  }
  // Instaciando o Atendimento: FUNCIONANDO!!!!
  $atendimento = new Atendimento(null, $valor, $data, $obsercao, $usuario->__get('id'), $paciente->__get('idPaciente'));
  $resultado_query = inserirAtendimento($conexao, $atendimento); // FUNCIONANDO!!!!
  echo '<br>Linhas afetadas:'.$resultado_query;
  
}
catch(PDOException $e){
  echo "Erro: ".$e->getCode();
  echo "<br>Messagem: ".$e->getMessage();
}







?>