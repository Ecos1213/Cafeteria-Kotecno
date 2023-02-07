<?php
    class ConexionBaseDatos {
        private $mysqli;

        function __construct()
        {
            $this->mysqli = new mysqli("localhost", "root", "", "cafeteria_kotecno");
            if ($this->mysqli->connect_errno) {
                echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
            }
        }
        
        function listsQuery($sql) {
            echo "<h2 class='titulo'>Lista de productos</h2>";
            $result = $this->mysqli->query($sql);
            if ($result->num_rows > 0) {

                echo "<div class='grid-container'>";
                echo "<div class='grid-item'>ID</div>";
                echo "<div class='grid-item'>Nombre Producto</div>";
                echo "<div class='grid-item'>Referencia</div>";
                echo "<div class='grid-item'>Precio</div>";
                echo "<div class='grid-item'>Peso</div>";
                echo "<div class='grid-item'>Categoria</div>";
                echo "<div class='grid-item'>Stock</div>";
                echo "<div class='grid-item'>Fecha Creacion</div>";
                echo "<div class='grid-item'>Editar producto</div>";
                echo "<div class='grid-item'>Borrar producto</div>";
                echo "<div class='grid-item'>Vender producto</div>";
                echo "</div>";

                while($row = $result->fetch_assoc()) {
                    echo "<div class='grid-container'>";
                    echo "<div class='grid-item'>".$row["ID"]."</div>";
                    echo "<div class='grid-item'>".$row["NombreProducto"]."</div>";
                    echo "<div class='grid-item'>".$row["Referencia"]."</div>";
                    echo "<div class='grid-item'>".$row["Precio"]."</div>";
                    echo "<div class='grid-item'>".$row["Peso"]."</div>";
                    echo "<div class='grid-item'>".$row["Categoria"]."</div>";
                    echo "<div class='grid-item'>".$row["Stock"]."</div>";
                    echo "<div class='grid-item'>".$row["FechaCreacion"]."</div>";
                    echo "<div class='grid-item'>
                        <a href='./editar.php?ID=".$row["ID"]."' class='btn btn-primary'>Editar</a>
                    </div>";
                    echo "<div class='grid-item'>
                        <form action='/index.php' method='delete'>
                            <input type='hidden' name='delete' id='delete' value='".$row["ID"]."' />
                            <button formaction='/Cafeteria-Kotecno/index.php' class='btn btn-danger'>Borrar</button>
                        </form>
                    </div>";

                    echo "<div class='grid-item'>
                        <a href='./vender.php?ID=".$row["ID"]."' class='btn btn-success'>Vender</a>
                    </div>";
                    echo "</div>";

                }
              } else {
                echo "0 results";
              }
        
        }

        function listQuery($sql) {
            $result = $this->mysqli->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $array = array(
                        "ID" => $row["ID"],
                        "NombreProducto" => $row["NombreProducto"],
                        "Referencia" => $row["Referencia"],
                        "Precio" => $row["Precio"],
                        "Peso" => $row["Peso"],
                        "Categoria" => $row["Categoria"],
                        "Stock" => $row["Stock"],
                        "FechaCreacion" => $row["FechaCreacion"],
                    );
                    
                }
            }else {

                $array = array();

            }

            return $array;
        }

        function query($sql) {
            $this->mysqli->query($sql);
        }
        
        function closed() {
            $this->mysqli->close();
        }
    }
        
        
    
        
    
?>