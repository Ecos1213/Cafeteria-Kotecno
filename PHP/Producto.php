<?php
    include("ConexionBaseDatos.php");

    class Producto {

        private $ID;
        private $nombreProducto;
        private $referencia;
        private $precio;
        private $peso;
        private $categoria;
        private $stock;
        private $fechaCreacion;
        private $conexionBD;

        function __construct() {
            $this->conexionBD = new ConexionBaseDatos;
        }

        function getId() {
            return $this->ID;
        }

        function setId($ID) {
            $this->ID = $ID;
        }

        function getNombreProducto() {
            return $this->nombreProducto;
        }

        function setNombreProducto($nombreProducto) {
            $this->nombreProducto = $nombreProducto;
        }

        function getReferencia() {
            return $this->referencia;
        }

        function setReferencia($referencia) {
            $this->referencia = $referencia;
        }

        function getPrecio() {
            return $this->precio;
        }

        function setPrecio($precio) {
            $this->precio = $precio;
        }

        function getPeso() {
            return $this->peso;
        }

        function setPeso($peso) {
            $this->peso = $peso;
        }

        function getCategoria() {
            return $this->categoria;
        }

        function setCategoria($categoria) {
            $this->categoria = $categoria;
        }

        function getStock() {
            return $this->stock;
        }

        function setStock($stock) {
            $this->stock = $stock;
        }

        function getFechaCreacion() {
            return $this->fechaCreacion;
        }

        function setFechaCreacion($fechaCreacion) {
            $this->fechaCreacion = $fechaCreacion;
        }

        function listProducts() {
            $this->conexionBD->listsQuery("SELECT * FROM productos");
        }

        function validacionProducto( 
        $name, 
        $referencia, 
        $precio, 
        $peso, 
        $categoria, 
        $stock) {

            if(empty($name)) {
                return "todos los campos son requeridos";
            }

            if(empty($referencia)) {
                return "todos los campos son requeridos";
            }

            if(empty($precio)) {
                return "todos los campos son requeridos";
            }

            if(empty($peso)) {
                return "todos los campos son requeridos";
            }

            if(empty($categoria)) {
                return "todos los campos son requeridos";
            }

            if(empty($stock)) {
                return "todos los campos son requeridos";
            }

            if(!is_numeric($precio)) {
                return "el campo precio tiene que ser numerico";
            }

            if(!is_numeric($peso)) {
                return "el campo peso tiene que ser numerico";
            }

            if(!is_numeric($stock)) {
                return "el campo stock tiene que ser numerico";
            }

            return "" ;
        }

        function validarId($ID) {
            if(empty($ID)) {
                return "No se encontro el ID";
            }
            return "";
        }

        function oneProduct($ID) {
            $array = $this->conexionBD->listQuery("SELECT * FROM productos WHERE ID =".$ID."");
            $this->ID = $array["ID"];
            $this->nombreProducto = $array["NombreProducto"];
            $this->categoria = $array["Categoria"];
            $this->stock = $array["Stock"];
            $this->fechaCreacion = $array["FechaCreacion"];
            $this->precio = $array["Precio"];
            $this->peso = $array["Peso"];
            $this->referencia = $array["Referencia"];
        }

        function insertProduct(
            $name, 
            $referencia, 
            $precio, 
            $peso, 
            $categoria, 
            $stock ) {

            $this->conexionBD->query("
            INSERT INTO 
                productos 
                (`NombreProducto`, `Referencia`, `Precio`, `Peso`, `Categoria`, `Stock`)
                VALUES ('".$name."', '".$referencia."', ".$precio.", ".$peso.", '".$categoria."', '".$stock."');
            ");

        }

        function editProduct(
            $ID, 
            $name, 
            $referencia, 
            $precio, 
            $peso, 
            $categoria, 
            $stock) {

            $this->conexionBD->query("
                UPDATE `productos` SET 
                `NombreProducto` = '".$name."', 
                `Referencia` = '".$referencia."', 
                `Precio` = '".$precio."', 
                `Peso` = '".$peso."', 
                `Categoria` = '".$categoria."', 
                `Stock` = '".$stock."' WHERE ID = ".$ID."
            ");
            
            header("Location: http://localhost/Cafeteria-Kotecno/index.php");
        }

        function editStock() {
            $this->conexionBD->query("
                UPDATE `productos` SET  
                `Stock` = '".$this->stock."' WHERE ID = ".$this->ID."
            ");
        }

        function deleteProduct($ID) {
            $this->conexionBD->query("
                DELETE FROM productos WHERE ID = ".$ID."
            ");
        }

    }
?>