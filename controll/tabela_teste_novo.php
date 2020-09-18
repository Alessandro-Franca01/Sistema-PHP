<?php
# Testando conuslta ao banco para a pagunda de tabela semanal
include('../model/table.php');
include('../model/dao/conexao_novo_dao.php');
require('../model/dao/tabela_dao.php');
require('../model/funcoes_data.php');

# Definindo TimeZone:
date_default_timezone_set('America/Recife');

# Iniciando SESSÃO:
session_start();

// Arrays/ Variaveis:
$redirecionamento = true; 
$array_tb = null;

// Datas:
$data_inicial = new DateTime('last Monday');
$data_final = new DateTime($data_inicial->format('Y-m-d'));
$data_final->add(new DateInterval('P6D'));
#$semana = gerarSemana(new DateTime('last Monday')); // Retornar um array da semana atual: FUNCIONANDO!
#$data_inicial = $semana[0];
#$data_final = end($semana);
$lista_tabela = array();

#print_r($new_date);
// Iniciar a funcao de conexao
try{
    $conexao = bd_conectar();
    // Retorna somente a semana desejada: Funcionando!
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