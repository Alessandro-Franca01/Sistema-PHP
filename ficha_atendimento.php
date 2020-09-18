<?php
// Pagina de Cadastro da Ficha de Atendiemtno

include('./model/dao/paciente_dao.php');
include('./model/dao/conexao_novo_dao.php'); 

session_start();

if(!$_SESSION['validacao']){
    header('Location: ./index.php?erro=user_nao_logado');
}

?>

<html>
                <!-- PAGINA PRONTA AGORA FALTA SOMENTE O BACK END -->  
  <head>
    <meta charset="utf-8" />
    <!-- Depois que apliquei essa meta ficou responsivo sem usar a referencia 'sm' -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <title>Api de Agendamentos</title>
    <!-- Usando o bootstrap atraves do link, porem nao é responsivo -->
    <!-- Deixar essa pagina responsiva, baixa o bootstrap para usar o diretorio salvo -->    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>

  <body>
    <nav class="navbar navbar-dark bg-dark ">
      <a class="navbar-brand" href="#">
        <img src="./img/inc_form_paciente.png" width="30" height="30" >
        Ficha de Atendimento
      </a>
      <a href="./menu.php">
        <button class="btn btn-outline-secondary" type="button">Voltar</button>
      </a>
      </nav>        
    <form action="#" method="post">
        <div class="form-group">
          <label for="cad_pct_nome">Paciente</label>
          <input type="text" class="form-control" name="cad_ft_nome" id="id_cad_ft_nome" placeholder="Nome e Sobre Nome">
          <small id="small_cad_ft_nome" class="form-text text-danger">*Campo obrigatório </small>  
        </div>          
        <div class="form-group">
            <label for="id_cad_ft_hda">HDA</label>
            <input type="text" class="form-control" name="cad_ft_hda" id="id_cad_ft_hda">
            <small id="help_respon" class="form-text text-danger">*Campo obrigatório </small>
        </div>         
        <div class="form-group">
              <label for="id_cad_ft_queixa">Queixa Principal</label>
              <textarea class="form-control" name="cad_ft_queixa" id="id_cad_ft_queixa"></textarea>
              <small id="cad_pct_dgn" class="form-text text-danger">*Campo obrigatório </small>
        </div>
        <div class="form-group">
            <label for="id_cad_ft_atend_quant">Atendimentos</label>
            <input type="text" class="form-control" name="cad_ft_atend_quant" id="id_cad_ft_atend_quant" placeholder="Quantidade">
            <small id="small_telefone" class="form-text text-danger">*Campo obrigatório </small>
        </div>
        <div class="form-group">
            <label for="id_cad_ft_prog">Prognóstico</label>
            <input type="text" class="form-control" name="cad_ft_prog" id="id_cad_ft_prog">
            <small id="help_email_pc" class="form-text text-muted-danger">*Campo não obrigatório </small>
        </div>
        <div class="form-group">
            <label for="id_cad_ft_data">Data da Ficha</label>
            <input type="date" class="form-control" name="cad_ft_data" id="id_cad_ft_data">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="reset" class="btn btn-secundary">Cancelar</button>
    </form>
    
    <script>
      // Script da mensaguem de validação:
        var url_string = window.location.href;
        var url = new URL(url_string);
        if (url.searchParams.get("cadastro") != null){
          var getParamtroCadastro = url.searchParams.get("cadastro");

          if(getParamtroCadastro == "efetuado"){
            console.log(url); 
            console.log(getParamtroCadastro);
            alert("Paciente cadastrado com sucesso!");
          }
          if(getParamtroCadastro == "nao_efetuado"){ 
            console.log(url); 
            console.log(getParamtroCadastro);
            alert("Cadastro do paciente NÃO foi realizado.");
          }
          else{
            // NÃO É PARA ENTRAR AQUI!

            console.log(url); 
            console.log(getParamtroCadastro);
          }
          
        }
        
    </script>
  </body>
</html>