<?php
# Script das operações feitas do Objeto Atendimento ao banco de dados:

#Funcao para inserir um registro de atendimento no banco de dados: FUNCIONANDO! (Nao precisa instanciar o objeto aqui)
function inserirAtendimento($conexao, $atendimento){
    $sql = "INSERT INTO atendimento(data_atendimento, valor, observacao, ID_Usuario, ID_Paciente)
        VALUES('{$atendimento->__get('data_atendimento')}', {$atendimento->__get('valor')},
        '{$atendimento->__get('observacao')}', {$atendimento->__get('id_usuario')},
        {$atendimento->__get('id_paciente')})";
    $stm = $conexao->prepare($sql);
    $resultado = $stm->execute();
    return $resultado;
    //
    $stm = $conexao->prepare($sql);
    $resultado = $stm->execute(); // NAO ESTÁ INSERINDO!
    return $resultado; 
}

# Funcao para verificar se um atendimento existe: AJEITAR PARA PEGAR SOMENTE A SEMANA CERTA !
function consultarAtendimento($conexao, $data){
$sql = "SELECT* FROM atendimento WHERE data_atendimento = '{$data}'";
    $resultado = $conexao->query($sql);
    $consulta = $resultado->fetchAll(PDO::FETCH_ASSOC); 
    return $consulta; 
}

# Função para consultar todos os atendimentos de um paciente pelo IDPaciente: TESTANDO
function consultarAtendimentosByIDpct($conexao, $id_paciente){
    $sql = "SELECT* FROM atendimento WHERE ID_Paciente = '{$id_paciente}'";
    $resultado = $conexao->query($sql);
    $consulta = $resultado->fetchAll(PDO::FETCH_ASSOC);
    return $consulta;  
}

# Funcao para remover um atendimento: FUNCIONANDO!
function removerAtendimento($conexao, $atendimento){
    $sql = "DELETE FROM atendimento WHERE data_atendimento = '{$atendimento->__get('data_atendimento')}'";
    $stm = $conexao->prepare($sql);
    $resultado = $stm->execute(); 
    return $resultado;
}

?>
