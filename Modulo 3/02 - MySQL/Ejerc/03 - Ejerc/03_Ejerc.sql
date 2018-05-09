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


	-- e.  Aumentar un 5% el precio de todos los productos del fabricante ACI. 


	-- f.  Añadir una nueva oficina para la ciudad de Madrid, con numero de oficina 30, un objetivo de 600 
	-- y región centro. 


	-- g.  Cambiar los empleados de la oficina 21 a la oficina 30. 


	-- h.  Eliminar los pedidos del empleado 105. 


	-- i.  Subir un 10% el salario de los empleados cuya oficina haya superado sus objetivos de venta. 


	-- j.  Eliminar las oficinas que no tengan empleados. 

