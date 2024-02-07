<?php

if ($IDnivel == '8'){  
    $consulta_prioridade = "SELECT * FROM prioridade  WHERE ativo = '1' AND vinculo_setor = '$Setor_user'";
    $con4 = $con_chamados->query($consulta_prioridade ) or die($con_chamados->error);
    }
    if ($NivelGe == '0800'){ 
      $consulta_prioridade = "SELECT * FROM prioridade  WHERE ativo = '1' ";
      $con4 = $con_chamados->query($consulta_prioridade ) or die($con_chamados->error);
    }

    ?>