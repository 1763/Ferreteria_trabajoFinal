$( document ).ready(function() {
    var login = true;

    if( login ){
        fn_tbArticulos_ini();
    }else{
        alert("login");
    }
});

function fn_tbArticulos_ini () {

    $.ajax({
        type: "GET",
        url: "tabla_articulos.php",
        success: function(html) { 
            $("#contenidoTabla").empty();
            $("#contenidoTabla").html(html);
        }
    });
}


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