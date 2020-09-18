<?php
# SCRIPT DE VALIDAÇÃO PARA ALTERAR A DATA DE NASCIMENTO DO PACIENTE:

//  Includes:
include('../model/dao/conexao_novo_dao.php'); 
include('../model/dao/paciente_dao.php');
include('../model/paciente.php');

// Iniciando a sessao:
session_start();

// Tratamento de acesso:
if(!$_SESSION['validacao']){
  header('Location: ./index.php?erro=user_nao_logado');
}

// Recuperanddo GET
$id_paciente = $_GET['id'];

//Logica de recebimento da coluna:
$nome_pct = null;
$email_pct = null;
$responsavel_pct = null;
$telefone_pct = null;

try{
    $conexao = bd_conectar();
    
    // TESTANDO: FUNCIONANDO
    if(isset($_POST['alter_nome_pct'])){
        $nome_pct = $_POST['alter_nome_pct'];        
        $resultado = bdAlterarPaciente($conexao, $id_paciente,'nome', $nome_pct );
    }elseif(isset($_POST['alter_email_pct'])){
        $email_pct = $_POST['alter_email_pct'];
        $resultado = bdAlterarPaciente($conexao, $id_paciente,'email', $email_pct );
    }elseif(isset($_POST['alter_resp_pct'])){
        $responsavel_pct = $_POST['alter_resp_pct'];
        $resultado = bdAlterarPaciente($conexao, $id_paciente,'responsavel', $responsavel_pct );        
    }elseif(isset($_POST['alter_telefone_pct'])){
        $telefone_pct = $_POST['alter_telefone_pct'];
        $resultado = bdAlterarPaciente($conexao, $id_paciente,'telefone', $telefone_pct );        
    }
    else{
        // NAO DEVE ENTRAR AQUI!!!
        echo 'Nome do paciente não foi escolhido';
    }
    

}
catch(PDOException $e){
    echo "Erro: ".$e->getCode();
    echo "<br>Messagem: ".$e->getMessage();
}

# Redirecionamento: Deixar somente um parametro de alteração generico
if($resultado == 1){
    header('Location: ../lista_pacientes2.php?alteracao=alterado'); 
}else{
    header('Location: ../lista_pacientes2.php?alteracao=nao_alterado');
}


?>