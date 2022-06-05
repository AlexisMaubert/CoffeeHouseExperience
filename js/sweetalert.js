function eliminarProducto(url) {
    Swal.fire({
        title: 'Estás seguro que querés eliminar este producto?',
        text: "Esto no se podrá revertir",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            location.href = url;
        }
      })
}
function mirarProducto(id_producto,nombre_producto, descripcion_producto, baseurl){
Swal.fire({
    title: nombre_producto,
    text: descripcion_producto,
    width: 800,
    imageUrl: baseurl + 'img/' + id_producto + '.png',
    imageWidth: 500,
    imageHeight: 500,
    imageAlt: nombre_producto,
  })
}