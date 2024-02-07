<!-- DEV GABRIEL SANTOS-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Inicio</title>
        <link rel="icon" href="./Home/Imagens/icone.png" /><!-- ICONE DA PAGINA-->
        <link rel="stylesheet" type="text/css" href="../CSS/edit.css" />
        <link rel="stylesheet" type="text/css" href="../CSS/detalhes-chamado.css" />
        <script src="../funcoes-chamado/pagina.js"></script>
        <link rel="stylesheet" type="text/css" href="../CSS/menu-chamados.css" />
        <link href="../../bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="../CSS/OverlayScrollbars.min.css" rel="stylesheet">
        <script src="../../bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="../funcoes-chamado//pagina.js"></script>
        <script src="../funcoes-chamado/OverlayScrollbars.min.js"></script>

        <style>
    
</style>
    </head>
        <?php
            include(__DIR__.'/../menu-chamados.php');
            include('../Comandos-SQL/slq-ver-detalhes-chamado.php');
            ?>
        <body>
            <div class="conteudos-chamados" id="conteudos">
                 <div class="titulo-chamados">
                    <h1>Ver detalhes do Chamado:</h1>
            </div>
            <main>
            <div class="painel-inicial">
          <div class="card mb-3">
            <div class="card-header bg-light d-flex justify-content-between">

            <h5 >Chamado N° <?php echo $iden ?></h5><a ></a>
                <div class=" btn-acoes">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#btn-acoes">
  Ações do chamado
</button>

<!-- Modal -->



<div class="modal fade" id="btn-acoes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Mudar Status</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Mudar Status
        <div class="form-barra-detalhes">
        <?php 
          if ($IDnivel != '8'){  ?>
          
        <form enctype="multipart/form-data" action="" method="POST" class="">
          <select name="userop" id="userop" required>
            <option value="" >Selecione</option>
            <option value="1" >Cancelar</option>
            <option value="2" >Reabrir</option>
          </select><br>
          <label>Informe descrição</label><br>
        <textarea name="descri" id="descri" cols="36" rows="8" required></textarea>
          <br>
          <br>
          <input class="btn btn-primary" type="submit" value="Salvar" name="add-status1">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
          </form>
          
      

          <?php 
        
        if (isset($_POST["add-status1"])) {

          $descri = $_POST['descri'];
          $userop = $_POST['userop'];

          if($userop == '1'){
            $sql1 = $con_chamados->query("INSERT INTO respostas SET res_ate = '$descri', IDchamado = '$iden', nome_ate = '$nomeCompleto - PEDIU CANCELAMENTO' , data1 = '$hora:$minuto:$segundos' ");  
          $sql = $con_chamados->query(" UPDATE chamados SET IDStatus = '4', cancel_user = '1', resolv = '1', reaberto = '0' WHERE IDchamados ='$iden' ");
          echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
          }
          if($userop == '2'){
         
            $sql1 = $con_chamados->query("INSERT INTO respostas SET res_ate = '$descri', IDchamado = '$iden', nome_ate = '$nomeCompleto - PEDIU REABERTURA' , data1 = '$hora:$minuto:$segundos' ");  
            $sql = $con_chamados->query(" UPDATE chamados SET IDStatus = '3', cancel_user = '0', resolv = '0', reaberto = '1' WHERE IDchamados ='$iden' ");
          echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
          }

     
      
      }
    }
        
        ?>
          
        
        <form enctype="multipart/form-data" action="" method="POST" class="">
        
      <?php
       if ($IDnivel == '8'){  ?>
          <select name="status" id="status" required>
            <option value="">Selecione</option>
          
          <?php
          $busca_status = "SELECT * FROM status WHERE id_setor = '$Setor_user' or id_setor = '1'";
          $result_status = $con_chamados->query($busca_status) or die ($con_chamados->error);
          while($sta = $result_status->fetch_array()){
            $titulo = $sta['titulo'];
            $ID_status = $sta['ID_status'];
        
            ?>
         <option value="<?php echo $ID_status ?>"> <?php echo $titulo ?> </option>
         <?php }?>
        </select>
        <br>
        <label>Informe descrição</label><br>
        <textarea name="descri" id="descri" cols="36" rows="8" required></textarea>

       <?php }
          ?>
        <?php if ($NivelGe == '0800'){ ?>
          <select name="status" id="status"required> 
          <option value="">Selecione</option>
          <?php
          $busca_status = "SELECT status.*, setor.nome_setor, setor.IDsetor FROM status
          INNER JOIN setor ON setor.IDsetor = status.id_setor
          WHERE status.ativo = 1";
          $result_status = $con_chamados->query($busca_status) or die ($con_chamados->error);
          while($sta = $result_status->fetch_array()){
            $titulo = $sta['titulo'];
            $id_setor = $sta['id_setor'];
            $nome_setor = $sta['nome_setor'];
            $IDsetor = $sta['IDsetor'];
           
            ?>
         <option value="<?php echo $IDsetor?>"><?php echo $titulo ?> - <?php echo $nome_setor ?></option>
         <?php }?>
        </select>

        <?php }
        ?>
<?php   
   if (isset($_POST["add-status"])) {
        if ($NivelGe == '0800'){ 
            $Setor_user = $_POST['IDsetor'];
            $res = $_POST['status1'];
            
        }
        
    
    $res = $_POST['status'];
    $descri = $_POST['descri'];

    $busrr = "SELECT * FROM status WHERE ID_status = '$res'";
    $ress = $con_chamados->query($busrr) or die ($con_chamados->error);
    while($titu = $ress->fetch_array()){
     $titus = $titu['titulo'];
    }
    if (stripos($titus, 'resolvido') !== false || stripos($titus, 'fechado') !== false || stripos($titus, 'fechar') !== false || stripos($titus, 'encerrado') !== false || stripos($titus, 'resolver') !== false || stripos($titus, 'finalizar') !== false || stripos($titus, 'finalizado') !== false || stripos($titus, 'encerrar') !== false || stripos($titus, 'calcelar') !== false || stripos($titus, 'cancelados') !== false) {
     
      $resolv = '1';
      $dataAtual = date('Y-m-d H:i:s');
      $sql = $con_chamados->query(" UPDATE chamados SET data_abertura_fechamento = ' $dataAtual' WHERE IDchamados ='$iden' ");
  } else {
    $resolv = '0';
      
  }
  $sql1 = $con_chamados->query("INSERT INTO respostas SET res_ate = '$descri', IDchamado = '$iden', nome_ate = '$nomeCompleto - alterou status' , data1 = '$hora:$minuto:$segundos' ");  
  $sql = $con_chamados->query(" UPDATE chamados SET IDstatus = '$res', resolv = '$resolv', IDatendente = '$IDLogin', nome_atendente = '$nomeCompleto', Loginate = '$usuario' WHERE IDchamados ='$iden' ");
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";}else{}?>
      </div>
      <div class="modal-footer">
        <?php 
         if ($IDnivel == '8' || $NivelGe == '0800') {?>

      <input class="btn btn-primary" type="submit" value="Salvar" name="add-status">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
        <?php }else{

        }?>
      </div> </form></div>
    </div>
  </div>
</div>

<!-- ------------------------------------>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#btn-desig">
  Designar analista
</button>

<!-- Modal -->
<div class="modal fade" id="btn-desig" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Designar Chamado</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="form-barra-detalhes">
      <form enctype="multipart/form-data" action="" method="POST" class="">
  <select id="idsetoruser" name="idsetoruser" onchange="buscarUsuarios(this.value)"required>
  <option value="">Selecione o Setor</option>
    <?php 
      $setor_buscar =  "SELECT * FROM setor ";
      $setor_result = $con_chamados->query($setor_buscar) or die ($con_chamados->error);
      while ($re_busca = $setor_result->fetch_array()){
        echo '<option value="' . $re_busca['IDsetor'] . '">' . $re_busca['nome_setor'] . '</option>';
      }
    ?>
  </select>
  <br>
  <select name="selectUsuarios" id="selectUsuarios"required>
    <option value="">Vazio</option>
  </select>
  
  <script>
function buscarUsuarios() {
  var setorId = document.getElementById("idsetoruser").value;

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("selectUsuarios").innerHTML = this.responseText;

        var numOpcoes = document.getElementById("selectUsuarios").options.length;
        if (numOpcoes === 1) {
            buscarSubCategorias();
        }
    }
};
xhttp.open("GET", "../funcoes-chamado/buscar_usuarios.php?setorId=" + setorId, true);
xhttp.send();
}
  </script>
<br>
<label>Informe o motivo </label>
<br>
<textarea id="motivo" name="motivo" cols="50" rows="10"required></textarea>

      </div>
      <div class="modal-footer">
      <input class="btn btn-primary" type="submit" value="Salvar" name="desig-analista">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    
    </form></div>
    <?php 
       if (isset($_POST["desig-analista"])) {
     
     
    $selectUsuarios = $_POST['selectUsuarios'];
    $idsetoruser = $_POST['idsetoruser'];
    $motivo = $_POST['motivo'];
    $sql_motivo = $con_chamados->query("INSERT INTO respostas SET res_ate = '$motivo', IDchamado = '$iden', nome_ate = 'Designado por: $usuario' , data1 = '$hora:$minuto:$segundos' ");
    $sql = $con_chamados->query(" UPDATE chamados SET IDstatus = '2', IDatendente = '$selectUsuarios', IDsetor = '$idsetoruser' WHERE IDchamados ='$iden' ");
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";}else{}?>
   
    </div>
  </div>
</div>


<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#btn-user">
  Informações do usuário
</button>

<!-- Modal -->
<div class="modal fade" id="btn-user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"> Informações do usuário:</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="form-info">
      <div class="modal-body">
      <p><span class="label"><strong>Nome Completo:</strong></span> <span class="atendente"><?php echo  $nome_info  ?></span></p>
      <p><span class="label"><strong>Login:</strong></span> <span class="atendente"><?php echo  $login_info  ?></span></p>
      <p><span class="label"><strong>E-mail:</strong></span> <span class="atendente"><?php echo  $email_info  ?></span></p>
      <p><span class="label"><strong>Setor:</strong></span> <span class="atendente"><?php echo  $setor_info  ?></span></p>


      </div>
      </div>
      <div class="modal-footer">
   
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
       
      </div>
    </div>
  </div>
</div>
<!-- fim da div btn -->
</div>

            </div>
            <div class="organiza-flex">

           
            <div class="chamado-details">
            <div class="container"> 
     
    <div class="col-6">
      <div style="width: 500px;" class="p-3 border bg-light">
      <h3>Informações do chamado:</h3>

      <div class="anexos">
        Anexos: 1 2 3 4 5 6 
      </div>

      <p><span class="label">Status:</span> <span class="atendente"><?php echo  $status  ?></span></p>
      <p><span class="label">Atendente:</span> <span class="atendente"><?php echo $nome_atendente  ?></span></p>
      <p><span class="label">Solicitante:</span> <span class="atendente"><?php echo $result_nome ?></span></p>
    <p><span class="label">Categoria:</span> <span class="categoria"><?php echo $nome_cat ?></span></p>
    <p><span class="label">Subcategoria:</span> <span class="subcategoria"><?php echo $nome_sub ?></span></p>
    <p><span class="label">Ação:</span> <span class="subcategoria"><?php echo $nome_acao ?></span></p>
    <br>
    <p><span class="label">Data Abertura:</span> <span class="subcategoria"><?php echo $dataAB ?></span></p>
    <p><span class="label">Tempo de SLA:</span> <span class="subcategoria"><?php echo $tpm_sla ?></span></p>
    


    <?php
    
    if (empty($fechamento)){
      $prazo ='Tempo Correndo';
      $dataAtuals = date('Y-m-d H:i:s');
      $dataAbertura = $dataAB;
      $tempoResolucao = $tpm_sla;
      $dataFinalizacao = $dataAtuals;
      $abertura = new DateTime($dataAbertura);
      $finalizacao = new DateTime($dataFinalizacao);
      $diferenca = $abertura->diff($finalizacao);
      $tempoDecorrido = $diferenca->format('%d dias, %h horas, %i minutos, %s segundos');           
      $tempoResolucaoObj = DateTime::createFromFormat('H:i:s', $tempoResolucao);
      $tempoDecorridoTotal = $diferenca->days * 24 * 60 * 60 + $diferenca->h * 60 * 60 + $diferenca->i * 60 + $diferenca->s;
      $tempoResolucaoTotal = $tempoResolucaoObj->format('H') * 60 * 60 + $tempoResolucaoObj->format('i') * 60 + $tempoResolucaoObj->format('s');
      $prazo = $tempoDecorrido;

    }else{
      $dataAbertura = $dataAB;
      $tempoResolucao = $tpm_sla;
      $dataFinalizacao = $Fechamento;
      $abertura = new DateTime($dataAbertura);
      $finalizacao = new DateTime($dataFinalizacao);
      $diferenca = $abertura->diff($finalizacao);
      $tempoDecorrido = $diferenca->format('%d dias, %h horas, %i minutos, %s segundos');           
      $tempoResolucaoObj = DateTime::createFromFormat('H:i:s', $tempoResolucao);
      $tempoDecorridoTotal = $diferenca->days * 24 * 60 * 60 + $diferenca->h * 60 * 60 + $diferenca->i * 60 + $diferenca->s;
      $tempoResolucaoTotal = $tempoResolucaoObj->format('H') * 60 * 60 + $tempoResolucaoObj->format('i') * 60 + $tempoResolucaoObj->format('s');
      
      if ($tempoDecorridoTotal > $tempoResolucaoTotal) {
        $prazo1 ='Passou do prazo ';
        
      }

      if ($tempoDecorridoTotal < $tempoResolucaoTotal) {
        $prazo1 ='Finalizado no prazo';
        
      }

    }

                        


    if (empty($Fechamento)){?>
     
      <p><span class="label">Prazo de solução:</span> <span class="subcategoria"><?php echo $prazo ?></span></p>
    <?php
    }
    else
    {
       // Valores fornecidos
$dataAbertura = $dataAB;
$tempoResolucao = $tpm_sla;
$dataFinalizacao = $Fechamento;

// Criar objetos DateTime para a data de abertura e a data de finalização
$abertura = new DateTime($dataAbertura);
$finalizacao = new DateTime($dataFinalizacao);

// Calcular a diferença entre as datas
$diferenca = $abertura->diff($finalizacao);

// Obter a diferença formatada
$tempoDecorrido = $diferenca->format('%d dias, %h horas, %i minutos, %s segundos');

 

  $dataAbertura = $dataAB;
  $tempoResolucao = $tpm_sla;
  $dataFinalizacao = $Fechamento;
  $abertura = new DateTime($dataAbertura);
  $finalizacao = new DateTime($dataFinalizacao);
  $diferenca = $abertura->diff($finalizacao);
  $tempoDecorrido = $diferenca->format('%d dias, %h horas, %i minutos, %s segundos');           
  $tempoResolucaoObj = DateTime::createFromFormat('H:i:s', $tempoResolucao);
  $tempoDecorridoTotal = $diferenca->days * 24 * 60 * 60 + $diferenca->h * 60 * 60 + $diferenca->i * 60 + $diferenca->s;
  $tempoResolucaoTotal = $tempoResolucaoObj->format('H') * 60 * 60 + $tempoResolucaoObj->format('i') * 60 + $tempoResolucaoObj->format('s');
  
  if ($tempoDecorridoTotal > $tempoResolucaoTotal) {
    $prazo1 ='Passou do prazo ';
    
  }

  if ($tempoDecorridoTotal < $tempoResolucaoTotal) {
    $prazo1 ='Finalizado no prazo';
    
  }



                    


// Exibir o tempo decorrido
?>
<p><span class="label">Tempo Chamado:</span> <span class="subcategoria"><?php echo $tempoDecorrido ?></span></p>
<p><span class="label">Finalizado Chamado:</span> <span class="subcategoria"><?php echo $dataFinalizacao ?></span></p>
<p><span class="label">Finalizado Chamado:</span> <span class="subcategoria"><?php echo $prazo1 ?></span></p>

   <?php
    }
    ?>
    
    <p><span class="label">Descrição:</span> <span class="subcategoria"></span></p>
    <div class="descricao">
    <?php echo $descricao;
   
 ?>


    </div>
    

    
      </div>
    </div>
  </div>

  <h1>Interagir:</h1> 


<form enctype="multipart/form-data" action="" method="POST" class="">
   <textarea name="respo" id="respo" cols="65" rows="10"></textarea>
   <input class="btn-add-setor" type="submit" value="Responder" name="responder">

   <?php   
   if (isset($_POST["responder"])) {
        if ($NivelGe == '0800'){ 
            $Setor_user = $_POST['setor_vin'];
        }
     
    $res = $_POST['respo'];
    $sql = $con_chamados->query("INSERT INTO respostas SET res_ate = '$res', IDchamado = '$iden', nome_ate = '$nomeCompleto' , data1 = '$hora:$minuto:$segundos' ");
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";}else{}?>
    
</form>
  
</div>
<div class="respostas-div"> 


 <div>
    <h1>Interações: </h1>

    <div class="scrollable-div">

 

    <?php  while($chamados_interacao = $result_interacao->fetch_array()){


 $resp_ate = $chamados_interacao['res_ate'];
 $data1 = $chamados_interacao['data1'];
 $contole = $chamados_interacao['controle'];
 $nome_ate = $chamados_interacao['nome_ate'];


?>


 <div class="col"><span style="color:#480ca8;text-align:center" class="fw-bold"> <?php 
 $palavra = $nome_ate;
 $palavraComPrimeiraLetraMaiuscula = ucfirst($palavra);
 echo $palavraComPrimeiraLetraMaiuscula ?></span></a>
 <div class="col"><span style="background-color:#F8F8FF;text-align:center" class="fw-bold"> <?php 
  $resp_ate1 = $resp_ate;
  $resp_ate_Maiuscula = ucfirst($resp_ate1);
 echo $resp_ate_Maiuscula ?></span></a>
 <div class="col"><span style="background-color:#F8F8FF;text-align:center" class="fw-bold"> Horas: <?php echo $data1 ?></span></a><br><br>
 <?php }?>
 




                  
</div>


 </div>


  </div>
</div>
</div>
    
        </div>
    </div>
     </main>
    </div>
</body>
</html>