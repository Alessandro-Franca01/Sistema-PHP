<?php
# Script aqui vai ser para controllar as operações que envolvem o Objeto Paciente: Ajustar tbm!
include('../model/dao/paciente_dao.php');
include('../model/dao/conexao_novo_dao.php');
include_once('../model/paciente.php'); 

session_start();



// Variaveis do POST:
$paciente_nome = $_POST['cad_pct_nome'];
$responsavel = $_POST['cad_pct_responsavel'];
$telefone = $_POST['cad_pct_telefone'];
$data_nasc = $_POST['cad_pct_data_nasc'];
$email = $_POST['cad_pct_email'];
//var_dump($_POST);cad_pct_data_nasc

// Variaveis e Arrays:
$redirecionamento = null;
$novo_paciente = null;


try{
    $conexao = bd_conectar();
    $consulta_paciente = bdConsultarPacienteCompleta($conexao, $email, $paciente_nome);
    #print_r($consulta_paciente);
    echo '<br>';
    if(isset($consulta_paciente[0])){
        $redirecionamento = true;
        //var_dump($consulta_paciente);
        header('Location: ../cad_paciente.php?consulta_pct=paciente_cadastrado');

    }else{
        echo '<br> Nao esta setado!';
        $redirecionamento = false;
        $novo_paciente = new Paciente(null, $paciente_nome, $responsavel, $email, $data_nasc, $telefone );
        //$novo_paciente->toString(); // FUNCIONANDO!
        $linhas_afetadas = bdInserirPaciente($conexao, $paciente_nome, $email, $data_nasc, $telefone);
        echo "linhas afetadas: $linhas_afetadas";
    }
    
}catch(PDOException $e){
    echo "Erro: ".$e->getCode();
    echo "<br>Messagem: ".$e->getMessage();
}
  

?>