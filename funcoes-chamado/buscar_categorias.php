<?php
// buscar_categorias.php

include_once("../conexao-chamados/conexao-chamados.php");

if (isset($_GET['setor'])) {
    $setorSelecionado = $_GET['setor'];

    $busca_categorias = "SELECT * FROM categoria_incidente WHERE id_setor = '$setorSelecionado'";
    $result_categoria = $con_chamados->query($busca_categorias) or die ($con_chamados->error);

    $options = "";
    while ($categoria = $result_categoria->fetch_array()) {
      
        $options .= "<option value='" . $categoria['id_categoria'] . "' " . $selected . ">" . $categoria['nome_cat'] . "</option>";
    }
    

    echo $options;
}
?>

