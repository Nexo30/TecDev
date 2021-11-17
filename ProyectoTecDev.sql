create database HTmotors;
use HTmotors;
#drop database htmotors;
Create table PERSONA (
CI int (8),
Nombre varchar (30) not null,
Apellido varchar (30) not null,
Calle varchar (30),
Ciudad varchar (30),
Numero int (5),
primary key (CI));
insert into Persona (CI, Nombre, Apellido, Calle, Ciudad, Numero) values 
(47896540, 'Roberto', 'Fernandez', '18 de Julio', 'Montevideo', 1345),
(44569542, 'Danilo', 'Gallero', 'Mercedes', 'Montevideo', 1578),
(36584582, 'Alfredo', 'Retamoza', 'Dr. Poey', 'Las Piedras', 5487),
(44569896, 'Gregorio', 'Pergolini', 'La Paz Mendoza', 'La Paz', 2147),
(43695472, 'Alexander', 'Pombo', 'Rivera', 'Las Piedras', 2698),
(48412546, 'Sanchez', 'Manovelcro', 'Durzano', 'Progreso', 236),
(36974158, 'Tota', 'Lugano', 'Wilson Ferreira', 'Carmelo', 1548),
(44569457, 'Gaston', 'Ramirez', 'Interbalnearia', 'Salinas', 3587);

Create table CLIENTE (
CI int (8),
Nom_usuario varchar (30) unique not null,
Password_cli varchar (15) not null,
primary key (CI),
foreign key (CI) references PERSONA (CI));
insert into Cliente (CI, Nom_usuario, Password_cli) values
(47896540, 'Roberto540', 'Fernandez1345'),
(44569542, 'Danilo542', 'Gallero1578'),
(36584582, 'Alfredo582', 'Retamoza5487'),
(44569896, 'Gregorio896', 'Pergolini2147');

Create table TELEFONO (
CI int (8),
Telefono_cli int (15),
primary key (CI, Telefono_cli),
foreign key (CI) references PERSONA (CI));
insert into Telefono (CI, Telefono_cli) values
(47896540, 098478965),
(44569542, 093658421),
(36584582, 096598741),
(44569896, 091698745);

Create table USUARIO (
CI_adm int (8),
Password_adm varchar (15) not null,
primary key (CI_adm),
foreign key (CI_adm) references PERSONA (CI));
insert into Usuario (CI_adm, Password_adm) values
(43695472, 'Pombo2698'),
(48412546, 'Manovelcro236'),
(36974158, 'Lugano1548'),
(44569542, 'Gaston3587');


Create table CATEGORIA (
Cod_Cat int (15) auto_increment, 
Nom_Categoria varchar (15) not null,
primary key (Cod_Cat));
insert into Categoria (Nom_Categoria) values
('Iluminaria'), ('Frenos'), ('Suspension'), ('Accesorios'), ('Refrigeracion'), ('Escapes');

Create table ARTICULO (
Cod_Art int (15) auto_increment, 
Cod_Cat int (15), 
Nom_art varchar (30) not null, 
Marca varchar (30) not null, 
Modelo varchar (30) not null, 
Descripcion varchar (50), 
Precio decimal (10,2) not null, 
Stock int (15) not null,
primary key (Cod_Art),
foreign key (Cod_Cat) references Categoria (Cod_Cat));
insert into Articulo (Cod_Cat, Nom_art, Marca, Modelo, Descripcion, Precio, Stock) values
(1, 'Lampara Led', 'Peugeot', '308', 'asdasdasd', 1500, 15),
(2, 'Mordaza', 'Volkswagen', 'Gol', 'asdasdasd', 2500, 8),
(3, 'Amortiguador', 'Volkswagen', 'Saveiro', 'asdasdasd', 1100, 25),
(4, 'Alfombra', 'Chevrolet', 'C 10', 'asdasdasd', 3500, 14),
(5, 'Radiador', 'Fiat', 'Palio', 'asdasdasd', 4300, 6),
(6, 'Caño de Escape', 'Nissan', 'Tida', 'asdasdasd', 2700, 3);
ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

Create table COMPRA (
CI int (8),
Cod_art int (15),
Cantidad int (5) not null,
Fecha date not null,
primary key (CI, Cod_Art),
foreign key (CI) references Cliente (CI),
foreign key (Cod_art) references Articulo (Cod_art));
insert into Compra (CI, Cod_Art, Cantidad, Fecha) values
(47896540, 1, 2, '2020/11/05'),
(44569542, 3, 4, '2021/08/15'), 
(36584582, 4, 4,'2021/08/09'),
(44569896, 5, 1, '2021/09/05');


Create table PEDIDO (
Num_Pedido int (15) auto_increment,
Calle varchar (30) not null,
Ciudad varchar (30) not null,
Numero int (5) not null,
Fecha date not null,
primary key (Num_Pedido));
insert into Pedido (Calle, Ciudad, Numero, Fecha) values
('18 de Julio', 'Montevideo', 2365, '2021/9/05'),
('Durazno', 'Progreso', 6854, '2021/08/15'),
('Dr. Poey', 'Las Piedras', 2879, '2021/08/24'),
('Aldabalde', 'La Paz', 1245, '2021/09/14');

Create table GENERA (
CI int (8), 
Num_Pedido int (15), 
Cod_Cat int (15), 
Cod_Art int (15),
primary key (CI),
foreign key (CI) references Cliente (CI),
foreign key (Num_Pedido) references Pedido (Num_Pedido),
foreign key (Cod_Cat) references Categoria (Cod_Cat),
foreign key (Cod_Art) references Articulo (Cod_Art));
insert into Genera (CI, Num_pedido, Cod_Cat, Cod_Art) values
(47896540, 1, 1, 1),
(44569542, 3, 3, 3),
(36584582, 2, 4, 4),
(44569896, 4, 5, 5);

Create table ADMINISTRAN (
CI int (8),
CI_Adm int (8), 
Cod_Cat int (15), 
Cod_Art int (15),
primary key (CI_Adm, CI),
foreign key (CI) references Cliente (CI),
foreign key (CI_Adm) references Usuario (CI_Adm),
foreign key (Cod_Cat) references Categoria (Cod_Cat),
foreign key (Cod_Art) references Articulo (Cod_Art));
insert into Administran (CI, CI_Adm, Cod_Cat, Cod_Art) values
(47896540, 43695472, 1, 1),
(44569542, 48412546, 3, 3),
(36584582, 43695472, 4, 4),
(44569896, 43695472, 5, 5);
ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
#Consultas

#1-Mostrar los pedidos que se hicieron en el mes de agosto, que articulos se vendieron y ciudad.
select nom_art as Nombre, ciudad from Genera G join Articulo A
on G.cod_art=A.cod_art join Pedido P on G.num_pedido=P.num_pedido
where fecha>='2021/08/01' and fecha<='2021/08/31';

#2-Mostrar el nombre del articulo donde el stock sea menor de 10, ordenado de menor a mayor.
select nom_art as Nombre_Articulo, stock as Cantidad from Articulo 
where stock<10 order by stock;

#3-Mostrar el nombre de la categoria de cada articulo, y de este el nombre, marca y modelo en una misma columna ordenado por categoria.
select nom_categoria as Categoria, concat_ws(' ', nom_art, marca, modelo) as Articulos from Categoria C 
join Articulo A on C.cod_cat=A.cod_cat order by nom_categoria;

#4-Mostrar los pedidos que se hicieron a la ciudad de Progreso, nombre y apellido del cliente en una misma columna y articulo.
select concat_ws(' ', Nombre, Apellido) as Nombre_Apellido, P.Ciudad, nom_art as Articulo from Genera G 
join Articulo A on G.cod_art=A.cod_art 
join Pedido P on G.num_pedido=P.num_pedido 
join Persona C on G.CI=C.CI
where P.ciudad='Progreso';

#5-Mostrar los nombres y apellidos de usuarios en una fila que realizaron ventas en el mes de agosto y que articulo vendieron. 
select concat_ws(' ', Nombre, Apellido) as Usuario, nom_art as Articulo from Persona U
join Administran A on U.CI=A.Ci_adm
join Articulo C on A.cod_art=C.cod_art
join Compra M on C.cod_art=M.cod_art
where fecha>='2021/08/01' and fecha<='2021/08/31';

# Sentencias de creacion de permisos
#GRANT insert, select, update, delete on HTmotors.* to [Usuarios];
#GRANT select on HTmotors.Articulo to [Cliente];
#GRANT select on HTmotors.Categoria to [Cliente];