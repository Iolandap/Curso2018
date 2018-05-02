
	SHOW DATABASES;			-- Muestra bases de datos en el sistema
	CREATE DATABASE TEST0;	-- Crea base de datos
	USE TEST0;				-- Usa la nueva base de datos creada

-- Creacion de tabla
	CREATE TABLE TEST0 (
	    PersonID 	int,
	    LastName 	varchar(255),
	    FirstName 	varchar(255),
	    Address 	varchar(255),
	    City 		varchar(255)
	 );
	CREATE TABLE Accidente (
	    cocheID 	int,
	    PersonID	int,
	    Fecha  		DATETIME
	 );

-- Insertar datos en la tabla
	INSERT INTO test0 (`PersonID`,`FirstName`,`LastName`,`Address`,`City`) 
	VALUES (0,"Jose","Maria","rambla 1","vilanova i la geltru");

	INSERT INTO `accidente`(`cocheID`, `PersonID`, `Fecha`) 
	VALUES (0,0,now());	-- Insertamos la fecha y hora actual

	INSERT INTO `accidente` VALUES (0,1,now());	--	No hace falta poner los campos, pero hemos de tener 
												--	en cuenta las posiciones
	INSERT INTO accidente VALUES (0,1,now());	-- 	la comilla solo hace falta si el nombre es compuesto

	INSERT INTO accidente VALUES (0,1,"2015-04-26 13:41:51");
	INSERT INTO accidente VALUES (0,1,"2012-04-26 13:41:51");
	INSERT INTO accidente VALUES (0,1,"2011-04-26 13:41:51");
	INSERT INTO accidente VALUES (0,1,"2010-04-26 13:41:51");

-- Mostrar informacion tabla
	SELECT * FROM `persona`							-- Todos los campos
	SELECT `LastName` FROM `persona`				-- Solo campo Last Name
	SELECT `LastName`,`PersonID` FROM `persona`		-- Mostrar dos campos
	SELECT * FROM `persona` WHERE `PersonID` >= 1	-- Condicion sobre el Person ID
	SELECT * FROM `persona` LIMIT 1;				-- Limita cantidad de registros a mostrar a una linea

	-- Muestra la base de datos ordenadas descendentemente, solo a 4 lineas. Al reves sera ASC
	SELECT * FROM `persona` ORDER BY `PersonID` DESC LIMIT 4; 

-- Muestra de tablas relacionada
	-- Asignamos alias al fichero coches = X		coches AS x
	-- Asignamos alias al fichero persona = Y		persona AS y

	SELECT y.PersonID, x.CocheID FROM coches AS x, persona AS y;

	SELECT y.PersonID, x.CocheID 
		FROM coches AS x,(SELECT * FROM persona WHERE PersonID=0) AS y;

	--En que fechas anteriores a 2018 ha tenido accientes la persona 1 con el coche 0
	SELECT x.PersonID, y.CocheID, z.accidente 
		FROM persona AS X, coches AS Y, accidente AS z 
		WHERE PersonID = 1 AND CocheID = 0 AND Fecha<="2018-01-01 00:00:00";

-- Cambia el valor de un ID especifico
	UPDATE persona SET LastName="sepulveda" WHERE PersonID>=0;
