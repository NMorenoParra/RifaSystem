<?php
include "../Models/model2.php";
  $instancia5 = new Persona2();
  $cambio = $instancia5->actualizarEstado($_GET);

  if($cambio == 1){
      $script = "
      Swal.fire({
          icon: 'success',
          title: 'Modificación exitosa',
          text: 'Estado de pago actualizado con éxito.',
          confirmButtonText: 'Aceptar'
      }).then(function() {
          window.location.href = '../Views/index.php';
      });";
      
      include "../Views/index.php";
  }
?>