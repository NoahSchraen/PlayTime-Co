drop database if exists playTimeBDD ;

create database if not exists playTimeBDD ;
use playTimeBDD ;

create Table Utilisateur (
	id_utilisateur int primary key not null,
	nom_utilisateur varchar(50),
	prenom_utilisateur varchar(50) ,
	email varchar(75),
	telephone varchar(15),
	adresse varchar(75),
	username varchar(25),
	mdp varchar(25)
	
) ;

create Table Jouet (
	id_jouet int primary key not null,
	nom_jouet varchar(75) ,
	type_jouet varchar(25),
	stock int not null,
	prix float not null
	
) ;

create Table Panier (
	id_panier int primary key not null,
	article varchar(255),
	quantité int not null,
	prix_total int not null,
	nb_article_total int not null
);

create Table Avis(
	id_avis int primary key not null,
	contenu varchar(280),
	note float not null
); 
