create database plasticos2;
use plasticos2;


create table Usuarios(
	
    id_usuario int auto_increment primary key,
    usuario varchar(50) not null,
    contrasena varchar(20) not null
);

select * from Usuarios;

create table informacion(
    id_informacion int auto_increment primary key,
    id_usuario int not null,
    nombre varchar(100) not null,
    apepat varchar(100) not null,
    apemat varchar(100) not null,
    numero int not null,
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario)
);
select * from información;

create table plastico(
	
    id_plasticos int primary key auto_increment,
    tipo_plastico varchar (150) not null,
    cantidad_gramos int not null,
    kilos_dia int not null,
    fecha date,
    total_semana int not null,
    solo_uso varchar (50) not null
);
select* from plastico;
ALTER USER 'root'@'localhost'
IDENTIFIED WITH mysql_native_password
BY 'americayya99'; 