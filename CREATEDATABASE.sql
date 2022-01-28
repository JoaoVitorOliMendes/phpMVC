CREATE DATABASE clientesConstrusite;

use clientesConstrusite;

create table if not exists clientes(
	id_cliente int auto_increment not null,
    nome_cliente varchar(255),
    email_cliente varchar(255),
    telefone_cliente varchar(13),
    senha_cliente varchar(255),
    data_nasc_cliente date,
    primary key(`id_cliente`)
);