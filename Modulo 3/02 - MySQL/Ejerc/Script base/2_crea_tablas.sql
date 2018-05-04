
DROP TABLE IF EXISTS linea_pedido;
DROP TABLE IF EXISTS productos;
DROP TABLE IF EXISTS pedido;
DROP TABLE IF EXISTS clientes;
DROP TABLE IF EXISTS oficinas;
DROP TABLE IF EXISTS empleados;



-- clientes

CREATE TABLE clientes (
	id_cliente int(4),
	nombre varchar(40) NOT NULL,
	limitecredito decimal(10,2), 
	PRIMARY KEY (id_cliente)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- empleados

CREATE TABLE empleados (
	id_empleado int(3),
	nombre varchar(40) NOT NULL ,
	edad int(3),
	fid_oficina int(2),
	cargo varchar(20),
	fecha_contrato date,
	fid_superior int(3),
	salario decimal(10,2),
	ventas decimal(10,2),
	PRIMARY KEY  (id_empleado) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- oficinas

CREATE TABLE oficinas (
	id_oficina int(2),
	ciudad varchar(40),
	region varchar(20),
	fid_director int(3),
	objetivo decimal(10,2),
	ventas decimal(10,2),
	PRIMARY KEY  (id_oficina) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- pedido

CREATE TABLE pedido (
	id_pedido int(6),
	fecha date NOT NULL,
	fid_cliente int(4) NOT NULL,
	fid_vendedor int(3) NOT NULL,
	importe_total decimal(10,2),
	PRIMARY KEY  (id_pedido)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- linea_pedido

CREATE TABLE linea_pedido (	
	fid_pedido int(6),
    id_linea_pedido	int(2),
	fid_fabricante varchar(10) NOT NULL, 
	fid_producto varchar(15) NOT NULL ,
	cantidad int(3) NOT NULL,
	importe decimal(10,2) NOT NULL,
	PRIMARY KEY  (fid_pedido,id_linea_pedido) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- productos

CREATE TABLE productos (
	id_fabricante varchar(10), 
	id_producto varchar(15),
	descripcion varchar (20),
	precio decimal(10,2),
    existencias int(4),
	PRIMARY KEY  (id_fabricante,id_producto)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

