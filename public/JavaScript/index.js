function editarNombre(){
    if(document.getElementById("botonNombre").value=="Editar"){
        //cambiamos el texto por input
        const nac = document.getElementById("nombre");
        nac.remove();
        document.getElementById("nombrePadre").insertAdjacentHTML("beforeend","<input class='inputEstandar col-md-12' id='inputNombre' type='text' value='"+nac.innerText.trim()+"'>")
        
        //cambiamos el boton
        document.getElementById("botonNombre").value = "Guardar";
    } else {
        //enviamos la info a la base de datos por ajax
        const act = document.getElementById("inputNombre");
        act.remove();
        document.getElementById("nombrePadre").insertAdjacentHTML("beforeend","<p id='nombre'>"+act.value+"</p>")
        
        //cambiamos el boton
        document.getElementById("botonNombre").value = "Editar";
    }
}

function editarEmail(){
    if(document.getElementById("botonEmail").value=="Editar"){
        //cambiamos el texto por input
        const nac = document.getElementById("email");
        nac.remove();
        document.getElementById("emailPadre").insertAdjacentHTML("beforeend","<input class='inputEstandar col-md-12' id='inputEmail' type='text' value='"+nac.innerText.trim()+"'>")
        
        //cambiamos el boton
        document.getElementById("botonEmail").value = "Guardar";
    } else {
        //enviamos la info a la base de datos por ajax
        const act = document.getElementById("inputEmail");
        act.remove();
        document.getElementById("emailPadre").insertAdjacentHTML("beforeend","<p id='email'>"+act.value+"</p>")
        
        //cambiamos el boton
        document.getElementById("botonEmail").value = "Editar";
    }
}

function editarNacimiento(){
    if(document.getElementById("botonNacimiento").value=="Editar"){
        //cambiamos el texto por input
        const nac = document.getElementById("nacimiento");
        nac.remove();
        document.getElementById("nacimientoPadre").insertAdjacentHTML("beforeend","<input class='inputEstandar col-md-12 mb-2' id='inputNacimiento' type='text' value='"+nac.innerText.trim()+"'>")
        
        //cambiamos el boton
        document.getElementById("botonNacimiento").value = "Guardar";
    } else {
        //enviamos la info a la base de datos por ajax
        const act = document.getElementById("inputNacimiento");
        act.remove();
        document.getElementById("nacimientoPadre").insertAdjacentHTML("beforeend","<p id='nacimiento'>"+act.value+"</p>")
        
        //cambiamos el boton
        document.getElementById("botonNacimiento").value = "Editar";
    }
}

function editarPassword(){
    if(document.getElementById("botonPassword").value=="Editar"){
        //cambiamos el texto por input
        const nac = document.getElementById("password");
        nac.remove();
        document.getElementById("passwordPadre").insertAdjacentHTML("beforeend","<input class='inputEstandar col-md-12' id='inputPassword' type='text' value='"+nac.innerText.trim()+"'>")
        
        //cambiamos el boton
        document.getElementById("botonPassword").value = "Guardar";
    } else {
        //enviamos la info a la base de datos por ajax
        const act = document.getElementById("inputPassword");
        act.remove();
        document.getElementById("passwordPadre").insertAdjacentHTML("beforeend","<p id='password'>"+act.value+"</p>")
        
        //cambiamos el boton
        document.getElementById("botonPassword").value = "Editar";
    }
}

function eliminarCuenta(){
    const elim = document.getElementById("botonEliminarCuenta");
    elim.remove();
    const pad = document.getElementById("eliminarPadre").insertAdjacentHTML("beforeend","<input class='botonEliminar' type='submit' name='eliminarCuenta' value='Seguro, Eliminar Cuenta'>");
}