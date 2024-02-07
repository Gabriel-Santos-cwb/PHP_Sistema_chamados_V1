


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

        $consulta_prioridade = "SELECT * FROM cidades WHERE ativo = '1'  ";
        $con4 = $con_chamados->query($consulta_prioridade ) or die($con_chamados->error);

        $consulta_prioridade1 = "SELECT * FROM cidades WHERE ativo = '0' ";
        $con5 = $con_chamados->query($consulta_prioridade1 ) or die($con_chamados->error);

        ?>
<body>

<div class="conteudos-chamados" id="conteudos">
<div class="titulo-chamados">
        <h1>Adicionar/Deletar cidades: ?</h1>
    </div>
    <main>
  <div class="painel-inicial">
<main>

<?php

if ($NivelGe == '0800') {?>

<div class="organiza-btn"> 
<!-- ADICIONA NOVA CIDADE -->

<!-- Button trigger modal -->
<button type="button" class="btn-abre-forms" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
  <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
</svg><br> ADICIONA NOVA CIDADE
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="adicionar-setor"> 
<form enctype="multipart/form-data" action="" method="POST">    
    <div class="card-body bg-light">
      <div class="tab-content">
      <label class="form-label" for="card-password">Adicionar Nova cidade</label>
        </div>
        <input class="form-control" id="prioridade_n" name="prioridade_n" type="text" required>
        <label class="form-label" for="card-password">UF</label>
        <input class="form-control" id="prioridade_n1" name="prioridade_n1" type="text" required>
        </div>
        
    <?php
    if (isset($_POST["submit"])) {
    $res = $_POST['prioridade_n'];
    $res1 = $_POST['prioridade_n1'];
    $sql = $con_chamados->query("INSERT INTO cidades SET ativo = '1' , nome_cidade= '$res' , UF= '$res1'");
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";}else{}?>
     <!-- FIM DA DIV -->
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <input class="btn-add-setor" type="submit" value="ADICIONAR" name="submit">
    
      </div></form>
    </div>
  </div>
</div>

<!-- FIM ADICIONA NOVA -->

<!-- DELETA A CIDADE SELECIONADA -->

<!-- Button trigger modal -->
<button type="button" class="btn-abre-forms" data-bs-toggle="modal" data-bs-target="#desativa">
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg><br> DESATIVAR UMA CIDADE
</button>

<!-- Modal -->
<div class="modal fade" id="desativa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="deletar-setor">
                <form enctype="multipart/form-data" action="" method="POST">  
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-a94b4485-4eb5-4f06-be95-a4c7cfb570bc" id="dom-a94b4485-4eb5-4f06-be95-a4c7cfb570bc">
                <label class="form-label" for="card-password">Deletar cidade</label>
                <div class="form-floating">
                    <select class="form-select" name="del_prioridade" id="floatingSelect" aria-label="Floating label select example">
                      <option value= "" selected="">Selecione a cidade</option>
                     
                      <?php while($dado = $con4->fetch_array()) { ?>
                                 <option value="<?php echo ($dado['id_cidade']) ?>"><?php echo ($dado['nome_cidade']); ?> - <?php echo ($dado['UF']); ?> <td></td>
                                 </option>
                                 <?php } ?>
                    </select>
                  
                  </div>
                  
                </div>
                
                <?php
                if (isset($_POST["del"])) {
                    echo "<div style='font size: 120px; height: 500px;>' ijeijeiofjeoifjeiof</di>";
                $res = $_POST['del_prioridade'];
                $sql = $con_chamados->query(" UPDATE cidades SET ativo = '0' WHERE cidades.id_cidade ='$res' ");
                        echo $res;
                       
               
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";}else{}?>
                 <!-- FIM DA DIV -->
        </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <input class="btn-dll-setor" type="submit" value="Desativar" name="del">
      </div></form>
    </div>
  </div>
</div>
   <!-- FIM DELETA A CIDADE SELECIONADA -->

<!--  FAZ A RESTAURAÇÃO DA CIDADE-->

 <!-- Button trigger modal -->
<button type="button" class="btn-abre-forms" data-bs-toggle="modal" data-bs-target="#rest">
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
  <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z"/>
</svg><br> RESTAURAR UMA CIDADE DESATIVADA
</button>

<!-- Modal -->
<div class="modal fade" id="rest" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="restaura-setor">
                <form enctype="multipart/form-data" action="" method="POST">  
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-a94b4485-4eb5-4f06-be95-a4c7cfb570bc" id="dom-a94b4485-4eb5-4f06-be95-a4c7cfb570bc">
                <label class="form-label" for="card-password">Restaurar Setor</label>
                <div class="form-floating">                 
                    <select class="form-select" name="del_prioridade" id="floatingSelect" aria-label="Floating label select example">
                      <option value= "" selected="">Selecione a cidade</option>
                      <?php while($dado1 = $con5->fetch_array()) { ?>
                                 <option value="<?php echo ($dado1['id_cidade']) ?>"><?php echo ($dado1['nome_cidade']); ?> - <?php echo ($dado1['UF']); ?> <td></td>
                                 </option>
                                 <?php } ?>
                    </select>
                    
                  </div>
                  
                </div>
                
                <?php
                if (isset($_POST["del1"])) {
                $res = $_POST['del_prioridade']; 
                $sql = $con_chamados->query(" UPDATE cidades SET ativo = '1' WHERE cidades.id_cidade ='$res' ");
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";}?>
                <!-- FIM DA DIV -->
                </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <input class="btn-RES-setor" type="submit" value="Restaurar" name="del1">
      </div></form>
    </div>
  </div>
</div>    
<?php 
}else {
  echo "Você não pode Administrar essa pagina";
}

  ?>
 <!-- FIM FAZ A RESTAURAÇÃO DA CIDADE -->

 
    </div>
    </div>
</main>
</div>
</body>
</html>
