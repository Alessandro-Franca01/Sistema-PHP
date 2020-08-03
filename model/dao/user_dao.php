<?php
# Script de acesso ao banco para metodos do usuario:
session_start();

// Consultando os usuarios!
function bd_consultarUsuarios($conexao){
    $sql = 'SELECT * FROM usuario';
    $resultado = $conexao->query($sql);
    $array_consulta = $resultado->fetchAll();
    return $array_consulta;
}



// Conectando ao banco: ESSE CODIGO VAI PARA A CAMADA DAO... AQUI VOU DA UM INCLUDE!
/*try{
    $conexao = new PDO($dns, $user, $senha);

    // Consultando os registros no banco: FUNCIONANDO
    $sql = 'SELECT * FROM usuario';
    $resultado = $conexao->query($sql);
   
    $array_consulta = $resultado->fetchAll();
    print_r($array_consulta);

    // Validando usuario:FUNCIONANDO!
    foreach($array_consulta as $user){
        if((strcasecmp($emailLogin == $user['email']) == 0) and ($senhaLogin == $user['senha'])){
            $_SESSION['validacao'] = "SIM";
            $var = true;
            $_SESSION['usuario_logado'] = $user; 
            print_r($user);
            echo "<br>";
            $usuario = new Usuario($user['id']); # FUNCIONANDO!
            echo "ID do usuario: ".$usuario->__get('id');
            echo "<br>";
        }
        else{
            echo "Passando pelo ELSE...<br>";
        }
        
    }
    
}catch(PDOException $e){
    echo "Erro: ".$e->getCode();
    echo "<br>Messagem: ".$e->getMessage();
}*/// Tenho que implementar o finally


?>