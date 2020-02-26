function editarNombre(){
    if(document.getElementById("botonEditar").value=="Editar"){
        //cambiamos el texto por input
        const nac = document.getElementById("nacimiento");
        nac.remove();
        document.getElementById("nacimientoPadre").insertAdjacentHTML("beforeend","<input class='inputEstandar' id='actualizar' type='text' value='"+nac.innerText.trim()+"'>")
        
        //cambiamos el boton
        document.getElementById("botonEditar").value = "Guardar";
    } else {
        //enviamos la info a la base de datos por ajax
        const act = document.getElementById("actualizar");
        act.remove();
        document.getElementById("nacimientoPadre").insertAdjacentHTML("beforeend","<p id='nacimiento'>"+act.value+"</p>")
        
        //cambiamos el boton
        document.getElementById("botonEditar").value = "Editar";
    }
}

function editarEmail(){
    if(document.getElementById("botonEditar").value=="Editar"){
        //cambiamos el texto por input
        const nac = document.getElementById("nacimiento");
        nac.remove();
        document.getElementById("nacimientoPadre").insertAdjacentHTML("beforeend","<input class='inputEstandar' id='actualizar' type='text' value='"+nac.innerText.trim()+"'>")
        
        //cambiamos el boton
        document.getElementById("botonEditar").value = "Guardar";
    } else {
        //enviamos la info a la base de datos por ajax
        const act = document.getElementById("actualizar");
        act.remove();
        document.getElementById("nacimientoPadre").insertAdjacentHTML("beforeend","<p id='nacimiento'>"+act.value+"</p>")
        
        //cambiamos el boton
        document.getElementById("botonEditar").value = "Editar";
    }
}

function editarNacimiento(){
    if(document.getElementById("botonEditar").value=="Editar"){
        //cambiamos el texto por input
        const nac = document.getElementById("nacimiento");
        nac.remove();
        document.getElementById("nacimientoPadre").insertAdjacentHTML("beforeend","<input class='inputEstandar' id='actualizar' type='text' value='"+nac.innerText.trim()+"'>")
        
        //cambiamos el boton
        document.getElementById("botonEditar").value = "Guardar";
    } else {
        //enviamos la info a la base de datos por ajax
        const act = document.getElementById("actualizar");
        act.remove();
        document.getElementById("nacimientoPadre").insertAdjacentHTML("beforeend","<p id='nacimiento'>"+act.value+"</p>")
        
        //cambiamos el boton
        document.getElementById("botonEditar").value = "Editar";
    }
}

function editarContraseña(){
    if(document.getElementById("botonEditar").value=="Editar"){
        //cambiamos el texto por input
        const nac = document.getElementById("nacimiento");
        nac.remove();
        document.getElementById("nacimientoPadre").insertAdjacentHTML("beforeend","<input class='inputEstandar' id='actualizar' type='text' value='"+nac.innerText.trim()+"'>")
        
        //cambiamos el boton
        document.getElementById("botonEditar").value = "Guardar";
    } else {
        //enviamos la info a la base de datos por ajax
        const act = document.getElementById("actualizar");
        act.remove();
        document.getElementById("nacimientoPadre").insertAdjacentHTML("beforeend","<p id='nacimiento'>"+act.value+"</p>")
        
        //cambiamos el boton
        document.getElementById("botonEditar").value = "Editar";
    }
}