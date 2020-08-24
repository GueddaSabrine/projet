create database if not exists ajax_php_db;

use ajax_php_db;

create table if not exists Stagiaires
(
    id     int unsigned auto_increment not null,
    prenom nvarchar(255) unique        not null,
    email  nvarchar(255) unique not null ,
    ville  nvarchar(255),
    constraint pk_stagiaires primary key (id)
);

drop table if exists Stagiaires;