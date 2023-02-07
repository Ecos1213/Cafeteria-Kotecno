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

                    echo "<h2 class='titulo'>Insertar Producto</h2>";
                    echo "<form action='./insertar.php' method='post'>";

                    echo "<div class='grid-container2'>";
                    echo "<div class='grid-item'><label for='name'>Nombre del Producto</label></div>";
                    echo "<div class='grid-item'><input type='text' name='name' required></div>";
                    echo "</div>";

                    echo "<div class='grid-container2'>";
                    echo "<div class='grid-item'><label for='referencia'>Referencia</label></div>";
                    echo "<div class='grid-item'><input type='text' name='referencia' required></div>";
                    echo "</div>";

                    echo "<div class='grid-container2'>";
                    echo "<div class='grid-item'><label for='precio'>Precio</label></div>";
                    echo "<div class='grid-item'><input type='text' name='precio' required></div>";
                    echo "</div>";

                    echo "<div class='grid-container2'>";
                    echo "<div class='grid-item'><label for='peso'>Peso</label></div>";
                    echo "<div class='grid-item'><input type='text' name='peso' required></div>";
                    echo "</div>";

                    echo "<div class='grid-container2'>";
                    echo "<div class='grid-item'><label for='categoria'>Categoria</label> </div>";
                    echo "<div class='grid-item'><input type='text' name='categoria' required></div>";
                    echo "</div>";

                    echo "<div class='grid-container2'>";
                    echo "<div class='grid-item'><label for='stock'>Stock</label> </div>";
                    echo "<div class='grid-item'><input type='text' name='stock' required></div>";
                    echo "</div>";

                    echo "<div class='grid-container3'>";
                    echo "<input type='submit' class='btn btn-primary' />";
                    echo "</div>";
                    echo "</form>";

                if(isset($_POST["name"])) {
                    if($_POST["name"]) {

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

                        $producto->insertProduct( 
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
