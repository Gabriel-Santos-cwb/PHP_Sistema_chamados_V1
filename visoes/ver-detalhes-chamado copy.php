<?php
 include_once('./menu.php');
 include_once('../conexao/verifica_page.php');
 include_once('../conexao/conexao.php');

//DEV GABRIEL EDUARDO 

//TRAZ OS DADOS DA PAGINA DE CHAMADOS ATRAVEZ DO GET
$iden = isset($_GET['iden'])?$_GET['iden']:"";
$iden = $_GET['IDchamados'];

//FAZ UM SLQ NOS CHAMDOS ONDE O iD DO CHAMADO É IGUAL A VARIAVEL TRAZIDA A CIMA ATRAVEZ DO GET 
$sql = "SELECT * FROM chamados WHERE IDchamados = '$iden'";
$consulta = mysqli_query($con2,$sql);
$registros = mysqli_num_rows($consulta);
// FAZ UM WHILE PARA PODER ACESSAR E GRAVAR OS DADOS DO BANCO E USAR NA PÁGINA 
 while($exebirregistros = mysqli_fetch_array($consulta)){

$codigo = $exebirregistros[0]; //NUMERO DA POSIÇÃO NA TABELA COMEÇA DO "0"
$incidente =$exebirregistros[10];
$nome_chamado =$exebirregistros[2];
$prioridade =$exebirregistros[7];
$setor =$exebirregistros[9];
$tipo =$exebirregistros[19];
$sta =$exebirregistros[6];
$id_atendenten1 =$exebirregistros[5];

$atendente =$exebirregistros['hist_nome'];

}

//FAZ UM SLQ PARA TRAZER AS RESPOSTAS FOREM IGUAIS A VARIAVEL COLETADA NO GET DA PAGINA DE CHAMADOS  
$pesquisa_3= $sql = "SELECT * FROM respostas WHERE IDchamado = '$iden'";

$sql1 = "SELECT * FROM respostas WHERE IDchamado = '$codigo'";
$consulta1 = mysqli_query($con2,$sql1);
$registros1 = mysqli_num_rows($consulta1);
      
 while($exebirregistros1 = mysqli_fetch_array($consulta1)){
  $codigo1 = $exebirregistros1[0];
 $produto =$exebirregistros1[1];
 $produto2 =$exebirregistros1[2];
 $nome_ate=$exebirregistros1[7];
 $nome_so =$exebirregistros1[8];
 $controle =$exebirregistros1[9];


}

$result_3 = mysqli_query($con2, $pesquisa_3);
$slq_query_3 = mysqli_num_rows($result_3);
$consulta_3 = mysqli_query($con2,$pesquisa_3);

?>

<body >


<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
  <div class="container" data-layout="container">
  <script src="../js/verifica_resposta.js"> </script>

  
          <div class="card mb-3">
            <div class="card-header bg-light d-flex justify-content-between">
              <h5 >Chamado N° <?php echo $iden ?></h5><a ></a>
              <h5 >ATENDENTE: <?php echo $atendente ?></h5><a class="font-sans-serif" href="../../app/social/activity-log.html">Dados do usuario</a>
            </div>

            <div class="card-header bg-light d-flex justify-content-between">
              
              <h5 class="mb-0">Solicitante: <?php echo $nome_chamado ?></h5>
              <h5 class="mb-0">Prioridade: <?php echo $prioridade ?></h5>
              <h5 class="mb-0">Tipo: <?php echo $tipo ?></h5>
              
            </div><br>
           <div class="card-body">
          


</div>



<div class="card mb-3">
            <div class="card-body">
              <div class="row flex-between-center">
                <div class="col-sm-auto mb-2 mb-sm-0">
                <?php
                               
                                   $sta;
                                    $recebvalor =($sta);
                                    $Muda_Cor = ($recebvalor);
                                    $cor = '#ffffff';
                                    if ($Muda_Cor === "1") {
                                echo " <div class='ca'>  <span style=' background-color:#00FFFF;text-align:center' class='fw-bold'> Pendente - Usuario</span></a> </div><a class='font-sans-serif' href='../'>Historico</a>";
                                    } elseif ($Muda_Cor === "2") {
                                echo " <div class='ca'>  <span style=' background-color:#FFA500;text-align:center' class='fw-bold'> Pendente - Fornecedor</span></a> </div><a class='font-sans-serif' href='../'>Historico</a>";
                                    } elseif ($Muda_Cor=== "3") {
                                echo " <div class='ca'>  <span style=' background-color:#DC143C;text-align:center' class='fw-bold'> Pendente - Compra</span></a> </div><a class='font-sans-serif' href='../'>Historico</a>";
                                    }
                                    elseif ($Muda_Cor=== "4") {
                                      echo " <div class='ca'>  <span style=' background-color:#F08080;text-align:center' class='fw-bold'> Pendente - Aprovação</span></a> </div><a class='font-sans-serif' href='../'>Historico</a>";
                                          }
                                          elseif ($Muda_Cor=== "5") {
                                            echo " <div class='ca'>  <span style=' background-color:#FFFF00;text-align:center' class='fw-bold'> Em Fila</span></a> </div><a class='font-sans-serif' href='../'>Historico</a>";
                                                }
                                                elseif ($Muda_Cor=== "6") {
                                                  echo " <div class='ca'>  <span style=' background-color:#AFEEEE;text-align:center' class='fw-bold'> Em Análise</span></a> </div><a class='font-sans-serif' href='../'>Historico</a>";
                                                      }
                                                      elseif ($Muda_Cor=== "7") {
                                                        echo " <div class='ca'>  <span style=' background-color:#00FF7F;text-align:center' class='fw-bold'> Em Atendimento</span></a> </div><a class='font-sans-serif' href='../'>Historico</a>";
                                                            }
                                                            elseif ($Muda_Cor=== "8") {
                                                              echo " <div class='ca'>  <span style=' background-color:#98FB98;text-align:center' class='fw-bold'> Em Teste</span></a> </div><a class='font-sans-serif' href='../'>Historico</a>";
                                                                  }
                                                                  elseif ($Muda_Cor=== "9") {
                                                                    echo " <div class='ca'>  <span style=' background-color:#EE82EE;text-align:center' class='fw-bold'> Aguardando Validação</span></a> </div><a class='font-sans-serif' href='../'>Historico</a>";
                                                                        }
                                                                        elseif ($Muda_Cor=== "10") {
                                                                          echo " <div class='ca'>  <span style=' background-color:#FF0000;text-align:center' class='fw-bold'> Cancelado</span></a> </div><a class='font-sans-serif' href='../'>Historico</a>";
                                                                              }
                                                                              elseif ($Muda_Cor=== "11") {
                                                                                echo " <div class='ca'>  <span style=' background-color:#00FF00;text-align:center': class='fw-bold'> Finalizado</span></a> </div><a class='font-sans-serif' href='../'>Historico</a>";
                                                                                    }
                                                                                    elseif ($Muda_Cor=== "12") {
                                                                                      echo " <div class='ca'>  <span style=' background-color:#8B008B;text-align:center' class='fw-bold'> Reaberto</span></a> </div><a class='font-sans-serif' href='../'>Historico</a>";
                                                                                          }
                                    

                                    ?>
                </div>
                <div class="col-sm-auto">
                  <div class="row gx-2 align-items-center">
                    <div class="col-auto">
                    <form method="post" action="">
                        
                          <input class=""type="submit" value="Mudar Status" name="muda1" id="muda1">
                        </div>
                      </form>
                    </div>
                    
<!-- TRAZ AS FUNSÕES DE MUDANÇA DE STATUS PARA CADA NIVEL DE USUARIO  -->

<?php 



if ($IDLogin != $id_atendenten1){

if($nivel_user == '1')  { 

include_once('../funcao/funcao_user.php'); 
}

} else if ($IDLogin != $id_atendenten1){

} 


    
if($nivel_user == '5' || $nivel_user =='6' || $nivel_user =='3')  { 
include_once('../funcao/funcao_adm.php');
  


}




?>








                  </div>
                </div>
              </div>
            </div>
          
                            
</div>
                            
</td>

            <div class="card-header bg-light d-flex justify-content-between">
              <h5 class="mb-0">Incidente: <br> <?php echo $incidente ?></h5>
              
            </div><br><br>

            <div class="card-body p-0">
              <div class="table-responsive"> 
                <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
           
                  <tbody class="list" id="table-customers-body"><tr class="btn-reveal-trigger">

<!-- TRAZ O NOME DO USUARIO QUE ESTA RESPONDENDO  -->

                  <?php while($con_3 = mysqli_fetch_array($consulta_3)){?>
                   
                    <div class="row border-bottom border-200 hover-actions-trigger hover-shadow py-2 px-1 mx-0 bg-white dark__bg-dark" data-href="../../app/email/email-detail.html">

              <div class="col col-md-9 col-xxl-10">
                <div class="row">
                  <div class="col-md-4 col-xl-3 col-xxl-2 ps-md-0 mb-1 mb-md-0">
                    <div class="d-flex position-relative">
                      <div class="avatar avatar-s">
                       

                      </div>
                      <!-- TRAZ AS RESPOSTAS  -->

                      <div  class=""></div><?php echo ($con_3['controle']); ?></a>
                     

                      </div>
                    </div>
                  </div>
                  <div class="col"><span style="background-color:#E0FFFF;text-align:center" class="fw-bold"> <?php echo ($con_3['res_ate']); ?></span></a>
                  <div class="col"><span style="background-color:#F8F8FF;text-align:center" class="fw-bold"> <?php echo ($con_3['res_soli']); ?></span></a>
                  <div style="font-family: serif; font-size: 15px;"></div><?php echo ($con_3['data1']); ?></a>
                  
                  </div>
                </div>
              </div>
              
            </div>
         
                    <?php } ?></tbody>
                </table>

             
              </div>
            </div>
        
         
          </div>
          <form method="post" action="">

<div class="mb-3">
        <label class="form-label" for="exampleFormControlTextarea1"></label>
        <textarea class="form-control" value ="" name="res" id="res" rows="3" style="height: 144px;"></textarea>
      </div>

<input class="btn btn-primary d-block w-100 mt-3" type="submit" value="Submit" name="submit">

</form>
            </div>
  
       



 <!-- IDENTIFICA SE O USUARIO É SOLICTANTE OU RESOLVEDOR ATRAZ DO NIVEL DO USUARIO PARA INSERIR OS DADOS CORRETOS NA TABELA DE RESPOSTA  -->

  <?php if($nivel_user == '5' || $nivel_user =='6' || $nivel_user =='3')  { ?>

	<?php
if (isset($_POST["submit"])) {
  $res = $_POST['res'];
  $sql = $con2->query("INSERT INTO respostas SET res_ate= '$res', IDchamado= '$iden' , controle= '$nome_user', IDatendente=' $IDLogin', data1='$horas' ");
  

echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
}else{

}
?>
<?php }?>

<?php if($nivel_user == '1' || $nivel_user =='3')  { ?>

<?php
if (isset($_POST["submit"])) {
 $res = $_POST['res'];
  $sql = $con2->query("INSERT INTO respostas SET res_soli= '$res', IDchamado= '$iden' , controle= '$nome_user', IDatendente=' $IDLogin', data1='$horas' ");



echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";

}else{

}
?>
<?php }?>



<meta HTTP-EQUIV='refresh' CONTENT='600'>
 </div>           
 </div>

 <?php



?>


