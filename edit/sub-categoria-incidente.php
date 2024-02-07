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
      
      if ($IDnivel == '8'){ 
        // consulta categoria
      $consulta_cat = "SELECT * FROM categoria_incidente WHERE ativo = '1' AND vinculo_setor = '$Setor_user' ";
      $con1 = $con_chamados->query($consulta_cat ) or die($con_chamados->error);
         //busca subcategoria 
         $busca_sub = "SELECT * FROM sub_categoria WHERE ativo = '1' AND vinculo_setor = '$Setor_user'";
         $result_sub = $con_chamados->query($busca_sub) or die ($con_chamados->error);
      }

      if ($NivelGe == '0800'){ 
      // consulta categoria
      $consulta_cat = "SELECT * FROM categoria_incidente WHERE ativo = '1'  ";
      $con1 = $con_chamados->query($consulta_cat ) or die($con_chamados->error);
         //busca subcategoria 
         $busca_sub = "SELECT * FROM sub_categoria WHERE ativo = '1' ";
         $result_sub = $con_chamados->query($busca_sub) or die ($con_chamados->error);
      }


      ?>
<body>

<div class="conteudos-chamados" id="conteudos">
<div class="titulo-chamados">
        <h1>Ações Subcategoria: ?</h1>
    </div>
    <main>
  <div class="painel-inicial">
<main>

<div class="organiza-btn">
  

<!-- ADICIONA NOVA PRIORIDADE -->

<!-- Button trigger modal -->
<button type="button" class="btn-abre-forms" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-journal-plus" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z"/>
  <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
  <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
</svg><br> ADICIONA NOVA SUBCATEGORIA 
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="adicionar-setor"> 
<form enctype="multipart/form-data" action="" method="POST">    
    <div class="card-body bg-light">
      <div class="tab-content">
      <label class="form-label" for="card-password">Sub-Categoria</label>
        </div>
        <input class="form-control" id="prioridade_n" name="prioridade_n" type="text" required>
        <label class="form-label" for="card-password">Setor responsavel</label>
        <select class="form-select" id="prioridade_n1" name="prioridade_n1" aria-label="Floating label select example">
                      <option value= "" selected="">Selecione</option>
                      <?php while($dado3 = $con1->fetch_array()) { 
                        $id_cidade = $dado3['id_setor'];
                          $busca_nome = "SELECT * FROM setor WHERE IDsetor = $id_cidade";
                          $result = $con_chamados->query($busca_nome) or die($con_chamados->error);
                          while($traz_nome = $result->fetch_array()) { 
                            $nome_ci = $traz_nome ['nome_setor'];
                        ?>
                                 <option value="<?php echo ($dado3['id_categoria']) ?>"><?php echo ($dado3['nome_cat']); ?> - <?php echo $nome_ci ?> <td></td>
                                 </option>
                                 <?php } }?>
                </select>
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
    <?php
    if (isset($_POST["submit"])) {
      if ($NivelGe == '0800'){ 
        $Setor_user = $_POST['setor_vin'];
    }

    $res = $_POST['prioridade_n'];
    $res1 = $_POST['prioridade_n1'];
    $sla_selecionado = $_POST['sla_selecionado'];
    $sql = $con_chamados->query("INSERT INTO sub_categoria SET ativo = '1' , nome_sub = '$res' , id_categoria= '$res1', vinculo_setor = '$Setor_user'");
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";}else{}?>
     <!-- FIM DA DIV -->
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input class="btn-add-setor" type="submit" value="ADICIONAR" name="submit">
      </div></form>
    </div>
  </div>
</div>

<!-- FIM ADICIONA  -->


<!-- DELETA SELECIONADA -->

<!-- Button trigger modal -->
<button type="button" class="btn-abre-forms" data-bs-toggle="modal" data-bs-target="#desativa">
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-journal-x" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6.146 6.146a.5.5 0 0 1 .708 0L8 7.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 8l1.147 1.146a.5.5 0 0 1-.708.708L8 8.707 6.854 9.854a.5.5 0 0 1-.708-.708L7.293 8 6.146 6.854a.5.5 0 0 1 0-.708z"/>
  <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
  <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
</svg><br> DESATIVAR SUBCATEGORIA
</button>

<!-- Modal -->
<div class="modal fade" id="desativa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="deletar-setor">
                <form enctype="multipart/form-data" action="" method="POST">  
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-a94b4485-4eb5-4f06-be95-a4c7cfb570bc" id="dom-a94b4485-4eb5-4f06-be95-a4c7cfb570bc">
                <label class="form-label" for="card-password">Deletar Setor</label>
                <div class="form-floating">
                    <select class="form-select" name="del_prioridade" id="floatingSelect" aria-label="Floating label select example">
                      <option value= "" selected="">Selecione subcategoria</option>
                     
                        <?php 
                     

                        while($SubAT = $result_sub->fetch_array()){?>
                        <option value="<?php echo ($SubAT['id_subcategoria'])?>" ><?php echo ($SubAT['nome_sub'])?></option>

                        <?php }?>
                    </select>
                  </div>
                </div>
                <?php
                if (isset($_POST["del"])) {
                $res = $_POST['del_prioridade'];
                $sql = $con_chamados->query(" UPDATE sub_categoria SET ativo = '0' WHERE sub_categoria.id_subcategoria ='$res' ");
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";}else{}?>
                 <!-- FIM DA DIV -->
        </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input class="btn-dll-setor" type="submit" value="Desativar" name="del">
      </div></form>
    </div>
  </div>
</div>

<!-- FIM DELETA SELECIONADA -->

 <!-- FAZ A RESTAURAÇÃO  -->

<!-- Button trigger modal -->
<button type="button" class="btn-abre-forms" data-bs-toggle="modal" data-bs-target="#res">
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
  <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z"/>
</svg><br> RESTAURAR UM SETOR DESATIVADO
</button>

<!-- Modal -->
<div class="modal fade" id="res" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="restaura-setor">
                <form enctype="multipart/form-data" action="" method="POST">  
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-a94b4485-4eb5-4f06-be95-a4c7cfb570bc" id="dom-a94b4485-4eb5-4f06-be95-a4c7cfb570bc">
                <label class="form-label" for="card-password">Restaurar subcategoria </label>
                <div class="form-floating">                 
                    <select class="form-select" name="del_prioridade" id="floatingSelect" aria-label="Floating label select example">
                      <option value= "" selected="">Selecione subcategoria</option>
                      <?php 
                      //busca subcategoria desativada
                      $busca_sub_de = "SELECT * FROM sub_categoria WHERE ativo = '0' AND vinculo_setor = '$Setor_user'";
                      $result_sub_de = $con_chamados->query($busca_sub_de) or die ($con_chamados->error);
                      while($Sub_de = $result_sub_de->fetch_array()){?>
                      <option value="<?php echo ($Sub_de['id_subcategoria'])?>" ><?php echo ($Sub_de['nome_sub'])?></option>
                      <?php }?>
                    </select>
                  </div>
                </div>
                <?php
                if (isset($_POST["del1"])) {
                $res = $_POST['del_prioridade']; 
                $sql = $con_chamados->query(" UPDATE sub_categoria SET ativo = '1' WHERE sub_categoria.id_subcategoria ='$res' ");
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";}?>
                <!-- FIM DA DIV -->
                </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input class="btn-RES-setor" type="submit" value="Restaurar" name="del1">
      </div> </form>
    </div>
  </div>
</div>
  <!-- FIM FAZ A RESTAURAÇÃO  -->     
    </div>
    </div>
</main>
</div>
</body>
</html>
