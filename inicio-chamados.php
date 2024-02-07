<?php 

include('./menu-chamados.php');




//chamados total setor 
$contaChamados_setor1 = "SELECT count(*) as totalz1 FROM chamados WHERE IDsetor = '$Setor_user'";
$up_empresas_totalz1 = mysqli_query($con_chamados, $contaChamados_setor1) or die(mysqli_error($con_chamados));
$totalz1 = $up_empresas_totalz1->fetch_object()->totalz1;

$contaChamados_setor2 = "SELECT count(*) as totalz2 FROM chamados WHERE IDsetor = '$Setor_user' AND IDatendente = '1' ";
$up_empresas_totalz2 = mysqli_query($con_chamados, $contaChamados_setor2) or die(mysqli_error($con_chamados));
$totalz2 = $up_empresas_totalz2->fetch_object()->totalz2;


$contaChamados_Cancelados = "SELECT count(*) as totalCancelados FROM chamados WHERE IDsetor = '$Setor_user' AND IDstatus = '4' ";
$up_empresas_totalCancelados = mysqli_query($con_chamados, $contaChamados_Cancelados) or die(mysqli_error($con_chamados));
$totalCancelados = $up_empresas_totalCancelados->fetch_object()->totalCancelados;

$contaChamados_reabertos = "SELECT count(*) as totalreabertos FROM chamados WHERE IDsetor = '$Setor_user' AND IDstatus = '3' ";
$up_empresas_totalreabertos = mysqli_query($con_chamados, $contaChamados_reabertos) or die(mysqli_error($con_chamados));
$totalreabertos = $up_empresas_totalreabertos->fetch_object()->totalreabertos;

$contaChamados_Fechados = "SELECT count(*) as totalFechados FROM chamados WHERE IDsetor = '$Setor_user' AND IDstatus = '6' ";
$up_empresas_totalFechados = mysqli_query($con_chamados, $contaChamados_Fechados) or die(mysqli_error($con_chamados));
$totalFechados = $up_empresas_totalFechados->fetch_object()->totalFechados;

$contaChamados_pendentes = "SELECT count(*) as totalpendentes FROM chamados WHERE IDsetor = '$Setor_user' AND IDstatus = '5'";
$up_empresas_totalpendentes = mysqli_query($con_chamados, $contaChamados_pendentes) or die(mysqli_error($con_chamados));
$totalpendentes = $up_empresas_totalpendentes->fetch_object()->totalpendentes;

$contaChamados_tratativa = "SELECT count(*) as totaltratativa FROM chamados WHERE IDsetor = '$Setor_user' AND IDstatus != '1' AND IDstatus != '2' AND IDstatus != '3' AND IDstatus != '4' AND IDstatus != '6' AND IDstatus != '5'";
$up_empresas_totaltratativa = mysqli_query($con_chamados, $contaChamados_tratativa) or die(mysqli_error($con_chamados));
$totaltratativa = $up_empresas_totaltratativa->fetch_object()->totaltratativa;


//PAINEL USUARIO COMUM 

if ($IDnivel != '8' && $NivelGe != '0800'){

$contaChamados_Fechados = "SELECT count(*) as totalFechados FROM chamados WHERE  IDlogin_user = '$IDLogin' AND IDstatus = '6' ";
$up_empresas_totalFechados = mysqli_query($con_chamados, $contaChamados_Fechados) or die(mysqli_error($con_chamados));
$totalFechados = $up_empresas_totalFechados->fetch_object()->totalFechados;    

$contaChamados_pendentes = "SELECT count(*) as totalpendentes FROM chamados WHERE IDlogin_user = '$IDLogin' AND IDstatus = '5'";
$up_empresas_totalpendentes = mysqli_query($con_chamados, $contaChamados_pendentes) or die(mysqli_error($con_chamados));
$totalpendentes = $up_empresas_totalpendentes->fetch_object()->totalpendentes;


$contaChamados_setor1 = "SELECT count(*) as totalz1 FROM chamados WHERE IDlogin_user = '$IDLogin'";
$up_empresas_totalz1 = mysqli_query($con_chamados, $contaChamados_setor1) or die(mysqli_error($con_chamados));
$totalz1 = $up_empresas_totalz1->fetch_object()->totalz1;

$contaChamados_setor2 = "SELECT count(*) as totalz2 FROM chamados WHERE IDlogin_user = '$IDLogin' AND IDatendente = '1' ";
$up_empresas_totalz2 = mysqli_query($con_chamados, $contaChamados_setor2) or die(mysqli_error($con_chamados));
$totalz2 = $up_empresas_totalz2->fetch_object()->totalz2;

$contaChamados_user = "SELECT count(*) as totals2 FROM chamados WHERE IDlogin_user = '$IDLogin' AND resolv = '1' ";
$up_empresas_totals2 = mysqli_query($con_chamados, $contaChamados_user) or die(mysqli_error($con_chamados));
$totals2 = $up_empresas_totals2->fetch_object()->totals2;

$contaChamados_user1 = "SELECT count(*) as totals22 FROM chamados WHERE IDlogin_user = '$IDLogin' AND IDstatus != '1' AND IDstatus != '2' AND IDstatus != '3' AND IDstatus != '4' AND IDstatus != '6' AND IDstatus != '5' ";
$up_empresas_totals22 = mysqli_query($con_chamados, $contaChamados_user1) or die(mysqli_error($con_chamados));
$totals22 = $up_empresas_totals22->fetch_object()->totals22;

$contaChamados_Cancelados = "SELECT count(*) as totalCancelados FROM chamados WHERE IDlogin_user = '$IDLogin' AND IDstatus = '4' ";
$up_empresas_totalCancelados = mysqli_query($con_chamados, $contaChamados_Cancelados) or die(mysqli_error($con_chamados));
$totalCancelados = $up_empresas_totalCancelados->fetch_object()->totalCancelados;

$contaChamados_reabertos = "SELECT count(*) as totalreabertos FROM chamados WHERE IDlogin_user = '$IDLogin' AND IDstatus = '3' ";
$up_empresas_totalreabertos = mysqli_query($con_chamados, $contaChamados_reabertos) or die(mysqli_error($con_chamados));
$totalreabertos = $up_empresas_totalreabertos->fetch_object()->totalreabertos;

}

//PAINEL USUARIO COMUM 

if ($NivelGe == '0800'){

    $contaChamados_Fechados = "SELECT count(*) as totalFechados FROM chamados WHERE  IDstatus = '6' ";
    $up_empresas_totalFechados = mysqli_query($con_chamados, $contaChamados_Fechados) or die(mysqli_error($con_chamados));
    $totalFechados = $up_empresas_totalFechados->fetch_object()->totalFechados;    
    
    $contaChamados_pendentes = "SELECT count(*) as totalpendentes FROM chamados WHERE IDstatus = '5'";
    $up_empresas_totalpendentes = mysqli_query($con_chamados, $contaChamados_pendentes) or die(mysqli_error($con_chamados));
    $totalpendentes = $up_empresas_totalpendentes->fetch_object()->totalpendentes;
    
    
    $contaChamados_setor1 = "SELECT count(*) as totalz1 FROM chamados ";
    $up_empresas_totalz1 = mysqli_query($con_chamados, $contaChamados_setor1) or die(mysqli_error($con_chamados));
    $totalz1 = $up_empresas_totalz1->fetch_object()->totalz1;
    
    $contaChamados_setor2 = "SELECT count(*) as totalz2 FROM chamados WHERE  IDatendente = '1' ";
    $up_empresas_totalz2 = mysqli_query($con_chamados, $contaChamados_setor2) or die(mysqli_error($con_chamados));
    $totalz2 = $up_empresas_totalz2->fetch_object()->totalz2;
    
    $contaChamados_user = "SELECT count(*) as totals2 FROM chamados WHERE  resolv = '1' ";
    $up_empresas_totals2 = mysqli_query($con_chamados, $contaChamados_user) or die(mysqli_error($con_chamados));
    $totals2 = $up_empresas_totals2->fetch_object()->totals2;
    
    $contaChamados_user1 = "SELECT count(*) as totals22 FROM chamados WHERE IDstatus != '1' AND IDstatus != '2' AND IDstatus != '3' AND IDstatus != '4' AND IDstatus != '6' AND IDstatus != '5' ";
    $up_empresas_totals22 = mysqli_query($con_chamados, $contaChamados_user1) or die(mysqli_error($con_chamados));
    $totals22 = $up_empresas_totals22->fetch_object()->totals22;
    
    $contaChamados_Cancelados = "SELECT count(*) as totalCancelados FROM chamados WHERE  IDstatus = '4' ";
    $up_empresas_totalCancelados = mysqli_query($con_chamados, $contaChamados_Cancelados) or die(mysqli_error($con_chamados));
    $totalCancelados = $up_empresas_totalCancelados->fetch_object()->totalCancelados;
    
    $contaChamados_reabertos = "SELECT count(*) as totalreabertos FROM chamados WHERE IDstatus = '3' ";
    $up_empresas_totalreabertos = mysqli_query($con_chamados, $contaChamados_reabertos) or die(mysqli_error($con_chamados));
    $totalreabertos = $up_empresas_totalreabertos->fetch_object()->totalreabertos;
    
    }
    


?>
<!-- DEV GABRIEL SANTOS-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Inicio</title>
        <link rel="icon" href="./Home/Imagens/icone.png" /><!-- ICONE DA PAGINA-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href='https://unpkg.com/css.gg@2.0.0/icons/css/add.css' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="./CSS/body.css" />
        <script src="./funcoes-chamado/pagina.js"></script>
 

<body>




<div class="conteudos-chamados" id="conteudos">
<div class="titulo-chamados">
        <h1>Painel Inicial Chamados Setor: ?</h1>
    </div>
    <main>

<div>
  <!--Terceira DIV -->



  <div class="painel-inicial">

      <!--BOTÂO A -->
      <div class="btn-group">
                <button class="botoes" data-toggle="dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cup-hot" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M.5 6a.5.5 0 0 0-.488.608l1.652 7.434A2.5 2.5 0 0 0 4.104 16h5.792a2.5 2.5 0 0 0 2.44-1.958l.131-.59a3 3 0 0 0 1.3-5.854l.221-.99A.5.5 0 0 0 13.5 6H.5ZM13 12.5a2.01 2.01 0 0 1-.316-.025l.867-3.898A2.001 2.001 0 0 1 13 12.5ZM2.64 13.825 1.123 7h11.754l-1.517 6.825A1.5 1.5 0 0 1 9.896 15H4.104a1.5 1.5 0 0 1-1.464-1.175Z"/>
                <path d="m4.4.8-.003.004-.014.019a4.167 4.167 0 0 0-.204.31 2.327 2.327 0 0 0-.141.267c-.026.06-.034.092-.037.103v.004a.593.593 0 0 0 .091.248c.075.133.178.272.308.445l.01.012c.118.158.26.347.37.543.112.2.22.455.22.745 0 .188-.065.368-.119.494a3.31 3.31 0 0 1-.202.388 5.444 5.444 0 0 1-.253.382l-.018.025-.005.008-.002.002A.5.5 0 0 1 3.6 4.2l.003-.004.014-.019a4.149 4.149 0 0 0 .204-.31 2.06 2.06 0 0 0 .141-.267c.026-.06.034-.092.037-.103a.593.593 0 0 0-.09-.252A4.334 4.334 0 0 0 3.6 2.8l-.01-.012a5.099 5.099 0 0 1-.37-.543A1.53 1.53 0 0 1 3 1.5c0-.188.065-.368.119-.494.059-.138.134-.274.202-.388a5.446 5.446 0 0 1 .253-.382l.025-.035A.5.5 0 0 1 4.4.8Zm3 0-.003.004-.014.019a4.167 4.167 0 0 0-.204.31 2.327 2.327 0 0 0-.141.267c-.026.06-.034.092-.037.103v.004a.593.593 0 0 0 .091.248c.075.133.178.272.308.445l.01.012c.118.158.26.347.37.543.112.2.22.455.22.745 0 .188-.065.368-.119.494a3.31 3.31 0 0 1-.202.388 5.444 5.444 0 0 1-.253.382l-.018.025-.005.008-.002.002A.5.5 0 0 1 6.6 4.2l.003-.004.014-.019a4.149 4.149 0 0 0 .204-.31 2.06 2.06 0 0 0 .141-.267c.026-.06.034-.092.037-.103a.593.593 0 0 0-.09-.252A4.334 4.334 0 0 0 6.6 2.8l-.01-.012a5.099 5.099 0 0 1-.37-.543A1.53 1.53 0 0 1 6 1.5c0-.188.065-.368.119-.494.059-.138.134-.274.202-.388a5.446 5.446 0 0 1 .253-.382l.025-.035A.5.5 0 0 1 7.4.8Zm3 0-.003.004-.014.019a4.077 4.077 0 0 0-.204.31 2.337 2.337 0 0 0-.141.267c-.026.06-.034.092-.037.103v.004a.593.593 0 0 0 .091.248c.075.133.178.272.308.445l.01.012c.118.158.26.347.37.543.112.2.22.455.22.745 0 .188-.065.368-.119.494a3.198 3.198 0 0 1-.202.388 5.385 5.385 0 0 1-.252.382l-.019.025-.005.008-.002.002A.5.5 0 0 1 9.6 4.2l.003-.004.014-.019a4.149 4.149 0 0 0 .204-.31 2.06 2.06 0 0 0 .141-.267c.026-.06.034-.092.037-.103a.593.593 0 0 0-.09-.252A4.334 4.334 0 0 0 9.6 2.8l-.01-.012a5.099 5.099 0 0 1-.37-.543A1.53 1.53 0 0 1 9 1.5c0-.188.065-.368.119-.494.059-.138.134-.274.202-.388a5.446 5.446 0 0 1 .253-.382l.025-.035A.5.5 0 0 1 10.4.8Z"/>
                </svg>
                &nbsp; <br />
                  <a href="./visoes/Chamados_geral.php">Total de chamados</a>   <br>
                    <?php echo $totalz1 ?>
                </button>
            
            </div>

            <!--BOTÂO B -->
            <div class="btn-group">
                <i class="fa fa-2x fa-globe"></i>
                <button class="botoes" data-toggle="dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
  <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
  <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
</svg>
                    &nbsp; <br />
                    <a href="./visoes/Chamados_geral.php?Filtro=1">Sem atendente</a>   <br>
                    <?php echo $totalz2 ?>
                </button>
            
            </div>

            
            <!--BOTÂO C -->
            <div class="btn-group">
                <i class="fa fa-2x fa-globe"></i>
                <button class="botoes" data-toggle="dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                </svg>
                    &nbsp; <br />
                    <a href="./visoes/Chamados_geral.php?Filtro=4">Cancelados</a>   <br>
                    <?php echo $totalCancelados ?>
                </button>
            
            </div>


            
            <!--BOTÂO D -->
            <div class="btn-group">
                <i class="fa fa-2x fa-globe"></i>
                <button class="botoes" data-toggle="dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
  <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z"/>
</svg>
                    &nbsp; <br />
                    <a href="./visoes/Chamados_geral.php?Filtro=3">Reabertos</a>   <br>
                    <?php echo $totalreabertos ?>
                </button>
            
            </div>

                        <!--BOTÂO E -->
                        <div class="btn-group">
                <i class="fa fa-2x fa-globe"></i>
                <button class="botoes" data-toggle="dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
  <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
</svg>
                    &nbsp; <br />
                    <a href="./visoes/Chamados_geral.php?Filtro=6">Fechados</a>   <br>
                    <?php echo $totalFechados ?>
                </button>
            
            </div>


                                   <!--BOTÂO F -->
                                   <div class="btn-group">
                <i class="fa fa-2x fa-globe"></i>
                <button class="botoes" data-toggle="dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-stopwatch" viewBox="0 0 16 16">
  <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z"/>
  <path d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z"/>
</svg>
                    &nbsp; <br />
                    <a href="./visoes/Chamados_geral.php?Filtro=5">Pendentes</a>   <br>
                    <?php echo $totalpendentes ?>
                </button>
            
            </div> 
            <?php 
if ($IDnivel == '8' || $NivelGe == '0800') {?>




            
                                   <!--BOTÂO G -->
                                   <div class="btn-group">
                <i class="fa fa-2x fa-globe"></i>
                <button class="botoes" data-toggle="dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
</svg>
                    &nbsp; <br />
                    <a href="./visoes/Chamados_geral.php?FiltroGeral">Outros</a>   <br>
                    <?php echo $totaltratativa ?>
                </button>
            
            </div> 

           
            
<?php }?>
            <?php 
            if($IDnivel != '8'){?>

         


                                 <!--BOTÂO C -->
                                 <div class="btn-group">
                <i class="fa fa-2x fa-globe"></i>
                <button class="botoes" data-toggle="dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
</svg>
                    &nbsp; <br />
                    <a href="./visoes/Chamados_geral.php?Filtr">Outros</a>   <br>
                    <?php echo $totals22 ?>
                </button>
            
            </div>


            <?php  }?>

  <?php 

$busca_btn = "SELECT * FROM status WHERE ativo = '1' AND id_setor = '$Setor_user' AND visao = '1' ";
$resul_btn = $con_chamados->query($busca_btn) or die ($con_chamados->error);


while ($btn_sta = $resul_btn->fetch_array()){
    $titulo = $btn_sta['titulo'];
    $svg = $btn_sta['coluna3'];
    $id_btn = $btn_sta['ID_status'];
    $contaChamadosID = "contaChamadosID" . $id_btn;
    $sql = "sql"  . $id_btn;
    $up_empresas_total = "up". $id_btn;
    $total = "total". $id_btn;

    $sql = "SELECT count(*) as total FROM chamados WHERE IDsetor = '$Setor_user' and IDStatus = '$id_btn'";
    $up_empresas_total = mysqli_query($con_chamados, $sql) or die(mysqli_error($con_chamados));
    $total = $up_empresas_total->fetch_object()->total;
    

    ?>
       <div class="btn-group">
                <button class="botoes" data-toggle="dropdown">
              <?php echo   $svg?>
                &nbsp; <br />
                  <a href="./visoes/Chamados_geral.php?Filtro=<?php echo $id_btn?>"><?php echo $titulo?></a>   <br>
                    <?php echo $total ?>
                </button>
            
            </div>
<?php

}?>


     
      

            <!--Fim da terciera DIV-->
        </div>
    </div>

    <br>
    <br>
<div><h1></h1></div>
<div><h1></h1></div>
<div><h1></h1></div>
<div><h1></h1></div>




    </main>

</div>




</body>
</html>
