<!-- DEV GABRIEL SANTOS-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Inicio</title>
        <link rel="icon" href="./Home/Imagens/icone.png" /><!-- ICONE DA PAGINA-->
        <link rel="stylesheet" type="text/css" href="../CSS/edit.css" />
        <link rel="stylesheet" type="text/css" href="../CSS/menu-chamados.css" />
        <script src="../funcoes-chamado/pagina.js"></script>
        <link href="../../bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="../../bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="../funcoes-chamado//pagina.js"></script>
        <?php 

        include(__DIR__.'/../menu-chamados.php');
        include('../funcoes-chamado/permissoes.php');
        include('../Comandos-SQL/sql_prioridade.php');
        ?>
<body>


<div class="conteudos-chamados" id="conteudos">
<div class="titulo-chamados">
        <h1>Adicionar/Deletar uma prioridade Setor: ?</h1>
    </div>
    <main>

<div>
  <div class="painel-inicial">
    <div class="formualrio-edit-prioridade">

        <!-- ADICIONA NOVA PRIORIDADE -->

    <form enctype="multipart/form-data" action="" method="POST">   
  <div class="form-row align-items-center">
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup">Adicionar nova Prioridade</label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
             <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
            </svg></div>
            </div>
            <input style="width: 90%;" type="text" class="form-control" id="prioridade_n" name="prioridade_n" placeholder="Adicione uma nova prioridade">
            </div>
            </div> 
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
        <div class="col-auto">
        <button type="submit" name="submit" class="btn btn-primary mb-2">Adicionar</button>
        </div>
        </div>
    </form>
    <?php
if (isset($_POST["submit"])) {


    if ($NivelGe == '0800'){ 
      $Setor_user = $_POST['setor_vin'];
  }
  
  $res = $_POST['prioridade_n'];
  $sql = $con_chamados->query("INSERT INTO prioridade SET nome_prioridade= '$res', ativo = '1', vinculo_setor = '$Setor_user' ");
 
  echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
}else{

}
?>
<div class="divisao">
   
</div>
<br><br><br><br>
<!-- DELETA A PRIORIDADE SELECIONADA -->

<form enctype="multipart/form-data" action="" method="POST">   
  <div class="form-row align-items-center">
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup">Deletar uma prioridade</label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
        </svg></div>
            </div>
            <select name="del_prioridade" id="floatingSelect" class="form-control" id="inlineFormCustomSelectPref">
            <option selected>Selecione uma opção</option>
            <?php while($dado = $con4->fetch_array()) { ?>
                <option value="<?php echo ($dado['IDprioridade']) ?>"><?php echo ($dado['nome_prioridade']); ?> <td></td>
                </option>
                <?php } ?>   
            </select>
            </div>
            </div> 
        <div class="col-auto">
        <button type="submit" name="del" class="btn btn-primary mb-2">Deletar</button>
        </div>
        </div>
    </form>
    <?php
if (isset($_POST["del"])) {
  $res = $_POST['del_prioridade'];
  $sql = $con_chamados->query("DELETE FROM prioridade WHERE IDprioridade= '$res' ");
 
  echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
}else{
     
  }?>
    </div> 
            <!--Fim da terciera DIV-->
        </div>
    </div>
    </main>
</div>
</body>
</html>
