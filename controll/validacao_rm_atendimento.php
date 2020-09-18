<?php
# SCRIPT DE REMOÇÃO DE ATENDIEMNTO:

//  Includes:
include('../model/dao/conexao_novo_dao.php'); 
include('../model/dao/paciente_dao.php');
include('../model/dao/atendimento_dao.php');
include('../model/Usuario.php');
include('../model/paciente.php');
include('../model/atendimento.php');

// Iniciando a sessao:
session_start();

// Tratamento de acesso:
if(!$_SESSION['validacao']){
  header('Location: ./index.php?erro=user_nao_logado');
}

// Recuperando valores do metodo POST 
$nome_paciente = $_POST['nome_rm_paciente'];
$horario = $_POST['horario_rm_atend'].':00'; 
$data_atend = $_POST['data_rm_atend'];

// Convertendo a data no formato sql:
$data_sql = $data_atend.' '.$horario; // Testar ainda!

// Variaveis e arrays:
$array_paciente = array();
$array_atendimento = array();
$validar_paciente = false;
$validacao_atendimento = false;
$comparando_pacientes = false;
$usuario = $_SESSION['usuario']; 
$paciente = null;
$resultado_query = null; 


try{
  // TESTANDO ESSA PARTE DO CODIGO : FUNCIONANDO CORRETAMENTE!
  $conexao = bd_conectar(); 
  $array_paciente = bdConsultarPaciente($conexao, $nome_paciente); 
  
  // Verificando paciente: FUNCIONANDO CORRETAMENTE
  # Poderia ao inves de usar ifs aninhados colocar funcões com valores boleanos, mas nao sei se é um boa pratica!
  if(isset($array_paciente[0])){ 
    $validar_paciente = true;
    $paciente = new Paciente($array_paciente[0]['IDPaciente'], $array_paciente[0]['nome'], $array_paciente[0]['email'],
                            $array_paciente[0]['data_nasc'], $array_paciente[0]['telefone'], $array_paciente[0]['diagnostico'], $array_paciente[0]['responsavel']);
    // Consultando atendimento: FUNCIONANDO!
    $array_atendimento = consultarAtendimento($conexao, $data_sql); 

    if(isset($array_atendimento[0])){
        $atendimento = new Atendimento($array_atendimento[0]['IDAtendimento'], $array_atendimento[0]['valor'], $array_atendimento[0]['observacao']
          , $array_atendimento[0]['data_atendimento'], $array_atendimento[0]['ID_Usuario'], $array_atendimento[0]['ID_Paciente']);

        // Verificando se os pacientes são iguais: FUNCIONANDO!!!
        if($paciente->__get('idPaciente') == $atendimento->__get('id_paciente')){
            $comparando_pacientes = true;
            $resultado_query = removerAtendimento($conexao, $atendimento); 
          }else{
            echo '<h2> O paciente resgistrado para esse atendimento NÃO é esse!';
          }
      }else{
        echo '<h2> Atendimento nao foi encontrado no banco de dados';
      }
  }else{
    echo '<h2> Paciente nao foi encontrado no banco de dados';
  }

}
catch(PDOException $e){
  echo "Erro: ".$e->getCode();
  echo "<br>Messagem: ".$e->getMessage();
}

// Logica de redirecionamento:
if($resultado_query == 1){
  header('Location: ../remover_atendimento.php?atendimento=removido');
}else{
  header('Location: ../remover_atendimento.php?atendimento=nao_removido');
}


?>



