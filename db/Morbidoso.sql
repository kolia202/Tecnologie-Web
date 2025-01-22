-- *********************************************
-- * Standard SQL generation                   
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Wed Jan 22 12:06:14 2025 
-- ********************************************* 

-- Database Section
-- ________________ 

CREATE DATABASE Morbidoso;
USE Morbidoso;

-- Tables Section
-- _____________ 

CREATE TABLE UTENTE (
     E_mail CHAR(255) NOT NULL,
     Nome CHAR(50) NOT NULL,
     Cognome CHAR(50) NOT NULL,
     Nome_utente CHAR(50) NOT NULL,
     Numero_telefono CHAR(15) NOT NULL,
     Data_di_nascita DATE,
     Password CHAR(100) NOT NULL,
     Punti INT NOT NULL,
     PRIMARY KEY (E_mail)
);

CREATE TABLE METODO_DI_PAGAMENTO (
     Id_pagamento CHAR(50) NOT NULL,
     Descrizione CHAR(255) NOT NULL,
     PRIMARY KEY (Id_pagamento)
);

CREATE TABLE METODO_DI_SPEDIZIONE (
     Id_spedizione CHAR(50) NOT NULL,
     Nome CHAR(255) NOT NULL,
     Descrizione CHAR(255) NOT NULL,
     Costo DECIMAL(10,2),
     PRIMARY KEY (Id_spedizione)
);

CREATE TABLE INDIRIZZO_DI_FATTURAZIONE (
     Id_fattura CHAR(50) NOT NULL,
     Data_emissione DATE NOT NULL,
     Importo_totale DECIMAL(10,2) NOT NULL,
     Via CHAR(255) NOT NULL,
     Civico CHAR(10) NOT NULL,
     Cap CHAR(10) NOT NULL,
     Citta CHAR(50) NOT NULL,
     PRIMARY KEY (Id_fattura)
);

CREATE TABLE ORDINE (
     Id_ordine CHAR(50) NOT NULL,
     Data_effettuazione DATE NOT NULL,
     Prezzo_finale DECIMAL(10,2) NOT NULL,
     Stato CHAR(20) NOT NULL,
     Id_spedizione CHAR(50) NOT NULL,
     Id_pagamento CHAR(50) NOT NULL,
     Id_fattura CHAR(50) NOT NULL,
     E_mail CHAR(255) NOT NULL,
     PRIMARY KEY (Id_ordine),
     FOREIGN KEY (Id_spedizione) REFERENCES METODO_DI_SPEDIZIONE(Id_spedizione),
     FOREIGN KEY (Id_pagamento) REFERENCES METODO_DI_PAGAMENTO(Id_pagamento),
     FOREIGN KEY (Id_fattura) REFERENCES INDIRIZZO_DI_FATTURAZIONE(Id_fattura),
     FOREIGN KEY (E_mail) REFERENCES UTENTE(E_mail)
);

CREATE TABLE PRODOTTO (
     Id_prodotto CHAR(50) NOT NULL,
     Nome CHAR(255) NOT NULL,
     Immagine CHAR(255) NOT NULL,
     Grandezza CHAR(20) NOT NULL,
     Scorta INT NOT NULL,
     Prezzo DECIMAL(10,2) NOT NULL,
     Categoria CHAR(50) NOT NULL,
     PRIMARY KEY (Id_prodotto)
);

CREATE TABLE PRODOTTO_ORDINATO (
     Id_prodotto_ordinato CHAR(50) NOT NULL,
     Id_prodotto CHAR(50) NOT NULL,
     PRIMARY KEY (Id_prodotto_ordinato),
     FOREIGN KEY (Id_prodotto) REFERENCES PRODOTTO(Id_prodotto)
);

CREATE TABLE DETTAGLIO_ACQUISTO (
     Id_ordine CHAR(50) NOT NULL,
     Id_prodotto_ordinato CHAR(50) NOT NULL,
     Quantita INT NOT NULL,
     Prezzo_unitario DECIMAL(10,2) NOT NULL,
     Prezzo_totale DECIMAL(10,2) NOT NULL,
     PRIMARY KEY (Id_prodotto_ordinato, Id_ordine),
     FOREIGN KEY (Id_prodotto_ordinato) REFERENCES PRODOTTO_ORDINATO(Id_prodotto_ordinato),
     FOREIGN KEY (Id_ordine) REFERENCES ORDINE(Id_ordine)
);

CREATE TABLE AGGIORNAMENTO (
     Id_stato CHAR(50) NOT NULL,
     Tipo_aggiornamento CHAR(255) NOT NULL,
     Testo CHAR(255) NOT NULL,
     Giorno DATE NOT NULL,
     Ora TIME NOT NULL,
     Id_ordine CHAR(50) NOT NULL,
     PRIMARY KEY (Id_stato),
     FOREIGN KEY (Id_ordine) REFERENCES ORDINE(Id_ordine)
);

CREATE TABLE RECENSIONE (
     Id_recensione CHAR(50) NOT NULL,
     Data DATE NOT NULL,
     Voto INT NOT NULL CHECK (Voto BETWEEN 1 AND 5),
     Commento CHAR(255) NOT NULL,
     PRIMARY KEY (Id_recensione)
);

CREATE TABLE REALIZZAZIONE (
     Id_recensione CHAR(50) NOT NULL,
     E_mail CHAR(255) NOT NULL,
     PRIMARY KEY (E_mail, Id_recensione),
     FOREIGN KEY (Id_recensione) REFERENCES RECENSIONE(Id_recensione),
     FOREIGN KEY (E_mail) REFERENCES UTENTE(E_mail)
);

CREATE TABLE INTERAGISCE (
     Id_prodotto CHAR(50) NOT NULL,
     E_mail CHAR(255) NOT NULL,
     Tipo_interazione CHAR(50) NOT NULL,
     PRIMARY KEY (Id_prodotto, E_mail),
     FOREIGN KEY (Id_prodotto) REFERENCES PRODOTTO(Id_prodotto),
     FOREIGN KEY (E_mail) REFERENCES UTENTE(E_mail)
);

-- Indices Section
-- _____________ 
CREATE UNIQUE INDEX IDX_UTENTE_EMAIL ON UTENTE (E_mail);
CREATE UNIQUE INDEX IDX_METODO_PAGAMENTO_ID ON METODO_DI_PAGAMENTO (Id_pagamento);
CREATE UNIQUE INDEX IDX_METODO_SPEDIZIONE_ID ON METODO_DI_SPEDIZIONE (Id_spedizione);
CREATE UNIQUE INDEX IDX_INDIRIZZO_FATTURA_ID ON INDIRIZZO_DI_FATTURAZIONE (Id_fattura);
CREATE UNIQUE INDEX IDX_ORDINE_ID ON ORDINE (Id_ordine);
CREATE UNIQUE INDEX IDX_PRODOTTO_ID ON PRODOTTO (Id_prodotto);
CREATE UNIQUE INDEX IDX_PRODOTTO_ORDINATO_ID ON PRODOTTO_ORDINATO (Id_prodotto_ordinato);
CREATE UNIQUE INDEX IDX_RECENSIONE_ID ON RECENSIONE (Id_recensione); 