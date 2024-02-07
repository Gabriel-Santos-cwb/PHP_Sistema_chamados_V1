<?php 
if ($IDnivel == '8'){    

//Busca sub-categorias 
$busca_subcat = "SELECT sub_categoria.*, setor.nome_setor, categoria_incidente.nome_cat FROM sub_categoria 
INNER JOIN setor ON sub_categoria.vinculo_setor = setor.IDsetor 
INNER JOIN categoria_incidente ON sub_categoria.id_categoria = categoria_incidente.id_categoria 
WHERE sub_categoria.vinculo_setor = '$Setor_user' AND sub_categoria.ativo = '1'; ";
$result_sub = $con_chamados->query($busca_subcat) or die ($con_chamados->error);
// consulta categoria
$consulta_cat = "SELECT * FROM categoria_incidente WHERE ativo = '1' AND vinculo_setor = '$Setor_user'";
$con1 = $con_chamados->query($consulta_cat ) or die($con_chamados->error);
//busca SLA
$busca_sla = "SELECT * FROM sla_chamados WHERE ativo ='1' AND vinculo_setor = '$Setor_user' ";
$result_sla = $con_chamados->query($busca_sla) or die ($con_chamados->error);
//Busca Prioridade 
$busca_prio = "SELECT * FROM prioridade WHERE ativo ='1' AND vinculo_setor = '$Setor_user'";
$result_prio = $con_chamados->query($busca_prio) or die ($con_chamados->error);
//Busca ação ativas do setor 
$busca_acao = "SELECT acao_subcategoria.*, categoria_incidente.nome_cat, setor.nome_setor, sub_categoria.nome_sub FROM acao_subcategoria 
INNER JOIN categoria_incidente ON acao_subcategoria.id_subcategoria = categoria_incidente. id_categoria 
INNER JOIN setor ON acao_subcategoria.Setor_id = setor.IDsetor INNER JOIN sub_categoria ON categoria_incidente.id_categoria = sub_categoria.id_subcategoria 
WHERE acao_subcategoria.ativo = '1' AND Setor_id = '$Setor_user'; 
";
$result_acao = $con_chamados->query($busca_acao) or die ($con_chamados->error);
//Busca ação desativadas do setor 
$busca_acao_desativada = "SELECT acao_subcategoria.*, categoria_incidente.nome_cat, setor.nome_setor, sub_categoria.nome_sub FROM acao_subcategoria 
INNER JOIN categoria_incidente ON acao_subcategoria.id_subcategoria = categoria_incidente. id_categoria 
INNER JOIN setor ON acao_subcategoria.Setor_id = setor.IDsetor INNER JOIN sub_categoria ON categoria_incidente.id_categoria = sub_categoria.id_subcategoria 
WHERE acao_subcategoria.ativo = '0' AND Setor_id = '$Setor_user'; 
";
$result_acao_desativada = $con_chamados->query($busca_acao_desativada) or die ($con_chamados->error);
}

if ($NivelGe == '0800'){ 
//Busca sub-categorias 
$busca_subcat = "SELECT sub_categoria.*, setor.nome_setor, categoria_incidente.nome_cat FROM sub_categoria 
INNER JOIN setor ON sub_categoria.vinculo_setor = setor.IDsetor 
INNER JOIN categoria_incidente ON sub_categoria.id_categoria = categoria_incidente.id_categoria 
WHERE sub_categoria.ativo = '1';";
$result_sub = $con_chamados->query($busca_subcat) or die ($con_chamados->error);

// consulta categoria
$consulta_cat = "SELECT * FROM categoria_incidente WHERE ativo = '1' ";
$con1 = $con_chamados->query($consulta_cat ) or die($con_chamados->error);
//busca SLA
$busca_sla = "SELECT * FROM sla_chamados WHERE ativo ='1' ";
$result_sla = $con_chamados->query($busca_sla) or die ($con_chamados->error);
//Busca Prioridade 
$busca_prio = "SELECT * FROM prioridade WHERE ativo ='1' ";
$result_prio = $con_chamados->query($busca_prio) or die ($con_chamados->error);
//Busca ação ativas do setor 
$busca_acao = "SELECT acao_subcategoria.*, categoria_incidente.nome_cat, setor.nome_setor, sub_categoria.nome_sub FROM acao_subcategoria 
INNER JOIN categoria_incidente ON acao_subcategoria.id_subcategoria = categoria_incidente. id_categoria 
INNER JOIN setor ON acao_subcategoria.Setor_id = setor.IDsetor 
INNER JOIN sub_categoria ON categoria_incidente.id_categoria = sub_categoria.id_subcategoria 
WHERE acao_subcategoria.ativo = '1';
";
$result_acao = $con_chamados->query($busca_acao) or die ($con_chamados->error);
//Busca ação desativadas do setor 
$busca_acao_desativada = "SELECT acao_subcategoria.*, categoria_incidente.nome_cat, setor.nome_setor, sub_categoria.nome_sub FROM acao_subcategoria 
INNER JOIN categoria_incidente ON acao_subcategoria.id_subcategoria = categoria_incidente. id_categoria 
INNER JOIN setor ON acao_subcategoria.Setor_id = setor.IDsetor INNER JOIN sub_categoria ON categoria_incidente.id_categoria = sub_categoria.id_subcategoria 
WHERE acao_subcategoria.ativo = '0';
";
$result_acao_desativada = $con_chamados->query($busca_acao_desativada) or die ($con_chamados->error);
}
?>

