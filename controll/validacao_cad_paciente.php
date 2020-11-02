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

// Variaveis e Arrays:
$redirecionamento = null;
$novo_paciente = null;
$linhas_afetadas = null;

// FUNÇAO DE SANITIZAÇÃO DA DOCUMENTAÇÃO: FUNCIONANDO , MUITO BOM!!

/**
        * @param str => $valor = valor a ser sanitizado
        * @param bol => $allow_accents = permitir acentos
        * @param bol => $allow_spaces = permitir espaços
        */
        function alfabetico($valor, bool $allow_accents = true, bool $allow_spaces = false){
            $valor = str_replace(array('"', "'", '`', '´', '¨'), '', trim($valor));
            if(!$allow_accents && !$allow_spaces){
                return preg_replace('#[^A-Za-z]#', '', $valor);
            }
            if($allow_accents && !$allow_spaces){
                return preg_replace('#[^A-Za-zà-źÀ-Ź]#', '', $valor);
            }
            if(!$allow_accents && $allow_spaces){
                return preg_replace('#[^A-Za-z ]#', '', $valor);
            }
            if($allow_accents && $allow_spaces){
                return preg_replace('#[^A-Za-zà-źÀ-Ź ]#', '', $valor);
            }               
        }
    
// Testando validações de com filter_var():

$filterEmail = filter_var($email, FILTER_VALIDATE_EMAIL);  # FUNCIONANDO
$resultado = filter_has_var(INPUT_POST, 'cad_pct_email'); # FUNCIONANDO
$resultNome = alfabetico($paciente_nome, true, true);

if($resultado){
    var_dump($_POST); 
    echo 'Nome do paciente limpo: '.$resultNome;
}else{
    //echo "Campos não validado";
    echo 'Entrou no ELSE';
}
/*
try{
    $conexao = bd_conectar();
    $consulta_paciente = bdConsultarPacienteCompleta($conexao, $paciente_nome, $data_nasc);
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
}*/