<?php
# Script aqui vai ser para controllar as operações que envolvem o Objeto Paciente: Ajustar tbm!
include('../model/dao/paciente_dao.php');
include('../model/dao/conexao_novo_dao.php'); 

session_start();

try{
    $conexao = bd_conectar();
    $resultado = bdInserirPaciente($conexao);
    echo "Imprimindo resultado da QUERY: $resultado";
}catch(PDOException $e){
    echo "Erro: ".$e->getCode();
    echo "<br>Messagem: ".$e->getMessage();
}
  


?>