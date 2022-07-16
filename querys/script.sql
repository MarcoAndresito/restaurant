

-- PostgreSql

create database restaurant;

create table Comidas (
id serial primary key,
nombre varchar(20),
precio decimal,
descripcion text
);

INSERT INTO Comidas (nombre,precio,descripcion) 
VALUES('sopa',10,'comida ...');
INSERT INTO Comidas (nombre,precio,descripcion)
VALUES('pizza',15,'comida ...');
INSERT INTO Comidas (nombre,precio,descripcion)
VALUES('pollo',15,'comida ...');
INSERT INTO Comidas (nombre,precio,descripcion)
VALUES('majadito',15,'comida ...');
INSERT INTO Comidas (nombre,precio,descripcion)
VALUES('pescado',15,'comida ...');
INSERT INTO Comidas (nombre,precio,descripcion)
VALUES('milanesa',15,'comida ...');
INSERT INTO Comidas (nombre,precio,descripcion)
VALUES('bife',15,'comida ...');

select * from Comidas;

select nombre from Comidas;

update Comidas set precio = 15;

update Comidas set precio = 17 , nombre = 'pizza' where id = 2;

update Comidas set descripcion = 'pizza grande' where id = 2;

delete from Comidas;

delete from Comidas where id = 2;
