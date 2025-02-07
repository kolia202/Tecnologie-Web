<h1 class="account">Carrello <i class="bi bi-cart-check"></i></h1>
<?php 
    if(count($templateParams["carrello"]) == 0): ?>
    <article>
        <p class="nomeProdottoC">Il tuo carrello è vuoto</p>
        <div class="text-center">
            <a href="../php/prodotti.php" class="btn btn-sm fw-bold custom-spedizioneButton2">Torna al negozio</a>
        </div>
    </article>
<?php else: 
    $prodottiesauriti = false; ?>
    <div class="row mt-4">
    <?php foreach($templateParams["carrello"] as $prodotto): ?>
        <div class="col-12 col-md-4 mb-5">
        <section class="custom-col">
            <a class="prodotto-carrello-a" href="../php/dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>">
                <img class="imgCar" src="<?php echo IMG_DIR.$prodotto["Immagine"]; ?>" class="img-fluid" alt=""/>
                <h2 class="nomeProdottoC"><?php echo $prodotto["Nome"]; ?></h2>
            </a>
            <?php if($prodotto["Scorta"] <= 0):
                $prodottiesauriti = true; ?>
                <span type="button" class="btn btn-sm fw-bold blackb">Esaurito</span>
            <?php endif; ?>
            <p class="text-center mb-0">Quantità:</p>
            <div class="d-flex align-items-center justify-content-center gap-1">
                <button type="button" class="btn p-0 decrease" id="<?php echo $prodotto["Id_prodotto"]; ?>">
                    <i class="bi bi-dash-circle"></i>
                </button>
                <p class="m-0 text-center quantity" style="min-width: 30px;"><?php echo $prodotto["Quantita"]; ?></p>
                <button type="button" class="btn p-0 increase" id="<?php echo $prodotto["Id_prodotto"]; ?>">
                    <i class="bi bi-plus-circle"></i>
                </button>
            </div>
            <div class="stock-warning">
                Ops! Sembra che tu stia cercando di superare la disponibilità di questo prodotto!
            </div>
            <p class="product-price mt-2">Prezzo: <?php echo getFormattedPrice(($prodotto["Prezzo"] * $prodotto["Quantita"])); ?></p>
            <p class="product-points">Punti: <?php echo $prodotto["Prezzo_punti"] * $prodotto["Quantita"]; ?></p>
            <a class="btn btn-outline rimuovicarrello" href="../php/elimina-carrello.php?&id=<?php echo $prodotto["Id_prodotto"]; ?>">
                <i class="bi bi-trash3-fill custom-iProdotti "></i>
                Rimuovi Prodotto
            </a>
        </section>
            </div>
    <?php endforeach; ?>
            </div>
    <h2 class="total-price">Totale Carrello: <?php echo getFormattedPrice($totale); ?></h2>
    <?php if ($prodottiesauriti): ?>
        <p class="p-avviso">Oops! Sembra che alcuni prodotti nel tuo carrello siano esauriti. Rimuovili per poter completare il tuo ordine!</p>
    <?php endif; ?> 
    <div class="text-center">
        <a href="../php/spedizione.php" class="btn btn-sm fw-bold custom-spedizioneButton <?php echo $prodottiesauriti ? 'disabled' : ''; ?>">Procedi con l'ordine</a>
    </div>
<?php endif; ?>