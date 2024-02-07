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
        $consulta_cidade = "SELECT * FROM cidades WHERE ativo = '1'"; 
        $con_cidade =$con_chamados->query($consulta_cidade) or die ($con_chamados->error);
        $consulta_prioridade = "SELECT * FROM setor WHERE ativo = '1' ";
        $con4 = $con_chamados->query($consulta_prioridade ) or die($con_chamados->error);
        $consulta_prioridade1 = "SELECT * FROM setor WHERE ativo = '0' ";
        $con5 = $con_chamados->query($consulta_prioridade1 ) or die($con_chamados->error);
?>
<body>

<div class="conteudos-chamados" id="conteudos">
<div class="titulo-chamados">
        <h1>Adicionar/Deletar Setor: ?</h1>
    </div>
    <main>
  <div class="painel-inicial">
<main>

<div class="organiza-btn"> 
<!-- ADICIONA NOVA -->

<!-- Button trigger modal -->
<button type="button" class="btn-abre-forms" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-house-add-fill" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 1 1-1 0v-1h-1a.5.5 0 1 1 0-1h1v-1a.5.5 0 0 1 1 0Z"/>
  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
  <path d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
</svg><br> ADICIONA NOVO SETOR
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="adicionar-setor"> 
<form enctype="multipart/form-data" action="" method="POST">    
    <div class="card-body bg-light">
      <div class="tab-content">
      <label class="form-label" for="card-password">Adicionar Novo Setor</label>
        </div>
        <input class="form-control" id="prioridade_n" name="prioridade_n" type="text" required>
        <label class="form-label" for="card-password">Cidade</label>
        <select class="form-select" id="prioridade_n1" name="prioridade_n1" aria-label="Floating label select example">
                      <option value= "" selected="">Selecione</option>
                      <?php while($dado3 = $con_cidade->fetch_array()) { ?>
                                 <option value="<?php echo ($dado3['id_cidade']) ?>"><?php echo ($dado3['nome_cidade']); ?> - <?php echo ($dado3['UF']); ?> <td></td>
                                 </option>
                                 <?php } ?>
                    </select>
        </div>
    <?php
    if (isset($_POST["submit"])) {
    $res = $_POST['prioridade_n'];
    $res1 = $_POST['prioridade_n1'];
    $sql = $con_chamados->query("INSERT INTO setor SET ativo = '1' , nome_setor= '$res' , cidade_setor= '$res1'");
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";}else{}?>
     <!-- FIM DA DIV -->
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <input class="btn-add-setor" type="submit" value="ADICIONAR" name="submit">
      </div></form>
    </div>
  </div>
</div>

 <!-- FIM ADIONAR -->

<?php 

if ($NivelGe == '0800') {?>


<!-- DELETA SELECIONADA -->

<!-- Button trigger modal -->
<button type="button" class="btn-abre-forms" data-bs-toggle="modal" data-bs-target="#dell">
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-house-dash-fill" viewBox="0 0 16 16">
  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
  <path d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7ZM11 12h3a.5.5 0 0 1 0 1h-3a.5.5 0 1 1 0-1Z"/>
</svg><br> DELETAR UM SETOR
</button>

<!-- Modal -->
<div class="modal fade" id="dell" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="deletar-setor">
                <form enctype="multipart/form-data" action="" method="POST">  
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-a94b4485-4eb5-4f06-be95-a4c7cfb570bc" id="dom-a94b4485-4eb5-4f06-be95-a4c7cfb570bc">
                <label class="form-label" for="card-password">Deletar Setor</label>
                <div class="form-floating">
                    <select class="form-select" name="del_prioridade" id="floatingSelect" aria-label="Floating label select example">
                      <option value= "" selected="">Selecione o Setor</option>
                      <?php while($dado = $con4->fetch_array()) { 
                          $id_cidade = $dado['cidade_setor'];
                          $busca_nome = "SELECT * FROM cidades WHERE id_cidade = $id_cidade";
                          $result = $con_chamados->query($busca_nome) or die($con_chamados->error);
                          while($traz_nome = $result->fetch_array()) { 
                            $nome_ci = $traz_nome ['nome_cidade'];
                            $UF_ci = $traz_nome ['UF'];
                                ?>
                                 <option value="<?php echo ($dado['IDsetor']) ?>"><?php echo ($dado['nome_setor']); ?> - <?php echo  $nome_ci; ?> - <?php echo $UF_ci ?> <td></td>
                                 </option>
                                 <?php 
                                 }}
                                 ?>
                    </select>
                  </div>
                </div>
                <?php
                if (isset($_POST["del"])) {
                $res = $_POST['del_prioridade'];
                $sql = $con_chamados->query(" UPDATE setor SET ativo = '0' WHERE setor.IDsetor ='$res' ");
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

 <!-- FIM DELETAR SETOR -->

      
 <!-- FAZ A RESTAURAÇÃO DO SETOR -->

 <!-- Button trigger modal -->
<button type="button" class="btn-abre-forms" data-bs-toggle="modal" data-bs-target="#ress">
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-house-up-fill" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.354-5.854 1.5 1.5a.5.5 0 0 1-.708.708L13 11.707V14.5a.5.5 0 1 1-1 0v-2.793l-.646.647a.5.5 0 0 1-.708-.707l1.5-1.5a.5.5 0 0 1 .708 0Z"/>
  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
  <path d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
</svg><br> RESTAURAR UM SETOR DESATIVADO
</button>

<!-- Modal -->
<div class="modal fade" id="ress" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="restaura-setor">
                <form enctype="multipart/form-data" action="" method="POST">  
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-a94b4485-4eb5-4f06-be95-a4c7cfb570bc" id="dom-a94b4485-4eb5-4f06-be95-a4c7cfb570bc">
                <label class="form-label" for="card-password">Restaurar Setor</label>
                <div class="form-floating">                 
                    <select class="form-select" name="del_prioridade" id="floatingSelect" aria-label="Floating label select example">
                      <option value= "" selected="">Selecione</option>
                      <?php while($dado1 = $con5->fetch_array()) { 
                            $id_cidade1 = $dado1['cidade_setor'];
                            $busca_nome1 = "SELECT * FROM cidades WHERE id_cidade = $id_cidade1";
                            $result1 = $con_chamados->query($busca_nome) or die($con_chamados->error);
                            while($traz_nome1 = $result1->fetch_array()) { 
                              $nome_ci1 = $traz_nome1 ['nome_cidade'];
                              $UF_ci1 = $traz_nome1 ['UF'];

                        ?>
                                 <option value="<?php echo ($dado1['IDsetor']) ?>"><?php echo ($dado1['nome_setor']); ?> - <?php echo $nome_ci1 ?> - <?php echo $UF_ci1?> <td></td>
                                 </option>
                                 <?php }} ?>
                    </select>
                  </div>
                </div>
                
                <?php
                if (isset($_POST["del1"])) {
                $res = $_POST['del_prioridade']; 
                $sql = $con_chamados->query(" UPDATE setor SET ativo = '1' WHERE setor.IDsetor ='$res' ");
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
<?php }?>
       <!-- FIM DO RESTURA SETOR -->   
       
    </div>
    </div>
</main>
</div>
</body>
</html>
