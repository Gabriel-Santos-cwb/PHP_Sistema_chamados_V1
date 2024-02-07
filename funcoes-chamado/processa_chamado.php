<?php
// TRAZ OS ARQUIVOS NECESSARIOS 

include_once("../conexao-chamados/conexao-chamados.php");
include ("../funcoes-chamado/verifica-page.php");

// DEV - GABRIEL SANTOS 

  $currentDateTime = date('Y-m-d H:i:s');



  $seleciona_setor =$_POST['seleciona_setor']; // traz o ID do setor cadastrado no banco de dados 
  $seleciona_categoria =$_POST['seleciona_categoria']; // traz o ID do tipo do seleciona_categoria 
  $seleciona_Subcategoria =$_POST['seleciona_Subcategoria']; // traz o ID do tipo do seleciona_Subcategoria 
  $seleciona_acao =$_POST['seleciona_acao']; // traz o ID do tipo do seleciona_Subcategoria 
  $descricao =$_POST['descricao']; // traz a descricao


  $sql_chamado = "INSERT INTO chamados (data_abertura, email_user, IDlogin_user, nome_completo, nome_user, IDsetor, IDcategoria, IDSubCategoria, descricao, IDacao, IDatendente) VALUES ('$currentDateTime','$IDemail','$IDLogin','$nomeCompleto','$usuario','$seleciona_setor','$seleciona_categoria','$seleciona_Subcategoria','$descricao','$seleciona_acao', '1')";
  $salvachamado = mysqli_query($con_chamados,$sql_chamado) or die ($con_chamados->error); 

 $buscar_NOME_setor = "SELECT * FROM setor WHERE IDsetor = '$seleciona_setor'";
 $RESULT_nome_setor = $con_chamados->query($buscar_NOME_setor) or die ($con_chamados->error);

 while($NOME_SETOR = $RESULT_nome_setor->fetch_array()){
  $SEETOR = $NOME_SETOR['nome_setor'];
 }

 ///

 $buscar_NOME_CATEGORIA = "SELECT * FROM categoria_incidente WHERE id_categoria = ' $seleciona_categoria'";
 $RESULT_nome_CATEGORIA = $con_chamados->query($buscar_NOME_CATEGORIA) or die ($con_chamados->error);

 while($NOME_CATEGORIA = $RESULT_nome_CATEGORIA->fetch_array()){
  $NOOOme_CATEGORIA = $NOME_CATEGORIA['nome_cat'];
 }

 ///

 $buscar_NOME_subcategoria = "SELECT * FROM sub_categoria WHERE id_subcategoria  = '$seleciona_Subcategoria'";
 $RESULT_nome_subcategoria = $con_chamados->query($buscar_NOME_subcategoria) or die ($con_chamados->error);

 while($NOME_subcategoria = $RESULT_nome_subcategoria->fetch_array()){
  $NOOOme_subcategoria = $NOME_subcategoria['nome_sub'];
 }

 ///


 $buscar_NOME_ACAO = "SELECT * FROM acao_subcategoria WHERE id_acao = '$seleciona_acao'";
 $RESULT_nome_ACAO = $con_chamados->query($buscar_NOME_ACAO) or die ($con_chamados->error);

 while($NOME_ACAO= $RESULT_nome_ACAO->fetch_array()){
  $NOOOme_ACAO = $NOME_ACAO['nome_acao'];
 }




  $mensagem = "SEU CHAMADO FOI ABERTO COM SUCESSO <br>
  SEGUEM DADOS: <br>
  SETOR: $SEETOR<br>
  CATEGORIA: $NOOOme_CATEGORIA<br>
  SUB-CATEGORIA: $NOOOme_subcategoria<br>
  AÇÃO: $NOOOme_ACAO<br><br>
  DESCRIÇÃO: $descricao


  ";
  $e_mail_cliente = $IDemail;

  $titulo_assunto = "'$nomeCompleto' SEU CHAMADO FOI ABERTO COM SUCESSO";

 

  if (mysqli_affected_rows($con_chamados) > 0) {

    //include_once ('../email.php');
    include(__DIR__.'/.././email.php');
    echo "sucesso ao abrir seu chamado";
    echo " <META HTTP-EQUIV='REFRESH' CONTENT='1;  ../novo-chamado.php'>";
    
    
} else {
    echo "erro";
}
