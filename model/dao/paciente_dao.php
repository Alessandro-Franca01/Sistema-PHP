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


?>