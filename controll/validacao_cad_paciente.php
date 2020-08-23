<?php
# Script da logica de negocio do paciente: 

include('../model/dao/paciente_dao.php');
include('../model/dao/conexao_novo_dao.php');
include_once('../model/paciente.php'); 

session_start();

// Variaveis do POST:
$paciente_nome = $_POST['cad_pct_nome'];
$responsavel = $_POST['cad_pct_responsavel']; // falta add esse campo no banco de dados
$telefone = $_POST['cad_pct_telefone'];
$data_nasc = $_POST['cad_pct_data_nasc'];
$email = $_POST['cad_pct_email'];
$diagnostico = $_POST['cad_pct_dgn'];
//var_dump($_POST);  

// Variaveis e Arrays:
$redirecionamento = null;
$novo_paciente = null;
$linhas_afetadas = null;

try{
    $conexao = bd_conectar();
// Se o nome do paciente estiver registrado no banco vai entrar no else e fazer o cadastro, isso bem bem vulneravél
    $consulta_paciente = bdConsultarPacienteCompleta($conexao, $email, $paciente_nome);
    # MELHORAR ESSA LOGICA DEPOIS!

    if(isset($consulta_paciente[0])){
        #$redirecionamento = true;
        #header('Location: ../cad_paciente.php?consulta_pct=paciente_cadastrado'); utf8mb4_general_ci

    }else{
        #$redirecionamento = false;
        $novo_paciente = new Paciente(null, $paciente_nome, $responsavel, $email, $data_nasc, $telefone, $diagnostico);
        $linhas_afetadas = bdInserirPaciente($conexao, $paciente_nome, $email, $data_nasc, $telefone, $diagnostico, $responsavel);
        //echo "linhas afetadas: $linhas_afetadas";
    }
    
}catch(PDOException $e){
    echo "Erro: ".$e->getCode();
    echo "<br>Messagem: ".$e->getMessage();
}

// Logica de redirecionamento:
if($linhas_afetadas == 1){
    header('Location: ../cad_paciente.php?cadastro=efetuado');
}else{
    header('Location: ../cad_paciente.php?cadastro=nao_efetuado');
}

?>