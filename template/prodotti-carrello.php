<h1 class="total-price">Carrello <i class="bi bi-cart-check"></i></h1>
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
                <span type="button" class="btn btn-sm fw-bold" style="background-color: black; color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px;">Esaurito</span>
            <?php endif; ?>
            <a href="../php/elimina-carrello.php?&id=<?php echo $prodotto["Id_prodotto"]; ?>">
                <button type="button" class="btn">
                    <i class="bi bi-trash3-fill custom-iProdotti "></i>
                </button>
            </a>
            <div class="d-flex">
                <p class="quanità-prodotti">Quantità:</p>
                <button type="button" class="btn decrease" id="<?php echo $prodotto["Id_prodotto"]; ?>">
                    <i class="bi bi-dash-circle"></i>
                </button>                
                <p class="quantity"><?php echo $prodotto["Quantita"]; ?></p>
                <button type="button" class="btn increase" id="<?php echo $prodotto["Id_prodotto"]; ?>">
                    <i class="bi bi-plus-circle"></i>
                </button>
            </div>
            <div class="stock-warning">
                Ops! Sembra che tu stia cercando di superare la disponibilità di questo prodotto!
            </div>
            <p class="product-price">Prezzo: <?php echo getFormattedPrice(($prodotto["Prezzo"] * $prodotto["Quantita"])); ?></p>
            <p class="product-points">Punti: <?php echo $prodotto["Prezzo_punti"] * $prodotto["Quantita"]; ?></p>
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