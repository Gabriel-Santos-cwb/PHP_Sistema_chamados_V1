<!-- DEV GABRIEL SANTOS-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Inicio</title>
        <link rel="icon" href="./Home/Imagens/icone.png" /><!-- ICONE DA PAGINA-->
        <link rel="stylesheet" type="text/css" href="../CSS/edit.css" />
        <script src="../funcoes-chamado/pagina.js"></script>
        <link rel="stylesheet" type="text/css" href="../CSS/menu-chamados.css" />
        <link href="../../bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="../../bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="../funcoes-chamado//pagina.js"></script>
        <?php

        include(__DIR__.'/../menu-chamados.php');
        include('../funcoes-chamado/permissoes.php');
        if ($IDnivel == '8'){  

          $busca_status = "SELECT status.*, setor.nome_setor FROM status
          INNER JOIN setor ON status.id_setor = setor.IDsetor AND id_setor = '$Setor_user'";
          $busca_status_resul = $con_chamados->query($busca_status) or die ($con_chamados->error);


        //busca prioridades ativas
        $busca_prioridade = "SELECT * FROM prioridade WHERE ativo = '1' AND vinculo_setor = '$Setor_user'";
        $result_prioridade = $con_chamados->query($busca_prioridade) or die ($con_chamados->error);
        //busca calendarios ativos 
        $busca_calendarios = "SELECT * FROM calendarios WHERE ativo ='1' AND setor_id = '$Setor_user'";
        $result_calendarios = $con_chamados->query($busca_calendarios) or die ($con_chamados->error);
        //busca SLA ativos 
        $busca_sla = "SELECT * FROM sla_chamados WHERE ativo = '1' AND vinculo_setor = '$Setor_user'";                  
        $result_sla = $con_chamados->query($busca_sla) or die ($con_chamados->error);
        //busca SLA desativados 
        $busca_sla1 = "SELECT * FROM sla_chamados WHERE ativo = '0' AND vinculo_setor = '$Setor_user'";
        $result_sla1 = $con_chamados->query($busca_sla1) or die ($con_chamados->error);
        }
        if ($NivelGe == '0800'){ 
             //busca prioridades ativas
        $busca_prioridade = "SELECT * FROM prioridade WHERE ativo = '1'";
        $result_prioridade = $con_chamados->query($busca_prioridade) or die ($con_chamados->error);
        //busca calendarios ativos 
        $busca_calendarios = "SELECT calendarios.*, setor.nome_setor FROM calendarios 
        INNER JOIN setor ON calendarios.setor_id = setor.IDsetor 
        WHERE calendarios.ativo = '1';";
        $result_calendarios = $con_chamados->query($busca_calendarios) or die ($con_chamados->error);
        //busca SLA ativos 
        $busca_sla = "SELECT * FROM sla_chamados WHERE ativo = '1'";                  
        $result_sla = $con_chamados->query($busca_sla) or die ($con_chamados->error);

            
        $busca_sla1 = "SELECT * FROM sla_chamados WHERE ativo = '0'";
        $result_sla1 = $con_chamados->query($busca_sla1) or die ($con_chamados->error);

        //buscar status 

        $busca_status = "SELECT status.*, setor.nome_setor FROM status
        INNER JOIN setor ON status.id_setor = setor.IDsetor";
        $busca_status_resul = $con_chamados->query($busca_status) or die ($con_chamados->error);
        
        




    
        }

        if (isset($_POST["submit"])) {
            if ($NivelGe == '0800'){ 
                $Setor_user = $_POST['setor_vin'];
            }
        $nome_sla = $_POST["nome_sla"];
        $prioridade = $_POST["prioridade"];
        $iconesvg = $_POST["icone-svg"];
        $sql = $con_chamados->query("INSERT INTO status SET coluna3 = '$iconesvg', titulo = '$nome_sla', importancia = '$prioridade',  ativo = '1', id_setor = '$Setor_user' ");
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";}else{}
        ?>

<script>
function buscarinfo() {
  var setorSelecionado = document.getElementById("status_selecionado").value;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("icon").innerHTML = this.responseText;

      var iconElement = document.getElementById("icon");
      var icon1Element = document.getElementById("icon1");

      if (iconElement && icon1Element) {
  var valorTextarea = iconElement.value;
  icon1Element.innerHTML = valorTextarea;
}
    }
  };
  xhttp.open("GET", "./buscar_status.php?sta=" + setorSelecionado, true);
  xhttp.send();
}

      </script>
<body>
<div class="conteudos-chamados" id="conteudos">
<div class="titulo-chamados">
        <h1>Status</h1>
    </div>
    <main>
  <div class="painel-inicial">
<main>

<div class="organiza-btn"> 

<!-- ADICIONAR NOVO -->
<!-- Button trigger modal -->
<button type="button" class="btn-abre-forms" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-sign-stop-lights" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V4Zm2 2a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm0 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm1 2a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"/>
  <path fill-rule="evenodd" d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435Zm-1.4.7a.495.495 0 0 1 .7 0l6.516 6.515a.495.495 0 0 1 0 .7L8.35 14.866a.495.495 0 0 1-.7 0L1.134 8.35a.495.495 0 0 1 0-.7L7.65 1.134Z"/>
</svg><br> ADICIONAR NOVO STATUS
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="page">
    <form method="POST" action="">
    <label class="form-label" for="card-password">Nome do Status</label>
        <input name="nome_sla" class="form-control">
        <br> 

        <br> 
        <label class="form-label" for="card-password">Selecione a prioridade</label>
        <select name="prioridade" class="form-select" aria-label="Floating label select example">
            <?php 
            while($prioridade = $result_prioridade->fetch_array()){?>
        <option value="<?php echo ($prioridade['IDprioridade'])?>"><?php echo ($prioridade['nome_prioridade'])?></option><?php }?>
        </select>
        <br> 
    
    </div>

    <script>
    function mostrarMensagem() {
      var mensagem = document.getElementById("mensagem");
      mensagem.style.display = "block";
      setTimeout(function() {
        mensagem.style.display = "none";
      }, 5000); // 5000 milissegundos = 5 segundos
    }
  </script>
  <style>
    #mensagem {
      display: none;
    }
  </style>
  <div id="mensagem" class="mensag">Para adicionar um ícone, acesse "https://icons.getbootstrap.com/" e copie o arquivo SVG, deixando o width="40" e height="40"</div>
  <label class="form-label" for="card-password">Icone</label>
  <textarea id="icone-svg" name="icone-svg" onmouseover="mostrarMensagem()" onmouseout="ocultarMensagem()"></textarea>
  

    <?php if ($NivelGe == '0800'){?>

<label class="form-label" for="card-password">Selcione o setor de vinculo</label>
<select name="setor_vin" class="form-select" aria-label="Floating label select example" require>
        <option>Selcione o setor de vinculo</option>
        <?php 
        //busca setores ativos no sistema 
        $busca_geral_setor = "SELECT * FROM setor WHERE ativo = '1' ";
        $result_setor = $con_chamados->query($busca_geral_setor) or die ($con_chamados->error);
        while($setores = $result_setor->fetch_array()){?>
        <option value="<?php echo ($setores['IDsetor'])?>" ><?php echo ($setores['nome_setor'])?></option><?php }?>
</select><br>
<?php }?>
      <div class="modal-footer">
      <input type="submit" name="submit" value="Salvar" class="btn btn-primary">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        
      </div></form>
    </div>
  </div>
</div>
<!-- FIM ADICIONAR NOVO -->

<!-- DESATIVA SELECIONADO -->

<!-- Button trigger modal -->
<button type="button" class="btn-abre-forms" data-bs-toggle="modal" data-bs-target="#desat">
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
</svg><br> DESATIVAR UM STATUS
</button>

<!-- Modal -->
<div class="modal fade" id="desat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="deletar-setor">
                <form enctype="multipart/form-data" action="" method="POST">  
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-a94b4485-4eb5-4f06-be95-a4c7cfb570bc" id="dom-a94b4485-4eb5-4f06-be95-a4c7cfb570bc">
                <label class="form-label" for="card-password">Desativar SLA</label>
                <div class="form-floating">
                    <select class="form-select" name="del_prioridade" id="floatingSelect" aria-label="Floating label select example">
                      <option value= "" selected="">Selecione o SLA</option>
                     <?php 
                     while ($sla_at = $result_sla->fetch_array()){?>
                     <option value="<?php echo ($sla_at['id_sla'])?>" ><?php echo ($sla_at['nome_sla'])?> </option><?php }?>
                    </select>
                  </div>
                </div>
                <?php
                if (isset($_POST["del"])) {
                $res = $_POST['del_prioridade'];
                $sql = $con_chamados->query(" UPDATE sla_chamados SET ativo = '0' WHERE sla_chamados.id_sla ='$res' ");
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";}else{}?>
                 <!-- FIM DA DIV -->
        </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <input class="btn-dll-setor" type="submit" value="Desativar" name="del">
      </div> </form>
    </div>
  </div>
</div>

<!-- FIM DESATIVA SELECIONADO -->

<!-- RESTAURA SELECIONADO -->

<!-- Button trigger modal -->
<button type="button" class="btn-abre-forms" data-bs-toggle="modal" data-bs-target="#ress">
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
  <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z"/>
</svg><br> RESTAURAR STATUS
</button>

<!-- Modal -->
<div class="modal fade" id="ress" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="deletar-setor">
                <form enctype="multipart/form-data" action="" method="POST">  
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-a94b4485-4eb5-4f06-be95-a4c7cfb570bc" id="dom-a94b4485-4eb5-4f06-be95-a4c7cfb570bc">
                <label class="form-label" for="card-password">Desativar SLA</label>
                <div class="form-floating">
                    <select class="form-select" name="del_prioridade1" id="floatingSelect" aria-label="Floating label select example">
                      <option value= "" selected="">Selecione o SLA</option>
                     <?php 
                     while ($sla_at1 = $result_sla1->fetch_array()){?>
                     <option value="<?php echo ($sla_at1['id_sla'])?>" ><?php echo ($sla_at1['nome_sla'])?> </option><?php }?>
                    </select>
                  </div>
                </div>
                <?php
                if (isset($_POST["del1"])) {
                $res1 = $_POST['del_prioridade1'];
                $sql1 = $con_chamados->query(" UPDATE sla_chamados SET ativo = '1' WHERE sla_chamados.id_sla ='$res1' ");
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";}else{}?>
                 <!-- FIM DA DIV -->
        </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <input class="btn-dll-setor" type="submit" value="Resturar" name="del1">
      </div> </form>
    </div>
  </div>
</div>


<!-- FIM RESTURA SELECIONADO -->

<!-- RESTAURA SELECIONADO -->

<!-- Button trigger modal -->
<button type="button" class="btn-abre-forms" data-bs-toggle="modal" data-bs-target="#edit">
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
  <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z"/>
</svg><br> EDITAR UM STATUS
</button>

<!-- Modal -->
<div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="deletar-setor">
    <form enctype="multipart/form-data" action="" method="POST">
  <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-a94b4485-4eb5-4f06-be95-a4c7cfb570bc" id="dom-a94b4485-4eb5-4f06-be95-a4c7cfb570bc">
    <label class="form-label" for="card-password">Editar Status</label>
    <div class="form-floating">
    <select class="form-select" name="status_selecionado" id="status_selecionado" aria-label="Floating label select example" required onchange="buscarinfo()">

        <option value="" selected="">Selecione o status</option>
        <?php 
        while ($status_geral = $busca_status_resul->fetch_array()){?>
        <option value="<?php echo ($status_geral['ID_status'])?>"><?php echo ($status_geral['titulo'])?> - <?php echo ($status_geral['nome_setor'])?></option><?php }?>
      </select>
      <br>

    </div>
    <label class="form-label" for="card-password">Visível no painel inicial?</label>
    <select class="form-select" name="visivelSN" id="floatingSelect" aria-label="Floating label select example" required>
      <option value="">Selecione</option>
      <option value="1">Visível</option>
      <option value="0">Não Visível</option>
    </select>
    <br>
    <label class="form-label" for="card-password">Icone SVG</label>
    <br>
    <textarea rows="10" cols="50" name="iconesta" id="icon"></textarea>
    <h5 id="icon1"></h5>
    
  </div>
  <?php
  if (isset($_POST["EditarSTA"])) {
    $status_selecionado = $_POST['status_selecionado'];
    $visivelSN = $_POST['visivelSN'];
    $iconesta = $_POST['iconesta'];
    $sql1 = $con_chamados->query(" UPDATE status SET visao = '$visivelSN', coluna3 = '$iconesta' WHERE ID_status='$status_selecionado' ");
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
  } else {}
  ?>
  <!-- FIM DA DIV -->
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
    <input class="btn-dll-setor" type="submit" value="Salvar" name="EditarSTA">
  </div>
</form>
    </div>
  </div>
</div>


<!-- FIM RESTURA SELECIONADO -->


</div>
</main>
  </div>
  
</body>
</html>