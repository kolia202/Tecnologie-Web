<img src="../utilities/img/Peluches-Home.png" alt="vetrina"/>
<h1>Il tuo negozio di Peluche<br>preferito!</h1>
<p>
    Benvenuto nel mondo dei peluches!<br>
    Scopri la nostra collezione di amici morbidosi, perfetti per coccole e regali. 
    Trova il peluche ideale per te e portalo a casa con un click!
</p>
<div class="text-center">
    <a href="../php/prodotti.php">
        <button type="button" class="btn btn-sm fw-bold" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Scopri tutti i nostri peluche</button>
    </a>
</div>

<p style="text-align: left;">
    <i class="bi bi-star-fill" style="color: rgb(239, 161, 15); font-size: 1rem;"></i>
    <strong style="font-size: 1rem;">
        <?php echo number_format($templateParams["mediaVoti"], 1); ?>
    </strong>
    <span style="color: rgb(137, 85, 32); font-weight: bold; font-size: 0.6rem; margin-left: 5px;">
        (<?php echo number_format($templateParams["numeroRecensioni"]);?> Recensioni)
    </span>
</p>

<div class="text-center">
    <i class="bi bi-gift-fill" style="color:  rgb(137, 85, 32); font-size: 1.5rem;"></i>
</div>
<h1>Consegna gratuita</h1>
<p>per ordini superiori a 40€</p>
<div class="text-center">
    <i class="bi bi-lock-fill" style="color:  rgb(137, 85, 32); font-size: 1.5rem;"></i>
</div>
<h1>Pagamento 100% sicuro</h1>
<p> Paypal / Mastercard / Visa</p>
<div class="container my-5">
<div class="box p-4 rounded shadow bg-white" 
style="border: 4px solid rgb(245, 222, 179);">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($templateParams["prodotti"] as $index => $prodotto): ?>
                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                        <a href="../php/dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>">
                            <img src="<?php echo IMG_DIR . $prodotto['Immagine']; ?>" class="d-block w-100 rounded" alt="<?php echo $prodotto['Nome']; ?>">
                            <p class="text-center mt-3 fw-bold"><?php echo $prodotto['Nome']; ?></p>                        
                        </a>
                        <p class="text-center mt-1 text-danger fw-bold"><?php echo getFormattedPrice($prodotto["Prezzo"]); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
<div class="text-center">
    <a href="#">
        <button type="button" class="btn btn-sm fw-bold" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Vedi tutti i prodotti</button>
    </a>
</div>
<h1>Le nostre collezioni</h1>
<p>Il negozio Mondo Morbido, specializzato nella<br>
vedita di peluche, offre una vasta<br>
selezione di prodotti per tutta la famiglia.<br>
Grazie all'enorme varietà di articoli<br>
per bambini e adulti, è diventato un vero e<br>
prorpio punto di riferimento per gli<br>
appassionati del genere.</p>
<div class="container my-5" id="newsletter">
    <div class="box p-4 rounded shadow bg-white">
        <div class="text-center" style="background-color: rgb(180, 152, 26); border-radius: 15px; padding: 20px; max-width: 400px; margin: auto;">
            <h3 class="fw-bold"><i class="bi bi-envelope-heart"></i> Newsletter</h3>
            <p>Iscriviti alla nostra newsletter per ricevere i nostri consigli e suggerimenti per la scelta del peluche</p>
            <div id="liveAlertPlaceholder">
                <?php if (!empty($message)): ?>
                    <div class="alert <?php echo isset($success) && $success ? 'alert-success' : 'alert-danger'; ?>" role="alert">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>
            </div>
            <form method="POST" action="#newsletter">
                <div class="mb-3">
                    <input type="email" class="form-control text-center" name="email" placeholder="vostro@email.com" required>
                </div>
                <button type="submit" class="btn btn-primary">Iscriviti</button>
            </form>

        </div>
    </div>
</div>

<img src="../utilities/img/peluches-home.png" alt="vetrina"  style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;">
<h1>Perchè acquistare peluche<br>
da Mondo Morbidoso?</h1>
<p>Il negozio online Mondo Morbidoso rappresenta<br>
una solzuzione conveniente per i genitori in<br>
cerca di peluche per i loro bambini.</p>
<div class="container my-5">
    <div class="box p-4 rounded shadow bg-white">
        <h1>Recensione dei clienti</h1>
        <p>Le testimonianze di chi ha scelto di<br>
        affidarsi a noi per l'acquisto dei peluche!</p>
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <?php if (!empty($templateParams["recensioni"])): ?>
                    <?php foreach ($templateParams["recensioni"] as $index => $recensione): ?>
                        <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                            <div class="d-flex justify-content-center align-items-center" style="height: 300px; background-color: rgba(245, 222, 179, 0.3);">
                                <p><?php echo htmlspecialchars($recensione['Commento']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="carousel-item active">
                        <div class="d-flex justify-content-center align-items-center" style="height: 300px; background-color: rgba(245, 222, 179, 0.3);">
                            <h2>Nessuna recensione disponibile</h2>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div> 
    </div>
</div>
<div class="text-center">
    <a href="../php/recensioni.php">
        <button type="button" class="btn btn-sm fw-bold" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Leggi tutte le recensioni</button>
    </a>
</div>
<div id="cookie-banner" style="display: none; position: fixed; bottom: 20px; left: 50%; transform: translateX(-50%); width: 90%; max-width: 500px; background: #fff; color: #333; padding: 20px; box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2); border-radius: 10px; border: 2px solid #FFD700; text-align: center; z-index: 1000;">
    <h5 style="font-weight: bold;">Rispettiamo la tua privacy!</h5>
    <p style="margin-bottom: 10px;">Questo sito utilizza cookie per migliorare l'esperienza utente. Puoi accettare o rifiutare l'uso dei cookie.</p>
    <div style="display: flex; justify-content: space-evenly; margin-top: 15px;">
        <button id="rejectCookies" class="btn btn-danger">Rifiuta</button>
        <button id="acceptCookies" class="btn btn-success">Accetta</button>
    </div>
</div>