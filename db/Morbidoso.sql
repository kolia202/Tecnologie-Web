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
     E_mail char(1) not null,
     Nome char(1) not null,
     Cognome char(1) not null,
     Numero_telefono char(1) not null,
     Data_di_nascita char(1),
     Password char(1) not null,
     Punti char(1) not null,
     Admin char not null,
     primary key (E_mail));
     
create table NOTIFICA (
     Id_notifica char(1) not null,
     Tipo_notifica char(1) not null,
     Testo char(1) not null,
     stato char(1) not null,
     Giorno char(1) not null,
     E_mail char(1) not null,
     primary key (Id_notifica),
     foreign key (E_mail) references UTENTE(E_mail));

create table CATEGORIA (
     Nome_categoria char(1) not null,
     primary key (Nome_categoria));

create table METODO_DI_PAGAMENTO (
     Id_pagamento char(1) not null,
     Descrizione char(1) not null,
     primary key (Id_pagamento));

create table METODO_DI_SPEDIZIONE (
     Id_spedizione char(1) not null,
     Nome char(1) not null,
     Descrizione char(1) not null,
     Costo char(1),
     primary key (Id_spedizione));

create table ORDINE (
     Id_ordine char(1) not null,
     Data_effettuazione char(1) not null,
     Prezzo_finale char(1) not null,
     Stato char(1) not null,
     Id_spedizione char(1) not null,
     Id_pagamento char(1) not null,
     E_mail char(1) not null,
     primary key (Id_ordine),
     foreign key (Id_spedizione) references METODO_DI_SPEDIZIONE (Id_spedizione),
     foreign key (E_mail) references UTENTE (E_mail),
     foreign key (Id_pagamento) references METODO_DI_PAGAMENTO (Id_pagamento));
    
create table PRODOTTO (
     Id_prodotto char(1) not null,
     Nome char(1) not null,
     Immagine char(1) not null,
     Grandezza char(1) not null,
     Scorta char(1) not null,
     Prezzo char(1) not null,
     Prezzo_punti char(1) not null,
     Nome_categoria char(1) not null,
     primary key (Id_prodotto),
     foreign key (Nome_categoria) references CATEGORIA (Nome_categoria));

create table carrello (
     Id_prodotto char(1) not null,
     E_mail char(1) not null,
     Quantita char(1) not null,
     primary key (E_mail, Id_prodotto),
     foreign key (E_mail) references UTENTE (E_mail),
     foreign key (Id_prodotto) references PRODOTTO (Id_prodotto));

create table preferito (
     Id_prodotto char(1) not null,
     E_mail char(1) not null,
     primary key (Id_prodotto, E_mail),
     foreign key (E_mail) references UTENTE (E_mail),
     foreign key (Id_prodotto) references PRODOTTO (Id_prodotto));

create table prodotto_ordinato (
     Id_ordine char(1) not null,
     Id_prodotto char(1) not null,
     Quantita char(1) not null,
     primary key (Id_ordine, Id_prodotto),
     foreign key (Id_prodotto) references PRODOTTO (Id_prodotto),
     foreign key (Id_ordine) references ORDINE (Id_ordine));
     
create table RECENSIONE (
     Id__recensione char(1) not null,
     data char(1) not null,
     Voto char(1) not null,
     Commento char(1) not null,
     E_mail char(1) not null,
     primary key (Id__recensione),
     foreign key (E_mail) references UTENTE (E_mail));

-- Constraints Section
-- ___________________ 

/*alter table ORDINE add constraint ID_ORDINE_CHK
     check(exists(select * from prodotto_ordinato
                  where prodotto_ordinato.Id_ordine = Id_ordine));*/
                  
-- Index Section
-- _____________ 

create unique index ID_NOTIFICA_IND
     on NOTIFICA (Id_notifica);

create index FKcontrollo_IND
     on NOTIFICA (E_mail);

create unique index ID_CATEGORIA_IND
     on CATEGORIA (Nome_categoria);

create unique index ID_METODO_DI_PAGAMENTO_IND
     on METODO_DI_PAGAMENTO (Id_pagamento);

create unique index ID_METODO_DI_SPEDIZIONE_IND
     on METODO_DI_SPEDIZIONE (Id_spedizione);

create unique index ID_ORDINE_IND
     on ORDINE (Id_ordine);

create index FKspedizione_IND
     on ORDINE (Id_spedizione);

create index FKpagamento_IND
     on ORDINE (Id_pagamento);

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
     on RECENSIONE (Id__recensione);

create index FKrealizzazione_IND
     on RECENSIONE (E_mail);

create unique index ID_UTENTE_IND
     on UTENTE (E_mail);