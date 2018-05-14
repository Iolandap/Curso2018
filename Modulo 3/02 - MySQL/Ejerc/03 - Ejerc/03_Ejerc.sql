--------------------------------------
-- 		Base de datos 'empresa'
USE empresa;
--------------------------------------

--------------------------------------
-- 			01 - Empresa
--------------------------------------
	-- a.  Listado de empleados con su respectivo superior 
	SELECT e.nombre, e.cargo, jefe.nombre, jefe.cargo
		FROM empleados AS e
		INNER JOIN empleados AS jefe
			ON 	 jefe.id_empleado = e.fid_superior;


	-- b.  Listado anterior INCLUYENDO aquellos empleados que no tengan superior. 
	SELECT e.nombre, e.cargo, jefe.nombre, jefe.cargo
		FROM empleados AS e
		LEFT OUTER JOIN empleados AS jefe
			ON 	 jefe.id_empleado = e.fid_superior;


	-- c.  Listado de empleados con información sobre su oficina, tengan o no. 
	SELECT e.nombre, o.*
		FROM empleados AS e
		LEFT OUTER JOIN oficinas AS o
			ON 	 e.fid_oficina = o.id_oficina;


	-- d.  Listado de empleados con información sobre su venta de importe más alto. 
	SELECT e.nombre, p.*, max(p.importe_total)
		FROM empleados AS e
		LEFT OUTER JOIN pedido AS p
			ON 	 e.id_empleado = p.fid_vendedor
		GROUP BY e.nombre
		ORDER BY p.importe_total ASC


	-- e.  Listado de clientes cuyo número de pedidos sea superior a 2. 
	SELECT c.nombre, COUNT(p.fid_cliente)
		FROM clientes AS c
		RIGHT OUTER JOIN pedido AS p
			ON c.id_cliente = p.fid_cliente
		GROUP BY p.fid_cliente 
			HAVING COUNT(p.fid_cliente)>2;

--------------------------------------
-- 			02 - Empresa
--------------------------------------
	-- a.  Actualizar los salarios de nuestros empleados de tal forma que el salario de un empleado 
	-- sea el 50% del objetivo de su oficina. 
	SELECT e.nombre, e.salario, o.objetivo, (o.objetivo*50)/100
		FROM empleados AS e
		INNER JOIN oficinas AS o
			ON e.fid_oficina = o.id_oficina

	UPDATE empleados AS e 
		INNER JOIN oficinas AS o 
			ON e.fid_oficina = o.id_oficina 
		SET e.salario = (o.objetivo*50)/100

	UPDATE empleados e, oficinas o 
		SET e.salario = o.objetivo*50/100 
		WHERE e.fid_oficina = o.id_oficina

	-- b.  Poner a cero las ventas de los empleados de la oficina 12. 
	SELECT e.nombre, e.ventas, e.fid_oficina
		FROM empleados AS e
		WHERE fid_oficina = 12

	UPDATE empleados
		SET ventas = 0
		WHERE fid_oficina = 12


	-- c.  Poner a cero el límite de crédito de los clientes asignados a empleados de la oficina 12. 
	SELECT c.nombre AS `cliente`, c.limitecredito, e.fid_oficina
		FROM clientes AS c,  empleados AS e, pedido AS p
		WHERE 
			e.id_empleado 	= p.fid_vendedor 	AND
		 	c.id_cliente 	= p.fid_cliente 	AND
		 	e.fid_oficina 	= 12

	SELECT c.nombre AS `cliente`, c.limitecredito, e.fid_oficina
		FROM clientes AS c  
		INNER JOIN pedido AS p
			ON (c.id_cliente 	= p.fid_cliente )
		INNER JOIN empleados AS e
			ON (e.id_empleado 	= p.fid_vendedor )
		WHERE 
		 	e.fid_oficina 	= 12

	UPDATE clientes AS c
		INNER JOIN pedido AS p
			ON (c.id_cliente 	= p.fid_cliente )
		INNER JOIN empleados AS e
			ON (e.id_empleado 	= p.fid_vendedor )
		SET c.limitecredito = 0
		WHERE 
		 	e.fid_oficina 	= 12


	-- d.  Borrar las líneas de pedido de los pedidos del cliente Jaime Llorens. 
	SELECT *
		FROM 
			pedido AS p, clientes AS c, linea_pedido AS lp
		WHERE
			p.fid_cliente 	= c.id_cliente	AND
			lp.fid_pedido	= p.id_pedido	AND
			c.nombre 		= "Jaime Llorens"

		-- 	NOTA: Para borrar se ha de modificar el tipo de enlace con las keys de la tabla linea_pedido 
		--  Pasar de RESTRICT a CASCADE  Ruta: phpMyAdmin estructura/vista de relaciones
	DELETE lp
		FROM linea_pedido AS lp
		INNER JOIN pedido AS p
			on (lp.fid_pedido	= p.id_pedido)
		INNER JOIN clientes AS c
			on (p.fid_cliente 	= c.id_cliente)
		WHERE
			c.nombre 		= "Jaime Llorens"


	-- e.  Aumentar un 5% el precio de todos los productos del fabricante ACI. 
	SELECT p.id_fabricante, p.precio, p.precio+(p.precio*5/100)
		FROM 
			productos AS p
		WHERE p.id_fabricante ="aci"

	UPDATE productos
		SET precio = precio+(precio*5/100)
		WHERE id_fabricante ="aci"


	-- f.  Añadir una nueva oficina para la ciudad de Madrid, con numero de oficina 30, un objetivo de 600 
	-- y región centro. 
	SELECT *
		FROM oficinas
		WHERE ciudad ="Madrid"

	INSERT INTO oficinas (id_oficina, ciudad , region) VALUES (30, 'Madrid', 'centro')


	-- g.  Cambiar los empleados de la oficina 21 a la oficina 30. 
	SELECT *
		FROM empleados
		WHERE fid_oficina = 21

	UPDATE empleados
		SET fid_oficina = 30
		WHERE fid_oficina = 21


	-- h.  Eliminar los pedidos del empleado 105. 
	SELECT *
		FROM empleados AS e
			INNER JOIN pedido AS p
			ON (e.id_empleado = p.fid_vendedor )
		WHERE e.id_empleado = 105

	DELETE p  	-- OJO se ha de borrar tambien la base de datos linea_pedido, si es CASCADE se borra automaticamente,
				-- si es RESTRICT no se borra
		FROM pedido AS p
			INNER JOIN empleados AS e
			ON (e.id_empleado = p.fid_vendedor )
		WHERE e.id_empleado = 105


	-- i.  Subir un 10% el salario de los empleados cuya oficina haya superado sus objetivos de venta. 
	SELECT *
		FROM empleados as e
			INNER JOIN oficinas as o
			ON (e.fid_oficina = o.id_oficina)	
		WHERE o.ventas > o.objetivo

	UPDATE empleados AS e
		INNER JOIN oficinas AS o
			ON (e.fid_oficina = o.id_oficina)
		SET
			e.salario = e.salario+e.salario*10/100
		WHERE 
		 	o.ventas > o.objetivo


	-- j.  Eliminar las oficinas que no tengan empleados. 
	SELECT *
		FROM oficinas as o
			LEFT OUTER JOIN empleados as e
			ON (o.id_oficina = e.fid_oficina)
		WHERE e.id_empleado IS NULL

	DELETE o
		FROM oficinas as o
			LEFT OUTER JOIN empleados as e
			ON (o.id_oficina = e.fid_oficina)
		WHERE e.id_empleado IS NULL

--------------------------------------
-- 			03 - Empresa
--------------------------------------
	--a. Listar las oficinas donde el objetivo de vendas de la oficina exceda la suma de salarios de sus vendedores. 
	SELECT o.id_oficina, o.ciudad, o.objetivo, SUM(e.salario)
		FROM oficinas AS o
		INNER JOIN empleados as e
			ON (o.id_oficina = e.fid_oficina)
		GROUP BY e.fid_oficina
		HAVING o.objetivo > SUM(e.salario)

	SELECT o.id_oficina, o.ciudad, o.objetivo
		FROM oficinas AS o
		WHERE o.objetivo > (SELECT SUM(salario)
							FROM empleados
							WHERE o.id_oficina = fid_oficina
							);


	--b.  Empeados con un salario igual o superior al objetivo de su oficina (con subconsultas o sin ellas) 
	SELECT e.nombre, e.salario, o.objetivo
		FROM empleados AS e
		INNER JOIN oficinas AS o
			ON (o.id_oficina = e.fid_oficina)
		WHERE e.salario >= o.objetivo

	SELECT nombre, salario
		FROM empleados AS e
		WHERE salario >= 	(SELECT objetivo
								FROM oficinas AS o
								WHERE o.id_oficina = e.fid_oficina
							);


	--c.  Lista de los productos del fabricante ACI para los cuales las existencias superen las existencias del 
	--producto 41004 del mismo fabricante. 
	SELECT *
		FROM productos AS p
		WHERE 
			p.id_fabricante	= "aci" AND
			p.existencias > (SELECT existencias
								FROM productos
								WHERE id_producto = 41004 
							)


	--d.  Empleados que NO trabajen en oficinas dirigidas por Ana Bustamante. 
	SELECT *
		FROM empleados AS e
		WHERE NOT e.fid_superior IN (SELECT id_empleado
										FROM empleados
										WHERE nombre = "Ana Bustamante"
									);


	--e.  Lista de productos (con su descripción) para los cuales se ha recibido un pedido de importe 25.000 
	--o más (considerando productos de cualquier fabricante). 
	SELECT *
		FROM pedido AS p
		WHERE p.importe_total >= 25000

	SELECT *
		FROM linea_pedido AS lp 
		LEFT OUTER JOIN  pedido AS p
			ON (lp.fid_pedido = p.id_pedido)
		WHERE p.importe_total >= 25000

	SELECT *
		FROM linea_pedido
		WHERE fid_pedido in	(SELECT id_pedido
								FROM pedido
								WHERE importe_total >= 25000
							);

	--f.  Listar los nombres de los clientes que tienen asignado el representante Alvaro Jaumes 
	--(suponiendo que no pueden haber dos representantes con el mismo nombre).
	-- DISTINCT : Elimina duplicados
	SELECT DISTINCT c.nombre AS 'nom_cl', e.nombre AS 'nom_empl'
		FROM clientes AS c
		INNER JOIN pedido AS p
			ON (p.fid_cliente = c.id_cliente)
		INNER JOIN empleados AS e 
			ON (p.fid_vendedor = e.id_empleado)
		WHERE e.nombre = "Alvaro Jaumes"

	SELECT DISTINCT c.nombre
		FROM clientes AS c
		WHERE id_cliente in (SELECT fid_cliente
								FROM pedido
								WHERE fid_vendedor in (SELECT id_empleado 
														FROM empleados
														WHERE nombre = "Alvaro Jaumes")
							)


	 --g.  Listar los empleados (id_empleado, nombre i fid_oficina) que trabajan en oficinas “buenas” 
	--(las que tienen ventas superiores a su objetivo). 
	SELECT e.id_empleado, e.nombre, e.fid_oficina, o.ventas, o.objetivo
		FROM empleados AS e 
		INNER JOIN oficinas AS o 
			ON(  e.fid_oficina = o.id_oficina)
		WHERE o.ventas > o.objetivo

	SELECT id_empleado, nombre, fid_oficina
		FROM empleados 
		WHERE fid_oficina in (SELECT id_oficina
								FROM oficinas
								WHERE ventas > objetivo)


	--h.  Listar los vendedores que no trabajen en oficinas dirigidas por el empleado 108. 
	SELECT *
		FROM empleados AS e
		INNER JOIN oficinas AS o 
			ON(  e.fid_oficina = o.id_oficina)
		WHERE NOT o.fid_director = 108

	SELECT *
		FROM empleados 
		WHERE fid_oficina in (SELECT id_oficina
								FROM oficinas
								WHERE NOT fid_director = 108)


	--i.  Listar los clientes asignados a Ana Bustamante que no tienen ningun pedido superior a 50000. 
	SELECT c.nombre AS 'nom_cl', e.nombre AS 'nom_empl', p.importe_total, c.limitecredito
		FROM clientes AS c
		INNER JOIN pedido AS p
			ON (p.fid_cliente = c.id_cliente)
		INNER JOIN empleados AS e 
			ON (p.fid_vendedor = e.id_empleado)
		WHERE 
			e.nombre = "Ana Bustamante"
		GROUP BY c.id_cliente
		HAVING max(p.importe_total)<30000


	SELECT * 
		FROM clientes 
		WHERE id_cliente in (SELECT fid_cliente 
								FROM  pedido 
								WHERE fid_vendedor in (SELECT id_empleado
														FROM empleados 
														WHERE nombre = "Ana Bustamante")
								GROUP BY fid_cliente
								HAVING max(importe_total)<30000
								ORDER BY fid_cliente)

