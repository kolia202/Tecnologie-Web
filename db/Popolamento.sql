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
("Ordine Spedito", "Il tuo ordine è stato spedito.", 0, '2025-01-30', 'giuseppe.rossi@peluche.com'),
('Nuovo Prodotto', 'Abbiamo aggiunto un nuovo peluche alla nostra collezione! Scoprilo ora.', 1, '2025-01-29', 'laura.verdi@peluche.com'),
('Ordine Consegnato', 'Il tuo ordine è stato consegnato. Grazie per aver scelto il nostro negozio!', 0, '2025-01-25', 'carlo.bianchi@peluche.com'),
('Nuova Recensione', 'La tua recensione è stata pubblicata!', 1, '2025-01-24', 'elena.ferrari@peluche.com'),
('Aggiornamento Account', "La tua password è stata cambiata con successo. Se non sei stato tu, contatta l'assistenza clienti.", 0, '2025-01-23', 'paolo.martini@peluche.com');

-- Popolamento della tabella CATEGORIA
INSERT INTO CATEGORIA (Nome_categoria) VALUES
('Orsetti'),
('Animali'),
('Disney'),
('Cartoni animati'),
('Cibo'),
('Piante');

-- Popolamento della tabella METODO_DI_PAGAMENTO
INSERT INTO METODO_DI_PAGAMENTO (Descrizione, visibile) VALUES
('Carta di credito', 1),
('PayPal', 1),
('Bonifico bancario', 1),
('Gratis', 0);

-- Popolamento della tabella METODO_DI_SPEDIZIONE
INSERT INTO METODO_DI_SPEDIZIONE (Nome, Descrizione, Costo) VALUES
('Standard', 'Spedizione standard con consegna entro 5-7 giorni lavorativi.', 5.99),
('Espresso', 'Spedizione veloce con consegna entro 2-3 giorni lavorativi.', 9.99),
('Premium', 'Spedizione premium con consegna entro 1 giorno lavorativo.', 14.99);

-- Popolamento della tabella PRODOTTO
INSERT INTO PRODOTTO (Nome, Descrizione, Immagine, Grandezza, Scorta, Prezzo, Prezzo_punti, Nome_categoria) VALUES
('Orsetto Teo', "Teo è un orsetto vivace e curioso, con morbido pelo color nocciola e occhietti brillanti pieni di dolcezza. Adora le coccole e le avventure, ciò lo rende il perfetto compagno di giochi.", 'OrsettoTeo.png', 'S', 50, 34.99, 350, 'Orsetti'),
('Orsetto Oliver', "Oliver è un orsetto elegante e dolce, con un soffice pelo marrone. Sempre gentile e premuroso, ama le coccole e ascoltare storie prima di andare a dormire. Con il suo sguardo tenero e il cuore grande, Oliver è il perfetto amico per momenti di comfort e affetto.", 'OrsettoOliver.png', 'S', 40, 34.99, 350, 'Orsetti'),
('Orsetto Marcus', "Marcus è un orsetto forte e protettivo, con un morbido pelo color cioccolato e un'espressione dolce ma sicura. Sempre pronto a vegliare sui suoi amici, ama le avventure ma anche i lunghi abbracci. Marcus è sicuramente il compagno perfetto per sentirsi al sicuro e coccolati.", 'OrsettoMarcus.png', 'M', 30, 59.99, 600, 'Orsetti'),
('Orsetto Joel', "Joel è un tenero orsetto polare, con un morbido manto bianco come la neve e occhietti scintillanti pieni di dolcezza. Ama rannicchiarsi al caldo nelle fredde notti invernali e regalare abbracci soffici come fiocchi di neve. Con il suo musetto delicato e il cuore gentile, Joel è il compagno perfetto per coccole senza fine.", 'OrsettoJoel.png', 'M', 20, 59.99, 600, 'Orsetti'),
('Orsetta Puppy', "Puppy è un'orsetta dolce e giocosa, con un soffice pelo rosa e un nasino che la rende irresistibile. Sempre allegra e affettuosa, adora le coccole e le avventure spensierate. Con il suo cuore tenero, Puppy è la compagna perfetta per momenti di gioia e tenerezza.", 'OrsettaPuppy.png', 'S', 25, 19.99, 200, 'Orsetti'),
('Orsetto Teddy', "Teddy è un orsetto dal cuore grande e dal pelo morbido color marrone scuro. Con il suo sguardo affettuoso, è il compagno ideale per chi cerca conforto e compagnia. Sempre pronto a regalare abbracci, Teddy è l'amico perfetto per ogni momento speciale.", 'OrsettoTeddy.png', 'S', 10, 22.99, 230, 'Orsetti'),
('Orsetto Charlie', "Charlie è un orsetto tenero e affettuoso, con un pelo morbido color cioccolato che lo rende irresistibile al tatto. Ha occhi brillanti e un sorriso rassicurante ed è sempre pronto a portare conforto e calore a chi lo abbraccia. Charlie è l'amico perfetto per ogni momento di coccole e gioia.", 'OrsettoCharlie.png', 'S', 15, 17.99, 180, 'Orsetti'),
('Orsetto Fluffy', "Fluffy è un orsetto soffice e coccoloso, con un pelo morbidissimo marrone chiaro e un musetto dolce che ispira tenerezza. Sempre pronto a farsi stringere in abbracci avvolgenti, ama le coccole e i sonnellini tranquilli. Con il suo aspetto adorabile e il cuore gentile, Fluffy è il compagno perfetto per momenti di dolcezza infinita.", 'OrsettoFluffy.png', 'S', 40, 29.99, 300, 'Orsetti'),
('Orsetto Max', "Max è un orsetto vivace e affettuoso, con il pelo morbido e un'espressione curiosa e simpatica. Sempre pronto all'avventura, ama giocare ma anche regalare abbracci rassicuranti. Con il suo sorriso dolce, Max è il perfetto compagno di giochi e coccole.", 'OrsettoMax.png', 'S', 30, 9.99, 100, 'Orsetti'),
('Orsetto Ettore', "Ettore è un orsetto dolce e protettivo, con un morbido pelo color crema e occhi profondi pieni di gentilezza. Calmo e rassicurante, ama stare accanto ai suoi amici e offrire abbracci soffici. Con il suo aspetto affettuoso e il cuore grande, Ettore è il compagno ideale per momenti di coccole e serenità.", 'OrsettoEttore.png', 'S', 5, 17.99, 180, 'Orsetti');

INSERT INTO PRODOTTO (Nome, Descrizione, Immagine, Grandezza, Scorta, Prezzo, Prezzo_punti, Nome_categoria) VALUES
('Yorkshire Ruby', "Ruby è una dolce yorkshire dal pelo setoso e dorato, con occhietti vivaci pieni di curiosità. Energica e affettuosa, adora giocare e stare in braccio per farsi coccolare. Con il suo musetto irresistibile e il carattere vivace, Ruby è la compagna perfetta per riempire le giornate di amore e allegria.", 'YorkshireRuby.png', "M", 10, 59.99, 600, 'Animali'),
('Bassotto Leo', "Leo è un bassotto vivace e affettuoso, con il pelo scuro e occhi curiosi pieni di energia. Adora esplorare, giocare e farsi coccolare dopo una lunga giornata di avventure. Con il suo musetto furbo e il cuore leale, Leo è l'amico perfetto per chi cerca amore e divertimento", "BassottoLeo.png", "S", 20, 34.99, 350, 'Animali'),
('Cavalier King Marley', "Marley è una dolce Cavalier King dal pelo setoso color caramello e bianco, con occhietti grandi e pieni di affetto. Giocosa e affettuosa, ama stare in compagnia e regalare coccole senza fine. Con il suo carattere dolce e il cuore leale, Marley è la compagno perfetta per momenti di gioia e tenerezza.", 'CavalierKingMarley.png', 'S', 40, 34.99, 350, 'Animali'),
('Barboncino Cookie', "Cookie è un dolce barboncino dal morbido pelo riccio color nocciola, sempre pronto a giocare e a farsi coccolare. Vivace e affettuoso, ama stare in compagnia e riempire le giornate di allegria. Con il suo musetto adorabile e il cuore pieno di dolcezza, Cookie è il compagno perfetto per amore e divertimento senza fine.", 'BarboncinoCookie.png', 'S', 15, 34.99, 350, 'Animali'),
('Border Collie Scott', "Scott è un intelligente e vivace Border Collie, con un pelo soffice bianco e nero e occhi attenti pieni di energia. Sempre pronto all'azione, ama correre, giocare e imparare cose nuove. Con il suo cuore leale e il suo spirito instancabile, Scott è il compagno perfetto per avventure e momenti di affetto.", 'BorderCollieScott.png', 'M', 5, 59.99, 600, 'Animali'),
('Husky Atlas', "Atlas è un maestoso husky dal pelo folto bianco e grigio, con occhi azzurri profondi e pieni di avventura. Forte e leale, ama correre nella neve e guidare il suo branco con coraggio. Con il suo spirito indomito e il cuore affettuoso, Atlas è l'amico perfetto per chi cerca energia e fedeltà.", 'HuskyAtlas.png', 'L', 20, 79.99, 800, 'Animali'),
('Akita Koda', "Koda è un fiero e leale Akita, con un soffice pelo bianco e dorato e uno sguardo profondo pieno di saggezza. Forte ma affettuoso, protegge chi ama con tutto il cuore. Con il suo spirito nobile e il carattere dolce, Koda è il compagno perfetto per avventure e momenti di coccole.", 'AkitaKoda.png', 'M', 30, 59.99, 600, 'Animali'),
('Labrador Liam', "Liam è un dolce e gioioso Labrador, con un pelo lucido color crema e occhi pieni di affetto. Sempre pronto a giocare e a farsi coccolare, è un amico leale e spensierato. Con il suo spirito allegro e il cuore grande, Liam è il compagno perfetto per chi cerca amore incondizionato e divertimento senza fine.", 'LabradorLiam.png', 'S', 3, 34.99, 350, 'Animali'),
('Labrador Toby', "Toby è un Labrador affettuoso e vivace, con un pelo dorato e occhi pieni di allegria. Sempre pronto a giocare e a dare affetto, è un compagno leale che ama stare in compagnia. Con il suo spirito gioioso e il cuore grande, Toby è l'amico perfetto per ogni avventura e coccola.", 'LabradorToby.png', 'S', 7, 9.99, 100, 'Animali'),
('Husky Snow', "Snow è un husky elegante e vivace, con un pelo bianco candido e occhi brillanti. Amante della neve e delle avventure all'aria aperta, è un cane energico e leale. Con il suo carattere forte ma affettuoso, Snow è il compagno perfetto per chi cerca un amico pieno di vita e di coraggio.", 'HuskySnow.png', 'S', 12, 19.99, 200, 'Animali'),
('Gattino Brad', "Brad è un gattino dolce e curioso, con un pelo morbido e un mix di macchie marroni e dorate che lo rendono unico. Sempre pronto a esplorare e giocare, ha occhi vivaci pieni di avventura. Con il suo carattere affettuoso e il suo musetto irresistibile, Brad è il compagno perfetto per momenti di coccole e divertimento.", 'GattinoBrad.png', 'S', 18, 34.99, 350, 'Animali'),
('Gattina Coco', "Coco è una gattina dolcissima con un pelo morbido e setoso, color crema e un fiocco giallo che le dà un tocco di eleganza. Curiosa e affettuosa, ama giocare e farsi coccolare. Con i suoi occhi brillanti e il musetto tenero, Coco è la compagna perfetta per chi cerca un amico adorabile e pieno di dolcezza.", 'GattinaCoco.png', 'S', 3, 34.99, 350, 'Animali'),
('Gattina Giada', "Giada è una gattina elegante e affettuosa, con un pelo lucido e setoso di un bellissimo grigio perla. Curiosa e vivace, ama esplorare ogni angolo e coccolarsi con chi le vuole bene. Con il suo sguardo dolce e il carattere socievole, Giada è la compagna perfetta per ogni momento di tenerezza e allegria.", 'GattinaGiada.png', 'M', 15, 59.99, 600, 'Animali'),
('Gattino Felix', "Felix è un gattino dal pelo morbido e lucente, con un carattere vivace e curioso. Il suo musetto simpatico e i suoi occhi brillanti sono sempre pronti a esprimere affetto e allegria. Ama giocare e coccolarsi, e con il suo spirito gioioso e il cuore dolce, Felix è il compagno perfetto per ogni momento di tenerezza.", 'GattinoFelix.png', 'S', 14, 22.99, 230, 'Animali'),
('Gattino Rocky', "Rocky è un gattino dal carattere grintoso e un pelo maculato che ricorda le sfumature di un vero felino selvatico. Con i suoi occhi vivaci e il musetto curioso, è sempre pronto a esplorare e a fare nuove scoperte. Giocoso e affettuoso, Rocky unisce la tenerezza ad un'incredibile energia, facendo di lui il compagno perfetto per chi ama l'avventura e il divertimento.", 'GattinoRocky.png', 'S', 21, 34.99, 350, 'Animali'),
('Gattino Oscar', "Oscar è un gattino elegante e affettuoso, con un pelo morbido bianco e nero e occhi pieni di dolcezza. Sempre pronto a fare le fusa e a farsi coccolare, ama trascorrere il suo tempo in compagnia. Con il suo carattere tranquillo e il musetto tenero, Oscar è il compagno perfetto per chi cerca un amico amorevole e sereno.", 'GattinoOscar.png', 'S', 3, 17.99, 180, 'Animali'),
('Topolino Theo', "Theo è un topolino piccolo e vivace, con un morbido pelo grigio chiaro e occhietti brillanti pieni di curiosità. Agile e intelligente, ama esplorare ogni angolo e trovare nuovi nascondigli. Con il suo musetto adorabile e il suo spirito giocoso, Theo è il compagno perfetto per avventure minuscole ma piene di dolcezza.", 'TopolinoTheo.png', 'S', 6, 9.99, 100, 'Animali'),
('Mucca Dotty', "Dotty è una dolce e simpatica mucca dal manto bianco a macchie nere, sempre curiosa e affettuosa. Ama pascolare tranquilla nei prati e godersi il sole, ma non dice mai di no a qualche coccola. Con il suo musetto tenero e il suo carattere gioioso, Dotty porta allegria ovunque vada!", 'MuccaDotty.png', 'S', 30, 19.99, 200, 'Animali'),
('Procione Ringo', "Ringo è un procione furbo e vivace, con il suo soffice pelo grigio e la caratteristica mascherina nera sugli occhi. Sempre alla ricerca di nuove avventure, ama esplorare e scoprire tesori nascosti. Con il suo musetto simpatico e il suo spirito giocoso, Ringo è il perfetto compagno per chi cerca un amico pieno di energia e curiosità.", 'ProcioneRingo.png', 'S', 2, 34.99, 350, 'Animali'),
('Gallina Daisy', "Daisy è una gallina vivace e affettuosa, con un soffice piumaggio bianco. Sempre attenta e curiosa, ama esplorare il cortile e fare amicizia. Con il suo carattere dolce e il suo spirito gioioso, Daisy porta allegria ovunque vada!", 'GallinaDaisy.png', 'S', 7, 34.99, 350, 'Animali'),
('Topolino Martin', "Martin è un topolino curioso e energico, con un morbido pelo grigio e occhietti azzurri brillanti e pieni di vivacità. Sempre in movimento, ama esplorare ogni angolo e trovare piccoli tesori. Con il suo musetto dolce e il suo spirito giocoso, Martin è il perfetto compagno per chi ama l'avventura!", 'TopolinoMartin.png', 'S', 8, 34.99, 350, 'Animali'),
('Coccinella Scarlet', "Scarlet è una coccinella vivace e brillante, con il suo splendido guscio rosso punteggiato di cuoricini neri. Simbolo di fortuna e felicità, ama svolazzare tra i fiori e godersi il sole. Con il suo spirito allegro e il suo aspetto incantevole, Scarlet porta un tocco di magia ovunque vada!", 'CoccinellaScarlet.png', 'S', 18, 15.99, 160, 'Animali'),
('Coniglietto Spring', "Spring è un dolce coniglietto dal morbido pelo giallo, soffice come una nuvola primaverile. Sempre allegro e vivace, ama saltellare tra i prati e curiosare tra i fiori. Con il suo musetto tenero e gli occhietti brillanti, Spring porta gioia e dolcezza ovunque vada!", 'ConigliettoSpring.png', 'S', 4, 12.99, 130, 'Animali'),
('Pulcino Sunny', "Sunny è un pulcino dolcissimo, con piume gialle come il sole. Sempre allegro e vivace, ama saltellare tra i fiori e fare piccoli cinguettii felici. Con il suo spirito spensierato e il musetto tenero, Sunny ama far sorridere chiunque incontri!", 'PulcinoSunny.png', 'S', 16, 17.99, 180, 'Animali'),
('Coniglietto Jeremy', "Jeremy è un coniglietto dolce e timido, con un morbido pelo nocciola e orecchie lunghe che gli danno un aspetto tenero e curioso. Ama saltellare nel prato e esplorare il suo piccolo mondo, ma è anche un grande amante delle coccole. Con il suo carattere gentile e il musetto adorabile, Jeremy è il compagno perfetto per momenti di tranquillità e affetto.", 'ConigliettoJeremy.png', 'M', 8, 59.99, 600, 'Animali'),
('Rana River', "River è una rana vivace di un bel colore verde acceso. Ama passare il suo tempo tra i laghetti e le rive, saltellando da una foglia all'altra. Con il suo spirito giocoso e il suo carattere curioso, River porta un tocco di freschezza e allegria ovunque vada!", 'RanaRiver.png', 'S', 5, 29.99, 300, 'Animali'),
('Criceto Sparky', "Sparky è un criceto vivace e pieno di energia, con un morbido pelo dorato e un musetto sorridente e curioso. Sempre in movimento, ama correre sulla sua ruota e esplorare ogni angolo del suo piccolo mondo. Con il suo spirito allegro e il suo carattere giocoso, Sparky è il compagno perfetto per chi cerca un amico adorabile!", 'CricetoSparky.png', 'S', 15, 9.99, 100, 'Animali'),
('Coniglietto Virgilio', "Virgilio è un coniglietto dolce e curioso, con un pelo morbido grigio chiaro che lo rende ancora più adorabile. Sempre attento a tutto ciò che lo circonda, ama esplorare saltellando tra i prati e le foglie. Con il suo carattere tranquillo e il musetto simpatico, Virgilio è il compagno ideale per momenti di tranquillità e tenerezza.", 'ConigliettoVirgilio.png', 'L', 4, 79.99, 800, 'Animali'),
('Coniglietto Hugo', "Hugo è un coniglietto dolce e affettuoso, con un morbido pelo bianco e orecchie lunghe che gli conferiscono un aspetto tenero. Sempre pronto a saltellare e a esplorare, ama passare il suo tempo tranquillo nei prati. Con il suo carattere docile e il musetto adorabile, Hugo è il compagno perfetto per chi cerca una dolce compagnia e tanta tenerezza.", 'ConigliettoHugo.png', 'S', 5, 19.99, 200, 'Animali'),
('Topolino Milo', "Milo è un topolino piccolo e curioso, con orecchie grandi che lo rendono ancora più adorabile. Sempre in movimento, ama esplorare ogni angolo e scoprire nuovi posti dove nascondersi. Con il suo carattere vivace e il musetto simpatico, Milo è il compagno perfetto per chi ama le avventure in miniatura!", 'TopolinoMilo.png', 'S', 40, 17.99, 180, 'Animali'),
('Coniglietto Pongo', "Pongo è un coniglietto dolce e curioso, con un pelo morbido e bianco come la neve e orecchie grigie e lunghe che gli donano un aspetto tenero. Ama saltellare tra i prati e scoprire nuovi angoli da esplorare. Con il suo spirito vivace e il suo carattere affettuoso, Pongo è il compagno perfetto per chi cerca un amico gioioso e pieno di dolcezza.", 'ConigliettoPongo.png', 'S', 25, 34.99, 350, 'Animali'),
('Coniglietta Sissi', "Sissi è una coniglietta dolcissima, con un morbido pelo bianco e dorato. Sempre gentile e affettuosa, ama passare il tempo a saltellare tra i fiori e a godersi la tranquillità. Con il suo spirito tenero e il musetto adorabile, Sissi è la compagna ideale per chi cerca un amico dolce e affettuoso.", 'ConigliettaSissi.png', 'M', 12, 59.99, 600, 'Animali'),
('Pulcino Clover', "Clover è un pulcino dolcissimo, con piume morbide di un giallo delicato e un becco piccolo e vivace. Sempre curioso, ama saltellare tra i fiori facendo piccoli cinguettii. Con il suo carattere allegro e il musetto tenero, Clover è il compagno perfetto per chi cerca un amico pieno di gioia e dolcezza!", 'PulcinoClover.png', 'S', 4, 29.99, 300, 'Animali'),
('Coccinella Ivy', "Ivy è una coccinella vivace e piena di energia, con un guscio rosso brillante e macchie nere che la rendono davvero speciale. Ama volare tra i fiori e portare fortuna ovunque vada. Con il suo spirito allegro e il suo carattere affettuoso, Ivy è la compagna perfetta per chi cerca un tocco di magia e gioia!", 'CoccinellaIvy.png', 'S', 10, 9.99, 100, 'Animali'),
('Maialino Piggy', "Piggy è un maialino dolcissimo e giocoso, con un musetto tenero e occhietti curiosi. Il suo pelo morbido e rosa lo rende ancora più adorabile, mentre il suo carattere vivace lo fa saltellare felicemente in giro. Sempre pronto a fare un po' di rumore e a strappare sorrisi, Piggy è il compagno perfetto per chi cerca allegria e un po' di caos!", 'MaialinoPiggy.png', 'S', '3', 9.99, 100, 'Animali'),
('Coniglietto Ciro', "Ciro è un coniglietto dolce e curioso, con un morbido pelo beige. Ama saltellare nei prati e esplorare con un entusiasmo contagioso. Con il suo carattere vivace e affettuoso, Ciro è il compagno perfetto per chi cerca un amico gioioso e sempre pronto a far sorridere!", 'ConigliettoCiro.png', 'S', 26, 34.99, 350, 'Animali'),
('Castoro Giuseppe', "Giuseppe è un castoro vivace e laborioso, con un folto pelo marrone e una coda larga e piatta. Sempre occupato a costruire dighe e a raccogliere rami, è molto orgoglioso del suo lavoro. Con il suo carattere intraprendente, Giuseppe è il compagno perfetto per chi apprezza la tenacia e la dedizione!", 'CastoroGiuseppe.png', 'M', 15, 59.99, 600, 'Animali'),
('Castoro Buster', "Buster è un castoro forte e determinato con il pelo marrone scuro. Sempre impegnato alla costruzione della sua diga, è un vero lavoratore instancabile. Con il suo spirito energico, Buster è il compagno perfetto per chi ama l'avventura e il duro lavoro!", 'CastoroBuster.png', 'S', 6, 19.99, 200, 'Animali'),
('Riccio Timmy', "Timmy è un riccio piccolo e adorabile, con un musetto simpatico che gli dà un aspetto affettuoso. Sempre curioso, ama nascondersi sotto le foglie e cercare piccole avventure. Con il suo carattere tranquillo e il suo sguardo dolce, Timmy è il compagno perfetto per chi cerca un amico timido e tenero.", 'RiccioTimmy.png', 'S', 20, 19.99, 200, 'Animali'),
('Lepre Willow', "Willow è una lepre artica dal manto bianco come la neve. Con orecchie lunghe e un musetto delicato, è agile e molto curiosa. Con il suo aspetto elegante e il suo carattere tenero, è la compagna perfetta per chi ama la bellezza della natura selvaggia.", 'LepreWillow.png', 'S', 14, 19.99, 200, 'Animali'),
('Pipistrello Midnight', "Midnight è un pipistrello misterioso e affascinante. Sempre in movimento tra le ombre, si sposta agilmente nel cielo notturno. Con il suo carattere tranquillo ma curioso, Midnight è il compagno perfetto per chi apprezza la bellezza e la quiete delle notti più oscure.", 'PipistrelloMidnight.png', 'S', 18, 9.99, 100, 'Animali'),
('Lupo Hunter', "Hunter è un lupo forte e determinato, con un manto marrone e occhi penetranti. Abile cacciatore, è sempre attento e concentrato. Con il suo carattere fiero e indipendente, Hunter è il compagno perfetto per chi ama l'avventura e la natura incontaminata.", 'LupoHunter.png', 'S', 5, 19.99, 200, 'Animali'),
('Gufetta Olive', "Olive è una gufetta dolcissima, con piume morbide marrone scuro e occhi grandi e curiosi che brillano nella notte. Sempre silenziosa e attenta, è una grande osservatrice. Con il suo spirito tranquillo e il suo carattere saggio, Olive è la compagna perfetta per chi ama la serenità e la magia della notte.", 'GufettaOlive.png', 'S', 5, 19.99, 200, 'Animali'),
('Faina Jasmine', "Jasmine è una faina aggraziata e vivace, con un manto marrone scuro e una coda lunga e folta. Sempre attenta e curiosa, ama saltellare tra gli alberi e correre tra i cespugli. Con il suo spirito indipendente e il carattere affettuoso, Jasmine è la compagna perfetta per chi apprezza l'avventura.", 'FainaJasmine.png', 'S', 10, 19.99, 200, 'Animali'),
('Marmotta Trixie', "Trixie è una marmotta simpatica e allegra, con un pelo morbido color nocciola. Sempre curiosa e alla ricerca di nuove scoperte, Trixie ha uno spirito vivace e un carattere socievole.È la compagna perfetta per chi cerca un amico dolce e pieno di energia!", 'MarmottaTrixie.png', 'M', 14, 59.99, 600, 'Animali'),
('Cinghiale Thor', "Thor è un cinghiale con il manto bruno e zanne affilate. Con un carattere protettivo e coraggioso, Thor è un simbolo di forza e fierezza. Forte e determinato, è perfetto per chi ama la natura selvaggia e il lato più audace della vita.", 'CinghialeThor.png', 'S', 20, 9.99, 100, 'Animali'),
('Procione Hazel', "Hazel è un procione curioso e vivace, con un morbido manto grigio. Sempre alla ricerca di avventure, ama scovare tesori nascosti. Con il suo carattere giocoso e un pizzico di malizia, Hazel è il compagno perfetto per chi ama la curiosità e l'energia di un piccolo esploratore!", 'ProcioneHazel.png', 'S', 30, 19.99, 200, 'Animali'),
('Cerbiatto Robin', "Robin è un cerbiatto dolce e aggraziato, con un manto marrone chiaro e macchie bianche. Con occhi grandi e curiosi, esplora timidamente i boschi. Agile e grazioso nei suoi movimenti, Robin è il compagno perfetto per chi ama la tranquillità e la bellezza della natura.", 'CerbiattoRobin.png', 'S', 10, 19.99, 200, 'Animali'),
('Uccellino Chip', "Chip è un uccellino vivace e allegro, con piume arancioni brillanti. Con un carattere gioioso e curioso, ama volare di ramo in ramo, cinguettando melodie dolci. Sempre pieno di energia, Chip è il compagno perfetto per chi ama la spensieratezza.", 'UccellinoChip.png', 'S', 5, 12.99, 130, 'Animali'),
('Leprotto Sky', "Sky è un leprotto agile e curioso, con un manto morbido grigio chiaro. Sempre pronto a saltare e correre, ha uno spirito libero e gioioso. Con occhi grandi e attenti, Sky è sempre alla ricerca di nuove avventure, portando un'aria di leggerezza e freschezza ovunque vada.", 'LeprottoSky.png', 'S', 20, 9.99, 100, 'Animali'),
('Puzzola Honey', "Honey è una puzzola dolce e affettuosa, con un manto bianco e nero e un carattere tenere e delicato. Con il suo aspetto adorabile e la sua natura tranquilla, Honey è la compagna perfetta per chi cerca un animale che porti nella vita gioia e dolcezza.", 'PuzzolaHoney.png', 'S', 15, 29.99, 300, 'Animali'),
('Riccio Marcello', "Marcello è un riccio curioso e affettuoso, con un musetto simpatico che lo rende irresistibile. Nonostante il suo aspetto spinoso, è molto dolce. Con la sua personalità tranquilla e un pizzico di timidezza, Marcello è il compagno perfetto per chi apprezza la dolcezza nei piccoli dettagli.", 'RiccioMarcello.png', 'M', 24, 59.99, 600, 'Animali'),
('Cerbiatta Luna', "Luna è una cerbiatta elegante e delicata, con un manto morbido dai toni caldi. Con occhi grandi e profondi, è leale e incarna la bellezza tranquilla della foresta. La sua dolcezza e la sua timidezza rendono Luna un simbolo di calma e serenità.", 'CerbiattaLuna.png', 'M', 10, 59.99, 600, 'Animali'),
('Scoiattolo Ginger', "Ginger è uno scoiattolo vivace e agile con il manto nocciola. Sempre in movimento, ama cercare ghiande e divertirsi nei boschi. Con il suo spirito curioso e giocoso, Ginger è sempre pronto a intraprendere nuove avventure, portando allegria e vivacità ovunque vada.", 'ScoiattoloGinger.png', 'M', 7, 59.99, 600, 'Animali'),
('Volpe Vicky', "Vicky è una volpe elegante e astuta, con un manto rosso brillante. Con occhi vivaci e curiosi, è sempre pronta a esplorare la natura e a mettersi nei guai. La sua personalità intrigante e indipendente rende Vicky un simbolo di intelligenza e libertà.", 'VolpeVicky.png', 'M', 4, 59.99, 600, 'Animali'),
('Leprotto Lino', "Lino è un leprotto dal manto morbido e grigio, con orecchie lunghe e occhi vivaci che riflettono la sua natura curiosa. Agile e rapido nei suoi salti, esplora il mondo con una grazia inconfondibile. Lino è il simbolo della libertà spensierata e della curiosità infinita.", 'LeprottoLino.png', 'M', 15, 59.99, 600, 'Animali'),
('Gufetto Jack', "Jack è un gufetto misterioso e affascinante, con piume morbide e dai toni caldi. I suoi occhi grandi e penetranti sono sempre attenti, mentre si sposta silenziosamente tra gli alberi di notte. Con una presenza calma e serena, Jack è il custode della saggezza e della tranquillità del bosco.", 'GufettoJack.png', 'S', 3, 34.99, 350, 'Animali'),
('Procione Scout', "Scout è un procione vivace e curioso, con il manto grigio e bianco. Sempre in movimento, ama raccogliere piccoli tesori e osservare attentamente il mondo intorno a lui. Con una personalità avventurosa e giocosa, Scout è sempre pronto a scoprire qualcosa di nuovo.", 'ProcioneScout.png', 'S', 5, 9.99, 100, 'Animali'),
('Procione Dash', "Dash è un procione veloce e scaltro, con il manto color crema. La sua natura avventurosa lo spinge ad essere sempre alla ricerca di piccole sorprese. Dash è un vero esperto nel muoversi furtivo e rapido, con una personalità brillante e piena di energia.", 'ProcioneDash.png', 'S', 7, 19.99, 200, 'Animali'),
('Volpe Blake', "Blake è una volpe agile e astuta, con un manto rosso intenso. La sua natura indipendente e il suo spirito libero lo rendono un vero maestro nell'arte di muoversi furtivamente, mentre conserva un fascino misterioso e affascinante.", 'VolpeBlake.png', 'S', 10, 19.99, 200, 'Animali'),
('Marmotta Caramel', "Caramel è una marmotta dal carattere dolce e affettuoso. Curiosa e vivace, è sempre pronta a nuove esperienze. Nonostante la sua energia, Caramel è anche molto dolce e un po' timida e ciò rende impossibile per chiunque non amarla.", 'MarmottaCaramel.png', 'S', 4, 17.99, 180, 'Animali');

INSERT INTO PRODOTTO (Nome, Descrizione, Immagine, Grandezza, Scorta, Prezzo, Prezzo_punti, Nome_categoria) VALUES
('Topolino', 'Peluche del famoso Topolino Disney', '', 'S', 40, 19.99, 200, 'Disney'),
('Stitch', 'Il peluche perfetto per ogni fan di Lilo&Stitch', '', 'S', 35, 18.99, 190, 'Disney'),
('Olaf', 'Peluche di Olaf morbido e coccoloso', '', 'M', 50, 22.99, 220, 'Disney'),
('Dumbo', 'Peluche del tenero elefantino Dumbo', '', 'M', 30, 24.99, 250, 'Disney'),
('Simba', 'Peluche del Re della savana Simba', '', 'M', 45, 25.99, 270, 'Disney');

INSERT INTO PRODOTTO (Nome, Descrizione, Immagine, Grandezza, Scorta, Prezzo, Prezzo_punti, Nome_categoria) VALUES
('SpongeBob', 'Peluche di SpongeBob SquarePants', '', 'M', 40, 17.99, 180, 'Cartoni animati'),
('Pikachu', 'Peluche del famoso Pikachu di Pokémon', '', 'S', 50, 21.99, 220, 'Cartoni animati'),
('Shrek', 'Peluche di Shrek, il famoso orco verde', '', 'L', 20, 29.99, 300, 'Cartoni animati'),
('Scooby-Doo', 'Peluche di Scooby-Doo, il famoso cane detective', '', 'M', 30, 23.99, 240, 'Cartoni animati'),
('Tom', 'Peluche del gatto di Tom&Jerry', '', 'M', 35, 25.99, 260, 'Cartoni animati');

INSERT INTO PRODOTTO (Nome, Descrizione, Immagine, Grandezza, Scorta, Prezzo, Prezzo_punti, Nome_categoria) VALUES
('Hamburger Peluche', 'Peluche a forma di hamburger', '', 'S', 40, 12.99, 130, 'Cibo'),
('Pizza Peluche', 'Peluche a forma di pizza', '', 'M', 50, 14.99, 150, 'Cibo'),
('Avocado Peluche', 'Peluche a forma di avocado', '', 'S', 60, 9.99, 100, 'Cibo'),
('Gelato Peluche', 'Peluche a forma di cono gelato', '', 'M', 30, 16.99, 170, 'Cibo'),
('Donut Peluche', 'Peluche a forma di ciambella', '', 'S', 45, 11.99, 120, 'Cibo');

INSERT INTO PRODOTTO (Nome, Descrizione, Immagine, Grandezza, Scorta, Prezzo, Prezzo_punti, Nome_categoria) VALUES
('Cactus Peluche', 'Cactus in peluche verde', '', 'S', 35, 19.99, 200, 'Piante'),
('Fiore Peluche', 'Fiore colorato in peluche', '', 'M', 40, 22.99, 230, 'Piante'),
('Pianta Grassa Peluche', 'Peluche a forma di pianta grassa', '', 'M', 30, 25.99, 250, 'Piante'),
('Albero Peluche', 'Peluche a forma di albero verde', '', 'L', 15, 29.99, 300, 'Piante'),
('Bonsai Peluche', 'Peluche a forma di bonsai', '', 'S', 20, 24.99, 240, 'Piante');


-- Popolamento della tabella carrello
INSERT INTO carrello (E_mail, Id_prodotto, Quantita) VALUES
('giuseppe.rossi@peluche.com', 1, 1),
('giuseppe.rossi@peluche.com', 6, 1),
('federico.ricci@peluche.com', 3, 1),
('federico.ricci@peluche.com', 8, 1),
('elena.ferrari@peluche.com', 5, 1),
('laura.verdi@peluche.com', 4, 1),
('laura.verdi@peluche.com', 13, 1),
('laura.verdi@peluche.com', 17, 1);

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
('2024-10-27', 48.98, 'In consegna', 3, 2, 'carlo.bianchi@peluche.com'),
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