<?php
  include "../Models/model2.php";
  if($_POST['estado']==1){
    $monto = 20000;
  }
  else{
    $monto = 0;
  }
  $instancia3 = new Persona2();
  $registro = $instancia3->registrar($_POST,$monto);

  if(str_contains($registro,"23000")){
    $script = "
      Swal.fire({
          icon: 'error',
          title: 'Registro fallido',
          text: 'Este numero no se encuentra disponible.',
          confirmButtonText: 'Aceptar'
      }).then(function() {
          window.location.href = '../Views/index.php';
      });";
      include "../Views/index.php";

  }
  else if($registro == 1){
        $script = "
      Swal.fire({
          icon: 'success',
          title: 'Registro exitoso',
          text: 'Persona registrada con éxito.',
          confirmButtonText: 'Aceptar'
      }).then(function() {
          window.location.href = '../Views/index.php';
      });";
      
      include "../Views/index.php";
  }
?>