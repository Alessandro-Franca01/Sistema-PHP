<?php
# SCRIPT DA PAGINA DE LISTAGEM DE ATENDIMENTOS DE UM PACIENTE

include('./model/Usuario.php'); 
include('./model/paciente.php');

session_start();

if(!$_SESSION['validacao']){
  header('Location: ./index.php?erro=user_nao_logado');
}

$lista_atendimentos = $_SESSION['lista_atendimentos'];
$paciente = $_SESSION['paciente_listar_atend']; // nem estou usando por enquanto!
#var_dump($lista_atendimentos);
#echo '<br><br>';
#var_dump($paciente);

?>


<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <title>Programa de Darcilene</title>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
  </head>

  <body class="bg-light">

    <nav class="navbar navbar-light bg-light">      
      <a class="navbar-brand" href="#">
        <!-- Ja está responsivo kkkk, mas a img bugo! *class="d-inline-block align-top" alt="" -->
        <img src="./img/incone_formulario.jpg" width="30" height="30" >
        Lista de Atendimentos
      </a>
      <a href="./menu.php">
        <button class="btn btn-outline-secondary" type="button">Voltar</button>
      </a>
    </nav>
    <div class="table-reponsive-sm">   
        <table class="table text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Data</th>
                    <th scope="col">Hora</th>                                      
                    <th scope="col">Valor</th>                
                </tr>
            </thead> 

            <?php foreach($lista_atendimentos as $atendimento) {
              // Dividindo a data e horario:
              $data_hora = explode(' ', $atendimento['data_atendimento']);
              ?>                
                <tbody>
                    <tr>
                        <th scope="row"> <?php echo $atendimento['IDAtendimento']; ?></th>
                        <td> <?php echo $data_hora[0]; ?></td>                        
                        <td> <?php echo $data_hora[1]; ?></td>                          
                        <td> <?php echo $atendimento['valor']; ?></td>                                              
                                         
                    </tr>
                </tbody>
            <?php } ?>
        </table> 
    </div>    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>