<?php 
if ($IDnivel == '8'){  
      // consulta setor 
      $consulta_setor = "SELECT * FROM setor WHERE ativo = '1' AND IDsetor = '$Setor_user' ";
      $con4 = $con_chamados->query($consulta_setor ) or die($con_chamados->error);
      //consulta o nome de vinculo do setor da categoria 
      $consulta_cat = "SELECT * FROM categoria_incidente WHERE ativo = '1' AND vinculo_setor = '$Setor_user' ";
      $con1 = $con_chamados->query($consulta_cat ) or die($con_chamados->error);
      //desativados
      $consulta_de= "SELECT * FROM categoria_incidente WHERE ativo = '0' AND vinculo_setor = '$Setor_user' ";
      $con2 = $con_chamados->query($consulta_de ) or die($con_chamados->error);
      }

      if ($NivelGe == '0800'){ 
              // consulta setor 
      $consulta_setor = "SELECT * FROM setor WHERE ativo = '1' ";
      $con4 = $con_chamados->query($consulta_setor ) or die($con_chamados->error);
      //consulta o nome de vinculo do setor da categoria 
      $consulta_cat = "SELECT * FROM categoria_incidente WHERE ativo = '1' ";
      $con1 = $con_chamados->query($consulta_cat ) or die($con_chamados->error);
      //desativados
      $consulta_de= "SELECT * FROM categoria_incidente WHERE ativo = '0' ";
      $con2 = $con_chamados->query($consulta_de ) or die($con_chamados->error);

      }
      ?>