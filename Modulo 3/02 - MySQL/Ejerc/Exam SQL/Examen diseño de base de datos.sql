--------------------------------------
-- 		Base de datos 'empresa'
USE vuelos;
--------------------------------------

-- 1.	Listado de aviones con información sobre número de vuelos haya realizado o no.
	SELECT 	a.IdAvion AS 'ID',
			a.Matricula,
			a.Fabricante,
			a.Modelo,
			COUNT(v.IdAvion) AS 'Num_Vuelos'
		FROM 
			avion AS a
		LEFT OUTER JOIN vuelo AS v
			ON( a.IdAvion = v.IdAvion)
		GROUP BY 
			a.IdAvion


-- 2.	Lista de los aviones del fabricante Boeing para los cuales la capacidad
-- supera la capacidad del avión con matricula 03020 del mismo fabricante.(subconsulta)
	SELECT 	*
		FROM 
			avion AS a
		WHERE 
			Fabricante = 'Boeing' AND
			Capacidad > (SELECT Capacidad
							FROM avion
							WHERE Matricula= '03020'
							)


-- 3.	Listado de aviones que no han realizado ningún vuelo. (subconsulta)
	SELECT *
		FROM avion 
		WHERE IdAvion NOT IN (SELECT IdAvion
								FROM vuelo
								)

-- 4.	Listado de empleados cuyo número de vuelos sea superior a 2.
	SELECT e.*, COUNT(t.IdVuelo)
		FROM empleados AS e
		INNER JOIN tripulacion AS t
			ON (e.IdEmpleado = t.IdEmpleado)
		GROUP BY e.idEmpleado
		HAVING COUNT(t.`IdVuelo`)>2


-- 5.	Listado de pasajeros con el vuelo más largo que han realizado (consideramos autonomía de vuelo como indicador de duración del vuelo). 
	SELECT c.*, a.AutonomiaVuelo
		FROM pasajeros AS c  -- Cliente
		INNER JOIN pasaje AS p
			ON (c.IdPasajero = p.IdPasajero)
		INNER JOIN vuelo AS v
			ON (p.IdVuelo = v.IdVuelo)
		INNER JOIN avion AS a
			ON (v.IdAvion = a.IdAvion)
		GROUP BY c.IdPasajero
		ORDER BY c.IdPasajero, a.AutonomiaVuelo DESC


-- 6.	Añadir un nuevo empleado con DNI 12345678R que se llama Joan Soler Pineda y es Director general.
	INSERT INTO `empleados` (`IdEmpleado`, `DNI`, `Nombre`, `Apellidos`, `CategoriaProfesional`) 
		VALUES	(NULL, '12345678R', 'Joan', 'Soler Pineda', 'Director general')


-- 7.	Borrar los aviones que no tiene asignado ninguna tripulación.
	DELETE a.*
		FROM avion AS a
		LEFT JOIN vuelo AS v
			ON (a.IdAvion = v.IdAvion)
		LEFT OUTER JOIN tripulacion AS t
			ON (v.IdVuelo = t.IdVuelo)
		WHERE v.IdVuelo IS NULL


-- 8.	Bajar un 10% la autonomía de los aviones que han realizado más de 2 vuelos.
  -- No funciona, se ha de hacer una subconsulta....
	UPDATE avion AS a
		INNER JOIN vuelo as v
			ON (a.IdAvion = v.IdAvion)
		SET a.AutonomiaVuelo = a.AutonomiaVuelo+a.AutonomiaVuelo*10/100		
		GROUP BY a.IdAvion
		HAVING COUNT(v.`IdVuelo`)>2

	SELECT a.*,a.AutonomiaVuelo+a.AutonomiaVuelo*10/100	
		FROM avion AS a
		INNER JOIN vuelo as v
			ON (a.IdAvion = v.IdAvion)
		GROUP BY a.IdAvion
		HAVING COUNT(v.`IdVuelo`)>2

-- 9.	 Listar los pasajeros que han viajado durante el año 2017 en clase turista con empleados cuyo nombre empieza por J. 
	SELECT *
		FROM pasajeros AS c -- Clientes
		INNER JOIN pasaje AS p
			ON ( c.IdPasajero = p.IdPasajero)
		INNER JOIN vuelo AS v
			ON ( p.IdVuelo = v.IdVuelo)
		INNER JOIN tripulacion AS t
			ON ( v.IdVuelo = t.IdVuelo)
		INNER JOIN empleados AS e
			ON (t.IdEmpleado = e.IdEmpleado )
		WHERE 
			YEAR(v.fecha) = '2017' 	AND
			p.Clase = 'Turist'		AND
			e.nombre LIKE "J%"


-- 10.	Listar los nombres de los pasajeros que han viajado con el empleado “Salvador Meyers”.
	SELECT *
		FROM pasajeros AS c -- Clientes
		INNER JOIN pasaje AS p
			ON ( c.IdPasajero = p.IdPasajero)
		INNER JOIN vuelo AS v
			ON ( p.IdVuelo = v.IdVuelo)
		INNER JOIN tripulacion AS t
			ON ( v.IdVuelo = t.IdVuelo)
		INNER JOIN empleados AS e
			ON (t.IdEmpleado = e.IdEmpleado )
		WHERE 
			CONCAT(e.nombre,' ',e.apellidos) = "Salvador Meyers"
