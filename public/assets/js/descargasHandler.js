
document.addEventListener('DOMContentLoaded', () => {

    document.addEventListener('click', (e) => {
        let idDescarga = -1;
        let tipoDescarga = null;
        let csrfToken = null;
        
        let id = e.target.id;
        console.log(id);
        if (id === 'btnDescargar'){
            idDescarga = e.target.parentElement.getAttribute('data-id');
            tipoDescarga = e.target.parentElement.getAttribute('data-tipo');
            console.log('tipo: ' + tipoDescarga)
            console.log('idDescarga: ' + idDescarga)
        }

        let csrfMetaTag = document.querySelector('meta[name="csrf-token"]');
        if (csrfMetaTag) {
            csrfToken = csrfMetaTag.getAttribute('content');
        } else {
            console.error('No se encontró el elemento meta con name="csrf-token"');
        }

        
        if(idDescarga != -1){
        fetch('/registrar-descarga/' + tipoDescarga + '/'+ idDescarga, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },

        })
            .then(response => {
                console.log(response);
            })
            .catch(error => {
                console.error('Error al iniciar la descarga:', error);
            });
        }
    })
});