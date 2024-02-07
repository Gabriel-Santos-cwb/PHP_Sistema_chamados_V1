<?php
// buscar_Subcategorias.php

include_once("../conexao-chamados/conexao-chamados.php");

if (isset($_GET['categoria'])) {
    $categoriaSelecionado = $_GET['categoria'];

    $busca_categorias = "SELECT * FROM sub_categoria WHERE id_categoria = '$categoriaSelecionado'";
    $result_categoria = $con_chamados->query($busca_categorias) or die ($con_chamados->error);

    $options = "";
while ($categoria = $result_categoria->fetch_array()) {
    
    $options .= "<option value='" . $categoria['id_subcategoria'] . "' " . $selected . ">" . $categoria['nome_sub'] . "</option>";
}


    echo $options;
}
?>