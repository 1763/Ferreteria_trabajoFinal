$( document ).ready(function() {
    console.log( "login" );
});


///evento escuchando click
$("#btnSalir").click( function(){
    Swal.fire({
        title: 'Confirmar',
        text: "Estas seguro que deseas salir",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, estoy seguro'
      }).then((result) => {
        if (result.value) {
         console.log("salir");
        }
      })
});