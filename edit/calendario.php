<!-- DEV GABRIEL SANTOS-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Inicio</title>
        <link rel="icon" href="./Home/Imagens/icone.png" /><!-- ICONE DA PAGINA-->
        <link rel="stylesheet" type="text/css" href="../CSS/edit.css" />
        <script src="../funcoes-chamado/pagina.js"></script>
        <link rel="stylesheet" type="text/css" href="../CSS/menu-chamados.css" />
        <link href="../../bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="../../bootstrap-5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="../funcoes-chamado//pagina.js"></script>
        <?php

include(__DIR__.'/../menu-chamados.php');
include('../funcoes-chamado/permissoes.php');
include('../Comandos-SQL/sql_calendario.php');


if (isset($_POST["submit"])) {
    // Obtém os dias de trabalho selecionados pelo usuário
    $diasTrabalho = $_POST["dias_trabalho"];
    $nome_calendario = $_POST["nome_calendario"];
    // Obtém os horários de início e término de trabalho
    $horarioInicio = $_POST["horario_inicio"];
    $horarioFim = $_POST["horario_fim"];
    $dias = implode(",", $diasTrabalho); 
    $sql = $con_chamados->query("INSERT INTO calendarios SET nome_calendario = '$nome_calendario', diasTrabalho = '$dias', horarioInicio = '$horarioInicio', horarioFim = '$horarioFim' , ativo = '1', setor_id = '$Setor_user' ");
   
   // echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
  }else{
  
  }


?>
<body>

<div class="conteudos-chamados" id="conteudos">
<div class="titulo-chamados">
        <h1>Ações do calendario: ?</h1>
    </div>
    <main>
  <div class="painel-inicial">
<main>


<div class="organiza-btn"> 
<!-- ADICIONAR  -->
<button type="button" class="btn-abre-forms" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-calendar-check-fill" viewBox="0 0 16 16">
  <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
</svg> <br> Adicionar novo calendario
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div style="width: 900px; margin-left: -20%" class="modal-content">
    <div class="calendario-edit">
    <form method="POST" action="">
    <label>Nome do Calendario</label><br>
    <input name="nome_calendario"> <br><br>
    <label for="dias_trabalho">Dias de trabalho:</label><br>
    <input class="check" type="checkbox" name="dias_trabalho[]" value="segunda"> Segunda-feira
    <input class="check" type="checkbox" name="dias_trabalho[]" value="terca"> Terça-feira
    <input  class="check" type="checkbox" name="dias_trabalho[]" value="quarta"> Quarta-feira
    <input  class="check" type="checkbox" name="dias_trabalho[]" value="quinta"> Quinta-feira
    <input class="check" type="checkbox" name="dias_trabalho[]" value="sexta"> Sexta-feira
    <input class="check" type="checkbox" name="dias_trabalho[]" value="sabado"> Sabado
    <input class="check" type="checkbox" name="dias_trabalho[]" value="domingo"> Domingo
    <br>
    <label for="horario_inicio">Horário de início:</label><br>
    <input type="time" name="horario_inicio">
    <br>
    <label for="horario_fim">Horário de término:</label><br>
    <input type="time" name="horario_fim">
    <br>
    </div>
      <div style="width: 600px;" class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <input type="submit" class="btn btn-secondary" name="submit" value="Salvar">
      </div></form>
    </div>
  </div>
</div>

<!-- FIM DO ADICIONAR -->

<!-- REMOVER  -->
<button type="button" class="btn-abre-forms" data-bs-toggle="modal" data-bs-target="#remover">
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-calendar-x-fill" viewBox="0 0 16 16">
  <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM6.854 8.146 8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708z"/>
</svg> <br> Remover calendario
</button>

<!-- Modal -->
<div class="modal fade" id="remover" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="removerLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div style=" width: 900px; margin-left: -20%" class="modal-content">
    <div class="calendario-edit">
    <form method="POST" action="">
    <label class="form-label" for="card-password">Selecione o Calendario:</label><br>
    <select class="form-select" id="id_pesquisa" name="id_pesquisa" aria-label="Floating label select example">
    <option>Selecione</option>
    <?php 
    while($calendarioAT = $result_calendario->fetch_array()){?>
    <option value="<?php echo ($calendarioAT['id_calendario'])?>"><?php echo ($calendarioAT['nome_setor'])?> - <?php echo ($calendarioAT['nome_calendario'])?></option>;
    <?php }
    if(isset($_POST["deletar"])){
      $id_pesquisa = $_POST['id_pesquisa'];
      $sql = $con_chamados->query("UPDATE calendarios SET ativo = '0' WHERE calendarios.id_calendario ='$id_pesquisa' ");
      echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";}
      else{}
    ?>
  </select></div>
  <div style="width: 600px;" class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <input type="submit" class="btn btn-secondary" name="deletar" value="Salvar">
      </div></form>
    </div>
    </div>
  </div>
  <!-- FIM DO REMOVER -->

  <!-- RESTAURAR  -->
<button type="button" class="btn-abre-forms" data-bs-toggle="modal" data-bs-target="#restaurar">
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
  <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z"/>
</svg> <br> Restaurar calendario
</button>

<!-- Modal -->
<div class="modal fade" id="restaurar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="removerLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div style=" width: 900px; margin-left: -20%" class="modal-content">
    <div class="calendario-edit">
    <form method="POST" action="">
    <label class="form-label" for="card-password">Selecione o Calendario:</label><br>
    <select class="form-select" id="id_pesquisa" name="id_pesquisa" aria-label="Floating label select example">
    <option>Selecione</option>
    <?php 
    while($calendarioDE = $result_calendario_de->fetch_array()){?>
    <option value="<?php echo ($calendarioDE['id_calendario'])?>"><?php echo ($calendarioDE['nome_setor'])?> - <?php echo ($calendarioDE['nome_calendario'])?></option>;
    <?php }
    if(isset($_POST["restaurar-btn"])){
      $id_pesquisa = $_POST['id_pesquisa'];
      $sql = $con_chamados->query("UPDATE calendarios SET ativo = '1' WHERE calendarios.id_calendario ='$id_pesquisa' ");
      echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";}
      else{}
    ?>
  </select></div>
  <div style="width: 600px;" class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <input type="submit" class="btn btn-secondary" name="restaurar-btn" value="Salvar">
      </div></form>
    </div>
    </div>
  </div>
  <!-- FIM DO RESTAURAR -->

</div>
</div>
</main>
  </div>
  
</body>
</html>