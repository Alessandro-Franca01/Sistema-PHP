<?php
# Testando conuslta ao banco para a pagunda de tabela semanal
include('./model/tb_teste.php');
include('./model/dao/conexao_novo_dao.php');
require('./model/dao/tabela_dao.php');

# Definindo TimeZone:
date_default_timezone_set('America/Recife');

# Iniciando SESSÃO:
session_start();

// Arrays/ Variaveis:
$redirecionamento = true; 
$array_tb = null;
$lista_tabela = array();

// Iniciar a funcao de conexao
try{
    $conexao = bd_conectar();
    $array_tb = bd_consultaTabela($conexao);
}
catch(PDOException $e){
    echo "Erro: ".$e->getCode();
    echo "<br>Messagem: ".$e->getMessage();
}

# Pegar os valores e forma um array do objeto Tbteste: FUNCIONANDO
foreach($array_tb as $consulta){
    #ADD OS OBJETOS NO NA LISTA: Tenho que ir add os OBEJTOS no final da lista!
    $lista_tabela[] = new Tabela($consulta['paciente'], new DateTime($consulta['data_atendimento'])); //MODIFICADO!
    
}
$_SESSION['tbLista'] = $lista_tabela;

// Redirecionamento: Para redirecionar 'parece' que não pode haver nenhum echo ou print na pagina *PESQUISAR MAIS!
if($redirecionamento){
    header('Location: tabela_semana.php');
}else{
    header('Location: index.php');
}








?>