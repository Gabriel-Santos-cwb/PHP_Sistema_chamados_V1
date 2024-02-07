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
    // DEV GABRIEL E J SANTOS
      
      include(__DIR__.'/../menu-chamados.php');
      include('../funcoes-chamado/permissoes.php'); 
      include('../Comandos-SQL/sql_acao_categoria.php');
      ?>
<body>

<div class="conteudos-chamados" id="conteudos">
<div class="titulo-chamados">
        <h1>Adicionar/Deletar Ações do incidente: ?</h1>
    </div>
    <main>
  <div class="painel-inicial">
<main>

<div class="organiza-btn"> 
<!-- ADICIONA NOVA  -->

<!-- Button trigger modal -->
<button  class="btn-abre-forms" type="button"  data-bs-toggle="modal" data-bs-target="#adiciona">
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-box-arrow-in-up" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M3.5 10a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 0 0 1h2A1.5 1.5 0 0 0 14 9.5v-8A1.5 1.5 0 0 0 12.5 0h-9A1.5 1.5 0 0 0 2 1.5v8A1.5 1.5 0 0 0 3.5 11h2a.5.5 0 0 0 0-1h-2z"/>
  <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z"/>
</svg><br> ADICIONA NOVA AÇÂO DA SUBCATEGORIA
</button>
<!-- Modal -->
<div class="modal fade" id="adiciona" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="adicionar-setor"> 
<form enctype="multipart/form-data" action="" method="POST">    
    <div class="card-body bg-light">
      <div class="tab-content">
      <label class="form-label" for="card-password">AÇÂO SUB-CATEGORIA</label>
        </div>
        <input class="form-control" id="prioridade_n" name="prioridade_n" type="text" required>
        <label class="form-label" for="card-password">Setor/categoria/subcategoria</label>
        <select class="form-select" id="prioridade_n1" name="prioridade_n1" aria-label="Floating label select example">
    <option value="" selected>Selecione</option>
            <?php 
            while($subCat = $result_sub->fetch_array()) {
                if ($NivelGe == '0800') {
                    echo '<option value="' . $subCat['id_subcategoria'] . '">';
                     echo $subCat['nome_setor'] . ' - ' . $subCat['nome_cat'] . ' - ' . $subCat['nome_sub'];
                     echo '</option>';
                    } else {
                     echo '<option value="' . $subCat['id_subcategoria'] . '">';
                    echo $subCat['nome_cat'] . ' - ' . $subCat['nome_sub'];
                    echo '</option>';
                }
            }
        ?>                     
</select>

                    <label class="form-label" for="card-password">SLA</label>
                    <select name="sla_selecionado" class="form-select" aria-label="Floating label select example">
                      <?php 
                      while($calendario_sel = $result_sla->fetch_array()){?>
                      <option value="<?php echo ($calendario_sel['id_sla'])?>"><?php echo ($calendario_sel['nome_sla'])?></option><?php }?>
                    </select><br>
                    <label class="form-label" for="card-password">Prioridade</label>
                    <select name="prioridade" class="form-select" aria-label="Floating label select example">
                   
                    <?php 
                    while ($pri = $result_prio->fetch_array()){?>

                    
                    <option value="<?php echo ($pri['IDprioridade'])?>"><?php echo ($pri['nome_prioridade'])?></option><?php }?>
                </select><br>


                        <?php 
                        if ($NivelGe == '0800'){?>

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


        </div>
        <input class="btn-add-setor" type="submit" value="ADICIONAR" name="submit">
    </form>
    <?php
    if (isset($_POST["submit"])) {
        if ($NivelGe == '0800'){ 
            $Setor_user = $_POST['setor_vin'];
        }
    $res = $_POST['prioridade_n'];
    $res1 = $_POST['prioridade_n1'];
    $sla_selecionado = $_POST['sla_selecionado'];
    $prioridade = $_POST['prioridade'];
    $sql = $con_chamados->query("INSERT INTO acao_subcategoria SET Setor_id = '$Setor_user', IDprioridade = '$prioridade', ativo = '1' , nome_acao = '$res' , id_subcategoria= '$res1', id_sla = '$sla_selecionado'");
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";}else{}?>
     <!-- FIM DA DIV -->
</div>
    </div>
  </div>
</div>

 <!-- FIM DA ADICIONA -->


 <!-- DELETA SELECIONADA -->

 <!-- Button trigger modal -->
<button type="button" class="btn-abre-forms" data-bs-toggle="modal" data-bs-target="#deleta">
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg><br> DELETAR UMA AÇÃO DA SUBCATEGORIA
</button>

<!-- Modal -->
<div class="modal fade" id="deleta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="deletar-setor">
                <form enctype="multipart/form-data" action="" method="POST">  
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-a94b4485-4eb5-4f06-be95-a4c7cfb570bc" id="dom-a94b4485-4eb5-4f06-be95-a4c7cfb570bc">
                <label class="form-label" for="card-password">Deletar ação da Subcategoria</label>
                <div class="form-floating">
                    <select class="form-select" name="del_prioridade" id="floatingSelect" aria-label="Floating label select example">
                    <option value= "" selected="">Selecione</option>
                    <?php 
                    while ($acaoAT = $result_acao->fetch_array()){?>
                    <option value="<?php echo ($acaoAT['id_acao'])?>"><?php echo ($acaoAT['nome_setor'])?>-<?php echo ($acaoAT['nome_cat'])?>-<?php echo ($acaoAT['nome_sub'])?>-<?php echo ($acaoAT['nome_acao'])?></option>
                    <?php
                }?> 
                </select>
                  </div>
                  <input class="btn-dll-setor" type="submit" value="Desativar" name="del">
                </div>
                </form>
                <?php
                if (isset($_POST["del"])) {
                $res = $_POST['del_prioridade'];
                $sql = $con_chamados->query(" UPDATE acao_subcategoria SET ativo = '0' WHERE acao_subcategoria.id_acao ='$res' ");
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";}else{}?>
                 <!-- FIM DA DIV -->
        </div>
    </div>
  </div>
</div>

   <!-- FIM DELETAR  -->
 
   <!-- Button trigger modal -->
<button type="button" class="btn-abre-forms" data-bs-toggle="modal" data-bs-target="#restaura">
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
  <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z"/>
</svg><br> RESTAURAR UMA AÇÃO DA SUBCATEGORIA
</button>

<!-- Modal -->
<div class="modal fade" id="restaura" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="restaura-setor">
                <form enctype="multipart/form-data" action="" method="POST">  
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-a94b4485-4eb5-4f06-be95-a4c7cfb570bc" id="dom-a94b4485-4eb5-4f06-be95-a4c7cfb570bc">
                <label class="form-label" for="card-password">Restaurar Açâo</label>
                <div class="form-floating">                 
                    <select class="form-select" name="del_prioridade" id="floatingSelect" aria-label="Floating label select example">
                    <option value= "" selected="">Selecione</option>
                    <?php 
                    while($acaoDE = $result_acao_desativada->fetch_array()){?>                     
                    <option value="<?php echo ($acaoDE['id_acao'])?>"><?php echo ($acaoDE['nome_setor'])?>-<?php echo ($acaoDE['nome_cat'])?>-<?php echo ($acaoDE['nome_sub'])?>-<?php echo ($acaoDE['nome_acao'])?></option><?php 
                    } ?>  
                    </select>                  
                  </div>
                  <input class="btn-RES-setor" type="submit" value="Restaurar" name="del1">
                </div>
                </form>
                <?php
                if (isset($_POST["del1"])) {
                $res = $_POST['del_prioridade']; 
                $sql = $con_chamados->query(" UPDATE acao_subcategoria SET ativo = '1' WHERE acao_subcategoria.id_acao ='$res' ");
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";}?>
                <!-- FIM DA DIV -->
        </div>
    </div>
  </div>
</div>
 <!-- FIM DO RESTURA --> 
          
    </div>
    </div>
</main>
</div>
</body>
</html>
