'use strict';

$(document).ready(function ($) {
    
    let update = false;
    let id = 0;

    const obtener = () => {
        $.ajax({
            url: 'php/main.php',
            type: 'GET',
            async: false,
            dataType:'json',
            success:function(ans){
                console.log(ans.data);
                ans.data.forEach(element => {
                    $("tbody").append(
                        "<tr>"+
                        "<th>"+element.id+"</th>"+
                        "<th>"+element.nombre+"</th>"+
                        "<th>"+element.especie+"</th>"+
                        "<th>"+element.habitat+"</th>"+
                        "<th>"+element.edad+"</th>"+
                        "<th>"+
                        "<button type='button' class='btn btn-secondary edit' data-toggle='modal' data-target='#modalAnimal' value='"+element.id+"'>Editar</button>"+
                        "<button type='button' class='btn btn-danger delete ml-2' value='"+element.id+"'>Eliminar</button>"+
                        "</th>"+
                        "</tr>"
                        );
                });
            },
            error:function(ans){
                console.log(ans);
            }
        });
    }

    obtener();

    const obtenerPorId = (id) => {
        $.ajax({
            url: 'php/main.php',
            type: 'GET',
            data: { id: id},
            dataType:'json',
            success:function(ans){
                $('#nombre').val(ans.data[0].nombre);
                $('#especie').val(ans.data[0].especie);
                $('#habitat').val(ans.data[0].habitat);
                $('#edad').val(ans.data[0].edad);
            },
            error:function(ans){
                console.log(ans);
            }
        });
    }

    const agregar = () => {
        $.ajax({
            url: 'php/main.php',
            type: 'POST',
            data: {
                nombre: $('#nombre').val(),
                especie: $('#especie').val(),
                habitat: $('#habitat').val(),
                edad: $('#edad').val()
            },
            dataType:'json',
            success:function(ans){
                alert(ans.mensaje);
                location.reload();
            },
            error:function(ans){
                alert(ans.mensaje);
            }
        });
    }

    const actualizar = (id) => {
        $.ajax({
            url: 'php/main.php',
            type: 'PUT',
            data: {
                id: id,
                nombre: $('#nombre').val(),
                especie: $('#especie').val(),
                habitat: $('#habitat').val(),
                edad: $('#edad').val()
            },
            dataType:'json',
            success:function(ans){
                alert(ans.mensaje);
                location.reload();
            },
            error:function(ans){
                alert(ans.mensaje);
            }
        });
    }

    const eliminar = (id) => {
        $.ajax({
            url: 'php/main.php',
            type: 'DELETE',
            data: {
                id: id
            },
            dataType:'json',
            success:function(ans){
                alert(ans.mensaje);
                location.reload();
            },
            error:function(ans){
                alert(ans.mensaje);
            }
        });
    }

    $("form").submit(function(){
        if(!update)
            agregar();
        else
            actualizar(id);
    });

    $(".delete").on('click', function(){
        eliminar($(this).val());    
    });

    $(".edit").on('click', function(){
        id = $(this).val();
        obtenerPorId(id);    
        update = true;
    });

    $("#btnAgregar").on('click', function(){
        $('#nombre').val("");
        $('#especie').val("");
        $('#habitat').val("");
        $('#edad').val("");
        update = false;
    });
   
});