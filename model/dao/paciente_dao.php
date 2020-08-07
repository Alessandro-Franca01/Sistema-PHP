<?php
# VAMOS TESTAR A VALIDAÇAO: TUDO INDICA QUE O INCLUDE NAO FUNCIONA

// Verificar bem esse nome para nao dá erro: FUNCIONANDO!
function bdConsultarPaciente($conexao, $nome_paciente){
    $sql = "SELECT * FROM paciente WHERE nome = '{$nome_paciente}'";
    $resultado = $conexao->query($sql);
    # Recebendo somento array associativo: fetchAll(PDO::FETCH_ASSOC); TESTAR AINDA!!!
    # Recebendo somente objeto: fetchAll(PDO::FETCH_OBJ)
    $consulta = $resultado->fetchAll(); 
    return $consulta;
}

// Inserir um registro do paciente no banco de dados: AJUSTAR!
function bdInserirPaciente($conexao){
    //INSERT INTO usuario(nome, email, senha) VALUES('ALESSANDRO FRANCA', 'ALE@GMAIL.COM', 'ALE123');
    #$sql = "INSERT INTO usuario(nome, email, senha) VALUES('ALISSON FRANCA', 'ALISSON@GMAIL', 'ALI123')";
    $resultado = null;
    #$resultado = $conexao->exec($sql); // TBM NAO FOI DO MESMO JEITO DO OUTRO!
    //$stm = $conexao->prepare($sql);
    //$resultado = $stm->execute();
    return $resultado;
}


?>