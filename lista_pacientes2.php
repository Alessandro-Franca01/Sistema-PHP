<?php
# SCRIPT da Pagina de listagem de paciente USANDO TABELA NO LUGAR DE CARDS!!!

include('./model/Usuario.php'); 
include('./model/paciente.php');

session_start();

if(!$_SESSION['validacao']){
  header('Location: ./index.php?erro=user_nao_logado');
}

// Por estou passando a lista na SESSION ??
$lista_paciente = $_SESSION['lista_pacientes'];

?>


<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <title>Programa de Darcilene</title>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--  TESTANDO CODIGO DO W3Scholl -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
      .dropdown-submenu {
        position: relative;
      }

      .dropdown-submenu .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -1px;
      }
    </style>
  </head>

  <body class="bg-light">

    <nav class="navbar navbar-light bg-light">      
      <a class="navbar-brand" href="#">
        <!-- Ja está responsivo kkkk, mas a img bugo! *class="d-inline-block align-top" alt="" -->
        <img src="./img/incone_formulario.jpg" width="30" height="30" >
        Lista de Pacientes
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
                    <th scope="col">Nome</th>
                    <th scope="col">Ações</th>                                      
                    <th scope="col">Responsavel</th>                
                    <th scope="col">Atendimentos</th>
                    <th scope="col">Idade</th>

                    
                </tr>
            </thead> 

            <?php foreach($lista_paciente as $paciente) { ?> 
                <!-- *Posso instanciar os pacientes e armazenar na variavel de sessao  -->               
                <tbody>
                    <tr>
                        <th scope="row"> <?php echo $paciente['IDPaciente']; ?></th>
                        <td> <?php echo $paciente['nome']; ?></td>
                        <td class="dropdown">
                          <a class="dropdown-toggle" type="button" data-toggle="dropdown">  Opções <span class="caret"></span> <a>
                          <ul class="dropdown-menu">                                         
                            <!-- Usar o DROPDOWN responsivo: Funcionando, só falta arrumar o css do link -->                                                                                     
                            <li><a href="./controll/validacao_show_pct.php?id=<?php echo $paciente['IDPaciente']; ?>" class="dropdown-item">Visualizar Paciente</a></li>
                            <li><a href="./controll/validacao_delete_pct.php?id=<?php echo $paciente['IDPaciente']; ?>" class="dropdown-item">Deletar Paciente</a></li>
                            <!-- SubMenu Funionando -->
                            <li class="dropdown-submenu">                             
                              <a class="dropdown-item" tabindex="-1" href="#"> Alterar <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="alter_pct_data.php?id=<?php echo $paciente['IDPaciente']; ?>">
                                      <button class="btn btn-info dropdown-item" type="button"> Data </button></a>
                                    </li>                                                                                                      
                                    <li><a href="alter_pct_diag.php?id=<?php echo $paciente['IDPaciente']; ?>">
                                      <button class="btn btn-info dropdown-item" type="button"> Diagnóstico </button></a>
                                    </li>
                                    <li><a href="alter_pct_outros.php?id=<?php echo $paciente['IDPaciente']; ?>">
                                      <button class="btn btn-info dropdown-item" type="button"> Outros </button></a>
                                    </li>                                  
                                </ul>                              
                            </li>
                          </ul>
                        </td>
                        <td> <?php echo $paciente['responsavel']; ?></td>                                              
                        <td>
                          <a href="./controll/validacao_listar_atend_pct.php?id=<?php echo $paciente['IDPaciente']; ?>">
                            <button class="btn btn-secondary">Visualizar</button>
                          </a>
                        </td>
                        <!-- Imprimindo a idade do paciente -->
                        <td>
                         <?php 
                            $data = new DateTime($paciente['data_nasc']);
                            $interval = $data->diff( new DateTime( date('Y-m-d') ) );
                            echo $interval->format( '%Y' );                             
                          ?>
                        </td>                       
                    </tr>
                </tbody>
            <?php } ?>
        </table> 
    </div>

    <script>
      // Script da mensagem de validação de remoção de paciente!
        var url_string = window.location.href;
        var url = new URL(url_string);
        if (url.searchParams.get("remocao") != null){
          var getParamtroCadastro = url.searchParams.get("remocao");

          if(getParamtroCadastro == "removido"){
            console.log(url); 
            console.log(getParamtroCadastro);
            alert("Paciente REMOVIDO com sucesso!");
          }
          if(getParamtroCadastro == "nao_removido"){ 
            console.log(url); 
            console.log(getParamtroCadastro);
            alert("NÃO foi possível remover o paciente.");
          }
          else{
            // NÃO É PARA ENTRAR AQUI!
            console.log(url); 
            console.log(getParamtroCadastro);
          }
          
        }

        // Script da mensagem de validação de alteração de dados do paciente!
        if (url.searchParams.get("alteracao") != null){
          var getParamtroCadastro = url.searchParams.get("alteracao");

          if(getParamtroCadastro == "alterado"){
            console.log(url); 
            console.log(getParamtroCadastro);
            alert("Alteração feita com SUCESSO!");
          }
          if(getParamtroCadastro == "nao_alterado"){ 
            console.log(url); 
            console.log(getParamtroCadastro);
            alert("NÃO foi possivel fazer a alteração.");
          }else{
            // NÃO É PARA ENTRAR AQUI!
            console.log(url); 
            console.log(getParamtroCadastro);
          }
          
        }
      // VER MELHOR ESSE CODIGO DEPOIS, TENHO QUE ESTUDAR MAIS JAVASCRIPT E JQUERY!!!
      $(document).ready(function(){
        $('.dropdown-submenu a.dropdown-item').on("click", function(e){
          $(this).next('ul').toggle();
          e.stopPropagation();
          e.preventDefault();
        });
      });        
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>