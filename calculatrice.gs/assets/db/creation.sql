create database if not exists calculatrice;

use calculatrice;

create table if not exists register (
                                        id int auto_increment not null ,
                                        prenom varchar(50) ,
                                        email varchar(50) ,
                                        password varchar(50) ,
                                        constraint uq_email_register UNIQUE (email),
                                        constraint pk_register primary key (id)
);

insert into Register(prenom, email, password)
values ('sab', 'sab@sab.sg', '1234');

create table if not exists idf (
                                   id int auto_increment not null ,
                                   email varchar(50) ,
                                   password varchar(50),
                                   constraint uq_email_register UNIQUE (email),
                                   constraint pk_register primary key (id)
);

insert into idf(email, password)
values ('sab@sab.gs', '1234');

create table if not exists multiplication(
                                             id int unsigned auto_increment not null,
                                             multiplication nvarchar(255) unique not null,
                                             reponse  nvarchar(255) unique not null ,
                                             correct  nvarchar(255),
                                             constraint pk_register primary key (id)
);

insert into multiplication(multiplication, reponse, correct)
values ('2*2', '4', '1');

