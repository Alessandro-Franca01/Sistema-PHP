<?php
#NOVO SCRIPT DE VALIDAÇÃO DA TABELA DA SEMANA

// Essa funcao vai retornar todas os dados dos atendimentos para preencher a tabela: Funcionando
function bd_consultaTabela($conexao){# FUNCIONANDO!!!
    # QUERY de consulta ao banco de dados para retornar os dados da tabela da semana
    $sql = "SELECT u.nome AS usuario, p.nome AS paciente, u.email, a.data_atendimento AS data_atendimento FROM usuario AS u 
    INNER JOIN atendimento AS a ON u.IDUsuario = a.ID_Usuario INNER JOIN paciente AS p ON a.ID_Paciente = p.IDPaciente 
    WHERE u.IDUsuario = {$_SESSION['id_user']}"; // esse ID vai capturado ao logar
    $resultado = $conexao->query($sql);
    $array_consulta = $resultado->fetchAll();// Tenho que usar o outro metodo que retorna somente nome das colunas
    return $array_consulta;
}




?>