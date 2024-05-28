//método para traer el ID
function dataUser(id){
    alert(id);
    $.ajax({
        url: url + "usuarioController/userId",
        type: 'post',
        dataType: 'json',
        data: {'id': id}
    }).done(function(answer){
        $.each(answer, function(index, value){
            $('#txtIdUser').val(value.idUsuario)
            $('#selDocType').val(value.idTipoDocumento)
            $('#txtDocument').val(value.Documento)
            $('#txtFirstName').val(value.Nombre)
            $('#txtLastName').val(value.Apellidos)
            $('#txtPhone').val(value.Telefono)
            $('#txtAdress').val(value.Direccion)
            $('#txtEmail').val(value.email)
            $('#txtUser').val(value.usuario)
            $('#txtPassword').val(value.clave)
            
        })
    }).fail(function(error){
        console.log(error)
    })
}
//método para CAMBIAR EL ESTADO
function changeUser(id){
    //alert(id);
    Swal.fire({
        title:'Would you like to change Status',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, chance it',
    }).then((result)=>{
        if(result.isConfirmed){
            Swal.fire({
                position: '',
                icon: 'success',
                title: 'Status change',
                confirmButtonText: 'ok',
                timer: 2000
            }).then((result)=>{
                if(result.isConfirmed){
                    $.ajax({
                        type: "post",
                        url: url + "usuarioController/changeStatus",
                        data: {'id':id,}
                    }).done(function(answer){
                        if(answer == 1){
                            window.location = url + "usuarioController/getUsers";
                            window.reload();
                        }else{
                            Swal.fire('Error to change Status', '', 'error');
                        }
                    }).fail(function(error){
                        console.log(error);
                    })
                }
            })
        }
    })
}
//método para ELIMINAR EL USUARIO
function deleteUser(id){
    //alert(id);
    Swal.fire({
        title:'Would you like to Delete User',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete it',
    }).then((result)=>{
        if(result.isConfirmed){
            Swal.fire({
                position: '',
                icon: 'success',
                title: 'User Delete',
                confirmButtonText: 'ok',
                timer: 2000
            }).then((result)=>{
                if(result.isConfirmed){
                    $.ajax({
                        type: "post",
                        url: url + "usuarioController/deleteUser",
                        data: {'id':id,}
                    }).done(function(answer){
                        if(answer == 1){
                            window.location = url + "usuarioController/getUsers";
                            window.reload();
                        }else{
                            Swal.fire('Error to Delete User', '', 'error');
                        }
                    }).fail(function(error){
                        console.log(error);
                    })
                }
            })
        }
    })
}