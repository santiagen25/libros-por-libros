function swalError(t){
    Swal.fire({
        html:
            '<style>.swalText{ color: white; }</style>'+
            '<h2 class="swalText" style="color: red;">ERROR</h2>'+
            '<p class="swalText">'+t+'</p>'+
            '<input class="botonEstandar py-2 px-4" type="button" value="OK" onclick="swal.close();">',
        background: '#211c12',
        showConfirmButton: false
    })
}

function swalAtencion(t){
    Swal.fire({
        html:
            '<style>.swalText{ color: white; }</style>'+
            '<h2 class="swalText" style="color: yellow;">ATENCION</h2>'+
            '<p class="swalText">'+t+'</p>'+
            '<input class="botonEstandar py-2 px-4" type="button" value="OK" onclick="swal.close();">',
        background: '#211c12',
        showConfirmButton: false
    })
}

function swalExito(t){
    Swal.fire({
        html:
            '<style>.swalText{ color: white; }</style>'+
            '<h2 class="swalText" style="color: green;">ÉXITO</h2>'+
            '<p class="swalText">'+t+'</p>'+
            '<input class="botonEstandar py-2 px-4" type="button" value="OK" onclick="swal.close();">',
        background: '#211c12',
        showConfirmButton: false
    })
}

function swalConfirmacion(t,r){
    Swal.fire({
        html:
            '<style>.swalText{ color: white; }</style>'+
            '<h2 class="swalText" style="color: Blue;">Confirmación</h2>'+
            '<p class="swalText">'+t+'</p>'+
            '<input aria-label class="botonEstandar py-2 px-4" type="button" value="Aceptar" onclick="'+r+';">'+
            '<input class="botonEstandar py-2 px-4" type="button" value="Cancelar" onclick="swal.close();">',
        background: '#211c12',
        showConfirmButton: false
    }).then((result) => {
        console.log(result);
    })
}

function swalTitulo(titulo,t,color){
    Swal.fire({
        html:
            '<style>.swalText{ color: white; }</style>'+
            '<h2 class="swalText" style="color: '+color+';">'+titulo+'</h2>'+
            '<p class="swalText">'+t+'</p>'+
            '<input class="botonEstandar py-2 px-4" type="button" value="OK" onclick="swal.close();">',
        background: '#211c12',
        showConfirmButton: false
    })
}

function swalCargando(){
    Swal.fire({
        html:
            '<style>.swalText{ color: white; }</style>'+
            '<h2 class="swalText" style="color: white;">Cargando Operacion...</h2>'+
            '<p class="swalText">Espera un momento</p>',
        background: '#211c12',
        showConfirmButton: false
    })
}

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

        if(act.value != ""){
            act.remove();
            document.getElementById("nombrePadre").insertAdjacentHTML("beforeend","<p id='nombre'>"+act.value+"</p>")
            
            //cambiamos el boton
            document.getElementById("botonNombre").value = "Editar";

            //hacemos ajax para actualizar los cambios
            if(window.XMLHttpRequest){
                xmlhttp = new XMLHttpRequest(); //nuevos navegadores
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); //viejos navegadores
            }
            xmlhttp.open("POST", "editarNombre.php", true);
            xmlhttp.setRequestHeader("x-csrf-token",$('meta[name="_token"]').attr('content'));
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("q="+document.getElementById('nombre').innerText);
            swalExito("Has cambiado tu <b>nombre</b> con éxito");
        } else swalError("El <b>Nombre</b> de Usuario no puede estar vacio");
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
        const exp = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
        if(exp.test(act.value)){
            if(window.XMLHttpRequest) xmlhttp2 = new XMLHttpRequest();
            else xmlhttp2 = new ActiveXObject("Microsoft.XMLHTTP");
            xmlhttp2.open("POST", "comprobarEmail.php", true);
            xmlhttp2.setRequestHeader("x-csrf-token",$('meta[name="_token"]').attr('content'));
            xmlhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp2.send("q="+act.value);

            xmlhttp2.onreadystatechange = function(){
                if(this.readyState==4){
                    if(this.responseText==0){
                        act.remove();
                        document.getElementById("emailPadre").insertAdjacentHTML("beforeend","<p id='email'>"+act.value+"</p>")
                        
                        //cambiamos el boton
                        document.getElementById("botonEmail").value = "Editar";

                        //hacemos ajax para actualizar los cambios
                        if(window.XMLHttpRequest) xmlhttp = new XMLHttpRequest();
                        else xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        xmlhttp.open("POST", "editarEmail.php", true);
                        xmlhttp.setRequestHeader("x-csrf-token",$('meta[name="_token"]').attr('content'));
                        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xmlhttp.send("q="+document.getElementById("email").innerText);
                        swalExito("Has cambiado tu email. Ahora para entrar en Libros por Libros tendrás que usar el mail que acabas de introducir");
                    } else {
                        swalError("El <b>Email</b> que has introducido ya está registrado en la página web");
                    }
                }
            }
        } else {
            swalError("El formato de <b>Email</b> que has introducido no es correcto");
        }
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
        const exp = /^\d{4}-([0]\d|1[0-2])-([0-2]\d|3[01])$/;
        if(exp.test(act.value)) {
            act.remove();
            document.getElementById("nacimientoPadre").insertAdjacentHTML("beforeend","<p id='nacimiento'>"+act.value+"</p>")
            
            //cambiamos el boton
            document.getElementById("botonNacimiento").value = "Editar";

            //hacemos ajax para actualizar los cambios
            if(window.XMLHttpRequest){
                xmlhttp = new XMLHttpRequest(); //nuevos navegadores
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); //viejos navegadores
            }
            xmlhttp.open("POST", "editarNacimiento.php", true);
            xmlhttp.setRequestHeader("x-csrf-token",$('meta[name="_token"]').attr('content'));
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("q="+document.getElementById("nacimiento").innerText);
            swalExito("Has cambiado tu <b>Fecha de Nacimiento</b> con éxito");
        } else {
            swalError("El formato de <b>Fecha de Nacimiento</b> que has introducido no es correcto");
        }
    }
}

function editarPassword(){
    if(document.getElementById("botonPassword").value=="Editar"){
        //cambiamos el texto por input
        const nac = document.getElementById("password");
        nac.remove();
        document.getElementById("passwordPadre").insertAdjacentHTML("beforeend","<input class='inputEstandar col-md-12' id='passActual' placeholder='Contraseña actual...' type='password'>");
        document.getElementById("passwordPadre").insertAdjacentHTML("beforeend","<input class='inputEstandar col-md-12' id='nuevaPass' placeholder='Nueva contraseña...' type='password'>");
        document.getElementById("passwordPadre").insertAdjacentHTML("beforeend","<input class='inputEstandar col-md-12' id='repitePass' placeholder='Repite la contraseña...' type='password'>");
        //cambiamos el boton
        document.getElementById("botonPassword").value = "Guardar";
    } else {
        //enviamos la info a la base de datos por ajax
        const actual = document.getElementById("passActual");
        const nueva = document.getElementById("nuevaPass");
        const repetida = document.getElementById("repitePass");
        const act = actual.value;
        const nue = nueva.value;
        const rep = repetida.value;
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest(); //nuevos navegadores
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); //viejos navegadores
        }
        xmlhttp.onreadystatechange = function(){
            if(this.readyState==4){
                const pass = this.responseText;
                if(act==pass){
                    if(pass!=nue){
                        const expA = /[A-Z]/;
                        if(expA.test(nue)){
                            const expa = /[a-z]/;
                            if(expa.test(nue)){
                                const exp1 = /[0-9]/;
                                if(exp1.test(nue)){
                                    if(nue.length<50 && nue.length>5){
                                        if(nue==rep){
                                            actual.remove();
                                            nueva.remove();
                                            repetida.remove();
                                            document.getElementById("passwordPadre").insertAdjacentHTML("beforeend","<p id='password'>********</p>")
                                            
                                            //cambiamos el boton
                                            document.getElementById("botonPassword").value = "Editar";
                                            
                                            //hacemos ajax para actualizar los cambios
                                            if(window.XMLHttpRequest){
                                                xmlhttp2 = new XMLHttpRequest(); //nuevos navegadores
                                            } else {
                                                xmlhttp2 = new ActiveXObject("Microsoft.XMLHTTP"); //viejos navegadores
                                            }
                                            xmlhttp2.open("POST", "editarPassword.php", true);
                                            xmlhttp2.setRequestHeader("x-csrf-token",$('meta[name="_token"]').attr('content'));
                                            xmlhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                            xmlhttp2.send("q="+nue);
                                            swalExito("La <b>contraseña</b> ha sido cambiada con éxito");
                                        } else swalError("La <b>nueva contraseña</b> no encaja con la contraseña repetida");
                                    } else swalError("La <b>nueva contraseña</b> ha de contener de 5 a 50 caracteres");
                                } else swalError("La <b>nueva contraseña</b> ha de tener un numero");
                            } else swalError("La <b>nueva contraseña</b> ha de tener una letra minuscula");
                        } else swalError("La <b>nueva contraseña</b> ha de tener una letra mayuscula");
                    } else swalError("La <b>contraseña</b> no puede ser la misma que la anterior");
                } else swalError("La <b>contraseña</b> introducida no es la actual");
            }
        }
        xmlhttp.open("POST", "getPassword.php", true);
        xmlhttp.setRequestHeader("x-csrf-token",$('meta[name="_token"]').attr('content'));
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("q=Test");
    }
}

function eliminarCuenta(){
    document.getElementById("botonEliminarCuenta").remove();
    document.getElementById("eliminarPadre").insertAdjacentHTML("beforeend","<input class='botonEliminar' id='eliminarCuentaConfirmar' type='submit' name='eliminarCuenta' value='Seguro, Eliminar Cuenta'>");
    swalAtencion("Estás a un paso de <b>eliminar</b> tu cuenta de Libros por Libros");
}

function editarImagen(){
    document.getElementById("fotoPerfil").remove();
    document.getElementById("imagenPadre").insertAdjacentHTML("beforeend","<input class='form-control-file' name='imagen' type='file' id='imagen'>");
    document.getElementById("botonImagen").remove();
    document.getElementById("botonImagenPadre").insertAdjacentHTML("beforeend","<input class='botonEditar' type='submit' name='botonImagen' value='Guardar'>");
    swalAtencion("Cuando hagas click en el boton <b>Guardar</b> la pagina se refrescará. Asegurate de guardar todos los cambios en otros campos antes de guardar la imagen");
}

function editarTitulo(){
    if(document.getElementById("botonTitulo").value=="Editar"){
        //cambiamos el texto por input
        const nac = document.getElementById("titulo");
        nac.remove();
        document.getElementById("tituloPadre").insertAdjacentHTML("beforeend","<input class='inputEstandar col-md-12' id='inputTitulo' type='text' value='"+nac.innerText.trim()+"'>")
        
        //cambiamos el boton
        document.getElementById("botonTitulo").value = "Guardar";
    } else {
        //enviamos la info a la base de datos por ajax
        const act = document.getElementById("inputTitulo");

        if(act.value != ""){
            if(act.value.length < 50){
                act.remove();
                document.getElementById("tituloPadre").insertAdjacentHTML("beforeend","<p id='titulo'>"+act.value+"</p>")
                
                //cambiamos el boton
                document.getElementById("botonTitulo").value = "Editar";
                
                //hacemos ajax para actualizar los cambios
                const url = document.URL;
                if(window.XMLHttpRequest) xmlhttp = new XMLHttpRequest(); //nuevos navegadores
                else xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); //viejos navegadores
                xmlhttp.open("POST", "/editarTitulo.php", true);
                xmlhttp.setRequestHeader("x-csrf-token",$('meta[name="_token"]').attr('content'));
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("q="+document.getElementById('titulo').innerText+"&idLibro="+url.substring(url.length-1,url.length));
                swalExito("Has cambiado el <b>Titulo</b> de tu Valoración con éxito");
            } else swalError("El <b>Titulo</b> de la Valoración no upede tener mas de 50 carácteres");
        } else swalError("El <b>Titulo</b> de la Valoración no puede estar vacio");
    }
}

function editarPuntuacion(){
    if(document.getElementById("botonPuntuacion").value=="Editar"){
        //cambiamos el texto por input
        const nac = document.getElementById("puntuacion");
        nac.remove();
        document.getElementById("puntuacionPadre").insertAdjacentHTML("beforeend","<input class='inputEstandar col-md-12' id='inputPuntuacion' type='text' value='"+nac.innerText.trim()+"'>")
        
        //cambiamos el boton
        document.getElementById("botonPuntuacion").value = "Guardar";
    } else {
        //enviamos la info a la base de datos por ajax
        const act = document.getElementById("inputPuntuacion");

        if(act.value != ""){
            const exp = /^[0-9]$|^10$/;
            if(exp.test(act.value)){
                act.remove();
                document.getElementById("puntuacionPadre").insertAdjacentHTML("beforeend","<p id='puntuacion'>"+act.value+"</p>")
                
                //cambiamos el boton
                document.getElementById("botonPuntuacion").value = "Editar";
                
                //hacemos ajax para actualizar los cambios
                const url = document.URL;
                if(window.XMLHttpRequest) xmlhttp = new XMLHttpRequest(); //nuevos navegadores
                else xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); //viejos navegadores
                xmlhttp.open("POST", "/editarPuntuacion.php", true);
                xmlhttp.setRequestHeader("x-csrf-token",$('meta[name="_token"]').attr('content'));
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("q="+document.getElementById('puntuacion').innerText+"&idLibro="+url.substring(url.length-1,url.length));
                swalExito("Has cambiado la <b>Puntuacion</b> de tu Valoración con éxito");
            } else swalError("La <b>Puntuacion</b> de la Valoración ha de ser un numero integer del 0 al 10");
        } else swalError("La <b>Puntuacion</b> de la Valoración no puede estar vacio");
    }
}

function editarComentario(){
    if(document.getElementById("botonComentario").value=="Editar"){
        //cambiamos el texto por input
        const nac = document.getElementById("comentario");
        nac.remove();
        document.getElementById("comentarioPadre").insertAdjacentHTML("beforeend","<input class='inputEstandar col-md-12' id='inputComentario' type='text' value='"+nac.innerText.trim()+"'>")
        
        //cambiamos el boton
        document.getElementById("botonComentario").value = "Guardar";
    } else {
        //enviamos la info a la base de datos por ajax
        const act = document.getElementById("inputComentario");

        if(act.value != ""){
            if(act.value.length < 10000){
                act.remove();
                document.getElementById("comentarioPadre").insertAdjacentHTML("beforeend","<p id='comentario'>"+act.value+"</p>")
                
                //cambiamos el boton
                document.getElementById("botonComentario").value = "Editar";
                
                //hacemos ajax para actualizar los cambios
                const url = document.URL;
                if(window.XMLHttpRequest) xmlhttp = new XMLHttpRequest(); //nuevos navegadores
                else xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); //viejos navegadores
                xmlhttp.open("POST", "/editarComentario.php", true);
                xmlhttp.setRequestHeader("x-csrf-token",$('meta[name="_token"]').attr('content'));
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("q="+document.getElementById('comentario').innerText+"&idLibro="+url.substring(url.length-1,url.length));
                swalExito("Has cambiado el <b>Comentario</b> de tu Valoración con éxito");
            } else swalError("El <b>Comentario</b> de la Valoración no upede tener mas de 10000 carácteres");
        } else swalError("El <b>Comentario</b> de la Valoración no puede estar vacio");
    }
}

function editarNombreLista(id) {
    if(document.getElementById("botonNombre_"+id).value=="Editar"){
        //cambiamos el texto por input
        const nac = document.getElementById("nombre_"+id);
        nac.remove();
        document.getElementById("nombrePadre_"+id).insertAdjacentHTML("beforeend","<input class='inputEstandar col-md-12' id='inputNombre_"+id+"' type='text' value='"+nac.innerText.trim()+"'>")
        
        //cambiamos el boton
        document.getElementById("botonNombre_"+id).value = "Guardar";
    } else {
        //enviamos la info a la base de datos por ajax
        const act = document.getElementById("inputNombre_"+id);

        if(act.value != ""){
            act.remove();
            document.getElementById("nombrePadre_"+id).insertAdjacentHTML("beforeend","<p id='nombre_"+id+"'>"+act.value+"</p>")
            
            //cambiamos el boton
            document.getElementById("botonNombre_"+id).value = "Editar";

            //hacemos ajax para actualizar los cambios
            if(window.XMLHttpRequest){
                xmlhttp = new XMLHttpRequest(); //nuevos navegadores
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); //viejos navegadores
            }
            xmlhttp.open("POST", "editarNombre.php", true);
            xmlhttp.setRequestHeader("x-csrf-token",$('meta[name="_token"]').attr('content'));
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("q="+document.getElementById('nombre_'+id).innerText+"&id="+id);
            swalExito("Has cambiado el <b>nombre</b> del Usuario con ID "+id+" con éxito");
        } else swalError("El <b>Nombre</b> de Usuario no puede estar vacio");
    }
}

function editarEmailLista(id) {
    if(document.getElementById("botonEmail_"+id).value=="Editar"){
        //cambiamos el texto por input
        const nac = document.getElementById("email_"+id);
        nac.remove();
        document.getElementById("emailPadre_"+id).insertAdjacentHTML("beforeend","<input class='inputEstandar col-md-12' id='inputEmail_"+id+"' type='text' value='"+nac.innerText.trim()+"'>")
        
        //cambiamos el boton
        document.getElementById("botonEmail_"+id).value = "Guardar";
    } else {
        //enviamos la info a la base de datos por ajax
        const act = document.getElementById("inputEmail_"+id);
        const exp = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
        if(exp.test(act.value)){
            if(window.XMLHttpRequest) xmlhttp2 = new XMLHttpRequest();
            else xmlhttp2 = new ActiveXObject("Microsoft.XMLHTTP");
            xmlhttp2.open("POST", "comprobarEmail.php", true);
            xmlhttp2.setRequestHeader("x-csrf-token",$('meta[name="_token"]').attr('content'));
            xmlhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp2.send("q="+act.value+"&id="+id);

            xmlhttp2.onreadystatechange = function(){
                if(this.readyState==4){
                    if(this.responseText==0){
                        act.remove();
                        document.getElementById("emailPadre_"+id).insertAdjacentHTML("beforeend","<p id='email_"+id+"'>"+act.value+"</p>")
                        
                        //cambiamos el boton
                        document.getElementById("botonEmail_"+id).value = "Editar";

                        //hacemos ajax para actualizar los cambios
                        if(window.XMLHttpRequest) xmlhttp = new XMLHttpRequest();
                        else xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        xmlhttp.open("POST", "editarEmail.php", true);
                        xmlhttp.setRequestHeader("x-csrf-token",$('meta[name="_token"]').attr('content'));
                        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xmlhttp.send("q="+document.getElementById("email_"+id).innerText+"&id="+id);
                        swalExito("Has cambiado el email del Usuario con ID "+id+". Ahora para entrar en Libros por Libros este Usuario tendrá que usar el mail que acabas de introducir");
                    } else {
                        swalError("El <b>Email</b> que has introducido ya está registrado en la página web");
                    }
                }
            }
        } else {
            swalError("El formato de <b>Email</b> que has introducido no es correcto");
        }
    }
}

function editarNacimientoLista(id) {
    if(document.getElementById("botonNacimiento_"+id).value=="Editar"){
        //cambiamos el texto por input
        const nac = document.getElementById("nacimiento_"+id);
        nac.remove();
        document.getElementById("nacimientoPadre_"+id).insertAdjacentHTML("beforeend","<input class='inputEstandar col-md-12 mb-2' id='inputNacimiento_"+id+"' type='text' value='"+nac.innerText.trim()+"'>")
        
        //cambiamos el boton
        document.getElementById("botonNacimiento_"+id).value = "Guardar";
    } else {
        //enviamos la info a la base de datos por ajax
        const act = document.getElementById("inputNacimiento_"+id);
        const exp = /^\d{4}-([0]\d|1[0-2])-([0-2]\d|3[01])$/;
        if(exp.test(act.value)) {
            act.remove();
            document.getElementById("nacimientoPadre_"+id).insertAdjacentHTML("beforeend","<p id='nacimiento_"+id+"'>"+act.value+"</p>")
            
            //cambiamos el boton
            document.getElementById("botonNacimiento_"+id).value = "Editar";

            //hacemos ajax para actualizar los cambios
            if(window.XMLHttpRequest){
                xmlhttp = new XMLHttpRequest(); //nuevos navegadores
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); //viejos navegadores
            }
            xmlhttp.onreadystatechange = function() {
                console.log(this.responseText);
            }
            xmlhttp.open("POST", "editarNacimiento.php", true);
            xmlhttp.setRequestHeader("x-csrf-token",$('meta[name="_token"]').attr('content'));
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("q="+document.getElementById("nacimiento_"+id).innerText+"&id="+id);
            swalExito("Has cambiado tu <b>Fecha de Nacimiento</b> con éxito");
        } else {
            swalError("El formato de <b>Fecha de Nacimiento</b> que has introducido no es correcto");
        }
    }
}

function editarAdminLista(id) {
    if(document.getElementById("isAdmin_"+id).innerText == "Si") swalConfirmacion("¿Estás seguro de que deseas que este Usuario ya no sea Administrador?","deshacerAdmin("+id+")");
    else swalConfirmacion("¿Estás seguro de que deseas que este Usuario sea Administrador?","hacerAdmin("+id+")");
}

function deshacerAdmin(id) {
    peticionAdminYBlock("editarAdmin.php",0,id);

    const p = document.getElementById("isAdmin_"+id);
    p.innerText = "No";
    swalExito("El usuario con ID "+id+" ya no es Administrador. Para que este cambio se haga efectivo el usuario deberá cerrar sesion y volver a iniciarla.");
}

function hacerAdmin(id) {
    peticionAdminYBlock("editarAdmin.php",1,id);

    const p = document.getElementById("isAdmin_"+id);
    p.innerText = "Si";
    swalExito("El usuario con ID "+id+" ahora es Administrador. Para que este cambio se haga efectivo el usuario deberá cerrar sesion y volver a iniciarla.");
}

function editarBloqueadoLista(id) {
    if(document.getElementById("isBlock_"+id).innerText == "Si") swalConfirmacion("¿Estás seguro de que deseas que este Usuario ya no este Bloqueado?","deshacerBloqueado("+id+")");
    else swalConfirmacion("¿Estás seguro de que deseas que este Usuario ya no este Bloqueado?","hacerBloqueado("+id+")");
}

function deshacerBloqueado(id) {
    peticionAdminYBlock("editarBlock.php",0,id);

    const p = document.getElementById("isBlock_"+id);
    p.innerText = "No";
    swalExito("El usuario con ID "+id+" ya no está Bloqueado");
}

function hacerBloqueado(id) {
    peticionAdminYBlock("editarBlock.php",1,id);

    const p = document.getElementById("isBlock_"+id);
    p.innerText = "Si";
    swalExito("El usuario con ID "+id+" ahora está Bloqueado");
}

function peticionAdminYBlock(archivo,valor,id){
    if(window.XMLHttpRequest) xmlhttp = new XMLHttpRequest(); //nuevos navegadores
    else xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); //viejos navegadores
    xmlhttp.open("POST", archivo, true);
    xmlhttp.setRequestHeader("x-csrf-token",$('meta[name="_token"]').attr('content'));
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("admin="+valor+"&id="+id);
}

function editarImagenLista(id){
    document.getElementById("fotoPerfil_"+id).remove();
    document.getElementById("imagenPadre_"+id).insertAdjacentHTML("beforeend","<input class='form-control-file' name='imagen' type='file' id='imagen'>");
    document.getElementById("botonImagen_"+id).remove();
    document.getElementById("botonImagenPadre_"+id).insertAdjacentHTML("beforeend","<input class='botonEditar' type='submit' name='botonImagen' value='Guardar'><div class='row col-md-12'><input class=\"col-md-12 botonEditar py-1\" name=\"eliminarImagen\" type=\"submit\" value=\"Eliminar\"></div>");
    swalAtencion("Cuando hagas click en el boton <b>Guardar</b> la pagina se refrescará. Asegurate de guardar todos los cambios en otros campos antes de guardar la imagen. Y si haces click en Eliminar se eliminará la imagen actual y se introducirá una por defecto");
}

function eliminarCuentaLista(id){
    document.getElementById("botonEliminarCuenta_"+id).remove();
    document.getElementById("eliminarPadre_"+id).insertAdjacentHTML("beforeend","<input class='botonEliminar' id='eliminarCuentaConfirmar' type='submit' name='eliminarCuenta' value='Seguro, Eliminar Cuenta'>");
    swalAtencion("Estás a un paso de <b>eliminar</b> esta cuenta de Libros por Libros");
}

function editarPasswordLista(id){
    swalConfirmacion("Si continuas se le enviará un email a este usuario con su nueva contraseña, generada aleatoriamente.","enviarMail("+id+")");
}

function enviarMail(id){
    if(window.XMLHttpRequest) xmlhttp = new XMLHttpRequest(); //nuevos navegadores
    else xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); //viejos navegadores
    xmlhttp.onreadystatechange = function(){
        if(this.readyState==1){
            swalCargando();
        }else if(this.responseText=="1"){
            swalExito("Se le ha enviado un mail con su nueva contraseña al usuario con id "+id+". Si no lo ve en la bandeja de entrada que revise en la carpeta de Spam");
        }
    }
    xmlhttp.open("POST", "/resetPassword.php", true);
    xmlhttp.setRequestHeader("x-csrf-token",$('meta[name="_token"]').attr('content'));
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id="+id);
}

function meGusta(id){
    const like = document.getElementById("like_"+id);
    let likesTotales = parseInt(document.getElementById("likesTotales_"+id).innerText);
    let gusta;
    if(like.value=="¡Me Gusta!"){
        like.value = "No Me Gusta";
        gusta = 0;
        document.getElementById("likesTotales_"+id).innerText = likesTotales + 1;
    } else {
        like.value = "¡Me Gusta!";
        gusta = 1;
        document.getElementById("likesTotales_"+id).innerText = likesTotales - 1;
    }

    if(window.XMLHttpRequest) xmlhttp = new XMLHttpRequest(); //nuevos navegadores
    else xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); //viejos navegadores
    xmlhttp.open("POST", "/editarMeGusta.php", true);
    xmlhttp.setRequestHeader("x-csrf-token",$('meta[name="_token"]').attr('content'));
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("actualMeGusta="+gusta+"&idvaloracion="+id);

    if(gusta==1) swalTitulo("Dislike","Ya no te gusta este comentario","red");
    else swalTitulo("Like!","Te Gusta este comentario","green");
}

function eliminarLibro(){
    const btn = document.getElementById("eliminarLibro");
    btn.insertAdjacentHTML('afterend','<input class="col-md-4 botonEditar py-1" name="eliminarLibro" type="submit" value="Eliminar Libro">');
    btn.remove();
    swalAtencion("Estás a un paso de <b>eliminar</b> este Libro");
}
