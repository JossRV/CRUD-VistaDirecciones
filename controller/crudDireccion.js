$(document).ready(function(){

    var table = $('#tablaDireccion').DataTable({
        // responsivo
        responsive: true,
        // lenguaje a español
        "language": {
            "sProcessing":    "Procesando...",
            "sLengthMenu":    "Mostrar _MENU_ registros",
            "sZeroRecords":   "No se encontraron resultados",
            "sEmptyTable":    "Ningún dato disponible en esta tabla",
            "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":   "",
            "sSearch":        "Buscar",
            "sUrl":           "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":    "Último",
                "sNext":    "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    
    });

    new $.fn.dataTable.FixedHeader(table);

    // alerta
    function alertaValidaciones(msj){
        swal({
            title: 'Error!',
            text: msj,
            icon: 'error',
            button: 'Aceptar',
            timer: '2000'
        });
    }

    // limitaciones de registro
    $('#paternoR').on('input',function(){
        this.value = this.value.replace(/[^a-zA-Z ñÑ]/g,'');
        this.value = this.value.charAt(0).toUpperCase()+this.value.slice(1);
    });
    $('#maternoR').on('input',function(){
        this.value = this.value.replace(/[^a-zA-Z ñÑ]/g,'');
        this.value = this.value.charAt(0).toUpperCase()+this.value.slice(1);
    });
    $('#nombreR').on('input',function(){
        this.value = this.value.replace(/[^a-zA-Z ñÑ]/g,'');
        this.value = this.value.charAt(0).toUpperCase()+this.value.slice(1);
    });
    $('#calleR').on('input',function(){
        this.value = this.value.replace(/[^a-zA-Z ñÑ 0-9]/g,'');
        this.value = this.value.charAt(0).toUpperCase()+this.value.slice(1);
    });
    $('#coloniaR').on('input',function(){
        this.value = this.value.replace(/[^a-zA-Z ñÑ 0-9]/g,'');
        this.value = this.value.charAt(0).toUpperCase()+this.value.slice(1);
    });
    $('#delegacionR').on('input',function(){
        this.value = this.value.replace(/[^a-zA-Z ñÑ]/g,'');
        this.value = this.value.charAt(0).toUpperCase()+this.value.slice(1);
    });
    $('#estadoR').on('input',function(){
        this.value = this.value.replace(/[^a-zA-Z ñÑ]/g,'');
        this.value = this.value.toUpperCase();
    });
    $('#cpR').on('input',function(){
        this.value = this.value.replace(/[^0-9]/g,'');
    });

    // validacion del registro
    function validaRegistro(){
        if(
            $('#paternoR').val() == '' &&
            $('#maternoR').val() == '' &&
            $('#nombreR').val() == '' &&
            $('#calleR').val() == '' &&
            $('#coloniaR').val() == '' &&
            $('#delegacionR').val() == '' &&
            $('#estadoR').val() == '' &&
            $('#cpR').val() == ''
        ){
            alertaValidaciones('Todos los campos estan vacios');
        }else if($('#paternoR').val() == ''){
            alertaValidaciones('El campo apellido paterno esta vacio');
        }else if($('#maternoR').val() == ''){
            alertaValidaciones('El campo apellido materno esta vacio');
        }else if($('#nombreR').val() == ''){
            alertaValidaciones('El campo nombre esta vacio');
        }else if($('#calleR').val() == ''){
            alertaValidaciones('El campo calle esta vacio');
        }else if($('#coloniaR').val() == ''){
            alertaValidaciones('El campo colonia esta vacio');
        }else if($('#delegacionR').val() == ''){
            alertaValidaciones('El campo delegacion esta vacio');
        }else if($('#estadoR').val() == ''){
            alertaValidaciones('El campo estado esta vacio');
        }else if($('#cpR').val() == ''){
            alertaValidaciones('El campo codigo postal esta vacio');
        }
    }

    $('#btn_registrar').click(function(){
        validaRegistro();
    });
});