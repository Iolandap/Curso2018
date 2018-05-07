--------------------------------------
-- 		Base de datos 'empresa'
--------------------------------------
USE empresa;

--------------------------------------
--		Ejemplo INNER JOIN
--------------------------------------
SELECT p.id_pedido, lp.fid_pedido, `fid_producto`,`fid_fabricante`
	FROM 
    	pedido p INNER JOIN linea_pedido lp
	ON 
    	(p.id_pedido=lp.fid_pedido);


--------------------------------------
-- 		Ejemplo LEFT OUTER JOINS
--------------------------------------
SELECT p.id_pedido, lp.fid_pedido, `fid_producto`,`fid_fabricante`
	FROM 
		pedido AS p LEFT OUTER JOIN linea_pedido AS lp
	ON 
		(p.id_pedido = lp.fid_pedido );


--------------------------------------
-- 		Ejemplo RIGHT OUTER JOINS
--------------------------------------
SELECT p.id_pedido, lp.fid_pedido, `fid_producto`,`fid_fabricante`
	FROM 
		pedido AS p RIGHT OUTER JOIN linea_pedido AS lp
	ON 
		(p.id_pedido = lp.fid_pedido );

-----------------------------------------------
-- 		Ejemplo JOINS de mas de dos tablas
-----------------------------------------------
SELECT p.id_pedido, lp.fid_producto, e.nombre
	FROM 
		pedido 			AS p, 
		linea_pedido 	AS lp, 
		empleados 		AS e
	WHERE 
		p.id_pedido 	= lp.fid_pedido		AND
		e.id_empleado	= p.fid_vendedor;


---------------------------------------------------------------------
-- 		Ejemplo SUBCONSULTA 
--			1 -  Si S devuelve un único resultado:
---------------------------------------------------------------------
SELECT id_oficina, ciudad
	FROM 
		oficinas
	WHERE 
		objetivo < 	(SELECT SUM(ventas)
						FROM empleados AS e
					);


---------------------------------------------------------------------
-- 		Ejemplo SUBCONSULTA 
--			2. Si S devuelve más de un resultado pero con un solo
-- 			campo podemos hacer a su vez varias acciones
--				2.1: Devuelve CIERTO si el valor es igual a alguno de los 
--					devueltos
---------------------------------------------------------------------
SELECT id_empleado, nombre, fid_oficina
	FROM 
		empleados
	WHERE 
		fid_oficina IN 	(SELECT id_oficina
							FROM 
								oficinas
							WHERE 
								region = 'este'
					);


---------------------------------------------------------------------
-- 		Ejemplo SUBCONSULTA 
--			2. Si S devuelve más de un resultado pero con un solo
-- 			campo podemos hacer a su vez varias acciones
--				2.2: Devuelve CIERTO si se cumple la condición especificada con 
--					ALGUNO de los valores que S devuelve
---------------------------------------------------------------------
SELECT id_oficina, ciudad
	FROM 
		oficinas
	WHERE 
		objetivo > ANY 	(SELECT SUM(ventas)
							FROM 
								empleados
							GROUP BY
								fid_oficina
						);


---------------------------------------------------------------------
-- 		Ejemplo SUBCONSULTA 
--			2. Si S devuelve más de un resultado pero con un solo
-- 			campo podemos hacer a su vez varias acciones
--				2.3: Devuelve CIERTO si se cumple la condición especificada con 
-- 					todos los valores devueltos
---------------------------------------------------------------------
SELECT id_oficina, ciudad
	FROM 
		oficinas
	WHERE 
		objetivo > ALL 	(SELECT SUM(ventas)
							FROM 
								empleados
							GROUP BY
								fid_oficina
						);


---------------------------------------------------------------------
-- 		Ejemplo SUBCONSULTA 
--			2. Si S devuelve más de un resultado pero con un solo
-- 			campo podemos hacer a su vez varias acciones
--				2.4: Devuelve CIERTO si usamos EXISTS y la subconsulta devuelve algun registro 
--					o si usamos NO EXISTS y la subconsulta no devuelve ningún registro.
---------------------------------------------------------------------
SELECT id_empleado, nombre, fid_oficina
	FROM 
		empleados AS e
	WHERE EXISTS 
				(SELECT e.id_empleado
					FROM
						oficinas AS o
					WHERE 
						region			= "este" AND
						e.fid_Oficina 	= o.id_oficina
				);


SELECT id_empleado, nombre, fid_oficina
	FROM 
		empleados AS e
	WHERE NOT EXISTS 
				(SELECT e.id_empleado
					FROM
						oficinas AS o
					WHERE 
						region			= "este" AND
						e.fid_Oficina 	= o.id_oficina
				);