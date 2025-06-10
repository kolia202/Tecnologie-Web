<img class="img-vetrina mt-4" src="../utilities/img/Peluches-Home.png" alt="vetrina" />
<h1 class="title mt-2 ms-3 me-3 mb-1">Benvenuti nel mondo dei Peluches!</h1>
<p class="text welcome-message ms-3 me-3">
    Scopri la nostra collezione di amici morbidosi, perfetti da coccolare, collezionare o regalare a chi ami.
    Trova il peluche ideale per te e portalo a casa con un click!
</p>
<div class="text-center mt-4">
    <a href="../php/prodotti.php" class="btn ps-5 pe-5 button">I nostri Peluches</a>
</div>
<div class="catcontainer mt-5 pt-4 pe-5 ps-5 pb-4">
    <h2 class="title mb-4">Esplora le Collezioni!</h2>
    <div class="row justify-content-center">
        <?php foreach($templateParams["categorie"] as $categoria): ?>
            <div class="col-6 col-md-4 text-center mb-3">
                <a href="../php/prodotti.php?categoria=<?php echo $categoria['Nome_categoria']; ?>">
                    <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto category">
                        <?php echo $categoria["Nome_categoria"]; ?>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>            
    </div>
</div>
<h2 class="title mt-4 pt-2"><span class="bi bi-stars" aria-hidden="true"></span> I Best seller! <span class="bi bi-stars" aria-hidden="true"></span></h2>
<div class="d-block d-md-none">
    <div class="box pt-3 ps-2 pe-2 pb-1 mt-4 rounded shadow bg-white custom-box">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($templateParams["prodotti"] as $index => $prodotto): ?>
                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                        <a href="../php/dettaglioProdotto.php?id=<?php echo $prodotto['Id_prodotto']; ?>">
                            <img class="carousel-img d-block w-100" src="<?php echo IMG_DIR . $prodotto['Immagine']; ?>" alt="<?php echo $prodotto['Nome']; ?>">
                            <p class="carousel-title text-center mt-3 mb-2 fw-bold"><?php echo $prodotto['Nome']; ?></p>                        
                        </a>
                        <p class="text-center text-dark text"><?php echo getFormattedPrice($prodotto["Prezzo"]); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span aria-hidden="true"><span class="bi bi-chevron-compact-left" aria-hidden="true"></span></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span aria-hidden="true"><span class="bi bi-chevron-compact-right" aria-hidden="true"></span></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
<div class="container d-none d-md-block">
    <div class="row row-cols-md-4 gx-4">
        <?php foreach ($templateParams["prodotti"] as $prodotto): ?>
            <div class="col">
                <div class="card rounded shadow bg-white text-center custom-box-md pt-3 ps-2 pe-2 pb-1 mt-4">
                    <a href="../php/dettaglioProdotto.php?id=<?php echo $prodotto['Id_prodotto']; ?>" class="text-decoration-none">
                        <img src="<?php echo IMG_DIR . $prodotto['Immagine']; ?>" class="carousel-img d-block w-100" alt="<?php echo $prodotto['Nome']; ?>">
                        <p class="carousel-title text-center mt-3 mb-2 fw-bold"><?php echo $prodotto['Nome']; ?></p>
                    </a>
                    <p class="text-center text-dark text"><?php echo getFormattedPrice($prodotto["Prezzo"]); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<section class="mt-5 pt-3">
  <div class="container text-center ps-0 pe-0">
    <h2 class="title why-title mb-1">Perché scegliere Mondo Morbidoso?</h2>
    <p class="text ms-3 me-3">
      Ogni peluche è scelto con amore.<br/>Materiali di qualità, lavorazione sicura e tanta cura nei dettagli!
    </p>
    <div class="row mb-3 ms-2 me-2 g-3 justify-content-center">
        <div class="col-6 col-md-3">
            <div class="why-item d-flex justify-content-center align-items-center p-3">
                <span class="bi bi-lock me-1 why-icon" aria-hidden="true"></span>
                <p class=" text text-center mb-0">Pagamento facile e sicuro</p>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="why-item d-flex justify-content-center align-items-center p-3">
                <span class="bi bi-truck me-2 why-icon" aria-hidden="true"></span>
                <p class="text text-center mb-0">Spedizione gratis oltre 50€</p>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="why-item d-flex justify-content-center align-items-center p-3">
                <span class="bi bi-gem me-1 why-icon" aria-hidden="true"></span>
                <p class="text text-center mb-0">Programma fedeltà unico</p>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="why-item d-flex justify-content-center align-items-center p-3">
                <span class="bi bi-gift me-2 why-icon" aria-hidden="true"></span>
                <p class="text text-center mb-0">Confezioni regalo adorabili</p>
            </div>
        </div>
    </div>
    <a href="../php/informazioni.php" class="why-more">Scopri di più su di noi</a>
  </div>
</section>
<div class="container mt-5" id="newsletter">
    <div class="box p-4 shadow newsletter-box">
        <div class=" text-center text-centerP">
            <h3 class="title"><span class="bi bi-envelope-heart me-1" aria-hidden="true"></span> Newsletter</h3>
            <p class="text mb-4">Iscriviti alla nostra newsletter e ricevi tutte le novità e offerte esclusive dedicate a te!</p>
            <div id="liveAlert">
                <?php if (isset($_SESSION["errornewsletter"])): ?>
                    <div class="alert alert-danger text-center text" role="alert">
                        <span class="bi bi-exclamation-triangle align-center" aria-hidden="true"></span>
                        <?php echo $_SESSION["errornewsletter"]; ?>
                        <?php unset($_SESSION['errornewsletter']); ?>
                    </div>
                <?php elseif(isset($_SESSION['successnewsletter'])): ?>
                    <div class="alert alert-success text-center text" role="alert">
                        <span class="bi bi-check-circle align-center" aria-hidden="true"></span>
                        <?php echo $_SESSION["successnewsletter"];
                        unset($_SESSION['successnewsletter']); ?>
                    </div>  
                <?php endif; ?>
            </div>
            <form method="POST" action="#newsletter">
                <div class="mb-4">
                    <label for="newsletter-email" class="visually-hidden">Inserisci il tuo indirizzo email</label>
                    <input id="newsletter-email" type="email" class="form-control text text-input" name="email" placeholder="E-mail" required>
                </div>
                <button type="submit" class="btn button ps-5 pe-5">Iscriviti</button>
            </form>
        </div>
    </div>
</div>
<section class="pt-5">
    <div class="container text-center">
        <h4 class="title">Cosa dicono di noi?</h4>
        <p class="text ms-3 me-3 mb-1">Le testimonianze di chi ha scelto di affidarsi a noi per l'acquisto dei propri peluche!</p>
        <div>
            <p class="star-rating">
                <?php echo getStarRating($mediaVoti); ?> 
                <?php echo number_format($mediaVoti, 1); ?>/5 su <?php echo $numRecensioni; ?> recensioni
            </p>
        </div>
        <?php if (!empty($templateParams["recensioni"])): ?>
            <div id="carouselRecensioni" class="carousel slide mt-4 carousel-reviews d-block d-md-none" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php foreach ($templateParams["recensioni"] as $index => $recensione): ?>
                        <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="recensione-box p-3">
                                    <div class="stars-reviews ms-1"><?php echo getStarRating($recensione['Voto']); ?></div>
                                    <p class="text mt-2 ms-1 me-1"><?php echo htmlspecialchars($recensione['Commento']); ?></p>
                                    <p class=" text-italic text-end mb-0 me-1"><?php echo $recensione['Nome'] . ' ' . $recensione['Cognome']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselRecensioni" data-bs-slide="prev">
                    <span class="bi bi-chevron-compact-left" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselRecensioni" data-bs-slide="next">
                    <span class="bi bi-chevron-compact-right" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div id="carouselRecensioniDesktop" class="carousel slide mt-4 d-none d-md-block carousel-reviews" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php for ($i = 0; $i < count($templateParams["recensioni"]); $i += 2): ?>
                        <div class="carousel-item <?php echo $i === 0 ? 'active' : ''; ?>">
                            <div class="d-flex justify-content-center align-items-center gap-4">
                                <?php for ($j = 0; $j < 2; $j++): ?>
                                    <?php if (isset($templateParams["recensioni"][$i + $j])): 
                                        $recensione = $templateParams["recensioni"][$i + $j]; ?>
                                        <div class="recensione-box p-3">
                                            <div class="stars-reviews ms-1"><?php echo getStarRating($recensione['Voto']); ?></div>
                                            <p class="text mt-2 ms-1 me-1"><?php echo htmlspecialchars($recensione['Commento']); ?></p>
                                            <p class="text-italic text-end mb-0 me-1"><?php echo $recensione['Nome'] . ' ' . $recensione['Cognome']; ?></p>
                                        </div>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselRecensioniDesktop" data-bs-slide="prev">
                    <span class="bi bi-chevron-compact-left" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselRecensioniDesktop" data-bs-slide="next">
                    <span class="bi bi-chevron-compact-right" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        <?php else: ?>
            <div class="mt-4 d-flex justify-content-center align-items-center">
                <div class="recensione-box p-3 d-flex justify-content-center align-items-center">
                    <p class="text">Non sono ancora presenti recensioni</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="text-center mt-4">
        <a href="../php/recensioni.php" class="btn button ps-5 pe-5">Vedi tutte</a>
    </div>
</section>
<div class="cookie shadow p-3" id="cookie-banner">
    <h5 class="text fw-bold">Rispettiamo la tua privacy!</h5>
    <p class="text">Questo sito utilizza cookie per migliorare l'esperienza utente. Puoi accettare o rifiutare l'uso dei cookie.</p>
    <div class="d-flex justify-content-center gap-3">
        <button id="acceptCookies" class="btn btn-success text pe-4 ps-4">Accetta</button>
        <button id="rejectCookies" class="btn btn-danger text pe-4 ps-4">Rifiuta</button>
    </div>
</div>