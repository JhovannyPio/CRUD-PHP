//consultar datos en el modal para editar
function update(button){
    var id = button.getAttribute("empleado");
    request.open('Get', "http://localhost/crudphp/consulta_editar.php?id="+id);
    request.send();
    
    
    
    
}
//mostrar valores en el formulario para editar
var request = new XMLHttpRequest();
request.onreadystatechange = function() {
  if(request.readyState === 4 ) {
    
    if(request.status === 200 ) { 
        var respuesta = request.response;
        var arr=JSON.parse(respuesta);
        document.getElementById("idnomb_edit").value=arr.Nombre;
        document.getElementById("idapell_edit").value=arr.Apellidos;
        document.getElementById("idsuel_edit").value=arr.Sueldo;
        document.getElementById("idpuest_edit").value=arr.Puesto;
    } else {

    } 
  }

}
//funcion para borrar registro
function delet(button){
    var id = button.getAttribute("empleado");
    document.getElementById("buttom_delete").setAttribute("empleado",id);
    
    
}
function delet2(button){
    var id = button.getAttribute("empleado");
    requestdel.open('Get', "http://localhost/crudphp/delete.php?id="+id);
    requestdel.send();
    
}
var requestdel = new XMLHttpRequest();
 
requestdel.onreadystatechange = function() {
  if(requestdel.readyState === 4) {
    
    if(requestdel.status === 200) { 
        var respuesta = requestdel.response;
        location.reload();
    } else {

    } 
  }

}
//funcion enlazar id para editar empleado

function actualicer(button){
    var id = button.getAttribute("empleado");
    document.getElementById("idempleado_edit").value=id;
    
    
}



 




