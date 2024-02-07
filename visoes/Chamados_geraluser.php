<!-- DEV GABRIEL SANTOS-->
<!DOCTYPE html>
<html>
    <head>
  <title>Tabela com Campo de Busca</title>
  <meta charset="UTF-8" />
        <title>Inicio</title>
        <link rel="icon" href="./Home/Imagens/icone.png" /><!-- ICONE DA PAGINA-->
        <link rel="stylesheet" type="text/css" href="../CSS/edit.css" />
        <script src="../funcoes-chamado/pagina.js"></script>
        <link rel="stylesheet" type="text/css" href="../CSS/menu-chamados.css" />
        <link href="../../bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="../../bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="../funcoes-chamado//pagina.js"></script>
        <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    
    th, td {
      text-align: left;
      padding: 8px;
    }
    
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    
    #searchInput {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
    }
  </style>
</head>
        <?php

            include(__DIR__.'/../menu-chamados.php');
            
            
        ?>
        <body>

        <div class="conteudos-chamados" id="conteudos">
                        <div class="titulo-chamados">
                            <h1>Painel Inicial Chamados Setor: ?</h1>
                        </div>
                        <main>



    <div class="painel-inicial">  
  <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Digite algo para buscar...">
  <table id="myTable">
    <tr>
      <th>N° Chamado</th>
      <th>Categoria</th>
      <th>Sub-categoria</th>
      <th>Ação</th>
      <th>Data-Abertura</th>
      <th>tempo para resolução</th>
      <th>tempo para resolução</th>
      <th>atendente</th>
      <th>Status</th>
      <th>Login Solicitante</th>
      <th>Nome Solicitante</th>
      <th>Setor Solicitante</th>
      <th>Descrição</th>
    </tr>
    <?php 


 
 if (isset($_GET['Filtro'])){


    $Filtro = isset($_GET['Filtro'])?$_GET['Filtro']:"";
    $Filtro = $_GET['Filtro'];


  


  // Busca chamados setor com filtro 
  $Busca_chamados = "SELECT chamados.*, categoria_incidente.nome_cat, sub_categoria.nome_sub, acao_subcategoria.nome_acao, acao_subcategoria.id_sla, sla_chamados.tempo, setor.nome_setor, sla_chamados.id_calendario, calendarios.diasTrabalho, calendarios.horarioInicio, calendarios.horarioFim, status.titulo 
  FROM chamados 
  INNER JOIN categoria_incidente ON chamados.IDcategoria = categoria_incidente.id_categoria 
  INNER JOIN sub_categoria ON chamados.IDSubCategoria = sub_categoria.id_subcategoria 
  INNER JOIN acao_subcategoria ON chamados.IDacao = acao_subcategoria.id_acao 
  INNER JOIN setor ON chamados.IDlogin_user = setor.idsetor 
  INNER JOIN status ON chamados.IDstatus = status.ID_status 
  INNER JOIN sla_chamados ON acao_subcategoria.id_sla = sla_chamados.id_sla 
  INNER JOIN calendarios ON sla_chamados.id_calendario = calendarios.id_calendario 
  WHERE chamados.IDlogin_user = '$IDLogin' AND IDstatus = '$Filtro' ORDER BY IDchamados ASC";



 }
 
 else {

  // Busca chamados setor com filtro 
$Busca_chamados = "SELECT chamados.*, categoria_incidente.nome_cat, sub_categoria.nome_sub, acao_subcategoria.nome_acao, acao_subcategoria.id_sla, sla_chamados.tempo, setor.nome_setor, sla_chamados.id_calendario, calendarios.diasTrabalho, calendarios.horarioInicio, calendarios.horarioFim, status.titulo 
FROM chamados 
INNER JOIN categoria_incidente ON chamados.IDcategoria = categoria_incidente.id_categoria 
INNER JOIN sub_categoria ON chamados.IDSubCategoria = sub_categoria.id_subcategoria 
INNER JOIN acao_subcategoria ON chamados.IDacao = acao_subcategoria.id_acao 
INNER JOIN setor ON chamados.IDlogin_user = setor.idsetor 
INNER JOIN status ON chamados.IDstatus = status.ID_status 
INNER JOIN sla_chamados ON acao_subcategoria.id_sla = sla_chamados.id_sla 
INNER JOIN calendarios ON sla_chamados.id_calendario = calendarios.id_calendario 
WHERE chamados.IDlogin_user = '$IDLogin' ORDER BY IDchamados ASC";



if (isset($_GET['Filtrosr'])){
  $Filtrosr = isset($_GET['Filtrosr'])?$_GET['Filtrosr']:"";
  $Filtrosr = $_GET['Filtrosr'];

    // Busca chamados setor com filtro 
    $Busca_chamados = "SELECT chamados.*, categoria_incidente.nome_cat, sub_categoria.nome_sub, acao_subcategoria.nome_acao, acao_subcategoria.id_sla, sla_chamados.tempo, setor.nome_setor, sla_chamados.id_calendario, calendarios.diasTrabalho, calendarios.horarioInicio, calendarios.horarioFim, status.titulo 
    FROM chamados 
    INNER JOIN categoria_incidente ON chamados.IDcategoria = categoria_incidente.id_categoria 
    INNER JOIN sub_categoria ON chamados.IDSubCategoria = sub_categoria.id_subcategoria 
    INNER JOIN acao_subcategoria ON chamados.IDacao = acao_subcategoria.id_acao 
    INNER JOIN setor ON chamados.IDlogin_user = setor.idsetor 
    INNER JOIN status ON chamados.IDstatus = status.ID_status 
    INNER JOIN sla_chamados ON acao_subcategoria.id_sla = sla_chamados.id_sla 
    INNER JOIN calendarios ON sla_chamados.id_calendario = calendarios.id_calendario 
    WHERE chamados.IDlogin_user = '$IDLogin' AND resolv = '1' ORDER BY IDchamados ASC";

}



if (isset($_GET['Filtr'])){
  $Filtr = isset($_GET['Filtr'])?$_GET['Filtr']:"";
  $Filtr = $_GET['Filtr'];

    // Busca chamados setor com filtro 
    $Busca_chamados = "SELECT chamados.*, categoria_incidente.nome_cat, sub_categoria.nome_sub, acao_subcategoria.nome_acao, acao_subcategoria.id_sla, sla_chamados.tempo, setor.nome_setor, sla_chamados.id_calendario, calendarios.diasTrabalho, calendarios.horarioInicio, calendarios.horarioFim, status.titulo 
    FROM chamados 
    INNER JOIN categoria_incidente ON chamados.IDcategoria = categoria_incidente.id_categoria 
    INNER JOIN sub_categoria ON chamados.IDSubCategoria = sub_categoria.id_subcategoria 
    INNER JOIN acao_subcategoria ON chamados.IDacao = acao_subcategoria.id_acao 
    INNER JOIN setor ON chamados.IDlogin_user = setor.idsetor 
    INNER JOIN status ON chamados.IDstatus = status.ID_status 
    INNER JOIN sla_chamados ON acao_subcategoria.id_sla = sla_chamados.id_sla 
    INNER JOIN calendarios ON sla_chamados.id_calendario = calendarios.id_calendario 
    WHERE chamados.IDlogin_user = '$IDLogin' AND resolv != '1' AND IDstatus != '1' ORDER BY IDchamados ASC";

}

if (isset($_GET['FiltroGeral'])){
  $FiltroGeral = isset($_GET['FiltroGeral'])?$_GET['FiltroGeral']:"";
  $FiltroGeral = $_GET['FiltroGeral'];

    // Busca chamados setor com filtro 
    $Busca_chamados = "SELECT chamados.*, categoria_incidente.nome_cat, sub_categoria.nome_sub, acao_subcategoria.nome_acao, acao_subcategoria.id_sla, sla_chamados.tempo, setor.nome_setor, sla_chamados.id_calendario, calendarios.diasTrabalho, calendarios.horarioInicio, calendarios.horarioFim, status.titulo 
    FROM chamados 
    INNER JOIN categoria_incidente ON chamados.IDcategoria = categoria_incidente.id_categoria 
    INNER JOIN sub_categoria ON chamados.IDSubCategoria = sub_categoria.id_subcategoria 
    INNER JOIN acao_subcategoria ON chamados.IDacao = acao_subcategoria.id_acao 
    INNER JOIN setor ON chamados.IDlogin_user = setor.idsetor 
    INNER JOIN status ON chamados.IDstatus = status.ID_status 
    INNER JOIN sla_chamados ON acao_subcategoria.id_sla = sla_chamados.id_sla 
    INNER JOIN calendarios ON sla_chamados.id_calendario = calendarios.id_calendario 
    WHERE chamados.IDsetor = '$Setor_user' AND resolv != '1' AND IDstatus != '1' AND IDstatus != '2' AND IDstatus != '3' AND IDstatus != '4' AND IDstatus != '5' AND IDstatus != '6' ORDER BY IDchamados ASC";

}


  
  if (isset($_GET['FiltroGeral'])){
    $FiltroGeral = isset($_GET['FiltroGeral'])?$_GET['FiltroGeral']:"";
    $FiltroGeral = $_GET['FiltroGeral'];
  
      // Busca chamados setor com filtro 
      $Busca_chamados = "SELECT chamados.*, categoria_incidente.nome_cat, sub_categoria.nome_sub, acao_subcategoria.nome_acao, acao_subcategoria.id_sla, sla_chamados.tempo, setor.nome_setor, sla_chamados.id_calendario, calendarios.diasTrabalho, calendarios.horarioInicio, calendarios.horarioFim, status.titulo 
      FROM chamados 
      INNER JOIN categoria_incidente ON chamados.IDcategoria = categoria_incidente.id_categoria 
      INNER JOIN sub_categoria ON chamados.IDSubCategoria = sub_categoria.id_subcategoria 
      INNER JOIN acao_subcategoria ON chamados.IDacao = acao_subcategoria.id_acao 
      INNER JOIN setor ON chamados.IDlogin_user = setor.idsetor 
      INNER JOIN status ON chamados.IDstatus = status.ID_status 
      INNER JOIN sla_chamados ON acao_subcategoria.id_sla = sla_chamados.id_sla 
      INNER JOIN calendarios ON sla_chamados.id_calendario = calendarios.id_calendario 
      WHERE chamados.IDlogin_user = '$IDLogin' AND resolv != '1' AND IDstatus != '1' AND IDstatus != '2' AND IDstatus != '3' AND IDstatus != '4' AND IDstatus != '5' AND IDstatus != '6' ORDER BY IDchamados ASC";
  
  }




 }
    $result_chamados = $con_chamados->query($Busca_chamados) or die ($con_chamados->error);
    
    while($chamados = $result_chamados->fetch_array()){
        $id_chamado = $chamados['IDchamados'];
        $IDstatus = $chamados['IDstatus'];
        $id_categoria = $chamados['IDcategoria'];
        $id_acao = $chamados['IDacao'];
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
        $nome_atendente = $chamados['nome_atendente'];
        $fechamento = $chamados['data_abertura_fechamento'];

        if($status == '0'){
            $status = "NOVO";
        }
        
        if ($nome_atendente == ''){
            $nome_atendente ="Sem atendente";
        }
        // Resto do seu código para exibir os dados na tabela
   
        $busca_status = "SELECT * FROM status Where ID_status = '$status'";
        $result_status = $con_chamados->query($busca_status) or die ($con_chamados->error);
        while($sta = $result_status->fetch_array()){
                $nomesta = $sta['titulo'];
       
              } 
               

              if (empty($fechamento)){
                $prazo ='Em tratativa';

              }else{
                $dataAbertura = $dataAB;
                $tempoResolucao = $tpm_sla;
                $dataFinalizacao = $fechamento;
                $abertura = new DateTime($dataAbertura);
                $finalizacao = new DateTime($dataFinalizacao);
                $diferenca = $abertura->diff($finalizacao);
                $tempoDecorrido = $diferenca->format('%d dias, %h horas, %i minutos, %s segundos');           
                $tempoResolucaoObj = DateTime::createFromFormat('H:i:s', $tempoResolucao);
                $tempoDecorridoTotal = $diferenca->days * 24 * 60 * 60 + $diferenca->h * 60 * 60 + $diferenca->i * 60 + $diferenca->s;
                $tempoResolucaoTotal = $tempoResolucaoObj->format('H') * 60 * 60 + $tempoResolucaoObj->format('i') * 60 + $tempoResolucaoObj->format('s');
                
                if ($tempoDecorridoTotal > $tempoResolucaoTotal) {
                  $prazo ='Passou do prazo ';
                  
                }
              }

                                  
    ?>

    
    <tr>
     
      <td class="Nchamado"><a style="color: black;" href="./ver-detalhes-chamado.php?id=<?php echo $id_chamado ?>"><?php echo $id_chamado ?></a></td>
      <td><?php echo $nome_cat ?></td>
      <td><?php echo $nome_sub ?></td>
      <td><?php echo $nome_acao ?></td>
      <td><?php echo $dataAB ?></td>
      <td><?php echo $tpm_sla  ?></td>
      <td><?php echo $prazo  ?></td>
      <td><?php echo $nome_atendente ?></td>
      <td><?php echo $status  ?></td>
      <td><?php echo $nome_login ?></td>
      <td><?php echo $nome_com ?></td>
      <td><?php echo $nome_setor ?></td>
      <td><?php echo substr($descricao, 0, 150); ?></td><?php  }?>
  

    </tr>
 
  </table>
  







  <script>
    function searchTable() {
      var input, filter, table, tr, td, i, j, txtValue;
      input = document.getElementById("searchInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");

      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        var found = false;
        for (j = 0; j < td.length; j++) {
          if (td[j]) {
            txtValue = td[j].textContent || td[j].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              found = true;
              break;
            }
          }
        }
        if (found) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  </script>
    </div>
</body>
</html>




