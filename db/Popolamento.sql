-- Inserimento dati nella tabella UTENTE
INSERT INTO UTENTE (E_mail, Nome, Cognome, Nome_utente, Numero_telefono, Data_di_nascita, Password, Punti) VALUES
('mario.rossi@example.com', 'Mario', 'Rossi', 'marior', '1234567890', '1985-03-22', 'password123', 150),
('anna.verdi@example.com', 'Anna', 'Verdi', 'annav', '0987654321', '1990-07-15', 'securepass', 200),
('lucia.bianchi@example.com', 'Lucia', 'Bianchi', 'lucyb', '3456789012', '1995-01-10', 'mypassword', 300);

-- Inserimento dati nella tabella METODO_DI_PAGAMENTO
INSERT INTO METODO_DI_PAGAMENTO (Id_pagamento, Descrizione) VALUES
('PAY01', 'Carta di Credito'),
('PAY02', 'PayPal'),
('PAY03', 'Bonifico Bancario');

-- Inserimento dati nella tabella METODO_DI_SPEDIZIONE
INSERT INTO METODO_DI_SPEDIZIONE (Id_spedizione, Nome, Descrizione, Costo) VALUES
('SHIP01', 'Spedizione Standard', 'Consegna in 3-5 giorni lavorativi', 5.99),
('SHIP02', 'Spedizione Espressa', 'Consegna in 1-2 giorni lavorativi', 9.99),
('SHIP03', 'Ritiro in negozio', 'Ritiro gratuito presso il nostro store', 0.00);

-- Inserimento dati nella tabella INDIRIZZO_DI_FATTURAZIONE
INSERT INTO INDIRIZZO_DI_FATTURAZIONE (Id_fattura, Data_emissione, Importo_totale, Via, Civico, Cap, Citta) VALUES
('FAT01', '2025-01-20', 49.98, 'Via Roma', '10', '00100', 'Roma'),
('FAT02', '2025-01-21', 25.99, 'Via Milano', '20', '20100', 'Milano'),
('FAT03', '2025-01-21', 15.99, 'Via Napoli', '15', '80100', 'Napoli');

-- Inserimento dati nella tabella PRODOTTO
INSERT INTO PRODOTTO (Id_prodotto, Nome, Immagine, Grandezza, Scorta, Prezzo, Categoria) VALUES
('PEL01', 'Orso Bruno', 'orso_b.jpg', 'Grande', 50, 24.99, 'Animali della Foresta'),
('PEL02', 'Coniglio Bianco', 'coniglio_b.jpg', 'Medio', 30, 15.99, 'Animali della Fattoria'),
('PEL03', 'Elefante Grigio', 'elefante_g.jpg', 'Grande', 20, 29.99, 'Animali della Savana');

-- Inserimento dati nella tabella ORDINE
INSERT INTO ORDINE (Id_ordine, Data_effettuazione, Prezzo_finale, Stato, Id_spedizione, Id_pagamento, Id_fattura, E_mail) VALUES
('ORD01', '2025-01-20', 49.98, 'Spedito', 'SHIP01', 'PAY01', 'FAT01', 'mario.rossi@example.com'),
('ORD02', '2025-01-21', 25.99, 'In elaborazione', 'SHIP02', 'PAY02', 'FAT02', 'anna.verdi@example.com'),
('ORD03', '2025-01-21', 15.99, 'Spedito', 'SHIP03', 'PAY03', 'FAT03', 'lucia.bianchi@example.com');

-- Inserimento dati nella tabella PRODOTTO_ORDINATO
INSERT INTO PRODOTTO_ORDINATO (Id_prodotto_ordinato, Id_prodotto) VALUES
('PO01', 'PEL01'),
('PO02', 'PEL02'),
('PO03', 'PEL03');

-- Inserimento dati nella tabella DETTAGLIO_ACQUISTO
INSERT INTO DETTAGLIO_ACQUISTO (Id_ordine, Id_prodotto_ordinato, Quantita, Prezzo_unitario, Prezzo_totale) VALUES
('ORD01', 'PO01', 2, 24.99, 49.98),
('ORD02', 'PO02', 1, 15.99, 25.99),
('ORD03', 'PO03', 1, 15.99, 15.99);

-- Inserimento dati nella tabella AGGIORNAMENTO
INSERT INTO AGGIORNAMENTO (Id_stato, Tipo_aggiornamento, Testo, Giorno, Ora, Id_ordine) VALUES
('UPD01', 'Spedizione', 'Ordine consegnato', '2025-01-22', '14:30:00', 'ORD01'),
('UPD02', 'Pagamento', 'Pagamento completato', '2025-01-21', '10:15:00', 'ORD02'),
('UPD03', 'Ritiro', 'Ordine pronto per il ritiro', '2025-01-21', '09:00:00', 'ORD03');

-- Inserimento dati nella tabella RECENSIONE
INSERT INTO RECENSIONE (Id_recensione, Data, Voto, Commento) VALUES
('REC01', '2025-01-22', 5, 'Peluches fantastici!'),
('REC02', '2025-01-21', 4, 'Ottima qualità, ma spedizione lenta.'),
('REC03', '2025-01-21', 5, 'Morbidoso e adorabile!');

-- Inserimento dati nella tabella REALIZZAZIONE
INSERT INTO REALIZZAZIONE (Id_recensione, E_mail) VALUES
('REC01', 'mario.rossi@example.com'),
('REC02', 'anna.verdi@example.com'),
('REC03', 'lucia.bianchi@example.com');

-- Inserimento dati nella tabella INTERAGISCE
INSERT INTO INTERAGISCE (Id_prodotto, E_mail, Tipo_interazione) VALUES
('PEL01', 'mario.rossi@example.com', 'Visualizzato'),
('PEL02', 'anna.verdi@example.com', 'Aggiunto al carrello'),
('PEL03', 'lucia.bianchi@example.com', 'Acquistato');
