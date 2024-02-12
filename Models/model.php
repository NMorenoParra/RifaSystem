<?php
class Persona {
    private $id;
    private $nombre;
    private $numero;
    private $estadoPago;

    public function consultaNumeros() {
        include "connectionDB.php";

        $consultNumber = $connection->prepare('CALL ConsultaNumeros();');
        $consultNumber->execute();

        $table = $consultNumber->fetchAll(PDO::FETCH_ASSOC);
        return $table;
    }

    public function consultPerson(){
        include "connectionDB.php";

        $consultPerson = $connection->prepare('CALL ConsultaPersonas();');
        $consultPerson->execute();

        $table = $consultPerson->fetchAll(PDO::FETCH_ASSOC);
        return $table;
    }

    public function consultaMonto(){
        include "connectionDB.php";

        $consultMonto = $connection->prepare('CALL ConsultaMonto();');
        $consultMonto->execute();

        $table = $consultMonto->fetchAll(PDO::FETCH_ASSOC);
        return $table;
    }

    public function consultNumbersEnable(){
        include "connectionDB.php";

      $consultEnable = $connection->prepare("CALL ConsultaNumerosDeshabilitados()");
      $consultEnable->execute();

        $table = $consultEnable->fetchAll(PDO::FETCH_ASSOC);
        return $table;
    }
}
?>
