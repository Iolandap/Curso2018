ALTER TABLE linea_pedido DROP FOREIGN KEY FK_linpedido_prod;
ALTER TABLE linea_pedido DROP FOREIGN KEY FK_linpedido_com;
ALTER TABLE pedido DROP FOREIGN KEY FK_pedido_client;
ALTER TABLE pedido DROP FOREIGN KEY FK_pedido_empl;
ALTER TABLE oficinas DROP FOREIGN KEY FK_ofic_empl;
ALTER TABLE empleados DROP FOREIGN KEY FK_empl_ofic;
ALTER TABLE empleados DROP FOREIGN KEY FK_empl_empl;

