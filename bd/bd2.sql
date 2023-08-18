/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  18/08/2023 16:11:36                      */
/*==============================================================*/


drop table if exists etudiant;

drop table if exists filiere;

drop table if exists niveau_etude;

drop table if exists utilisateur;

/*==============================================================*/
/* Table : etudiant                                             */
/*==============================================================*/
create table etudiant
(
   id_etudiant          int not null,
   id_niveau            int not null,
   id_filiere           int not null,
   nom                  varchar(254),
   prenom               varchar(254),
   date_de_naissance    datetime,
   nation               varchar(254),
   adresse              varchar(254),
   contact              int,
   primary key (id_etudiant),
   key AK_Identifiant_2 (id_etudiant)
);

/*==============================================================*/
/* Table : filiere                                              */
/*==============================================================*/
create table filiere
(
   id_filiere           int not null,
   nom_filiere          varchar(254),
   primary key (id_filiere)
);

/*==============================================================*/
/* Table : niveau_etude                                         */
/*==============================================================*/
create table niveau_etude
(
   id_niveau            int not null,
   valeur               int,
   primary key (id_niveau)
);

/*==============================================================*/
/* Table : utilisateur                                          */
/*==============================================================*/
create table utilisateur
(
   id_utilisateur       int not null,
   nom                  varchar(254),
   prenom               varchar(254),
   uersname             varchar(254),
   password             varchar(254),
   contact              int,
   primary key (id_utilisateur),
   key AK_Identifiant_2 (id_utilisateur)
);

alter table etudiant add constraint FK_Association_1 foreign key (id_filiere)
      references filiere (id_filiere) on delete restrict on update restrict;

alter table etudiant add constraint FK_Association_2 foreign key (id_niveau)
      references niveau_etude (id_niveau) on delete restrict on update restrict;

