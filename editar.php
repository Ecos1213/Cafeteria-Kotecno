<!doctype html>
<html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta property="og:title" content="">
        <meta property="og:type" content="">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="./css/bootstrap.css">
        <link rel="stylesheet" href="./css/grid.css">
        <link rel="stylesheet" href="./css/main.css">
        

        <meta name="theme-color" content="#fafafa">
    </head>

    <body>
        <!-- Add your site or application content here -->
        <script src="js/vendor/modernizr-3.11.2.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <div>
            <?php
                include("./PHP/Producto.php");
                $producto = new Producto();

                if(!isset($_GET["ID"])){
                    echo "no se encontro el id";
                    exit;
                }

                $mensaje = $producto->validarId($_GET["ID"]);
                
                if(!empty($mensaje)){
                    echo $mensaje;
                    exit;
                }

                $producto->oneProduct($_GET["ID"]);

                echo "<h2 class='titulo'>Formulario de venta de productos</h2>";

                    echo "<form action='./editar.php?ID=".$_GET["ID"]."' method='post'>";
                    
                    echo "<div class='grid-container2'>";
                    echo "<div class='grid-item'><label for='ID'>ID</label></div>";
                    echo "<div class='grid-item'><input type='text' name='id_update' value='".$_GET["ID"]."' readonly='readonly'></div>";
                    echo "</div>";

                    echo "<div class='grid-container2'>";
                    echo "<div class='grid-item'><label for='name'>Nombre del Producto</label></div>";
                    echo "<div class='grid-item'><input type='text' name='name' value='".$producto->getNombreProducto()."'></div>";
                    echo "</div>";

                    echo "<div class='grid-container2'>";
                    echo "<div class='grid-item'><label for='referencia'>Referencia</label></div>";
                    echo "<div class='grid-item'><input type='text' name='referencia' value='".$producto->getReferencia()."'></div>";
                    echo "</div>";

                    echo "<div class='grid-container2'>";
                    echo "<div class='grid-item'><label for='precio'>Precio</label></div>";
                    echo "<div class='grid-item'><input type='text' name='precio' value='".$producto->getPrecio()."'></div>";
                    echo "</div>";

                    echo "<div class='grid-container2'>";
                    echo "<div class='grid-item'><label for='peso'>Peso</label></div>";
                    echo "<div class='grid-item'><input type='text' name='peso' value='".$producto->getPeso()."'></div>";
                    echo "</div>";

                    echo "<div class='grid-container2'>";
                    echo "<div class='grid-item'><label for='categoria'>Categoria</label></div>";
                    echo "<div class='grid-item'><input type='text' name='categoria' value='".$producto->getCategoria()."'></div>";
                    echo "</div>";

                    echo "<div class='grid-container2'>";
                    echo "<div class='grid-item'><label for='ID'>Categoria</label></div>";
                    echo "<div class='grid-item'><input type='text' name='categoria' value='".$producto->getCategoria()."'></div>";
                    echo "</div>";

                    echo "<div class='grid-container2'>";
                    echo "<div class='grid-item'><label for='stock'>Stock</label></div>";
                    echo "<div class='grid-item'><input type='text' name='stock' value='".$producto->getStock()."'></div>";
                    echo "</div>";

                    echo "<div class='grid-container3'>";
                    echo "<input class='btn btn-primary' type='submit' />";
                    echo "</div>";
                echo "</form>";

                if(isset($_POST["id_update"])) {
                    if($_POST["id_update"]) {

                        $mensaje = $producto->validacionProducto(
                            $_POST["name"], 
                            $_POST["referencia"],
                            $_POST["precio"], 
                            $_POST["peso"], 
                            $_POST["categoria"], 
                            $_POST["stock"]);
                            
                        if(empty($mensaje)) {
                        
                        }else {
                            echo $mensaje;
                            exit;
                        }

                        $producto->editProduct(
                            $_POST["id_update"], 
                            $_POST["name"], 
                            $_POST["referencia"],
                            $_POST["precio"], 
                            $_POST["peso"], 
                            $_POST["categoria"], 
                            $_POST["stock"]
                        );
                    }
                }
            ?>
        </div>
        
    </body>

</html>

