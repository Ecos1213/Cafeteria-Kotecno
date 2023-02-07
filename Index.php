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
        <?php
            include("./PHP/Producto.php");

            $producto = new Producto;
            

            if(isset($_REQUEST['delete'])) {
                if($_REQUEST['delete']) {
                    $producto->deleteProduct($_REQUEST['delete']);
                    $producto->listProducts();
                }
            } else {
                $producto->listProducts();
            }
        ?>
        <div class="grid-container3"> 
            <a href="./insertar.php" class="btn btn-primary insertar"> Insertar producto </a>
        </div>
        
    </body>

</html>

