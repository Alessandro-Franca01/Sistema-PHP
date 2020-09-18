<?php
# VAMOS TESTAR A VALIDAÇAO: TUDO INDICA QUE O INCLUDE NAO FUNCIONA

// Verificar bem esse nome para nao dá erro: FUNCIONANDO!
function bdConsultarPaciente($conexao, $nome_paciente){
    $sql = "SELECT * FROM paciente WHERE nome = '{$nome_paciente}'";
    $resultado = $conexao->query($sql);
    $consulta = $resultado->fetchAll(); 
    return $consulta;
}

// Funcao de consulta: vou mudar depois para passar nome e data de nascimento
function bdConsultarPacienteCompleta($conexao, $nome_paciente, $data_nascimento){
    $sql = "SELECT* FROM paciente WHERE (nome = '{$nome_paciente}' AND data_nasc = '{$data_nascimento}')";
    $resultado = $conexao->query($sql);
    $consulta = $resultado->fetchAll(PDO::FETCH_ASSOC); 
    return $consulta; 
}

// Funcao de consulta pelo ID: FUNCIONANDO !
function bdConsultarPacienteID($conexao, $id_paciente){
    $sql = "SELECT* FROM paciente WHERE IDPaciente = '{$id_paciente}'";
    $resultado = $conexao->query($sql);
    $consulta = $resultado->fetchAll(PDO::FETCH_ASSOC); 
    return $consulta; 
}
// Inserir um registro de paciente no banco de dados: MUDAR PARA OO ESSE PAREMETRO 
function bdInserirPaciente($conexao, $nome, $email, $data_nasc, $telefone, $diagnostico, $responsavel){
    $sql = "INSERT INTO paciente(nome, email, data_nasc, telefone, diagnostico, responsavel)
        VALUES('{$nome}', '{$email}', '{$data_nasc}','{$telefone}','{$diagnostico}','{$responsavel}')";
    $stm = $conexao->prepare($sql);
    $resultado = $stm->execute(); // retorno inteiro
    return $resultado; 
}

//  Excluir Paciente pelo ID: Esta funcionando, porém como tem um dependencia com a tabela Atendimento não está indo!
function bdExcluirPaciente($conexao, $paciente){
    $sql = "DELETE FROM paciente WHERE IDPaciente = '{$paciente->__get('idPaciente')}' ";
    # OUTRAS MANEIRAS DE FAZER A MESMA COISA:
        //$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$stm = $conexao->prepare('DELETE FROM paciente WHERE IDPaciente = ?');
        //$stm->bindParam(1, $id_paciente, PDO::PARAM_INT);
        //$resultado = $stm->execute(); 
    $stm = $conexao->prepare($sql);
    $resultado = $stm->execute(); 
    $linhas_afetadas = $stm->rowCount();
    return $resultado; 
}

// Alterar dados do paciente pelo ID: FUNCIONANDO COM 'DATA DE NASCIMENTO'
function bdAlterarPaciente($conexao, $id_paciente, $campo, $valor){
    $sql = "UPDATE paciente SET {$campo} = '{$valor}' WHERE IDPaciente = {$id_paciente}";
    $stm = $conexao->prepare($sql);
    $resultado = $stm->execute();
    return $resultado; 
}

// Consultar todos os pacientes: Funcionando
function bdConsultarTodosPacientes($conexao){
    $sql = "SELECT * FROM paciente";
    $resultado = $conexao->query($sql);
    $consulta = $resultado->fetchAll(PDO::FETCH_ASSOC); 
    return $consulta; 
}


?>