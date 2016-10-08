function login(){

    var usuario = $( "#username" ).val();
    var passw = $( "#password" ).val();
    url="http://controlmascota.dev/index.php/Login/very_sesion";
    $.post(url,{usuario:usuario,passw:passw}).done(function(resp){
        if(resp == 2){
            window.location = "http://controlmascota.dev/index.php/amo/Dashboard";
        }
        if(resp == 1){
            window.location = "http://controlmascota.dev/index.php/veterinario/Dashboard";
        }
        if(resp == 0){
            window.location = "http://controlmascota.dev/index.php/admin/Dashboard";
        }
        if(resp == 4){
            swal({
                title: "Aviso!",
                text: "Usuario y/o contraseña erroneos",
                type: "error",
                confirmButtonText: "Ok"
            });
        }

    })
        .fail(function() {
        swal({
            title: "Aviso!",
            text: resp,
            type: "error",
            confirmButtonText: "Ok"
        });
    })

}