var area, departamento;

function generaFormAlta(areas, deps)
{
    var sel1 = document.getElementById("sel1");
    
    for (var index = 0; index < areas.length; index++) {
        var opt = document.createElement("option");
        var txtNode = document.createTextNode(areas[index][1]);
        opt.appendChild(txtNode);
        opt.value = areas[index][0];
        
        sel1.appendChild(opt);   
    }
    
    area = areas;
    departamento = deps;
    document.getElementById("sel1").selectedIndex = -1;
}

//Terminar
function selArea(option)
{
    //alert(option.value);
    var deptos = document.getElementById("sel2");
    while(deptos.hasChildNodes())
    {
        deptos.removeChild(deptos.firstChild);
    }
    for (var index = 0; index < departamento.length; index++) {
        if (option.value == departamento[index][2]) {
            var opt = document.createElement("option");
            var txtNode = document.createTextNode(departamento[index][1]);
            opt.appendChild(txtNode);
            opt.value = departamento[index][0];
            
            deptos.appendChild(opt);
        }
    }    
    var txtBox = document.getElementById("subDom");        
    txtBox.value = areas[document.getElementById("sel1").selectedIndex][2];
}

function preparaFormDetalles(arreglo)
{
    var sel = document.getElementById("sel1");
    for (var i = 0; i < sel.length; i++) {
        if (sel[i].value==arreglo[1]) {
            sel.selectedIndex = i;
        }
    }
    //Llamar a selArea(option) del archivo interfaz.js
    
    var user = arreglo[0].split("@");
    document.getElementById("dirCE").value=user[0];
    document.getElementById("nom").value=arreglo[4];
    document.getElementById("ape").value=arreglo[5];
    document.getElementById("date").value=arreglo[6];
    document.getElementById("detallesTrabajo").value=arreglo[3];
    
    selArea(sel.selectedOptions[0]);
}