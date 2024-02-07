document.addEventListener('DOMContentLoaded', function() {
const conteudos = document.querySelector('.conteudos-chamados');
const btn = document.getElementById('abrir');
const cancelBtn = document.getElementById('cancel');
        
        if (btn) {
            btn.addEventListener('click', function() {
    conteudos.style.height = '100vh';
    conteudos.style['margin-left'] = '270px';
});
        }

     

        if (cancelBtn) {
    cancelBtn.addEventListener('click', function() {
    conteudos.style.height = '100vh';
    conteudos.style['margin-left'] = '0';
    
});
        }
        
    });

