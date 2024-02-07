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
      <th>Login Solicitante</th>
      <th>Nome Solicitante</th>

      <th>Setor Solicitante</th>
      <th>Descrição</th>
    </tr>
    <?php 
   
    // Busca chamados setor 
    $Busca_chamados = "SELECT chamados.*, categoria_incidente.nome_cat, sub_categoria.nome_sub, sla_chamados.tempo, acao_subcategoria.nome_acao, setor.nome_setor FROM chamados
                        INNER JOIN categoria_incidente ON chamados.IDcategoria = categoria_incidente.id_categoria
                        INNER JOIN sub_categoria ON categoria_incidente.id_categoria = sub_categoria.id_categoria
                        INNER JOIN sla_chamados ON sub_categoria.id_sla = sla_chamados.id_sla
                        INNER JOIN acao_subcategoria ON chamados.IDacao = acao_subcategoria.id_acao
                        INNER JOIN setor ON chamados.IDsetor = setor.idsetor
                        WHERE chamados.IDsetor = '$Setor_user'";
    $result_chamados = $con_chamados->query($Busca_chamados) or die ($con_chamados->error);
    
    while($chamados = $result_chamados->fetch_array()){
        $id_chamado = $chamados['IDchamados'];
        $id_categoria = $chamados['IDcategoria'];
        $id_acao = $chamados['IDacao'];
        $id_login_chamado = $chamados['IDlogin_user'];
        $result_nome = $chamados['nome_user'];
        $result_descricao = $chamados['descricao'];
        $dataAB = $chamados['data_abertura'];
        $nome_cat = $chamados['nome_cat'];
        $nome_sub = $chamados['nome_sub'];
        $tempo = $chamados['tempo'];
        $nome_acao = $chamados['nome_acao'];
        $nome_setor = $chamados['nome_setor'];
        $nome_login = $chamados['nome_user'];
        $nome_com = $chamados['nome_completo'];
        $descricao = $chamados['descricao'];
    
        // Resto do seu código para exibir os dados na tabela
   
  
                   
                                       
    ?>
    <tr>
     
      <td><?php echo $id_chamado ?></td>
      <td><?php echo $nome_cat ?></td>
      <td><?php echo $nome_sub ?></td>
      <td><?php echo $nome_acao ?></td>
      <td><?php echo $dataAB ?></td>
      <td><?php echo $tempo  ?></td>
      <td><?php echo $nome_login ?></td>
      <td><?php echo $nome_com ?></td>

      <td><?php echo $nome_setor ?></td>
      <td><?php echo $descricao ?></td><?php  }?>
  

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
