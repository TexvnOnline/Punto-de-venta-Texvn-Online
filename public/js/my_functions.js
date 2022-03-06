function confirmDelete(item_id) {
    swal({
        title: "¿Estas seguro?",
        text: "Una vez eliminado, no podrás recuperarlo!",
        icon: "warning",
        buttons: true,
        buttons: ["Cancelar", "¡Sí!"],
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $('#'+item_id).submit();
        } else {
               
        }
    });
}