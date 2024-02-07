<?php 
include('../funcoes-chamado/verifica-page.php');

if ($IDnivel != '8' && $NivelGe != '0800') {
    echo "Você não tem permissão para acessar essa página ";
    exit();
}
?>