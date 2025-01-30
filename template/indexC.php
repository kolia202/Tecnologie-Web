<img src="../utilities/img/Peluches-Home.png" alt="vetrina"/>
<h1>Il tuo negozio di Peluche<br>preferito!</h1>
<p>
    Benvenuto nel mondo dei peluches!<br>
    Scopri la nostra collezione di amici morbidosi, perfetti per coccole e regali. 
    Trova il peluche ideale per te e portalo a casa con un click!
</p>
<div class="text-center">
    <a href="#">
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
    <div class="box p-4 rounded shadow bg-white">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php foreach ($templateParams["prodotti"] as $index => $prodotto): ?>
                    <button type="button" data-bs-target="#carouselExampleIndicators" 
                            data-bs-slide-to="<?php echo $index; ?>" 
                            class="<?php echo $index === 0 ? 'active' : ''; ?>"
                            aria-label="Slide <?php echo $index + 1; ?>">
                    </button>
                <?php endforeach; ?>
            </div>
            <div class="carousel-inner">
                <?php foreach ($templateParams["prodotti"] as $index => $prodotto): ?>
                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                        <img src="<?php echo htmlspecialchars($prodotto['Immagine']); ?>" 
                             class="d-block w-100 rounded" 
                             alt="<?php echo htmlspecialchars($prodotto['Nome']); ?>">
                        <p class="text-center mt-3 fw-bold"><?php echo htmlspecialchars($prodotto['Nome']); ?></p>
                        <p class="text-center mt-1 text-danger fw-bold">
                            <?php echo number_format($prodotto['Prezzo'], 2); ?> €
                        </p>
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