/**
 * Author:  Wagner
 * Created: 29/06/2018
 */

create database gamedb
default character set utf8
default collate utf8_general_ci;

use gamedb;

create table usuarios(
    id varchar(10) not null,
    password varchar(3) not null,
    nome varchar(20) not null,
    primary key (id)
)default charset = utf8;

create table amigos(
    nome varchar(30) not null,
    nascimento date,
    sexo enum('M','F'),
    telefone varchar(15) not null,
    email varchar(50) not null,
    primary key (nome,email)
)default charset = utf8;

create table jogos(
    titulo varchar(50) not null,
    genero varchar(20) not null,
    desenvolvedora varchar(30) not null,
    primary key (titulo)
)default charset = utf8;

create table emprestimos(
    data_emprestimo date,
    amigo varchar(30) not null,
    amigo_email varchar(50) not null,
    jogo varchar(50) not null,
    data_devolucao date,
    status enum('E','D') DEFAULT 'E',
    primary key (data_emprestimo,jogo),
    foreign key (amigo,amigo_email) references amigos(nome,email),
    foreign key (jogo) references jogos(titulo)
)default charset = utf8;


insert into usuarios
(id,password,nome)
values
('wagner','123','Wagner Bittencourt');