(function () {

    let createCoinForm = document.getElementById('createCoinForm');
    if(createCoinForm) {
        createCoinForm.addEventListener('submit', function(event) {
            if(1 == 1) {
                //submit
            } else {
                alert('Fallo al validar en Javascript');
                event.preventDefault();
            }
        })
    }
    
    //colección de elementos cuya clase es enlaceBorrar
    let enlacesBorrar = document.getElementsByClassName('enlaceBorrar');

    for(var i = 0; i < enlacesBorrar.length; i++) {
        enlacesBorrar[i].addEventListener('click', getClassConfirmation);
    }
    
    function getClassConfirmation(event) {
        let id = event.target.dataset.id; //data-id
        let retVal = confirm('Estás seguro de borrar la moneda  #' + id + '?');
        if(retVal) {
            var formDelete = document.getElementById('formDelete');
            formDelete.action += '/' + id;
            formDelete.submit();
        }
    }
    
    let enlaceBorrar = document.getElementById('enlaceBorrar');
    if(enlaceBorrar) {
        enlaceBorrar.addEventListener('click', getConfirmation);
    }
    function getConfirmation() {
        let id = event.target.dataset.id; // data-id
        let nombre = event.target.dataset.nombre; // data-name
        let retVal = confirm('Estás seguro de borrar la moneda ' + nombre + ' ' + 'con id ' + id+ '?');
        if(retVal) {
            var formDelete = document.getElementById('formDelete');
            formDelete.submit();
        }
    }

})();