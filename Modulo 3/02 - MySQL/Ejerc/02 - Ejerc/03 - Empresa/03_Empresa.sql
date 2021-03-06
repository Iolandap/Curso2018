-- Base de datos 'empresa'
USE empresa;

-- 01 - Empresa
	-- a.  Contad cuantos clientes hay en total 

	SELECT COUNT(*) FROM clientes;

	-- b.  Recuperad el NOMBRE de todos los empleados en orden de fecha de 
	-- contrato descendente. 

	SELECT nombre FROM empleados ORDER BY fecha_contrato DESC;

	-- c.  Seleccionad SOLO el último pedido insertado 

	SELECT * FROM pedido ORDER by `id_pedido` DESC LIMIT 1;

	-- d.  Agrupad los pedidos por fecha para saber si existe alguna fecha con más 
	-- de un pedido 

	SELECT `fecha`, COUNT(`fecha`) 
		FROM pedido  
		GROUP BY `fecha` 
		HAVING COUNT(`fecha`)>1 
		ORDER BY `fecha`;

	-- e.  Modificad la fecha de todos los contratos por la fecha actual 

	UPDATE empleados SET fecha_contrato = NOW();

-- 02 - Empresa

	-- a. Contad cuantos productos hay en total 
	SELECT COUNT(*) FROM productos;

	-- b. Calculad el sumatorio del precio de todos los productos 
	SELECT SUM(`precio`) FROM productos;
	SELECT `descripcion`, SUM(`precio`) FROM productos GROUP by `descripcion`;

	-- c. Calculad la media del precio de todos los productos
	SELECT AVG(`precio`) FROM productos;
	SELECT `descripcion`, AVG(`precio`) FROM productos GROUP by `descripcion`;

	-- d.  Calculad el sumatorio de las ventas 
	SELECT SUM(`ventas`) FROM oficinas;

	-- e.  Calculad la media de precio de todas las ventas 
	SELECT AVG(`ventas`) FROM oficinas;

-- 03 - Empresa

	-- a.  Listado de vendedores de más de 40 años. 
	SELECT * FROM empleados WHERE `edad`>40;

	-- b.  Listado de centros situados en la región este y que NO estén en 
	-- Valencia. 
	SELECT * FROM `oficinas` WHERE `region`="este" AND `ciudad`<>"Valencia";
	SELECT * FROM `oficinas` WHERE `region`="este" AND NOT `ciudad`="Valencia";

	-- c.  Listado de productos cuyo precio esté entre los 1000 y los 4000 € y se 
	-- encuentren en stock, ordenados de más barato a más caro. 
	SELECT * 
		FROM `productos` 
		WHERE (`precio` BETWEEN 1000 AND 4000) AND `existencias`>0 
		ORDER by `precio`;

	-- d.  Listado de pedidos realizados en el año 1990, ordenados de más 
	-- reciente a más antiguo. 
	SELECT * 
		FROM `pedido` 
		WHERE (`fecha` BETWEEN '1989-12-31' AND '1991-01-01') 
		ORDER BY `fecha` DESC

	SELECT * 
		FROM `pedido` 
		WHERE `fecha` LIKE '1990-%' 
		ORDER BY `fecha` DESC

	-- e.  Listado de empleados cuyo nombre comience por J, ordenados 
	-- alfabéticamente.
	SELECT * 
		FROM `empleados` 
		WHERE `nombre` LIKE 'J%' 
		ORDER BY `nombre` ASC

