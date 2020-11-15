<?php
# SCRIPT DE CONSULTA DO AGENDAMENTO DA TABELA SEMANAL
include('../model/table.php');
include('../model/dao/conexao_novo_dao.php');
require('../model/dao/tabela_dao.php');
require('../model/funcoes_data.php');

# Definindo TimeZone:
date_default_timezone_set('America/Recife');

# Iniciando SESSÃO:
session_start();

// Erro de verificação: NAO ESTA FUNCIONANDO!!
//$csrf_token = $_SESSION['csrf_token'] ?? false;

// Arrays/ Variaveis:
$redirecionamento = true; 
$array_tb = null;

// Datas: EM PRODUÇÃO!
$data_atual = new DateTime();
$data_inicial = getMonday($data_atual);
$data_final = new DateTime($data_inicial->format('Y-m-d'));
$data_final->add(new DateInterval('P6D'));
$lista_tabela = array();

try{
    $conexao = bd_conectar();
    // Retorna somente a semana desejada: Testando nova funcionalidade!
    $array_tb = bd_consultaTabela($conexao, $data_inicial->format('Y-m-d'), $data_final->format('Y-m-d'));
}
catch(PDOException $e){
    echo "Erro: ".$e->getCode();
    echo "<br>Messagem: ".$e->getMessage();
}

# Pegar os valores e forma um array do objeto Tbteste: FUNCIONANDO
foreach($array_tb as $consulta){
    $lista_tabela[] = new Tabela($consulta['paciente'], new DateTime($consulta['data_atendimento'])); //MODIFICADO!
    
}
$_SESSION['tbLista'] = $lista_tabela;

// Redirecionamento: SEMPRE TRUE
if($redirecionamento){
    header('Location: ../tabela_semana.php');
}else{
    header('Location: ../index.php');
}

?>