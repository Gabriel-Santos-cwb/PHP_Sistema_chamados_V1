<?php 
         if (isset($_POST["senha-reset"])) {
            $senhaA = $_POST['senha1'];
            $senhaB = $_POST['senha2'];
            $senha_con = $senhaA;
            
            // Verifica se a senha tem pelo menos 6 caracteres
     if (strlen($senha_con) < 6) {
       echo "A senha deve ter pelo menos 6 caracteres.";
       echo " <META HTTP-EQUIV='REFRESH' CONTENT='6'>";
       exit();
     }

            // Verifica se a senhas são iguais
            if ($senhaB != $senhaA) {
              echo "As senhas devem ser iguais.";
              echo " <META HTTP-EQUIV='REFRESH' CONTENT='6'>";
              exit();
            }
     
     // Verifica se a senha contém pelo menos uma letra maiúscula
     if (!preg_match('/[A-Z]/', $senha_con)) {
       echo "A senha deve conter pelo menos uma letra maiúscula.";
       echo " <META HTTP-EQUIV='REFRESH' CONTENT='6'>";
       exit();
     }
     
     // Verifica se a senha contém pelo menos uma letra minúscula
     if (!preg_match('/[a-z]/', $senha_con)) {
       echo "A senha deve conter pelo menos uma letra minúscula.";
       echo " <META HTTP-EQUIV='REFRESH' CONTENT='6'>";
       exit();
     }
     
     // Verifica se a senha contém pelo menos um símbolo
     if (!preg_match('/[!@#$%^&*()-=_+]/', $senha_con)) {
       echo "A senha deve conter pelo menos um símbolo.";
       echo " <META HTTP-EQUIV='REFRESH' CONTENT='6'>";
       exit();
     }
     
     // Verifica se a senha contém pelo menos um número
     if (!preg_match('/\d/', $senha_con)) {
       echo "A senha deve conter pelo menos um número.";
       echo " <META HTTP-EQUIV='REFRESH' CONTENT='6'>";
       exit();
     }

  //-------------------------------------------Criptografia da senha
  $senha3 = md5($senha_con);
  $senha2 = password_hash($senha_con, PASSWORD_DEFAULT);  
  $motivo = $_POST['motivo'];
  $sql_motivo = $con_intra->query("INSERT INTO historico_user SET descricao = '$motivo', id_user = '$iden', acao = 'RESET DE SENHA', nome_aten = '$usuario', ID_aten = '$IDLogin', data1 = '$hora:$minuto:$segundos'");
  $sql = $con_intra->query("UPDATE login SET senha = '$senha2' WHERE id_login = '$iden'");
  echo "<META HTTP-EQUIV='REFRESH' CONTENT='6'>";}else{}
  ?>