/**
 * Author:  Wagner
 * Created: 29/06/2018
 * Cria base e dados e adciona usuário inicial.
 */

create database gamedb
default character set utf8
default collate utf8_general_ci;

use gamedb;

create table Usuarios(
    id varchar(10) not null,
    password varchar(3) not null,
    nome varchar(20) not null,
    nascimento date,
    sexo enum('M','F'),
    telefone varchar(15) not null,
    email varchar(50) not null,
    primary key (id)
)default charset = utf8;

create table Jogos(
    titulo varchar(50) not null,
    genero varchar(20) not null,
    desenvolvedora varchar(30) not null,
    id_dono varchar(10),
    foreign key (id_dono) references Usuarios(id),
    primary key (titulo)
)default charset = utf8;

create table Emprestimos(
    data_emprestimo date,
    id_emprestado varchar(10) not null,
    jogo varchar(50) not null,
    data_devolucao date,
    status enum('E','D') DEFAULT 'E',
    primary key (data_emprestimo,jogo),
    foreign key (id_emprestado) references Usuarios(id),
    foreign key (jogo) references Jogos(titulo)
)default charset = utf8;


insert into Usuarios
(id,password,nome,nascimento,sexo,telefone,email)
values
('wagner','123','Wagner Bittencourt','1900-01-01','M','0000-0000','wagner@teste.com.br');