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
            act.remove();
            document.getElementById("emailPadre").insertAdjacentHTML("beforeend","<p id='email'>"+act.value+"</p>")
            
            //cambiamos el boton
            document.getElementById("botonEmail").value = "Editar";

            //hacemos ajax para actualizar los cambios
            if(window.XMLHttpRequest){
                xmlhttp = new XMLHttpRequest(); //nuevos navegadores
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); //viejos navegadores
            }
            xmlhttp.open("POST", "editarEmail.php", true);
            xmlhttp.setRequestHeader("x-csrf-token",$('meta[name="_token"]').attr('content'));
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("q="+document.getElementById("email").innerText);
            swalExito("Has cambiado tu email. Ahora para entrar en Libros por Libros tendrás que usar el mail que acabas de introducir");
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
    const btn = document.getElementById("botonImagen");
    if(btn.value=="Editar"){
        const img = document.getElementById("fotoPerfil");
        img.remove();
        document.getElementById("imagenPadre").insertAdjacentHTML("beforeend","<input class='form-control-file' type='file' id='archivoImagen'>");
        btn.value = "Guardar";
    } else {
        const file = document.getElementById("archivoImagen");

        //ajax para guardar la foto
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest(); //nuevos navegadores
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); //viejos navegadores
        }
        if(file.files[0].type=="image/jpeg") console.log("tiene el formato correcto");
        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4) console.log(this.responseText);
        }
        xmlhttp.open("POST", "editarImagen.php", true);
        xmlhttp.setRequestHeader("x-csrf-token",$('meta[name="_token"]').attr('content'));
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("q="+file.files[0]);

        file.remove();
        document.getElementById("imagenPadre").insertAdjacentHTML("beforeend","<img src='{{asset('images\default-profile.png')}}' class='rounded img-fluid' alt='Foto de Perfil' id='fotoPerfil'>");
        btn.value = "Editar";
    }
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
