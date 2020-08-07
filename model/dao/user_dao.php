<?php

include_once('../Usuario.php');
# Script de acesso ao banco para metodos do usuario:
session_start();

// Consultando os usuarios: Posso mudar a forma como pesquiso o usuario com WHERE
function bd_consultarUsuarios($conexao){
    $sql = 'SELECT * FROM usuario';
    $resultado = $conexao->query($sql);
    $array_consulta = $resultado->fetchAll();
    return $array_consulta;
}



?>