--------------------------------------
-- 		Base de datos 'empresa'
USE empresa;
--------------------------------------

--------------------------------------
-- 			01 - Empresa
--------------------------------------
	-- a.  Contad cuantos clientes hay en total 

	SELECT COUNT(*) 
		FROM clientes;

	-- b.  Recuperad el NOMBRE de todos los empleados en orden de fecha de 
	-- contrato descendente. 

	SELECT nombre
		FROM empleados 
		ORDER BY fecha_contrato DESC;

	-- c.  Seleccionad SOLO el último pedido insertado 

	SELECT * 
		FROM pedido 
		ORDER by `id_pedido` DESC LIMIT 1;

	-- d.  Agrupad los pedidos por fecha para saber si existe alguna fecha con más 
	-- de un pedido 

	SELECT `fecha`, COUNT(`fecha`) 
		FROM pedido  
		GROUP BY `fecha` 
		HAVING COUNT(`fecha`)>1 
		ORDER BY `fecha`;

	-- e.  Modificad la fecha de todos los contratos por la fecha actual 

	UPDATE empleados 
		SET fecha_contrato = NOW();

--------------------------------------
-- 			02 - Empresa
--------------------------------------

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

--------------------------------------
-- 			03 - Empresa
--------------------------------------

	-- a.  Listado de vendedores de más de 40 años. 
	SELECT * FROM empleados WHERE `edad`>40;

	-- b.  Listado de centros situados en la región este y que NO estén en 
	-- Valencia. 
	SELECT * FROM `oficinas` WHERE `region`="este" AND `ciudad`<>"Valencia";
	SELECT * 
		FROM `oficinas` 
		WHERE `region`="este" AND NOT `ciudad`="Valencia";

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

--------------------------------------
-- 			04 - Empresa
--------------------------------------

	-- a.  Cliente que más compras ha realizado (con unión natural e INNER JOIN) 
		SELECT c.*, COUNT(p.`id_pedido`) as num_pedidos -- Contamos los pedidos
			-- Asignacion apodos a las tablas
			FROM clientes c, pedido p 
			-- Enlace clave primaria y clave foranea
			WHERE c.`Id_cliente` = p.`fId_Cliente`
			-- Agrupamos por cliente
			GROUP by c.`Id_cliente`
			-- Ordenamos por cantidad pedidos
			ORDER by COUNT(p.`id_pedido`) DESC
			-- Mostramos dos registros
			LIMIT 2;

	-- b.  Dinero total que ha gastado el cliente de la consulta anterior (con unión 
	-- natural e INNER JOIN). 
		-- UNION NATURAL
		SELECT c.*, SUM(p.`importe_total`) -- Sumamos los importe compras
			FROM 
				clientes c, 
				pedido p 
			WHERE 
				c.`Id_cliente` = p.`fId_Cliente`
			-- Agrupamos las compras por cliente
			GROUP by 
				c.`Id_cliente`
			-- Ordenamos por cantidad pedidos
			ORDER by 
				SUM(p.`importe_total`) DESC
			-- Mostramos dos registros
			LIMIT 2;


		-- INNER JOIN
		SELECT c.*, SUM(p.`importe_total`)
			FROM 
		    	clientes AS c INNER JOIN pedido AS p
			ON 
		    	(c.`Id_cliente` = p.`fId_Cliente`)
			-- Agrupamos las compras por cliente
			GROUP by 
				c.`Id_cliente`
			-- Ordenamos por cantidad pedidos
			ORDER by 
				SUM(p.`importe_total`) DESC
			-- Mostramos dos registros
			LIMIT 2;


	-- c.  Listado de clientes que hayan realizado pedidos en 1989. 
	 	-- UNION NATURAL
		SELECT c.*, p.* -- Sumamos los importe compras
			FROM 	
				clientes c, 
				pedido p 
			WHERE 	
				c.`Id_cliente` = p.`fId_Cliente` AND
				p.`fecha` LIKE '1989-%' 

		-- INNER JOIN
		SELECT c.*, p.* -- Sumamos los importe compras
			FROM 
		    	clientes c INNER JOIN pedido p
			ON 
		    	(c.`Id_cliente` = p.`fId_Cliente`) AND
				p.`fecha` LIKE '1989-%' ;


	-- d.  Listado de centros situados en el este y de sus vendedores ordenados 
	-- alfabéticamente. 
		SELECT * 
			FROM 
				oficinas o,
				empleados e
			WHERE 
				o.`Id_Oficina` = e.`fId_Oficina` AND
				o.`region`="este" 
			ORDER by 
				e.`nombre`;

	-- e.  Listado de vendedores cuyo nombre comience por A y de sus pedidos 
	-- ordenados cronológicamente, pero solo de los pedidos realizados por 
	-- clientes cuyo nombre empiece por J. 
		-- UNION NATURAL
		SELECT * 
			FROM 
				empleados e,
				pedido p,
				clientes c
			WHERE 
				e.`Id_empleado` = p.`fid_vendedor` 	AND
				c.`Id_cliente`	= p.`fid_cliente`	AND
				e.`nombre` LIKE 'a%'				AND
				c.`nombre` LIKE 'j%'
			ORDER by 
				p.`fecha`;

		-- INNER JOIN
		SELECT *
			FROM 
		    	empleados e 
		    	INNER JOIN pedido p
		    		ON (e.`Id_empleado` = p.`fid_vendedor`)
		    	INNER JOIN clientes c
					ON (c.`Id_cliente`	= p.`fid_cliente`)
			WHERE 
				e.`nombre` LIKE 'a%'	AND
				c.`nombre` LIKE 'j%'
			ORDER by 
				p.`fecha`;


	-- f.  Listado de los directores de los centros de la región este con un objetivo 
	-- de ventas inferior a 500.000 €, cuyo salario sea superior a 300.000 €. 
		-- UNION NATURAL
		SELECT * 
			FROM 
				empleados e,
				oficinas o
			WHERE 
				e.`id_empleado` = o.`fid_director`	AND
				o.`region`		= "este"			AND
				o.`ventas` 		< 500000			AND
				e.`salario`		> 300000;


	-- g.  Listado de pedidos de entre 5 y 50 unidades, vendidos por empleados 
	-- de la oficina de Castellón a clientes cuyo nombre NO empiece por J.
		-- UNION NATURAL
		SELECT *
			FROM 
				pedido  		AS p,
				empleados		AS e,
				linea_pedido 	AS lp,
				oficinas		AS o,
				clientes 		AS c
			where 
				p.fid_vendedor	=	e.id_empleado 	AND
				lp.fid_pedido	=	p.id_pedido		AND
				e.fId_Oficina 	=	o.id_oficina 	AND
				p.fid_cliente 	=	c.Id_cliente 	AND
				lp.cantidad		>=	5				AND -- o usar BETWEEN 5 AND 50
				lp.cantidad		<=	50				AND
				o.ciudad		=	"castellon"		AND 
				NOT c.nombre 	like	"j%"

		-- INNER JOIN
		SELECT *
			FROM 
		    	pedido p 
		    	INNER JOIN empleados e
		    		ON (p.fid_vendedor	=	e.id_empleado)
		    	INNER JOIN linea_pedido	lp
					ON (lp.fid_pedido	=	p.id_pedido)
		    	INNER JOIN oficinas o
		    		ON (e.fId_Oficina 	=	o.id_oficina)
		    	INNER JOIN clientes c
		    		ON (p.fid_cliente 	=	c.Id_cliente)	
			WHERE 
				lp.cantidad		>=	5				AND -- o usar BETWEEN 5 AND 50
				lp.cantidad		<=	50				AND
				o.ciudad		=	"castellon"		AND 
				NOT c.nombre 	like	"j%"

	-- h.  Listado de pedidos realizados en febrero de 1997 realizados por clientes 
	-- cuyo nombre empiece por J, atendidos por vendedores mayores de 35 
	-- años y que trabajen en centros de la región oeste, ordenados por 
	-- nombre de cliente y fecha de pedido descendente. 
		-- INNER JOIN
		SELECT *
			FROM pedido p
			INNER JOIN clientes c
				ON (p.fid_cliente 	= c.id_cliente)
			INNER JOIN empleados e
				ON (p.fid_vendedor 	= e.id_empleado)
			INNER JOIN oficinas o
				ON (e.fid_Oficina 	= o.id_oficina)
			WHERE 
				YEAR(p.fecha) 	= "1997" 	AND
				MONTH(p.fecha)	= "02"		AND
				c.nombre 		like "J%"	AND
				e.edad 			> 35		AND
				o.region		= "oeste" 	
			ORDER BY c.nombre ASC, p.fecha DESC;
