<?php
# SCRIPT DE VISUALIZAÇÃO DO DADOS DE UM PACIENTE 

//  Includes:
include('../model/dao/conexao_novo_dao.php'); 
include('../model/dao/paciente_dao.php');

// Iniciando a sessao:
session_start();

if(!$_SESSION['validacao']){
    header('Location: ./index.php?erro=user_nao_logado');
}

$id_paciente = $_GET['id'];
$redirecionamento = false;

//echo 'ID do paciente: '.$id_paciente;

try{
    $conexao = bd_conectar();
    $paciente_assoc = bdConsultarPacienteID($conexao, $id_paciente);
    if(isset($paciente_assoc[0])){
        $redirecionamento = true;
        $_SESSION['pct_show'] = $paciente_assoc[0];
        //var_dump($paciente_assoc);// FUNCIONANDO
        # SÓ FALTA A EXIBIÇÃO DO FRON END
    }

}
catch(PDOException $e){
    echo "Erro: ".$e->getCode();
    echo "<br>Messagem: ".$e->getMessage();
}

if($redirecionamento){
    header('Location: ../visualizar_paciente.php');
}else{
    header('Location: ../visualizar_paciente.php?erro=sem_acessoBD');
}


?>