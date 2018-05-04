ALTER TABLE empleados
  ADD CONSTRAINT FK_empl_empl FOREIGN KEY(fid_superior) REFERENCES empleados(id_empleado);
ALTER TABLE empleados
  ADD CONSTRAINT FK_empl_ofic FOREIGN KEY(fid_oficina) REFERENCES oficinas(id_oficina) ON DELETE SET NULL;
ALTER TABLE oficinas
  ADD CONSTRAINT FK_ofic_empl FOREIGN KEY(fid_director) REFERENCES empleados(id_empleado) ON DELETE SET NULL;
ALTER TABLE pedido
  ADD CONSTRAINT FK_pedido_empl FOREIGN KEY(fid_vendedor) REFERENCES empleados(id_empleado) ON DELETE RESTRICT;
ALTER TABLE linea_pedido
  ADD CONSTRAINT FK_linpedido_com FOREIGN KEY(fid_pedido) REFERENCES pedido(id_pedido) ON DELETE RESTRICT;
ALTER TABLE pedido
  ADD CONSTRAINT FK_pedido_client FOREIGN KEY(fid_cliente) REFERENCES clientes(id_cliente);
ALTER TABLE linea_pedido
  ADD CONSTRAINT FK_linpedido_prod FOREIGN KEY(fid_fabricante, fid_producto) REFERENCES productos(id_fabricante, id_producto);

