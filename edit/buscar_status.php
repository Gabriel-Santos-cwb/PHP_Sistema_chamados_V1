<?php
// buscar_status.php

include_once("../conexao-chamados/conexao-chamados.php");

if (isset($_GET['sta'])) {
    $Acao_selecionada = $_GET['sta'];

    $busca_acao = "SELECT * FROM status WHERE ID_status = '$Acao_selecionada'";
    $result_acao = $con_chamados->query($busca_acao) or die ($con_chamados->error);

    $options = "";
    while ($acao = $result_acao->fetch_array()) {
       
        $options .=  $acao['coluna3'];
       
        //$options .= "<option value='" . $acao['ID_status'] . "' " . $selected . ">" . $acao['ID_status'] . "</option>";
    }

    echo $options;
}

?>