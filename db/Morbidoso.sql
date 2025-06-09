-- *********************************************
-- * Standard SQL generation                   
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Tue Jan 28 16:00:10 2025 
-- * LUN file: C:\Users\kolia\OneDrive - Alma Mater Studiorum Università di Bologna\Desktop\Tecnologie web\PROG\Morbidoso.lun 
-- * Schema: Schema E/R/SQL 
-- ********************************************* 


-- Database Section
-- ________________ 

create database Morbidoso;
use Morbidoso;


-- DBSpace Section
-- _______________

-- Tables Section
-- _____________ 

create table UTENTE (
     E_mail VARCHAR(100) not null,
     Nome VARCHAR(50) not null,
     Cognome VARCHAR(50) not null,
     Numero_telefono VARCHAR(15),
     Data_di_nascita DATE default null,
     Password VARCHAR(255) not null,
     Punti INT not null default 0,
     Admin BOOLEAN not null default false,
     primary key (E_mail));
     
create table NOTIFICA (
     Id_notifica INT not null auto_increment,
     Tipo_notifica VARCHAR(50) not null,
     Testo TEXT not null,
     Stato BOOLEAN not null default 0,
     Giorno DATE not null,
     E_mail VARCHAR(100) not null,
     primary key (Id_notifica),
     foreign key (E_mail) references UTENTE(E_mail) ON UPDATE CASCADE ON DELETE CASCADE);

create table CATEGORIA (
     Nome_categoria VARCHAR(50) not null,
     primary key (Nome_categoria));

create table METODO_DI_SPEDIZIONE (
     Id_spedizione INT not null auto_increment,
     Nome VARCHAR(50) not null,
     Descrizione VARCHAR(255) not null,
     Costo DECIMAL(10,2),
     Giorni INT not null,
     primary key (Id_spedizione));

create table ORDINE (
     Id_ordine INT not null auto_increment,
     Data_effettuazione DATE not null,
     Prezzo_finale DECIMAL(10,2) not null,
     Punti_usati INT not null,
     Stato ENUM('In lavorazione', 'Spedito', 'Consegnato') not null,
     Id_spedizione INT not null,
     E_mail VARCHAR(100) not null,
     primary key (Id_ordine),
     foreign key (Id_spedizione) references METODO_DI_SPEDIZIONE (Id_spedizione),
     foreign key (E_mail) references UTENTE (E_mail) ON UPDATE CASCADE);
    
create table PRODOTTO (
     Id_prodotto INT not null auto_increment,
     Nome VARCHAR(100) not null,
     Descrizione TEXT not null,
     Immagine VARCHAR(255) not null,
     Grandezza VARCHAR(50) not null,
     Scorta INT not null,
     Prezzo DECIMAL(10,2) not null,
     Prezzo_punti INT not null,
     Nome_categoria VARCHAR(50) not null,
     attivo BOOLEAN not null default 1,
     primary key (Id_prodotto),
     foreign key (Nome_categoria) references CATEGORIA (Nome_categoria) ON DELETE CASCADE);

create table carrello (
     E_mail VARCHAR(100) not null,
     Id_prodotto INT not null,
     Quantita INT not null,
     primary key (E_mail, Id_prodotto),
     foreign key (E_mail) references UTENTE (E_mail) ON UPDATE CASCADE ON DELETE CASCADE,
     foreign key (Id_prodotto) references PRODOTTO (Id_prodotto) ON DELETE CASCADE);

create table preferito (
     Id_prodotto INT not null,
     E_mail VARCHAR(100) not null,
     primary key (Id_prodotto, E_mail),
     foreign key (E_mail) references UTENTE (E_mail) ON UPDATE CASCADE ON DELETE CASCADE,
     foreign key (Id_prodotto) references PRODOTTO (Id_prodotto) ON DELETE CASCADE);

create table prodotto_ordinato (
     Id_ordine INT not null,
     Id_prodotto INT not null,
     Quantita INT not null,
     primary key (Id_ordine, Id_prodotto),
     foreign key (Id_prodotto) references PRODOTTO (Id_prodotto) ON DELETE CASCADE,
     foreign key (Id_ordine) references ORDINE (Id_ordine) ON DELETE CASCADE);
     
create table RECENSIONE (
     Id_recensione INT not null auto_increment,
     Data DATE not null,
     Voto INT not null check (Voto between 1 and 5),
     Commento TEXT not null,
     E_mail VARCHAR(100) not null,
     primary key (Id_recensione),
     foreign key (E_mail) references UTENTE (E_mail) ON UPDATE CASCADE);

create table avvisi_disponibilita (
    id_avviso INT not null AUTO_INCREMENT,
    E_mail VARCHAR(100) not null,
    Id_prodotto INT not null,
    primary key (id_avviso),
    foreign key (E_mail) references UTENTE(E_mail) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key (Id_prodotto) references PRODOTTO(Id_prodotto) ON DELETE CASCADE);


-- Constraints Section
-- ___________________ 

alter table CARRELLO add constraint CHECK_QUANTITA 
     check(Quantita >= 1);

alter table PRODOTTO add constraint CHECK_SCORTA 
     check (Scorta >= 0);

alter table UTENTE add constraint CHECK_PUNTI
     check(Punti >= 0);

                  
-- Index Section
-- _____________ 

create unique index ID_NOTIFICA_IND
     on NOTIFICA (Id_notifica);

create index FKcontrollo_IND
     on NOTIFICA (E_mail);

create unique index ID_CATEGORIA_IND
     on CATEGORIA (Nome_categoria);

create unique index ID_METODO_DI_SPEDIZIONE_IND
     on METODO_DI_SPEDIZIONE (Id_spedizione);

create unique index ID_ORDINE_IND
     on ORDINE (Id_ordine);

create index FKspedizione_IND
     on ORDINE (Id_spedizione);

create index FKeffettuazione_IND
     on ORDINE (E_mail);

create unique index ID_PRODOTTO_IND
     on PRODOTTO (Id_prodotto);

create index FKpresenta_IND
     on PRODOTTO (Nome_categoria);

create unique index ID_carrello_IND
     on carrello (E_mail, Id_prodotto);

create index FKcar_PRO_IND
     on carrello (Id_prodotto);

create unique index ID_preferito_IND
     on preferito (Id_prodotto, E_mail);

create index FKpre_UTE_IND
     on preferito (E_mail);

create unique index ID_prodotto_ordinato_IND
     on prodotto_ordinato (Id_ordine, Id_prodotto);

create index FKpro_PRO_IND
     on prodotto_ordinato (Id_prodotto);

create unique index ID_RECENSIONE_IND
     on RECENSIONE (Id_recensione);

create index FKrealizzazione_IND
     on RECENSIONE (E_mail);

create unique index ID_UTENTE_IND
     on UTENTE (E_mail);