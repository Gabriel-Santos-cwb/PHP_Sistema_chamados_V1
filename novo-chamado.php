<?php
include('./menu-chamados.php');

$busca_setores = "SELECT * FROM setor WHERE ativo ='1' AND IDsetor != '1' ";
$result_setores = $con_chamados->query($busca_setores) or die ($con_chamados->error);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Inicio</title>
    <link rel="icon" href="./Home/Imagens/icone.png" />
    <script src="./funcoes-chamado/pagina.js"></script>
    <script src="./funcoes-chamado/novo-chamado.js"></script>
    <link rel="stylesheet" type="text/css" href="./CSS/body.css" />
    <link rel="stylesheet" type="text/css" href="./CSS/novo-chamado.css" />
</head>
<body onload="buscar()">
    <div class="conteudos-chamados" id="conteudos">
        <div class="titulo-chamados">
            <h1>Novo chamado</h1>
        </div>
        <main>
            <div class="painel-inicial">
                <main><br>
                <form enctype="multipart/form-data" action="./funcoes-chamado/processa_chamado.php" method="POST" class="">
                    <div class="formulario-novo-chamado">

                        <div class="form-group">
                        <select name="seleciona_setor" id="seleciona_setor" onchange="buscarCategorias()"  class="form-select" >
                            <option value="">Selecione Setor</option>
                            <?php 
                            while($setor = $result_setores->fetch_array()){
                            ?>
                            <option value="<?php echo  ($setor['IDsetor']) ?>"><?php echo  ($setor['nome_setor']) ?></option>
                            <?php }?>
                        </select><br>
                
                        </div>

                        <label for="exampleFormControlInput1">Categorias:</label>
                        <select name="seleciona_categoria" id="seleciona_categoria" onchange="buscarSubCategorias()" class="form-select" multiple aria-label="Multiple select example">
                            <option selected=""></option>
                        </select>

                        <label for="exampleFormControlInput1">SubCategorias:</label>
                        <select name="seleciona_Subcategoria" id="seleciona_Subcategoria" onchange="buscar()" class="form-select" multiple aria-label="Multiple select example"></select>
                            <option selected=""></option>
                       
                            <label for="exampleFormControlInput1">Ação:</label>
                        <select  name="seleciona_acao" id="seleciona_acao" class="form-select" multiple aria-label="Multiple select example">
                            <option selected=""></option>
                        </select>
                              
                        
                                <div class="mb-3">
                         <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                            <input class="form-control" type="file" id="formFileMultiple" multiple>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Enviar</button>
                        </div>
                        
                        <div class="div-lateral">
                                <label class="sr-only" for="inlineFormInputName2">Conte mais sobre sua demanda</label>
                                <textarea cols="40" rows="6" class="form-control" id="descricao" name="descricao"></textarea>

                                <div> 

                                    <h1>
                                        Formularios - caso tenha
                                    </h1>
                                </div>
                                </div>

                    </form>
                     
                </main>
            </div>
        </main>
    </div>

</body>
</html>

