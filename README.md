# Cafeteria-Kotecno
para poder visualizar el proyecto se debe instalar apache con la version de 8.1 de PHP y crear la base de datos con el nombre cafeteria_kotecno en Mysql, dentro del proyecto en la carpeta BD se encuentra el archivo sql a importar en la base de datos, este incorpora dos tablas que son factura y productos, estas tablas contienen datos predeterminados para poder visualizar el ejemplo. la clonacion se debe realizar dentro de la estructura de carpetas de apache en htdocs.

# Consulta en la base de datos
despues de importar la base de datos podemos realizar la siguientes consultas:

SELECT * FROM `productos` WHERE stock = (SELECT MAX(stock) FROM productos);
SELECT COUNT(id_producto) as cantidad_ventas, id_producto, NombreProducto FROM `factura` as f INNER JOIN productos as p ON p.ID = f.id_producto GROUP BY id_producto ORDER BY cantidad_ventas DESC LIMIT 1;

la primera consulta nos permite conocer el producto con mas stock y la segundo nos permite conocer el producto mas vendido.
