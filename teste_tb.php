<?php
# Testando conuslta ao banco para a pagunda de tabela semanal
include('./model/tb_teste.php');
require('./model/dao/tb_teste_dao.php');

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
#FUNCIONANDO
//print_r($array_tb);
//echo "<hr>";

# Pegar os valores e forma um array do objeto Tbteste: FUNCIONANDO
foreach($array_tb as $consulta){
    #ADD OS OBJETOS NO NA LISTA: Tenho que ir add os OBEJTOS no final da lista!
    $lista_tabela[] = new Tabela($consulta['paciente'], $consulta['data_agendada']); 
    
}
$_SESSION['tbLista'] = $lista_tabela;

// Redirecionamento: Para redirecionar 'parece' que não pode haver nenhum echo ou print na pagina *PESQUISAR MAIS!
if($redirecionamento){
    header('Location: tabela_semana.php');
}else{
    header('Location: index.php');
}



?>