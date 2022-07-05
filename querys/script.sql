-- PostgreSql

create database restaurant;

create table comida (
id int,
nombre varchar(20),
precio decimal,
descripcion text
);

INSERT INTO public.comida VALUES(1,'sopa',10,'comida ...');
INSERT INTO public.comida VALUES(2,'pizza',15,'comida ...');
INSERT INTO public.comida VALUES(3,'pollo',15,'comida ...');
INSERT INTO public.comida VALUES(4,'majadito',15,'comida ...');
INSERT INTO public.comida VALUES(5,'pescado',15,'comida ...');
INSERT INTO public.comida VALUES(6,'milanesa',15,'comida ...');
INSERT INTO public.comida VALUES(7,'bife',15,'comida ...');

select * from comida;

select nombre from comida;

update comida set precio = 15;

update comida set precio = 17 , nombre = 'pizza' where id = 2;

update comida set descripcion = 'pizza grande' where id = 2;

delete from comida;

delete from comida where id = 2;
