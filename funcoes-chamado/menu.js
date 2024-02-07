
    document.addEventListener('DOMContentLoaded', function() {
        const abrirBtn = document.getElementById('abrir');
        const btn = document.getElementById('btn');
        const cancelBtn = document.getElementById('cancel');
        if (abrirBtn) {
            abrirBtn.addEventListener('click', function() {
            abrirBtn.style['display'] = 'hidden';
            abrirBtn.style.visibility = 'hidden';});}

        if (cancelBtn) {
            cancelBtn.addEventListener('click', function() {
            abrirBtn.style['margin-left'] = 'visible';
            abrirBtn.style.visibility = 'visible';});}
        });
