<?php
// buscar_Subcategorias.php

include_once("../conexao-chamados/conexao-chamados.php");

if (isset($_GET['acao'])) {
    $Acao_selecionada = $_GET['acao'];

    $busca_acao = "SELECT * FROM acao_subcategoria WHERE id_subcategoria = '$Acao_selecionada'";
    $result_acao = $con_chamados->query($busca_acao) or die ($con_chamados->error);

    $options = "";
    while ($acao = $result_acao->fetch_array()) {
       
        $options .= "<option value='" . $acao['id_acao'] . "' " . $selected . ">" . $acao['nome_acao'] . "</option>";
    }

    echo $options;
}

?>

