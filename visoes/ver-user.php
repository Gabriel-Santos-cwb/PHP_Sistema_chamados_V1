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
            $iden = $IDLogin;
            include('../funcoes-chamado/reset_senha.php');
            $user_detalhes = "SELECT login.*, setor.nome_setor
            FROM intranet.login
            INNER JOIN `chamados-intranet`.setor ON login.Setor_user = `chamados-intranet`.setor.IDsetor
            WHERE id_login = '$iden'
            ";
            $result_detalhes = $con_intra->query($user_detalhes) or die ($con_intra->error);

            while($detalhes = $result_detalhes->fetch_array()){
              $user_id = $detalhes['id_login'];
              $user_nome = $detalhes['nomeCompleto'];
              $user_email = $detalhes['email'];
              $user_login = $detalhes['Login_user'];
              $user_ativo = $detalhes['ativo'];
              $user_nivel = $detalhes['nivel'];
              $user_adm = $detalhes['adm_gerencial'];
              $acesso = $detalhes['acessos'];
              $user_setor = $detalhes['nome_setor'];
              $user_genero = $detalhes['genero'];

              if ($user_ativo == '1'){
                $user_ativo1 ='ATIVO';
              }else{
                $user_ativo1 ='INATIVO';
              }

              if ($user_nivel == '8' & $user_adm != '0800' ){
                $user_nivel1 = "RESOLVEDOR";

              }
              if ($user_nivel != '8' & $user_adm != '0800' ){
                $user_nivel1 = "COMUM";

              }
              if ($user_adm == '0800'){
                $user_nivel1 = "ADMINISTRADOR SISTEMA";

              }
              else{
                $user_adm1 = "";
              }
              if ($user_genero == '1'){
                $user_genero1 = "Feminino";
              }
              if ($user_genero == '2'){
                $user_genero1 = "Masculino";
              }
              if ($user_genero == '3'){
                $user_genero1 = "LGPTQIA+";
              }
              if ($user_genero == '4'){
                $user_genero1 = "Prefiro não dizer";
              }

            }
              // BUSCA OS SETORES ATIVOS 
            $busca_setores = "SELECT * FROM setor WHERE ativo = '1'";
            $result_setor = $con_chamados->query($busca_setores) or die ($con_chamados->error);

            // BUSCA O HISTORICO DO USER 

            $busca_hist = "SELECT * FROM historico_user WHERE id_user = '$iden' ORDER BY historico_user DESC";
            $result_hist = $con_intra->query($busca_hist) or die ($con_intra->error);

            // BUSCA IMAGEM

            $img = "SELECT * FROM login WHERE id_login = '$iden'";
            $result_img = $con_intra->query($img) or die ($con_intra->error);
            while ($img_user = $result_img->fetch_array()){
              $perfil_img = $img_user['arquivo'];
      
              if (empty($perfil_img) & $user_genero == "1"){
                $perfil_img = "feminino.png";
              }
              if (empty($perfil_img) & $user_genero == "2"){
                $perfil_img = "masculino.png";
              }
              if (empty($perfil_img) & $user_genero == "3"){
                $perfil_img = "neutro.png";
              }
              if (empty($perfil_img) & $user_genero == "4"){
                $perfil_img = "neutro.png";
              }
            
            }

            ?>
        <body>
            <div class="conteudos-chamados" id="conteudos">
                 <div class="titulo-chamados">
                    <h1>Ver detalhes do User:</h1>
            </div>
            <main>
            <div class="painel-inicial">
          <div class="card mb-3">
            <div class="card-header bg-light d-flex justify-content-between">

            <h5 >Usuario N° <?php echo $iden ?></h5><a ></a>
                <div class=" btn-acoes">

<!-- -------BUTTON----------------------------->

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#btn-img">
  Alterar Imagem
</button>

<!-- Modal -->
<div class="modal fade" id="btn-img" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Designar Chamado</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="form-barra-detalhes">
      <form enctype="multipart/form-data" action="" method="POST" class="">
  <br>
  <input name="arquivo" id="arquivo" type="file"></input>
<br>
<label>Informe o motivo </label>
<br>
<textarea id="motivo" name="motivo" cols="50" rows="10"required></textarea>
      </div>
      <div class="modal-footer">
      <input class="btn btn-primary" type="submit" value="Salvar" name="imagem">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
      </div>
    </form></div>
    <?php 
       if (isset($_POST["imagem"])) {
        $motivo = $_POST['motivo'];
        if(is_dir("../../ADM-intra/IMGusers/"))
{
echo "";
}
else
{
echo "A Pasta não Existe";
} 



// CASO SEJA ENVIADO UMA IMAGEM E PEGO O NOME DELA E FEITO UM NOVO ALEATORIO E REPASSADO O NOVO NOME PARA O BANCO

if (empty($_FILES['arquivo']['name'])) {
  echo 'Você não selecionou nenhum arquivo';//Aqui você pode trocar por um alert ou customizar como desejar, é um aviso que o usuário provavelmente não selecionou nada
  $novo_nome = "";

  }
  else{

    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
    $novo_nome = md5(time()). $extensao;
    $diretorio = "../../ADM-intra/IMGusers/"; 
    //C:\xampp\htdcs\helpson\home\upload
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
    $novo_nome;
  }

  


    $sql_motivo = $con_intra->query("INSERT INTO historico_user SET descricao = '$motivo', id_user = '$iden', acao = 'ALTERAR IMAGEM', nome_aten = '$usuario', ID_aten = '$IDLogin', data1 = '$hora:$minuto:$segundos'");
    $sql = $con_intra->query(" UPDATE login SET arquivo = '$novo_nome' WHERE id_login ='$iden' ");
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";}else{}?>
   
    </div>
  </div>
</div>

<!-- -----------FIM BOTÂO--------------- -->





<!-- -------BUTTON----------------------------->

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#btn-senha">
  Alterar Senha
</button>

<!-- Modal -->
<div class="modal fade" id="btn-senha" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Designar Chamado</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="form-barra-detalhes">
      <form enctype="multipart/form-data" action="" method="POST" class="">

      <div class="card-body bg-light">
      <div class="tab-content">
      <label class="form-label" for="card-password">Nova senha</label>
        </div>
        <input class="form-control" id="senha1" name="senha1" type="text" required>

        <div class="tab-content">
      <label class="form-label" for="card-password">Confirmar nova senha</label>
        </div>
        <input class="form-control" id="senha2" name="senha2" type="text" required>


       
        <label class="form-label" for="card-password">Informe o motivo</label>
<br>
<textarea id="motivo" name="motivo" cols="40" rows="10"required></textarea>
      </div>
      <div class="modal-footer">
      <input class="btn btn-primary" type="submit" value="Salvar" name="senha-reset">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div> </div>
    </form></div>

   
    </div>
  </div>
</div>

<!-- -----------FIM BOTÂO--------------- -->


</div>

            </div>
            <div class="organiza-flex">

           
            <div class="chamado-details">
            <div class="container"> 
     
    <div class="col-6">
      <div style="width: 500px;" class="p-3 border bg-light">
      <h3>Informações do Usuário</h3>

     

      <p><span class="label">Status:</span> <span class="atendente"><?php echo  $user_ativo1  ?></span></p>
      <p><span class="label">Login:</span> <span class="atendente"><?php echo $user_login  ?></span></p>
      <p><span class="label">Nome Completo:</span> <span class="atendente"><?php echo $user_nome ?></span></p>
    <p><span class="label">E-mail:</span> <span class="categoria"><?php echo $user_email ?></span></p>
    <p><span class="label">Permissão:</span> <span class="subcategoria"><?php echo $user_nivel1 ?></span></p>
    <p><span class="label">Setor:</span> <span class="subcategoria"><?php echo $user_setor ?></span></p>
    <p><span class="label">Genero:</span> <span class="subcategoria"><?php echo $user_genero1 ?> </span></p>
 
    

   
      </div>
    </div> <br>
    <img src="/empresa/ADM-intra/IMGusers/<?php echo $perfil_img?>" alt="" width="200" height="200" class="rounded-circle me-2">
  </div>


  
</div>
<div class="respostas-div"> 


 <div>
    <h1>HISTORICO: </h1>

    <div class="scrollable-div">

    <?php 

  while($Historico = $result_hist->fetch_array()){
 $acao = $Historico['acao'];
 $descricao_historico = $Historico['descricao'];
 $data1 = $Historico['data1'];
 $nome_aten = $Historico['nome_aten'];

?>

<div class="col"><span style="color:#480ca8;text-align:center" class="fw-bold"> Feito por: <?php 
 echo  $nome_aten ?></span></a> 
 <div class="col"><span style="color:#480ca8;text-align:center" class="fw-bold"> Ação: <?php 
 echo $acao ?></span></a> 
 <div class="col"><span style="background-color:#F8F8FF;text-align:center" class="fw-bold"> Motivo: <?php 
 echo $descricao_historico ?></span></a>
 <div class="col"><span style="background-color:#F8F8FF;text-align:center" class="fw-bold"> Horas: <?php echo $data1 ?></span></a><br><br>
 <?php }?>
 




                  
</div>


 </div>


  </div>
</div>
</div>
    
        </div>




                  
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