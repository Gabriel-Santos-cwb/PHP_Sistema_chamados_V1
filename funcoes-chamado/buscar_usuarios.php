<?php
// buscar_usuarios.php

include_once("../../ADM-intra/conexao-intra/conexao-intra.php");

if (isset($_GET['setorId'])) {
    $setorId  = $_GET['setorId'];

    $usuarios_buscar = "SELECT * FROM login WHERE Setor_user = '$setorId'";
    $usuarios_result = $con_intra->query($usuarios_buscar) or die ($con_intra->error);
    

    $options = "";
    while ($re_busca_login = $usuarios_result->fetch_array()) {
       
        $options .= "<option value='" . $re_busca_login['id_login'] . "' " . $selected . ">" .$re_busca_login['Login_user'] . "</option>";
    }

    echo $options;
}

?>