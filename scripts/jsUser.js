function evUsuarios(li){
    var hidden = document.getElementById("hiddenSelection");
    
    switch (li.id) {
        case "u1":
            hidden.value = "1";
            break;
        
        case "u2":
            hidden.value = "2";
            break;
    }
}

function btnUsEsp(inp, id)
{
    if(inp.value=="Borrar")
    {
        document.getElementById("hiddenAction").value = "Eliminar";        
    }
    else {
        document.getElementById("hiddenAction").value = "Detalles";
    }
    
    document.getElementById("hiddenCuenta").value = document.getElementById(id).innerHTML;
}

function muestraArchivo(valor)
{
    limpia("content");
    var padre = document.getElementById("content");
    var em = document.createElement("embed");
    em.id = "documento";
    em.src = valor;
    em.height = padre.offsetHeight;
    padre.appendChild(em);
}

function limpia(area)
{
    var padre = document.getElementById(area);
    while (padre.hasChildNodes()) {
        padre.removeChild(padre.lastChild);
    }
}