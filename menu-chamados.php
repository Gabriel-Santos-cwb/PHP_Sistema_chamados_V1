<?php 

include(__DIR__.'/./conexao-chamados/conexao-chamados.php');
include(__DIR__.'/./funcoes-chamado/verifica-page.php');
include(__DIR__.'/links/links-menu.php');
include(__DIR__.'/../ADM-intra/conexao-intra/conexao-intra.php');

?>


<!-- DEV GABRIEL SANTOS-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Inicio</title>
        <link rel="icon" href="./Home/Imagens/icone.png" /><!-- ICONE DA PAGINA-->    
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="" />
        <link href="<?php echo dirname($_SERVER['PHP_SELF']) . './CSS/menu-chamados.css'; ?>" rel="stylesheet">
        <link href="<?php echo dirname($_SERVER['PHP_SELF']) . '/../bootstrap-5.3.0/css/bootstrap.min.css'; ?>" rel="stylesheet">
        <script src="<?php echo dirname($_SERVER['PHP_SELF']) . '/../bootstrap-5.3.0/js/bootstrap.bundle.min.js'; ?>"></script>
        <script src="<?php echo __DIR__.'/funcoes-chamado/menu.js'; ?>"></script>
        
</head>

<body>



<div>
    <main>
      <?php 
      $img = "SELECT * FROM login WHERE id_login = '$IDLogin'";
      $result_img = $con_intra->query($img) or die ($con_intra->error);
      while ($img_user = $result_img->fetch_array()){
        $perfil_img = $img_user['arquivo'];

        if (empty($perfil_img) & $IDgenero == "1"){
          $perfil_img = "feminino.png";
        }
        if (empty($perfil_img) & $IDgenero == "2"){
          $perfil_img = "masculino.png";
        }
        if (empty($perfil_img) & $IDgenero == "3" || (empty($perfil_img) & $IDgenero == "4" )){
          $perfil_img = "neutro.png";
        }
      
      }
      ?>

    <!-- --------COMEÇO NAVBAR ---------->



    <div class="navbar-chamados">
      <nav>
      <button style="margin-left: 1px;" id="abrir" class="btn-abrir" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>

        
        </button>
        <div class="nome-perfil"><p>Bem vindo(a): <?php echo $nomeCompleto ?></p>
      </div>
       


        <div style="margin-left: 1206px; margin-top:-68px; " class="dropdown">
  <button style="border:none; background-image: linear-gradient(to bottom, #262626, rgba(243, 238, 238, 0.8)); " class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
<img src="/empresa/ADM-intra/IMGusers/<?php echo $perfil_img?>" alt="" width="50" height="48" class="rounded-circle me-2">
  </button>
  <ul class="dropdown-menu">
  
    <li><a class="dropdown-item" href="<?php echo $link_user?>">Editar - Perfil</a></li>
    <li><a class="dropdown-item" href="<?php echo $link_sair?>">SAIR</a></li>
    
  </ul>
</div>
      
      </nav>
    </div>



    <i class="bi bi-arrow-down-right-square"></i>

<!-- --------FINAL NAVBAR ---------->
   

<!-- INICIO DO MENU --> 

<div  class="div-menu">  
<div style="overflow-y: scroll; max-width: 20%;background-color: black;"  class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header">
    <h5 style="color: #fff; margin-left:80px" id="offcanvasScrollingLabel"><div class="menuu"></div></h5>
    <button style="background-color: #fff;" id="cancel" type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="d-flex flex-column flex-shrink-0 bg-light" style="width: auto;">
 
    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
    <li><a href="<?php echo $link_inicio ?>" class="nav-link py-3 border-bottom"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
  <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
</svg></a></li>
        <!-- --------COMEÇO BOTÃO ---------->
       <?php 
       
       if ($IDnivel == '8' || $NivelGe == '0800') {?>
        <li>
        <button class="btn-drop-menu" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
  <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
</svg> ADMINISTRAR
        </button>
        <div style=" background-color: blueviolet; color:#fff" class="collapse show" id="home-collapse">
          <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
            
            <li><a href="<?php echo $link_acao ?>" class="nav-link py-3 border-bottom">ADMINISTRAR - AÇÕES INCIDENTE</a></li>
            <li><a href="<?php echo $link_categorias ?>" class="nav-link py-3 border-bottom">ADMINISTRAR - CATEGORIAS</a></li>
            <li><a href="<?php echo $link_subcategorias ?>" class="nav-link py-3 border-bottom">ADMINISTRAR - SUBCATEGORIAS</a></li>
            <li><a href="<?php echo $link_cidades?>" class="nav-link py-3 border-bottom">ADMINISTRAR - CIDADES</a></li>
            <li><a href="<?php echo $link_calendario?>" class="nav-link py-3 border-bottom">ADMINISTRAR - CALENDARIOS</a></li>           
            <li><a href="<?php echo $link_sla?>" class="nav-link py-3 border-bottom">ADMINISTRAR - SLA</a></li>
            <li><a href="<?php echo $link_status?>" class="nav-link py-3 border-bottom">ADMINISTRAR - STATUS</a></li>
            <li><a href="<?php echo $link_prioridade?>" class="nav-link py-3 border-bottom">ADMINISTRAR - PRIORIDADES</a></li>
            <li><a href="<?php echo $link_setor?>" class="nav-link py-3 border-bottom">ADMINISTRAR - SETORES</a></li>
            <li><a href="<?php echo $link_admuser?>" class="nav-link py-3 border-bottom">ADMINISTRAR - USUÁRIOS</a></li>
          </ul>
        </div>
      </li>
      <!-- --------FINAL BOTÃO ---------->


            <!-- --------COMEÇO BOTÃO ---------->

            <li>
      <button class="btn-drop-menu" data-bs-toggle="collapse" data-bs-target="#account-collapse2" aria-expanded="false">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bug-fill" viewBox="0 0 16 16">
  <path d="M4.978.855a.5.5 0 1 0-.956.29l.41 1.352A4.985 4.985 0 0 0 3 6h10a4.985 4.985 0 0 0-1.432-3.503l.41-1.352a.5.5 0 1 0-.956-.29l-.291.956A4.978 4.978 0 0 0 8 1a4.979 4.979 0 0 0-2.731.811l-.29-.956z"/>
  <path d="M13 6v1H8.5v8.975A5 5 0 0 0 13 11h.5a.5.5 0 0 1 .5.5v.5a.5.5 0 1 0 1 0v-.5a1.5 1.5 0 0 0-1.5-1.5H13V9h1.5a.5.5 0 0 0 0-1H13V7h.5A1.5 1.5 0 0 0 15 5.5V5a.5.5 0 0 0-1 0v.5a.5.5 0 0 1-.5.5H13zm-5.5 9.975V7H3V6h-.5a.5.5 0 0 1-.5-.5V5a.5.5 0 0 0-1 0v.5A1.5 1.5 0 0 0 2.5 7H3v1H1.5a.5.5 0 0 0 0 1H3v1h-.5A1.5 1.5 0 0 0 1 11.5v.5a.5.5 0 1 0 1 0v-.5a.5.5 0 0 1 .5-.5H3a5 5 0 0 0 4.5 4.975z"/>
</svg> ATENDENTE 
        </button>
        <div class="collapse" id="account-collapse2">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li><a href="<?php echo $link_vinculados?>" class="nav-link py-3 border-bottom">CHAMADOS - VINCULADOS</a></li>

   
          </ul>
        </div>
      </li>

      <!-- --------FINAL BOTÃO ---------->

       <!-- --------COMEÇO BOTÃO ---------->


       <li>
      <button class="btn-drop-menu" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
  <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
  </svg>  USUARIOS
        </button>
        <div style="text-align: left; width:100%;" class="collapse" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="<?php echo $link_cadastro?>" class="nav-link py-3 border-bottom"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
  <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
  </svg> ADICIONAR USUARIO</a></li>
            <li><a href="<?php echo $link_editar_user?>" class="nav-link py-3 border-bottom"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
  <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
  </svg> EDITAR USUARIO</a></li>
            <li><a href="#" class="nav-link py-3 border-bottom"> <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
  </svg> MINHA EQUIPE</a></li>
            <li><a href="#" class="nav-link py-3 border-bottom"> <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
  </svg> VISÃO GERAL</a></li>
          </ul>
        </div>
      </li>

      <!-- --------FINAL BOTÃO ---------->

      <?php 
  }?>
      <!-- --------COMEÇO BOTÃO ---------->

      <li>
      <button class="btn-drop-menu" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-ticket-detailed-fill" viewBox="0 0 16 16">
  <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5Zm4 1a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5Zm0 5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5ZM4 8a1 1 0 0 0 1 1h6a1 1 0 1 0 0-2H5a1 1 0 0 0-1 1Z"/>
</svg> CHAMADOS
        </button>
        <div class="collapse" id="dashboard-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li><a href="<?php echo $link_novo_chamado ?>" class="nav-link py-3 border-bottom">NOVO CHAMADO</a></li>
          <li><a href="<?php echo $link_meus_chamados ?>" class="nav-link py-3 border-bottom">MEUS CHAMADOS </a></li>
            <li><a href="#" class="nav-link py-3 border-bottom">ABERTOS - PARA A EQUIPE</a></li>
            <li><a href="#" class="nav-link py-3 border-bottom">ABERTOS - PELA EQUIPE</a></li>
            <li><a href="#" class="nav-link py-3 border-bottom">FECHADOS</a></li>
            <li><a href="#" class="nav-link py-3 border-bottom">CANCELADOS</a></li>
            <li><a href="#" class="nav-link py-3 border-bottom">VISÃO GERAL</a></li>
          </ul>
        </div>
        </li>

        <!-- --------FINAL BOTÃO ---------->
       
      <!-- --------COMEÇO BOTÃO ---------->
      <?php 

      if ($IDnivel == '8' || $NivelGe == '0800') {?>
      <li>
      <button class="btn-drop-menu" data-bs-toggle="collapse" data-bs-target="#account-collapse1" aria-expanded="false">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bug-fill" viewBox="0 0 16 16">
  <path d="M4.978.855a.5.5 0 1 0-.956.29l.41 1.352A4.985 4.985 0 0 0 3 6h10a4.985 4.985 0 0 0-1.432-3.503l.41-1.352a.5.5 0 1 0-.956-.29l-.291.956A4.978 4.978 0 0 0 8 1a4.979 4.979 0 0 0-2.731.811l-.29-.956z"/>
  <path d="M13 6v1H8.5v8.975A5 5 0 0 0 13 11h.5a.5.5 0 0 1 .5.5v.5a.5.5 0 1 0 1 0v-.5a1.5 1.5 0 0 0-1.5-1.5H13V9h1.5a.5.5 0 0 0 0-1H13V7h.5A1.5 1.5 0 0 0 15 5.5V5a.5.5 0 0 0-1 0v.5a.5.5 0 0 1-.5.5H13zm-5.5 9.975V7H3V6h-.5a.5.5 0 0 1-.5-.5V5a.5.5 0 0 0-1 0v.5A1.5 1.5 0 0 0 2.5 7H3v1H1.5a.5.5 0 0 0 0 1H3v1h-.5A1.5 1.5 0 0 0 1 11.5v.5a.5.5 0 1 0 1 0v-.5a.5.5 0 0 1 .5-.5H3a5 5 0 0 0 4.5 4.975z"/>
</svg> FUNÇÕES DO ADMINISTRADOR
        </button>
        <div class="collapse" id="account-collapse1">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="nav-link py-3 border-bottom">New...</a></li>
            <li><a href="#" class="nav-link py-3 border-bottom">Profile</a></li>
            <li><a href="#" class="nav-link py-3 border-bottom">Settings</a></li>
            <li><a href="#" class="nav-link py-3 border-bottom">Sign out</a></li>
          </ul>
        </div>
      </li>

      <!-- --------FINAL BOTÃO ---------->





      
          <!-- --------COMEÇO BOTÃO ---------->

          <li>
      <button class="btn-drop-menu" data-bs-toggle="collapse" data-bs-target="#account-collapse3" aria-expanded="false">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bug-fill" viewBox="0 0 16 16">
  <path d="M4.978.855a.5.5 0 1 0-.956.29l.41 1.352A4.985 4.985 0 0 0 3 6h10a4.985 4.985 0 0 0-1.432-3.503l.41-1.352a.5.5 0 1 0-.956-.29l-.291.956A4.978 4.978 0 0 0 8 1a4.979 4.979 0 0 0-2.731.811l-.29-.956z"/>
  <path d="M13 6v1H8.5v8.975A5 5 0 0 0 13 11h.5a.5.5 0 0 1 .5.5v.5a.5.5 0 1 0 1 0v-.5a1.5 1.5 0 0 0-1.5-1.5H13V9h1.5a.5.5 0 0 0 0-1H13V7h.5A1.5 1.5 0 0 0 15 5.5V5a.5.5 0 0 0-1 0v.5a.5.5 0 0 1-.5.5H13zm-5.5 9.975V7H3V6h-.5a.5.5 0 0 1-.5-.5V5a.5.5 0 0 0-1 0v.5A1.5 1.5 0 0 0 2.5 7H3v1H1.5a.5.5 0 0 0 0 1H3v1h-.5A1.5 1.5 0 0 0 1 11.5v.5a.5.5 0 1 0 1 0v-.5a.5.5 0 0 1 .5-.5H3a5 5 0 0 0 4.5 4.975z"/>
</svg> FUNÇÕES 
        </button>
        <div class="collapse" id="account-collapse3">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="nav-link py-3 border-bottom">New...</a></li>
            <li><a href="#" class="nav-link py-3 border-bottom">Profile</a></li>
          
          </ul>
        </div>
      </li>

      <!-- --------FINAL BOTÃO ---------->
     
                <!-- --------COMEÇO BOTÃO ---------->

                <li>
      <button class="btn-drop-menu" data-bs-toggle="collapse" data-bs-target="#account-collapse3" aria-expanded="false">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bug-fill" viewBox="0 0 16 16">
  <path d="M4.978.855a.5.5 0 1 0-.956.29l.41 1.352A4.985 4.985 0 0 0 3 6h10a4.985 4.985 0 0 0-1.432-3.503l.41-1.352a.5.5 0 1 0-.956-.29l-.291.956A4.978 4.978 0 0 0 8 1a4.979 4.979 0 0 0-2.731.811l-.29-.956z"/>
  <path d="M13 6v1H8.5v8.975A5 5 0 0 0 13 11h.5a.5.5 0 0 1 .5.5v.5a.5.5 0 1 0 1 0v-.5a1.5 1.5 0 0 0-1.5-1.5H13V9h1.5a.5.5 0 0 0 0-1H13V7h.5A1.5 1.5 0 0 0 15 5.5V5a.5.5 0 0 0-1 0v.5a.5.5 0 0 1-.5.5H13zm-5.5 9.975V7H3V6h-.5a.5.5 0 0 1-.5-.5V5a.5.5 0 0 0-1 0v.5A1.5 1.5 0 0 0 2.5 7H3v1H1.5a.5.5 0 0 0 0 1H3v1h-.5A1.5 1.5 0 0 0 1 11.5v.5a.5.5 0 1 0 1 0v-.5a.5.5 0 0 1 .5-.5H3a5 5 0 0 0 4.5 4.975z"/>
</svg> FUNÇÕES 
        </button>
        <div class="collapse" id="account-collapse3">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="nav-link py-3 border-bottom">New...</a></li>
            <li><a href="#" class="nav-link py-3 border-bottom">Profile</a></li>
          
          </ul>
        </div>
      </li>

      <!-- --------FINAL BOTÃO ---------->

                <!-- --------COMEÇO BOTÃO ---------->

                <li>
      <button class="btn-drop-menu" data-bs-toggle="collapse" data-bs-target="#account-collapse3" aria-expanded="false">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bug-fill" viewBox="0 0 16 16">
  <path d="M4.978.855a.5.5 0 1 0-.956.29l.41 1.352A4.985 4.985 0 0 0 3 6h10a4.985 4.985 0 0 0-1.432-3.503l.41-1.352a.5.5 0 1 0-.956-.29l-.291.956A4.978 4.978 0 0 0 8 1a4.979 4.979 0 0 0-2.731.811l-.29-.956z"/>
  <path d="M13 6v1H8.5v8.975A5 5 0 0 0 13 11h.5a.5.5 0 0 1 .5.5v.5a.5.5 0 1 0 1 0v-.5a1.5 1.5 0 0 0-1.5-1.5H13V9h1.5a.5.5 0 0 0 0-1H13V7h.5A1.5 1.5 0 0 0 15 5.5V5a.5.5 0 0 0-1 0v.5a.5.5 0 0 1-.5.5H13zm-5.5 9.975V7H3V6h-.5a.5.5 0 0 1-.5-.5V5a.5.5 0 0 0-1 0v.5A1.5 1.5 0 0 0 2.5 7H3v1H1.5a.5.5 0 0 0 0 1H3v1h-.5A1.5 1.5 0 0 0 1 11.5v.5a.5.5 0 1 0 1 0v-.5a.5.5 0 0 1 .5-.5H3a5 5 0 0 0 4.5 4.975z"/>
</svg> FUNÇÕES 
        </button>
        <div class="collapse" id="account-collapse3">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="nav-link py-3 border-bottom">New...</a></li>
            <li><a href="#" class="nav-link py-3 border-bottom">Profile</a></li>
          
          </ul>
        </div>
      </li>

      <!-- --------FINAL BOTÃO ---------->


                <!-- --------COMEÇO BOTÃO ---------->

                <li>
      <button class="btn-drop-menu" data-bs-toggle="collapse" data-bs-target="#account-collapse3" aria-expanded="false">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bug-fill" viewBox="0 0 16 16">
  <path d="M4.978.855a.5.5 0 1 0-.956.29l.41 1.352A4.985 4.985 0 0 0 3 6h10a4.985 4.985 0 0 0-1.432-3.503l.41-1.352a.5.5 0 1 0-.956-.29l-.291.956A4.978 4.978 0 0 0 8 1a4.979 4.979 0 0 0-2.731.811l-.29-.956z"/>
  <path d="M13 6v1H8.5v8.975A5 5 0 0 0 13 11h.5a.5.5 0 0 1 .5.5v.5a.5.5 0 1 0 1 0v-.5a1.5 1.5 0 0 0-1.5-1.5H13V9h1.5a.5.5 0 0 0 0-1H13V7h.5A1.5 1.5 0 0 0 15 5.5V5a.5.5 0 0 0-1 0v.5a.5.5 0 0 1-.5.5H13zm-5.5 9.975V7H3V6h-.5a.5.5 0 0 1-.5-.5V5a.5.5 0 0 0-1 0v.5A1.5 1.5 0 0 0 2.5 7H3v1H1.5a.5.5 0 0 0 0 1H3v1h-.5A1.5 1.5 0 0 0 1 11.5v.5a.5.5 0 1 0 1 0v-.5a.5.5 0 0 1 .5-.5H3a5 5 0 0 0 4.5 4.975z"/>
</svg> FUNÇÕES 
        </button>
        <div class="collapse" id="account-collapse3">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="nav-link py-3 border-bottom">New...</a></li>
            <li><a href="#" class="nav-link py-3 border-bottom">Profile</a></li>
          
          </ul>
        </div>
      </li>

      <!-- --------FINAL BOTÃO ---------->
   
          <?php 
  }?>
    </ul>


    </main>
</div>
</div>


</body></html>

