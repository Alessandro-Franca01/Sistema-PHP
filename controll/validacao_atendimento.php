<?php
# SCRIPT DE VALIDAÇÃO DAS REQUISIÇÕES DE ATENDIMENTO: ALTERAÇÃO NA CLASSE PACIENTE VERIFICAR NOVAMENTE!!! 

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
$data_sql = $data_atend.' '.$horario; 

// Variaveis e arrays:
$array_paciente = array();
$validar_paciente = false;
$usuario = $_SESSION['usuario']; 
$paciente = null;
$resultado_query = null;

try{
  $conexao = bd_conectar();
  $array_paciente = bdConsultarPaciente($conexao, $nome_paciente); 
  if(isset($array_paciente[0])){ 
    $validar_paciente = true;
    $paciente = new Paciente($array_paciente[0]['IDPaciente'], $array_paciente[0]['nome'], $array_paciente[0]['email'], $array_paciente[0]['data_nasc'], $array_paciente[0]['telefone']);
    $paciente->toString();
    echo '<br>';
    print_r($_POST);
    echo "<br> data formato sql: $data_sql";
    echo '<br>ID Usuario:';
    echo $_SESSION['id_user'];
  }


  // Instaciando o Atendimento:
  $atendimento = new Atendimento(null, $valor, $obsercao, $data_sql, $usuario->__get('id'), $paciente->__get('idPaciente'));
  $resultado_query = inserirAtendimento($conexao, $atendimento); 
  echo '<br>Linhas afetadas:'.$resultado_query;
  
}
catch(PDOException $e){
  echo "Erro: ".$e->getCode();
  echo "<br>Messagem: ".$e->getMessage();
}







?>