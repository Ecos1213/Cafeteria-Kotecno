<?php
    class Factura {

        private $ID;
        private $id_producto;
        private $cantidad;
        private $conexionBD;

        function __construct()
        {
            $this->conexionBD = new ConexionBaseDatos;
        }

        function venderProducto($ID, $cantidad) {
            $this->conexionBD->query("
            INSERT INTO 
                factura 
                (`id_producto`, `cantidad`)
                VALUES ('".$ID."', '".$cantidad."');
            ");
        }
    }

?>