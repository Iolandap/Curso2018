--------------------------------------
-- 		Base de datos 'empresa'
USE empresa;
--------------------------------------

--------------------------------------
-- 			01 - Empresa
--------------------------------------

-- a.  Listado del importe total de cada pedido (obtenido sumando el importe de las líneas del pedido),
-- ordenados cronológicamente. 
	SELECT fid_pedido, p.fecha,  SUM(importe)
		FROM linea_pedido
		INNER JOIN pedido AS p
			ON 	 fid_pedido = p.id_pedido
			GROUP BY p.fecha ASC


-- b.  Nombre y apellidos de los vendedores de menor y mayor edad, por este orden. 
	SELECT nombre, edad
		FROM empleados
		WHERE 	edad = (SELECT MIN(edad)
							FROM empleados) OR 
				edad = (SELECT MAX(edad)
							FROM empleados)
		ORDER by edad ASC


-- d.  Número de vendedores en cada oficina. 
	SELECT fid_oficina, COUNT(fid_oficina)
		FROM empleados
		GROUP By fid_oficina


-- e.  Media de edad de los vendedores.
	SELECT AVG(edad)
		FROM empleados


-- f.  Listado de años en los que se han realizado pedidos. 
	SELECT YEAR(fecha)
		FROM pedido
		GROUP BY YEAR(fecha)


-- g.  Listado con los diferentes años de nacimiento de los vendedores y la cantidad nacidos en cada uno.
	-- DATE ADD() : suma o resta valores a una fecha
	-- En este caso usamos un campo como variable para sumar y restar valores
	SELECT 	YEAR(DATE_ADD(now(), INTERVAL -edad YEAR)), 
			COUNT(YEAR(DATE_ADD(now(), INTERVAL -edad YEAR)))
		FROM empleados
		GROUP BY edad
		ORDER BY YEAR(DATE_ADD(now(), INTERVAL -edad YEAR)) ASC


-- h.  Listado con información de los diferentes pedidos, incluyendo una columna con el importe total
-- (obtenido sumando el importe de las líneas del pedido), ordenados cronológicamente. 
	SELECT *
		FROM pedido AS p
		INNER JOIN linea_pedido AS lp
			ON (p.id_pedido = lp.fid_pedido)
		ORDER BY fecha ASC

	SELECT fid_pedido, SUM(importe)
		FROM linea_pedido AS lp 
		GROUP BY fid_pedido



-- i.  Cantidad de pedidos realizados en cada centro, ordenados de mayor a menor. 



