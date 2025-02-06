<img class="img-vetrina" src="../utilities/img/Peluches-Home.png" alt="vetrina" />

<h1 class="favorite-store-title">Il tuo negozio di peluche preferito!</h1>

<p class="welcome-message">
    Benvenuto nel mondo dei peluches! Scopri la nostra collezione di amici morbidosi, 
    perfetti per coccole e regali. Trova il peluche ideale per te e portalo a casa con un click!
</p>

<div class="text-centerA">
    <a href="../php/prodotti.php">
        <button type="button" class="btn btn-sm fw-bold custom-buttonA">
            Scopri tutti i peluche
        </button>
    </a>
</div>

<p class="rating">
    <i class="bi bi-star-fill rating-star"></i>
    <strong class="rating-score">
        <?php echo number_format($templateParams["mediaVoti"], 1); ?>
    </strong>
    <span class="rating-reviews">
        (<?php echo number_format($templateParams["numeroRecensioni"]);?> Recensioni)
    </span>
</p>

<i class="bi bi-gift-fill custom-biB"></i>

<h1 class="Consegna">Consegna gratuita</h1>

<p class="ordinip">per ordini superiori a 40€</p>
    
<i class="bi bi-lock-fill custom-biBB"></i>

<h1 class="pagamentoS">Pagamento 100% sicuro</h1>

<p class="tipoCarte"> Paypal / Mastercard / Visa</p>

    <div class="box p-4 rounded shadow bg-white custom-box">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($templateParams["prodotti"] as $index => $prodotto): ?>
                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                        <a class="dettaglio" href="../php/dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>">
                            <img class="immCours" src="<?php echo IMG_DIR . $prodotto['Immagine']; ?>" class="d-block w-100 rounded" alt="<?php echo $prodotto['Nome']; ?>">
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
    

<div class="text-centerA">
    <a href="../php/prodotti.php">
        <button type="button" class="btn btn-sm fw-bold custom-buttonA">Vedi i prodotti</button>
    </a>
</div>

<h1 class="collezioni">Le nostre collezioni</h1>

<p class="welcome-message">
Il negozio Mondo Morbido, specializzato nella vedita di peluche, offre una vasta
selezione di prodotti per tutta la famiglia. Grazie all'enorme varietà di articoli
per bambini e adulti, è diventato un vero e prorpio punto di riferimento per gli
appassionati del genere.
</p>

<div class="container my-56" id="newsletter">
    <div class="box p-4 rounded shadow bg-whitee">
        <div class="text-centerP">
            <h3 class="fw-boldSS"><i class="bi bi-envelope-heart"></i> Newsletter</h3>
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

<img class="fotoTonda" src="../utilities/img/peluches-home.png" alt="vetrina">

<h1 class="favorite-store-title">Perchè acquistare peluche da Mondo Morbidoso?</h1>

<p class="welcome-message">
    Il negozio online Mondo Morbidoso 
    appresenta una solzuzione conveniente per i genitori in
    cerca di peluche per i loro bambini.
</p>

    <div class="box p-4 rounded shadow bg-whiteee">
        <h1>Cosa dicono di noi?</h1>
        <p>Le testimonianze di chi ha scelto di<br>
        affidarsi a noi per l'acquisto dei peluche!</p>
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <?php if (!empty($templateParams["recensioni"])): ?>
                    <?php foreach ($templateParams["recensioni"] as $index => $recensione): ?>
                        <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                            <div class="d-flex justify-content-center align-items-center">
                                <p><?php echo htmlspecialchars($recensione['Commento']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="carousel-item active">
                        <div class="d-flex justify-content-center align-items-center">
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

<div class="text-centerA">
    <a href="../php/recensioni.php">
        <button type="button" class="btn btn-sm fw-bold custom-buttonA">Recensioni</button>
    </a>
</div>

<div class="cookie" id="cookie-banner">
    <h5>Rispettiamo la tua privacy!</h5>
    <p>Questo sito utilizza cookie per migliorare l'esperienza utente. Puoi accettare o rifiutare l'uso dei cookie.</p>
    <div class="divCookie">
        <button id="rejectCookies" class="btn btn-danger">Rifiuta</button>
        <button id="acceptCookies" class="btn btn-success">Accetta</button>
    </div>
</div>