$( document ).ready(function() {
    var HTTP_status = localStorage.getItem("session"); 

    if( HTTP_status == '200'){
        fn_tbArticulos_ini();
    }else{
        localStorage.setItem("session", '404');
        location.href ='login.php';
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
            localStorage.setItem("session", '404');
            location.href ='index.php';
        }
      })
});


$("#btnBuscar").click( function(){
    $.ajax({
        type: "GET",
        url: "tabla_articulos.php?buscar="+$("#txtbuscar").val(),
        success: function(html) { 
            $("#contenidoTabla").empty();
            $("#contenidoTabla").html(html);
        }
    });
});
