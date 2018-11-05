var tableBody = document.getElementsByTagName('tbody');
var inputBuscador = document.getElementById('buscador');


function ocultarRegistros(fecha_buscar){
    //variable para todos los registros
    var registros = tableBody[0].getElementsByTagName('tr');

    //variable regular que busca la fecha con case insensitive
    var expresion = new RegExp(fecha_buscar, "i");

    for(var i=0; i<registros.length; i++){
        registros[i].style.display='none';
        if(registros[i].childNodes[1].textContent.replace(/\s/g, "").search(expresion) != -1){
            registros[i].style.display = 'table-row';
        }
        else if(fecha_buscar == ''){
            registros[i].style.display = 'table-row';
            
        }
    }
}

inputBuscador.addEventListener('input',function(){
    ocultarRegistros(this.value);
});

