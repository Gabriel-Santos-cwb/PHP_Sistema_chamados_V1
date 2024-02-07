<?php 
if ($IDnivel == '8'){ 
    //busca calendario
    $busca_calendarios = "SELECT calendarios.*, setor.nome_setor FROM calendarios 
    INNER JOIN setor ON calendarios.setor_id = setor.IDsetor 
    WHERE calendarios.ativo = '1' AND setor_id = '$Setor_user'
    ";
    $result_calendario = $con_chamados->query($busca_calendarios) or die ($con_chamados->error);
   
    //busca calendario desativados
    $busca_calendarios_de = "SELECT calendarios.*, setor.nome_setor FROM calendarios 
    INNER JOIN setor ON calendarios.setor_id = setor.IDsetor 
    WHERE calendarios.ativo = '0' AND setor_id = '$Setor_user'";
    $result_calendario_de = $con_chamados->query($busca_calendarios_de) or die ($con_chamados->error);
   }
   
   if ($NivelGe == '0800'){
    //busca calendario
    $busca_calendarios = "SELECT calendarios.*, setor.nome_setor FROM calendarios 
    INNER JOIN setor ON calendarios.setor_id = setor.IDsetor 
    WHERE calendarios.ativo = '1';
    ";
    $result_calendario = $con_chamados->query($busca_calendarios) or die ($con_chamados->error);
   
    //busca calendario desativados
    $busca_calendarios_de = "SELECT calendarios.*, setor.nome_setor FROM calendarios 
    INNER JOIN setor ON calendarios.setor_id = setor.IDsetor 
    WHERE calendarios.ativo = '0';
    ";
    $result_calendario_de = $con_chamados->query($busca_calendarios_de) or die ($con_chamados->error);
   }
   ?>