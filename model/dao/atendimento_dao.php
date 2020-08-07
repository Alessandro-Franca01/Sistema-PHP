<?php
# Script das operações feitas do Objeto Atendimento ao banco de dados:

#Funcao para inserir um registro de atendimento no banco de dados: FUNCIONANDO!
function inserirAtendimento($conexao, $atendimento){
    $sql = "INSERT INTO atendimento(data_atendimento, valor, observacao, ID_Usuario, ID_Paciente)
        VALUES('{$atendimento->__get('data_atendimento')}', {$atendimento->__get('valor')},
        '{$atendimento->__get('observacao')}', {$atendimento->__get('id_usuario')},
        {$atendimento->__get('id_paciente')})";
    $stm = $conexao->prepare($sql);
    $resultado = $stm->execute();
    return $resultado;
}

?>


