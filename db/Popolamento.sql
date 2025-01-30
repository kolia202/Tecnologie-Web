-- Popolamento della tabella UTENTE
INSERT INTO UTENTE (E_mail, Nome, Cognome, Numero_telefono, Data_di_nascita, Password, Punti, Admin) VALUES
('giuseppe.rossi@peluche.com', 'Giuseppe', 'Rossi', '3312345678', '1992-03-10', 'passwordGiuseppe', 50, false),
('laura.verdi@peluche.com', 'Laura', 'Verdi', '3398765432', '1994-11-22', 'secureLaura123', 120, false),
('luigi.santoro@peluche.com', 'Luigi', 'Santoro', '3281234567', '1987-07-14', 'LuigiPass987', 80, false),
('martina.lombardi@peluche.com', 'Martina', 'Lombardi', '3459876543', '2000-02-01', 'MartinaPass2025', 150, false),
('carlo.bianchi@peluche.com', 'Carlo', 'Bianchi', '3476543210', '1995-09-30', 'Carlo1234', 200, true),
('elena.ferrari@peluche.com', 'Elena', 'Ferrari', '3201234567', '1988-12-12', 'ElenaSecure', 250, true),
('paolo.martini@peluche.com', 'Paolo', 'Martini', '3332345678', '1991-04-05', 'PaoloPass789', 30, false),
('giulia.russo@peluche.com', 'Giulia', 'Russo', '3287654321', '1993-06-18', 'GiuliaSecure2025', 60, false),
('federico.ricci@peluche.com', 'Federico', 'Ricci', '3312340987', '1990-05-20', 'FedericoPass987', 45, false),
('maria.giordano@peluche.com', 'Maria', 'Giordano', '3381237890', '1986-08-08', 'Maria12345', 90, true);

-- Popolamento della tabella NOTIFICA
INSERT INTO NOTIFICA (Tipo_notifica, Testo, Stato, Giorno, E_mail) VALUES
("Ordine Spedito", "Il tuo ordine è stato spedito.", 'Non letta', '2025-01-30', 'giuseppe.rossi@peluche.com'),
('Nuovo Prodotto', 'Abbiamo aggiunto un nuovo peluche alla nostra collezione! Scoprilo ora.', 'Letta', '2025-01-29', 'laura.verdi@peluche.com'),
('Ordine Consegnato', 'Il tuo ordine è stato consegnato. Grazie per aver scelto il nostro negozio!', 'Non letta', '2025-01-25', 'carlo.bianchi@peluche.com'),
('Nuova Recensione', 'La tua recensione è stata pubblicata!', 'Letta', '2025-01-24', 'elena.ferrari@peluche.com'),
('Aggiornamento Account', "La tua password è stata cambiata con successo. Se non sei stato tu, contatta l'assistenza clienti.", 'Non letta', '2025-01-23', 'paolo.martini@peluche.com');

-- Popolamento della tabella CATEGORIA
INSERT INTO CATEGORIA (Nome_categoria) VALUES
('Orsetti'),
('Animali'),
('Disney'),
('Cartoni animati'),
('Cibo'),
('Piante');

-- Popolamento della tabella METODO_DI_PAGAMENTO
INSERT INTO METODO_DI_PAGAMENTO (Descrizione) VALUES
('Carta di credito'),
('PayPal'),
('Bonifico bancario');

-- Popolamento della tabella METODO_DI_SPEDIZIONE
INSERT INTO METODO_DI_SPEDIZIONE (Nome, Descrizione, Costo) VALUES
('Standard', 'Spedizione standard con consegna entro 5-7 giorni lavorativi.', 5.99),
('Espresso', 'Spedizione veloce con consegna entro 2-3 giorni lavorativi.', 9.99),
('Premium', 'Spedizione premium con consegna entro 1 giorno lavorativo.', 14.99),
('Spedizione gratuita', 'Offerta speciale di spedizione gratuita per ordini superiori a 50€.', 0.00);

-- Popolamento della tabella PRODOTTO
INSERT INTO PRODOTTO (Nome, Descrizione, Immagine, Grandezza, Scorta, Prezzo, Prezzo_punti, Nome_categoria) VALUES
('Orsetto Teo', 'Un dolce orsetto morbido da abbracciare', '', 'M', 50, 19.99, 200, 'Orsetti'),
('Orsetto Oliver', 'Tenero orsetto con cuore ricamato sulla pancia', '', 'S', 40, 14.99, 150, 'Orsetti'),
('Orsetto Marcus', 'Orsetto in peluche con grandi occhi tondi', '', 'M', 30, 24.99, 250, 'Orsetti'),
('Orsetto Joel', 'Orsetto polare bianco in peluche morbido', '', 'L', 20, 29.99, 300, 'Orsetti'),
('Orsetto Teddy', 'Classico orsetto Teddy di peluche', '', 'M', 25, 22.99, 220, 'Orsetti'),
('Leone Narciso', 'Leone in peluche grande con criniera dorata', '', 'L', 15, 34.99, 350, 'Animali'),
('Elefante Kevin', 'Elefante morbido con grandi orecchie', '', 'XL', 10, 39.99, 400, 'Animali'),
('Zebra Oscar', 'Zebra con pelliccia a strisce bianche e nere', '', 'M', 30, 26.99, 270, 'Animali'),
('Giraffa Daisy', 'Giraffa a peluche alta e snodabile', '', 'M', 20, 28.99, 280, 'Animali'),
('Tigre Bruce', 'Tigre in peluche con strisce arancioni e nere', '', 'L', 25, 32.99, 330, 'Animali'),
('Topolino', 'Peluche del famoso Topolino Disney', '', 'S', 40, 19.99, 200, 'Disney'),
('Stitch', 'Il peluche perfetto per ogni fan di Lilo&Stitch', '', 'S', 35, 18.99, 190, 'Disney'),
('Olaf', 'Peluche di Olaf morbido e coccoloso', '', 'M', 50, 22.99, 220, 'Disney'),
('Dumbo', 'Peluche del tenero elefantino Dumbo', '', 'M', 30, 24.99, 250, 'Disney'),
('Simba', 'Peluche del Re della savana Simba', '', 'M', 45, 25.99, 270, 'Disney'),
('SpongeBob', 'Peluche di SpongeBob SquarePants', '', 'M', 40, 17.99, 180, 'Cartoni animati'),
('Pikachu', 'Peluche del famoso Pikachu di Pokémon', '', 'S', 50, 21.99, 220, 'Cartoni animati'),
('Shrek', 'Peluche di Shrek, il famoso orco verde', '', 'L', 20, 29.99, 300, 'Cartoni animati'),
('Scooby-Doo', 'Peluche di Scooby-Doo, il famoso cane detective', '', 'M', 30, 23.99, 240, 'Cartoni animati'),
('Tom', 'Peluche del gatto di Tom&Jerry', '', 'M', 35, 25.99, 260, 'Cartoni animati'),
('Hamburger Peluche', 'Peluche a forma di hamburger', '', 'S', 40, 12.99, 130, 'Cibo'),
('Pizza Peluche', 'Peluche a forma di pizza', '', 'M', 50, 14.99, 150, 'Cibo'),
('Avocado Peluche', 'Peluche a forma di avocado', '', 'S', 60, 9.99, 100, 'Cibo'),
('Gelato Peluche', 'Peluche a forma di cono gelato', '', 'M', 30, 16.99, 170, 'Cibo'),
('Donut Peluche', 'Peluche a forma di ciambella', '', 'S', 45, 11.99, 120, 'Cibo'),
('Cactus Peluche', 'Cactus in peluche verde', '', 'S', 35, 19.99, 200, 'Piante'),
('Fiore Peluche', 'Fiore colorato in peluche', '', 'M', 40, 22.99, 230, 'Piante'),
('Pianta Grassa Peluche', 'Peluche a forma di pianta grassa', '', 'M', 30, 25.99, 250, 'Piante'),
('Albero Peluche', 'Peluche a forma di albero verde', '', 'L', 15, 29.99, 300, 'Piante'),
('Bonsai Peluche', 'Peluche a forma di bonsai', '', 'S', 20, 24.99, 240, 'Piante');


-- Popolamento della tabella carrello
INSERT INTO carrello (E_mail, Id_prodotto, Quantita) VALUES
('giuseppe.rossi@peluche.com', 1, 2),
('giuseppe.rossi@peluche.com', 6, 1),
('federico.ricci@peluche.com', 3, 2),
('federico.ricci@peluche.com', 8, 1),
('elena.ferrari@peluche.com', 5, 1),
('laura.verdi@peluche.com', 4, 1),
('laura.verdi@peluche.com', 13, 3),
('laura.verdi@peluche.com', 17, 2);

-- Popolamento della tabella preferito
INSERT INTO preferito (Id_prodotto, E_mail) VALUES
(1, 'carlo.bianchi@peluche.com'),
(6, 'carlo.bianchi@peluche.com'),
(11, 'luigi.santoro@peluche.com'),
(21, 'martina.lombardi@peluche.com'),
(26, 'martina.lombardi@peluche.com'),
(5, 'paolo.martini@peluche.com');

-- Popolamento della tabella ORDINE
INSERT INTO ORDINE (Data_effettuazione, Prezzo_finale, Stato, Id_spedizione, Id_pagamento, E_mail) VALUES
('2025-01-25', 54.98, 'Spedito', 1, 2, 'martina.lombardi@peluche.com'),
('2025-01-26', 32.98, 'In lavorazione', 2, 1, 'luigi.santoro@peluche.com'),
('2025-01-24', 51.98, 'Consegnato', 1, 3, 'carlo.bianchi@peluche.com'),
('2024-10-27', 48.98, 'Consegnato', 3, 2, 'carlo.bianchi@peluche.com'),
('2025-01-25', 51.98, 'Spedito', 2, 1, 'federico.ricci@peluche.com');


-- Popolamento della tabella prodotto_ordinato
INSERT INTO prodotto_ordinato (Id_ordine, Id_prodotto, Quantita) VALUES
(1, 1, 1),
(1, 6, 1),
(2, 21, 1),
(2, 26, 1),
(3, 3, 1),
(3, 8, 1),
(4, 14, 1),
(4, 19, 1),
(5, 5, 1),
(5, 9, 1);

-- Popolamento della tabella RECENSIONE
INSERT INTO RECENSIONE (Data, Voto, Commento, E_mail) VALUES
('2025-01-28', 5, 'Il sito è facile da usare e il processo di acquisto è stato veloce e senza intoppi.', 'carlo.bianchi@peluche.com'),
('2025-01-29', 4, 'Il sito è bello, ma ci vorrebbe una sezione più dettagliata per le recensioni dei prodotti.', 'martina.lombardi@peluche.com'),
('2025-01-25', 5, 'Adoro il design del sito, molto intuitivo!', 'elena.ferrari@peluche.com'),
('2025-01-26', 3, 'Penso che il sito potrebbe essere più veloce a caricare le pagine dei prodotti.', 'luigi.santoro@peluche.com'),
('2025-01-27', 5, 'Un sito davvero ben fatto, molto professionale e semplice da navigare.', 'federico.ricci@peluche.com'),
('2025-01-28', 2, "Il sito è un po' confuso in alcune sezioni, come il checkout.", 'laura.verdi@peluche.com');