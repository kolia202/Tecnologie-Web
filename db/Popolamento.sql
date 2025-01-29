-- Popolamento della tabella UTENTE
INSERT INTO UTENTE (E_mail, Nome, Cognome, Numero_telefono, Data_di_nascita, Password, Punti, Admin) VALUES
('alice@example.com', 'Alice', 'Rossi', '1234567890', '1995-06-15', 'password123', 100, false),
('bob@example.com', 'Bob', 'Bianchi', '0987654321', '1992-04-20', 'securepass', 200, true),
('charlie@example.com', 'Charlie', 'Verdi', '1122334455', '1998-09-10', 'charliepass', 150, false),
('diana@example.com', 'Diana', 'Neri', '5566778899', '2000-12-05', 'dianapass', 80, false);

-- Popolamento della tabella NOTIFICA
INSERT INTO NOTIFICA (Id_notifica, Tipo_notifica, Testo, Stato, Giorno, E_mail) VALUES
(1, 'Ordine', 'Il tuo ordine #1 è stato spedito.', 'Non letta', '2025-01-28', 'alice@example.com'),
(2, 'Promozione', '20% di sconto sul tuo prossimo acquisto!', 'Letta', '2025-01-27', 'bob@example.com'),
(3, 'Messaggio', 'Nuovo messaggio dal supporto clienti.', 'Non letta', '2025-01-26', 'charlie@example.com'),
(4, 'Offerta', 'Acquista 2 peluche e ricevi il 3° in omaggio!', 'Non letta', '2025-01-25', 'diana@example.com');

-- Popolamento della tabella CATEGORIA
INSERT INTO CATEGORIA (Nome_categoria) VALUES
('Orsetti'),
('Unicorni'),
('Gatti'),
('Cani'),
('Panda');

-- Popolamento della tabella METODO_DI_PAGAMENTO
INSERT INTO METODO_DI_PAGAMENTO (Id_pagamento, Descrizione) VALUES
(1, 'Carta di credito'),
(2, 'PayPal'),
(3, 'Bonifico bancario'),
(4, 'Contrassegno');

-- Popolamento della tabella METODO_DI_SPEDIZIONE
INSERT INTO METODO_DI_SPEDIZIONE (Id_spedizione, Nome, Descrizione, Costo) VALUES
(1, 'Standard', 'Spedizione entro 5-7 giorni', 5.99),
(2, 'Express', 'Spedizione entro 2-3 giorni', 9.99),
(3, 'Premium', 'Spedizione il giorno successivo', 14.99);

-- Popolamento della tabella PRODOTTO
INSERT INTO PRODOTTO (Id_prodotto, Nome, Nome_peluche, Descrizione, Immagine, Grandezza, Scorta, Prezzo, Prezzo_punti, Nome_categoria) VALUES
(1, 'Orsetto Teddy', 'Teddy', 'Un orsetto morbido e coccoloso', 'teddy.jpg', 'Medio', 50, 19.99, 500, 'Orsetti'),
(2, 'Unicorno Magico', 'Uny', 'Unicorno soffice e colorato', 'unicorn.jpg', 'Grande', 30, 25.99, 700, 'Unicorni'),
(3, 'Gatto Fluffy', 'Fluffy', 'Gatto soffice e adorabile', 'fluffy.jpg', 'Piccolo', 40, 15.99, 400, 'Gatti'),
(4, 'Cagnolino Soft', 'Bobby', 'Cane di peluche super soffice', 'bobby.jpg', 'Medio', 35, 22.99, 600, 'Cani');

-- Popolamento della tabella carrello
INSERT INTO carrello (Id_prodotto, E_mail, Quantita) VALUES
(1, 'alice@example.com', 2),
(2, 'bob@example.com', 1),
(3, 'charlie@example.com', 3),
(4, 'diana@example.com', 1);

-- Popolamento della tabella preferito
INSERT INTO preferito (Id_prodotto, E_mail) VALUES
(1, 'alice@example.com'),
(2, 'bob@example.com'),
(3, 'charlie@example.com'),
(4, 'diana@example.com');

-- Popolamento della tabella ORDINE
INSERT INTO ORDINE (Id_ordine, Data_effettuazione, Prezzo_finale, Stato, Id_spedizione, Id_pagamento, E_mail) VALUES
(1, '2025-01-25', 45.98, 'Spedito', 1, 1, 'alice@example.com'),
(2, '2025-01-26', 25.99, 'In lavorazione', 2, 2, 'bob@example.com'),
(3, '2025-01-27', 37.99, 'Consegnato', 3, 3, 'charlie@example.com'),
(4, '2025-01-28', 22.99, 'Spedito', 1, 4, 'diana@example.com');

-- Popolamento della tabella prodotto_ordinato
INSERT INTO prodotto_ordinato (Id_ordine, Id_prodotto, Quantita) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 2),
(4, 4, 1);

-- Popolamento della tabella RECENSIONE
INSERT INTO RECENSIONE (Id_recensione, Data, Voto, Commento, E_mail) VALUES
(1, '2025-01-27', 5, 'Ottimo peluche, molto morbido!', 'alice@example.com'),
(2, '2025-01-28', 4, 'Unicorno bellissimo, ma un po caro', 'bob@example.com'),
(3, '2025-01-29', 5, 'Adoro il mio nuovo gatto di peluche!', 'charlie@example.com'),
(4, '2025-01-30', 3, 'Molto carino, ma pensavo fosse più grande.', 'diana@example.com');
