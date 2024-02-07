<?php  




            $iden = isset($_GET['id'])?$_GET['id']:"";
            $iden = $_GET['id'];
            
            //Busca detalhes chamado 

            $busca_detalhes_chamado = "SELECT * FROM chamados WHERE IDchamados = '$iden'";
            $result = $con_chamados->query($busca_detalhes_chamado) or die ($con_chamados->error);
            $Busca_chamados = "SELECT chamados.*, categoria_incidente.nome_cat, sub_categoria.nome_sub, acao_subcategoria.nome_acao, acao_subcategoria.id_sla, sla_chamados.tempo, setor.nome_setor, sla_chamados.id_calendario, calendarios.diasTrabalho, calendarios.horarioInicio, calendarios.horarioFim, status.titulo, intranet.login.nomeCompleto FROM chamados INNER JOIN categoria_incidente ON chamados.IDcategoria = categoria_incidente.id_categoria INNER JOIN sub_categoria ON chamados.IDSubCategoria = sub_categoria.id_subcategoria INNER JOIN acao_subcategoria ON chamados.IDacao = acao_subcategoria.id_acao INNER JOIN setor ON chamados.IDsetor = setor.idsetor INNER JOIN status ON chamados.IDstatus = status.ID_status INNER JOIN intranet.login ON chamados.IDatendente = intranet.login.id_login INNER JOIN sla_chamados ON acao_subcategoria.id_sla = sla_chamados.id_sla INNER JOIN calendarios ON sla_chamados.id_calendario = calendarios.id_calendario WHERE chamados.IDchamados = '$iden';";
$result_chamados = $con_chamados->query($Busca_chamados) or die ($con_chamados->error);

while($chamados = $result_chamados->fetch_array()){
    $id_chamado = $chamados['IDchamados'];
    $IDstatus = $chamados['IDstatus'];
    $id_categoria = $chamados['IDcategoria'];
    $id_acao = $chamados['IDacao'];
    $email_user = $chamados['email_user'];
    $id_login_chamado = $chamados['IDlogin_user'];
    $result_nome = $chamados['nome_user'];
    $result_descricao = $chamados['descricao'];
    $dataAB = $chamados['data_abertura'];
    $nome_cat = $chamados['nome_cat'];
    $nome_sub = $chamados['nome_sub'];
    $nome_acao = $chamados['nome_acao'];
    $nome_setor = $chamados['nome_setor'];
    $nome_login = $chamados['nome_user'];
    $nome_com = $chamados['nome_completo'];
    $descricao = $chamados['descricao'];
    $tpm_sla = $chamados['tempo'];
    $status = $chamados['titulo'];
    $atendente = $chamados['IDatendente'];
    $nome_atendente = $chamados['nomeCompleto'];
    $Loginate = $chamados['Loginate'];
    $Fechamento = $chamados['data_abertura_fechamento'];

    if($status == '0'){
        $status = "NOVO";
    }
    
    if ($atendente == '0'){
        $atendente ="Sem atendente";
    }}
        
    //BUSCA interações 

    $busca_interacao_chamado = "SELECT * FROM respostas WHERE IDchamado = '$iden' ORDER BY IDresposta DESC ";
    $result_interacao = $con_chamados->query($busca_interacao_chamado) or die ($con_chamados->error);


// Busca info user
include ("../../ADM-intra/conexao-intra/conexao-intra.php");
$user_info = "SELECT login.*, `chamados-intranet`.setor.nome_setor
    FROM login
    INNER JOIN `chamados-intranet`.setor ON login.Setor_user = `chamados-intranet`.setor.IDsetor
    WHERE login.id_login = '$id_login_chamado'";

$user_info_result = $con_intra->query($user_info) or die ($con_intra->error);

while ($info_user = $user_info_result->fetch_array()){
$nome_info = $info_user['nomeCompleto'];
$login_info = $info_user['Login_user'];
$email_info = $info_user['email'];
$setor_info = $info_user['nome_setor'];
}





// Valores do banco de dados
$datadeabertura = $dataAB;

// Converter a data de abertura em um timestamp
$timestamp_abertura = strtotime($datadeabertura);

// Converter o tempo de SLA em segundos
$tpm_sla_segundos = strtotime($tpm_sla) - strtotime('TODAY');

// Calcular o tempo restante em segundos
$tempo_restante = $timestamp_abertura + $tpm_sla_segundos - time();

// Converter o tempo restante em horas, minutos e segundos
$horas1 = floor($tempo_restante / 3600);
$minutos1 = floor(($tempo_restante % 3600) / 60);
$segundos1 = $tempo_restante % 60;


// Verificar se o prazo já passou ou está vencendo
if ($horas <= 0 & $IDstatus != '3' & $IDstatus != '4' & $IDstatus != '5' & $IDstatus != '6') {
  $prazo = "O prazo de resolução já passou";
  $vencido  = "Vencido: $horas1 horas, $minutos1 minutos, $segundos1 segundos.";
 
} 

else {
    $prazo = "Tempo restante para o encerramento do prazo: $horas1 horas, $minutos1 minutos";
   

}

    ?>