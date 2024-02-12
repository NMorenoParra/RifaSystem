<?php
  class Persona2{
    private $id;
    private $nombre;
    private $numero;
    private $estadoPago;
    private $dinero;

    public function registrar($datos, $monto) {
        try {
            $this->nombre = $datos['nombre'];
            $this->numero = $datos['numero'];
            $this->estadoPago = $datos['estado'];
            $this->dinero = $monto;

            include "connectionDB.php";
            $register = $connection->prepare('CALL RegistrarPersona(?,?,?,?)');
            $register->bindParam(1, $this->numero);
            $register->bindParam(2, $this->nombre);
            $register->bindParam(3, $this->estadoPago);
            $register->bindParam(4, $this->dinero);
            $register->execute();

            return 1;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function actualizarEstado($dato){
      $this->numero = $dato['numero'];

      include "connectionDB.php";
      $update = $connection->prepare("CALL ActualizarEstado(?);");
      $update->bindParam(1,$this->numero);
      $update->execute();

      return 1;
    }
  }
?>
