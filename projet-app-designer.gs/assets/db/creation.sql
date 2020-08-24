create database if not exists register_crud;

use register_crud;

create table if not exists Register (
                                        id int auto_increment not null ,
                                        prenom varchar(50) ,
                                        identifiant varchar(50) ,
                                        password varchar(50) ,
                                        conf_password varchar(50),
                                        constraint uq_email_register UNIQUE (identifiant),
                                        constraint pk_register primary key (id)
);

insert into Register(prenom, identifiant, password, conf_password)
values ('talia', 'talia@gmail.as', '1234', '1234');

create table if not exists Message (
                                       id int auto_increment not null ,
                                       titre varchar(255) ,
                                       contenu varchar(255) ,
                                       date_creation date,
                                       identifiant   varchar(255) ,
                                       constraint uq_identifiant_register UNIQUE (identifiant),
                                       constraint pk_register primary key (id)

);

insert into Message(titre, contenu, date_creation, identifiant)
values ('chat', 'resumer', '2000/10/20', 'talia@dawm.as');
