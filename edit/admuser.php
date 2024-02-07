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
            include('../../ADM-intra/conexao-intra/conexao-intra.php');
            if ($IDnivel != '8' && $NivelGe != '0800') {
  
                echo "Você não tem permissão para acessar essa pagina";
                exit;
                  }
            
            
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
      <th>*</th>
      <th>Login</th>
      <th>Nome Completo</th>
      <th>E-mail</th>
      <th>Status</th>
  
 
    </tr>
    <?php 


 


 if ($NivelGe == '0800'){
    $Busca_user = "SELECT * FROM login WHERE id_login != '1' AND id_login != '2' ORDER BY id_login ASC";
 }
 else
 {
    $Busca_user = "SELECT * FROM login WHERE Setor_user = '$Setor_user' ORDER BY id_login ASC";
 }

    $result_user = $con_intra->query($Busca_user) or die ($con_intra->error);
    
    while($user = $result_user->fetch_array()){
        $id_user = $user['id_login'];
        $Nomeuser = $user['nomeCompleto'];
        $Loginuser = $user['Login_user'];
        $emailuser = $user['email'];
        $stauser = $user['ativo'];


        if ($stauser == '1'){
            $stauser1 = 'ATIVO';
        }else{
            $stauser1 = 'DESATIVADO';
        }
     
                                       
    ?>
    <tr>
     
      <td class="Nlogin"><a style="color: black;" href="../visoes/ver-detalhes-user.php?id=<?php echo  $id_user ?>">EDITAR</a></td>
      <td><?php echo $Loginuser ?></td>
      <td><?php echo  $Nomeuser ?></td>
      <td><?php echo  $emailuser ?></td>
      <td><?php echo  $stauser1 ?></td>
    
 <?php  }?>
  

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




