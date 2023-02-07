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
                include("./PHP/Factura.php");
                
                $factura = new Factura();
                $producto = new Producto();
                $producto->oneProduct($_GET["ID"]);

                echo "<h2 class='titulo'>Formulario de venta de productos</h2>";

                if(isset($_POST["id"])) {
                    if($_POST["id"]) {
                        
                        if($producto->getStock() >= $_POST["cantidad"]){
                            $cantidad_total = $producto->getStock() - $_POST["cantidad"];
                            $producto->setStock($cantidad_total);
                            $producto->editStock();
                            $factura->venderProducto(
                                $_POST["id"], 
                                $_POST["cantidad"]
                            );
                        }else {
                            echo "No es posible realizar la venta ya que no se encuentra la cantidad suficiente en el stock del producto ";
                        }

                        echo "<form action='' method='post'>";
                            echo "<div class='grid-container2'>";
                            echo "<div class='grid-item'>Nombre del Producto</div>";
                            echo "<div class='grid-item'>".$producto->getNombreProducto()."</div>";
                            echo "</div>";

                            echo "<div class='grid-container2'>";
                            echo "<div class='grid-item'>Referencia</div>";
                            echo "<div class='grid-item'>".$producto->getReferencia()."</div>";
                            echo "</div>";

                            echo "<div class='grid-container2'>";
                            echo "<div class='grid-item'>Precio</div>";
                            echo "<div class='grid-item'>".$producto->getPrecio()."</div>";
                            echo "</div>";

                            echo "<div class='grid-container2'>";
                            echo "<div class='grid-item'>Peso</div>";
                            echo "<div class='grid-item'>".$producto->getPeso()."</div>";
                            echo "</div>";

                            echo "<div class='grid-container2'>";
                            echo "<div class='grid-item'>Stock</div>";
                            echo "<div class='grid-item'>".$producto->getStock()."</div>";
                            echo "</div>";

                            echo "<div class='grid-container2'>";
                            echo "<div class='grid-item'>Categoria</div>";
                            echo "<div class='grid-item'>".$producto->getCategoria()."</div>";
                            echo "</div>";

                            echo "<div class='grid-container2'>";
                            echo "<div class='grid-item'>Id</div>";
                            echo "<div class='grid-item'>".$_GET["ID"]."</div>";
                            echo "</div>";

                            echo "<div class='grid-container2'>";
                            echo "<div class='grid-item'>Cantidad</div>";
                            echo "<div class='grid-item'> <input type='hidden' name='id' value='".$_GET['ID']."' /> <input type='text' class='width90' name='cantidad' placeholder='cantidad de venta'/> </div>";
                            echo "</div>";

                            echo "<div class='grid-container3'>";
                            echo "<input type='submit' class='btn btn-primary'/>";
                            echo "</div>";

                        echo "</form>";
                       
                    }
                }else {
                    echo "<form action='' method='post'>";
                        echo "<div class='grid-container2'>";
                        echo "<div class='grid-item'>Nombre del Producto</div>";
                        echo "<div class='grid-item'>".$producto->getNombreProducto()."</div>";
                        echo "</div>";
    
                        echo "<div class='grid-container2'>";
                        echo "<div class='grid-item'>Referencia</div>";
                        echo "<div class='grid-item'>".$producto->getReferencia()."</div>";
                        echo "</div>";
    
                        echo "<div class='grid-container2'>";
                        echo "<div class='grid-item'>Precio</div>";
                        echo "<div class='grid-item'>".$producto->getPrecio()."</div>";
                        echo "</div>";
    
                        echo "<div class='grid-container2'>";
                        echo "<div class='grid-item'>Peso</div>";
                        echo "<div class='grid-item'>".$producto->getPeso()."</div>";
                        echo "</div>";
    
                        echo "<div class='grid-container2'>";
                        echo "<div class='grid-item'>Stock</div>";
                        echo "<div class='grid-item'>".$producto->getStock()."</div>";
                        echo "</div>";
    
                        echo "<div class='grid-container2'>";
                        echo "<div class='grid-item'>Categoria</div>";
                        echo "<div class='grid-item'>".$producto->getCategoria()."</div>";
                        echo "</div>";
    
                        echo "<div class='grid-container2'>";
                        echo "<div class='grid-item'>Id</div>";
                        echo "<div class='grid-item'>".$_GET["ID"]."</div>";
                        echo "</div>";
    
                        echo "<div class='grid-container2'>";
                        echo "<div class='grid-item'>Cantidad</div>";
                        echo "<div class='grid-item'> <input type='hidden' name='id' value='".$_GET['ID']."' /> <input type='text' class='width90' name='cantidad' placeholder='cantidad de venta'/> </div>";
                        echo "</div>";

                        echo "<div class='grid-container3'>";
                        echo "<input type='submit' class='btn btn-primary'/>";
                        echo "</div>";

                    echo "</form>";
                }
            ?>
        </div>
        
    </body>

</html>

