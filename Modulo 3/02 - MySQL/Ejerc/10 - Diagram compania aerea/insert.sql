----------------------------------------
-- Base de datos: `vuelos`
----------------------------------------
USE vuelos;


----------------------------------------
-- Insertar valores en tabla : Avion
----------------------------------------
INSERT INTO avion (Matricula, Fabricante, Modelo, Capacidad_Pasaj, Autonomia_Vuelo) 
 	VALUES (1213,'Boing',337, 164, 4);
INSERT INTO avion (Matricula, Fabricante, Modelo, Capacidad_Pasaj, Autonomia_Vuelo) 
	VALUES (4567,'Boing',240, 280, 12);
INSERT INTO avion (Matricula, Fabricante, Modelo, Capacidad_Pasaj, Autonomia_Vuelo) 
 	VALUES (8910,'Ford',120, 80, 6);

SELECT * FROM `avion` WHERE 1


----------------------------------------
-- Insertar valores en tabla : Vuelos
----------------------------------------
-- OJO falta el ID_Avion para ponero en values
INSERT INTO vuelos (Fecha_Origen, Aeropuerto_Origen, Fecha_Destino, Aeropuerto_Destino,ID_Avion) 
	VALUES ('2018/05/02','Barcelona','2018/05/02','Madrid',1); -- ID_Avion cuadra con el indice de la tabla Avion
INSERT INTO vuelos (Fecha_Origen, Aeropuerto_Origen, Fecha_Destino, Aeropuerto_Destino,ID_Avion) 
	VALUES ('2018/06/15','Madrid','2018/06/15','Mallorca',2);  -- ID_Avion cuadra con el indice de la tabla Avion
INSERT INTO vuelos (Fecha_Origen, Aeropuerto_Origen, Fecha_Destino, Aeropuerto_Destino,ID_Avion) 
	VALUES ('2018/07/12','Mallorca','2018/07/12','Londres',3); -- ID_Avion cuadra con el indice de la tabla Avion

SELECT * FROM `vuelos` WHERE 1


----------------------------------------
-- Insertar valores en tabla : Pasajeros
----------------------------------------
INSERT INTO pasajeros ( DNI, Nombre ) 
	VALUES ('47913279A', 'Josep Maria Escofet');
INSERT INTO pasajeros ( DNI, Nombre ) 
	VALUES ('20000011B', 'Felipe Antonio Diaz');
INSERT INTO pasajeros ( DNI, Nombre ) 
	VALUES ('35123458E', 'Maria Enriqueta Gomez');


----------------------------------------
-- Insertar valores en tabla : Vuelo_pasajero
----------------------------------------
-- OJO falta el ID_vuelo y el ID_Pasajero para ponero en values
INSERT INTO vuelo_pasajero (ID_Vuelo, ID_Pasajero, Asiento, Clase ) 
	VALUES (1, 1, '29A', 'Turista');  -- ID_Avion y ID_Pasajero cuadran con los indices de las tablas
INSERT INTO vuelo_pasajero (ID_Vuelo, ID_Pasajero, Asiento, Clase ) 
	VALUES (2, 3, '1B', 'Superior'); -- ID_Avion y ID_Pasajero cuadran con los indices de las tablas
INSERT INTO vuelo_pasajero (ID_Vuelo, ID_Pasajero, Asiento, Clase ) 
	VALUES (3, 2, '10C', 'Basica');   -- ID_Avion y ID_Pasajero cuadran con los indices de las tablas


----------------------------------------
-- Modificar valores en tabla : Avion
----------------------------------------
-- Modificacion un valor cualquiera en la linea 1
UPDATE avion
	SET 	Capacidad_Pasaj = 200
	WHERE 	ID_Avion = 1;

-- Modificacion la clave en la linea 1
-- OJO: La clave a de ser tipo CASCADE en la tabla que se relaciona (Estructura/ Vista de relaciones). 
--		De esta manera, si modificamos el codigo, se canvia el codigo en Tabla Avion se modifica 
--		automaticamente en la tabla: Vuelos
UPDATE avion
	SET 	ID_Avion = 123
	WHERE 	ID_Avion = 1;


----------------------------------------
-- Resetear el indice de una tabla
----------------------------------------
TRUNCATE TABLE tablename
ALTER TABLE tablename AUTO_INCREMENT = 1