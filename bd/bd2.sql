/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de cr�ation :  18/08/2023 14:50:43                      */
/*==============================================================*/


drop table if exists compte;

drop table if exists etudiant;

drop table if exists role;

drop table if exists utilisateur;

/*==============================================================*/
/* Table : compte                                               */
/*==============================================================*/
create table compte
(
   id_compte            int not null,
   username             varchar(254),
   password             varchar(254),
   primary key (id_compte)
);

/*==============================================================*/
/* Table : etudiant                                             */
/*==============================================================*/
create table etudiant
(
   id_etudiant          int not null,
   nom                  varchar(254),
   prenom               varchar(254),
   date_de_naissance    datetime,
   nation               varchar(254),
   filiere              varchar(254),
   niveau_d_etude       varchar(254),
   adresse              varchar(254),
   email                varchar(254),
   contact              int,
   primary key (id_etudiant)
);

/*==============================================================*/
/* Table : role                                                 */
/*==============================================================*/
create table role
(
   id_role              int not null,
   id_utilisateur       int not null,
   type_de_role         varchar(254),
   primary key (id_role)
);

/*==============================================================*/
/* Table : utilisateur                                          */
/*==============================================================*/
create table utilisateur
(
   id_utilisateur       int not null,
   id_compte            int not null,
   nom                  varchar(254),
   prenom               varchar(254),
   adresse              varchar(254),
   email                varchar(254),
   contact              int,
   primary key (id_utilisateur)
);

alter table role add constraint FK_Association_2 foreign key (id_utilisateur)
      references utilisateur (id_utilisateur) on delete restrict on update restrict;

alter table utilisateur add constraint FK_Association_4 foreign key (id_compte)
      references compte (id_compte) on delete restrict on update restrict;

