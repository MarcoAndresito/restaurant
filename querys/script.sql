

-- PostgreSql

create database restaurant;

create table Comidas (
id int,
nombre varchar(20),
precio decimal,
descripcion text
);

INSERT INTO Comidas VALUES(1,'sopa',10,'comida ...');
INSERT INTO Comidas VALUES(2,'pizza',15,'comida ...');
INSERT INTO Comidas VALUES(3,'pollo',15,'comida ...');
INSERT INTO Comidas VALUES(4,'majadito',15,'comida ...');
INSERT INTO Comidas VALUES(5,'pescado',15,'comida ...');
INSERT INTO Comidas VALUES(6,'milanesa',15,'comida ...');
INSERT INTO Comidas VALUES(7,'bife',15,'comida ...');

select * from Comidas;

select nombre from Comidas;

update Comidas set precio = 15;

update Comidas set precio = 17 , nombre = 'pizza' where id = 2;

update Comidas set descripcion = 'pizza grande' where id = 2;

delete from Comidas;

delete from Comidas where id = 2;
