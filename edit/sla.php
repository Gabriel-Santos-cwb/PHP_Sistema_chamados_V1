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
        //busca SLA desativados 
        $busca_sla1 = "SELECT * FROM sla_chamados WHERE ativo = '0'";
        $result_sla1 = $con_chamados->query($busca_sla1) or die ($con_chamados->error);
        }

        if (isset($_POST["submit"])) {
            if ($NivelGe == '0800'){ 
                $Setor_user = $_POST['setor_vin'];
            }
        $nome_sla = $_POST["nome_sla"];
        $calendario = $_POST["calendario"]; 
        $prioridade = $_POST["prioridade"];
        $tempo = $_POST["tempo"];
        $sql = $con_chamados->query("INSERT INTO sla_chamados SET nome_sla = '$nome_sla', id_calendario = '$calendario', id_prioridade = '$prioridade', tempo = '$tempo', ativo = '1', vinculo_setor = '$Setor_user' ");
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";}else{}
        ?>
<body>
<div class="conteudos-chamados" id="conteudos">
<div class="titulo-chamados">
        <h1>SLA</h1>
    </div>
    <main>
  <div class="painel-inicial">
<main>

<div class="organiza-btn"> 

<!-- ADICIONAR NOVO -->
<!-- Button trigger modal -->
<button type="button" class="btn-abre-forms" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
  <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
  <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
</svg><br> ADICIONAR NOVO SLA
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="page">
    <form method="POST" action="">
    <label class="form-label" for="card-password">Nome do SLA</label>
        <input name="nome_sla" class="form-control">
        <br> 
        <label class="form-label" for="card-password">Selecione o Calendario da EQUIPE</label>
        <select name="calendario" class="form-select" aria-label="Floating label select example">
    <?php 
    while($calendario = $result_calendarios->fetch_array()) {
        if ($NivelGe == '0800') {
            echo '<option value="' . $calendario['id_calendario'] . '">';
            echo $calendario['nome_setor'] . ' - ' . $calendario['nome_calendario'];
            echo '</option>';
        } else {
            echo '<option value="' . $calendario['id_calendario'] . '">';
            echo $calendario['nome_calendario'];
            echo '</option>';
        }
    }
    ?>                     
</select>
        <br> 
        <label class="form-label" for="card-password">Selecione a prioridade</label>
        <select name="prioridade" class="form-select" aria-label="Floating label select example">
            <?php 
            while($prioridade = $result_prioridade->fetch_array()){?>
        <option value="<?php echo ($prioridade['IDprioridade'])?>"><?php echo ($prioridade['nome_prioridade'])?></option><?php }?>
        </select>
        <br> 
        <label class="form-label" for="card-password">Qual o tempo de resolução?</label>
        <input name="tempo" type="time" class="form-control"> 
    </div>
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
</svg><br> DESATIVAR UM SLA
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
</svg><br> RESTAURAR SLA
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


</div>
</main>
  </div>
  
</body>
</html>