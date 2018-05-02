-- Tablas secundarias

-- Base de datos a usar
USE TEST0;						


-- Creacion tabla CLIENTE
CREATE TABLE cliente(
	id_cliente 	INT NOT NULL,
	nombre 		VARCHAR(30),
	PRIMARY KEY (id_cliente)	-- Definicion Key Primario de esta tabla
) ENGINE=INNODB ;				-- INNODB : para poder trabajar con claves foraneas


-- Creacion tabla VENTA
CREATE TABLE venta (
	id_factura 	INT NOT NULL,	--	El campo no puede ser nulo
	Fid_cliente INT NOT NULL,	--	Definimos la variable que va a estar enlazada con la tabla CLIENTE.
								--	Han de tener el mismo formato y tamaño
	cantidad 	INT,
	PRIMARY KEY(id_factura),	--	Definicion Key Primario de esta tabla
	INDEX (Fid_cliente),		--	Definicion Key FORANEO de esta tabla
	FOREIGN KEY (Fid_cliente) REFERENCES cliente(id_cliente)	-- Referenciamos la Key FORANEA con la 
																-- tabla CLIENTE y su primary key (Id_Cliente)
) ENGINE=INNODB ;

-- Modificacion de tablas
Alter table coches add anyo_fabricacion int(4);	-- CREAR un campo llamado ANYO_FABRICACION
Alter table coches drop anyo_fabricacion;		-- BORRA un campo llamado ANYO_FABRICACION