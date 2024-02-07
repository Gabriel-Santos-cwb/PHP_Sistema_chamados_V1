function buscarCategorias() {
    var setorSelecionado = document.getElementById("seleciona_setor").value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("seleciona_categoria").innerHTML = this.responseText;

            var numOpcoes = document.getElementById("seleciona_categoria").options.length;
            if (numOpcoes === 1) {
                buscarSubCategorias();
            }
        }
    };
    xhttp.open("GET", "./funcoes-chamado/buscar_categorias.php?setor=" + setorSelecionado, true);
    xhttp.send();
}

function buscarSubCategorias() {
    var categoriaSelecionada = document.getElementById("seleciona_categoria").value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("seleciona_Subcategoria").innerHTML = this.responseText;
            document.getElementById("seleciona_acao").innerHTML = "<option value=''>Selecione Ação</option>";
            if (this.responseText.trim() === "") {
                buscar();
            }
        }
    };
    xhttp.open("GET", "./funcoes-chamado/buscar_Subcategorias.php?categoria=" + categoriaSelecionada, true);
    xhttp.send();
}

// Chama a função buscarSubCategorias() no evento onload do corpo do documento
window.onload = function() {
    buscarSubCategorias();
};

function buscar() {
    var subcategoriaSelecionada = document.getElementById("seleciona_Subcategoria").value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("seleciona_acao").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "./funcoes-chamado/buscar_acao.php?acao=" + subcategoriaSelecionada, true);
    xhttp.send();
}

function verificarSelecaoSetor() {
    var selects = document.getElementsByTagName("select");
    for (var i = 0; i < selects.length; i++) {
        var select = selects[i];
        if (select.value !== "") {
            var functionName = select.getAttribute("onchange");
            if (functionName) {
                window[functionName]();
            }
        }
        // Verifica se há apenas uma opção no select e chama a função buscar() se for o caso
        if (select.options.length === 2) {
            var nextSelect = select.nextElementSibling;
            if (nextSelect && nextSelect.tagName === "SELECT") {
                var nextFunctionName = nextSelect.getAttribute("onchange");
                if (nextFunctionName) {
                    window[nextFunctionName]();
                }
            }
        }
    }
}