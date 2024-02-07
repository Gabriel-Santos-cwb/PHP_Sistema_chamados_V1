<?php
$nomeUsuario = $_SERVER['REMOTE_USER'] ?? $_SERVER['AUTH_USER'] ?? 'Nome de usuário desconhecido';
echo $nomeUsuario;
?>
<script>
    var nomeUsuario = window.navigator.userAgent;
console.log(nomeUsuario);

</script>

<form method="POST" action="salvar_formulario.php">
  <label for="nome_formulario">Nome do Formulário:</label>
  <input type="text" name="nome_formulario" id="nome_formulario">
  
  <div id="campos">
    <!-- Campos adicionados dinamicamente aparecerão aqui -->
  </div>
  
  <button type="button" onclick="adicionarCampo()">Adicionar Campo</button>
  <button type="submit">Salvar Formulário</button>
</form>

<script>
  let contadorCampos = 0;

  function adicionarCampo() {
    contadorCampos++;

    const divCampos = document.getElementById('campos');

    const novoCampo = document.createElement('div');
    novoCampo.innerHTML = `
      <label for="nome_campo_${contadorCampos}">Nome do Campo:</label>
      <input type="text" name="nomes_campos[]" id="nome_campo_${contadorCampos}">
      
      <label for="tipo_campo_${contadorCampos}">Tipo de Campo:</label>
      <select name="tipos_campos[]" id="tipo_campo_${contadorCampos}">
        <option value="input">Input</option>
        <option value="textarea">Textarea</option>
        <option value="select">Select</option>
      </select>
      
      <br>
      
      <div id="opcoes_campo_${contadorCampos}" style="display: none;">
        <label for="opcoes_${contadorCampos}">Opções:</label>
        <input type="text" name="opcoes_campos[]" id="opcoes_${contadorCampos}">
      </div>
      
      <br>
    `;

    divCampos.appendChild(novoCampo);
  }

  function mostrarOpcoesCampo(selectId) {
    const select = document.getElementById(selectId);
    const divOpcoes = document.getElementById(`opcoes_${selectId}`);

    if (select.value === 'select') {
      divOpcoes.style.display = 'block';
    } else {
      divOpcoes.style.display = 'none';
    }
  }
</script>




<?php



  
/*
 Conexão com o banco de dados
 CREATE TABLE forms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    fields TEXT
  );


$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Obtém os dados do formulário
$nomeFormulario = $_POST['nome_formulario'];
$campos = $_POST['campos'];

// Serializa os campos em JSON
$camposJson = json_encode($campos);

// Insere os dados no banco de dados
$sql = "INSERT INTO forms (name, fields) VALUES ('$nomeFormulario', '$camposJson')";

if ($conn->query($sql) === TRUE) {
    echo "Formulário salvo com sucesso!";
} else {
    echo "Erro ao salvar o formulário: " . $conn->error;
}

$conn->close();
?>


*/
