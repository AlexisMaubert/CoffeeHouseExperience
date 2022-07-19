function readImage (input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#foto_preview').attr('src', e.target.result); // Renderizamos la imagen
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#foto_producto").change(function () {
    // Código a ejecutar cuando se detecta un cambio de archivo
    readImage(this);
  });