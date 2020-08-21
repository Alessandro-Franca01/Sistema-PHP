<?php
# VAMOS TESTAR A VALIDAÇAO: TUDO INDICA QUE O INCLUDE NAO FUNCIONA

// Verificar bem esse nome para nao dá erro: FUNCIONANDO!
function bdConsultarPaciente($conexao, $nome_paciente){
    $sql = "SELECT * FROM paciente WHERE nome = '{$nome_paciente}'";
    $resultado = $conexao->query($sql);
    # Recebendo somente objeto: fetchAll(PDO::FETCH_OBJ)
    $consulta = $resultado->fetchAll(); 
    return $consulta;
}

// Funcao de consulta: vou mudar depois para passar nome e data de nascimento
function bdConsultarPacienteCompleta($conexao, $email, $nome_paciente){
    $sql = "SELECT* FROM paciente WHERE (nome = '{$nome_paciente}' AND email = '{$email}')";
    $resultado = $conexao->query($sql);
    $consulta = $resultado->fetchAll(PDO::FETCH_ASSOC); 
    return $consulta; 
}

// Inserir um registro de paciente no banco de dados: TESTAR!
function bdInserirPaciente($conexao, $nome, $email, $data_nasc, $telefone){
    $sql = "INSERT INTO paciente(nome, email, data_nasc, telefone )
        VALUES('{$nome}', '{$email}', '{$data_nasc}','{$telefone}')";
    $stm = $conexao->prepare($sql);
    $resultado = $stm->execute();
    return $resultado; // linhas afetadas
}


?>