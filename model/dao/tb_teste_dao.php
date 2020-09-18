<?php
# Esse Script vai ser para acessar todos os metodos relacionados a Tabela Semanal

// Essa funcão não é para estar aqui!
function bd_conectar(){
    // Variaveis de conexao
    $dns = 'mysql:host=localhost;dbname=test';
    $user = 'root';
    $senha = null; 

    $conexao = new PDO($dns, $user, $senha);
    return $conexao;
}

// Essa funcao vai retornar todas os dados dos atendimentos para preencher a tabela: Melhorar consulta
function bd_consultaTabela($conexao, $data_inicio, $data_final){
    # QUERY de consulta ao banco de dados para retornar os dados da tabela da semana
    $sql = "SELECT u.nome AS usuario, p.nome AS paciente, ag.data_marcada AS data_agendada FROM usuario AS u 
    INNER JOIN atendimento AS a ON u.IDUsuario = a.ID_Usuario INNER JOIN agendamento AS ag ON a.ID_Agendamento = ag.IDAgendamento
    INNER JOIN paciente AS p ON a.ID_Paciente = p.IDPaciente WHERE u.IDUsuario = 2 
    AND data_atendimento BETWEEN '{$data_inicio}' AND '{$data_final}'"; // esse ID vai capturado ao logar
    $resultado = $conexao->query($sql);
    $array_consulta = $resultado->fetchAll();// Tenho que usar o outro metodo que retorna somente nome das colunas
    return $array_consulta;
}


?>