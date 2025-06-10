<div class="container mt-4 ps-4 pe-4 cont-prodotti">
    <div class="d-flex align-items-center justify-content-center mb-3">
        <span class="bi bi-bag-heart-fill me-2 mb-1" aria-hidden="true"></span>
        <h1 class="title mb-0">Carrello</h1>
    </div>
    <?php if(count($templateParams["carrello"]) == 0): ?>
        <p class="text mt-5">Il tuo carrello è vuoto.</p>
        <div class="text-center mt-4">
            <a href="../php/prodotti.php" class="btn button">Torna al negozio</a>
        </div>
    <?php else: 
        $prodottiesauriti = false; ?>
        <div class="row mt-4">
            <?php foreach($templateParams["carrello"] as $prodotto): ?>
                <div class="col-12 col-md-4 mb-4 mt-1">
                    <section class="text-center">
                        <a class="text-decoration-none" href="../php/dettaglioProdotto.php?id=<?php echo $prodotto['Id_prodotto']; ?>">
                            <img class="shadow img-carrello img-fluid" src="<?php echo IMG_DIR.$prodotto['Immagine']; ?>" alt="Immagine di <?php echo htmlspecialchars($prodotto['Nome']); ?>"/>
                            <h2 class="text mt-3 fw-bold mb-1"><?php echo $prodotto["Nome"]; ?></h2>
                        </a>
                        <?php if($prodotto["Scorta"] <= 0):
                            $prodottiesauriti = true; ?>
                            <span class="btn button-black fw-bold mb-2 mt-1 pt-0 pb-0 ps-2 pe-2">Esaurito</span>
                        <?php else: ?>
                            <div class="d-flex align-items-center justify-content-center gap-1">
                                <p class="text mb-0">Quantità:</p>
                                <button type="button" class="btn ps-2 pe-2 pt-0 pb-0 button-empty decrease" id="decrease-<?php echo $prodotto['Id_prodotto']; ?>" data-productid="<?php echo $prodotto['Id_prodotto']; ?>">
                                    <span class="bi bi-dash-circle" aria-hidden="true"></span>
                                </button>
                                <p class="m-0 text quantity"><?php echo $prodotto["Quantita"]; ?></p>
                                <button type="button" class="btn ps-2 pe-2 pt-0 pb-0 button-empty increase" id="increase-<?php echo $prodotto['Id_prodotto']; ?>" data-productid="<?php echo $prodotto['Id_prodotto']; ?>">
                                    <span class="bi bi-plus-circle" aria-hidden="true"></span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <div class="stock-warning card-border rounded pt-2 pb-2 ps-3 pe-3 ms-3 me-3 mt-2 mb-2">
                            <p class="text-italic mb-0">Ops! Non puoi superare la disponibilità di questo prodotto.</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <p class="product-price text mb-2">Prezzo: <?php echo getFormattedPrice(($prodotto["Prezzo"] * $prodotto["Quantita"])); ?></p>
                            <p class="ms-2 me-2 text mb-2">-</p>
                            <p class="product-points text mb-2"><?php echo $prodotto["Prezzo_punti"] * $prodotto["Quantita"]; ?> punti</p>
                        </div>
                        <a class="btn button-outline ps-4 pe-4" href="../php/carrello.php?&id=<?php echo $prodotto['Id_prodotto']; ?>">
                            <span class="bi bi-trash3-fill me-1" aria-hidden="true"></span>
                            Rimuovi
                        </a>
                    </section>
                </div>
            <?php endforeach; ?>
        </div>
        <h2 class="total-price text pt-2"><strong>Totale Carrello:</strong> <?php echo getFormattedPrice($totale); ?></h2>
        <?php if ($prodottiesauriti): ?>
            <div class="stock-warning card-border card-empty d-block mt-4 rounded pt-2 pb-2 ps-3 pe-3 ms-3 me-3">
                <p class="text-italic mb-0">Ops! Alcuni prodotti nel tuo carrello sono esauriti. Rimuovili per poter completare il tuo ordine!</p>
            </div>
        <?php else: ?> 
            <div class="text-center mt-4">
                <a href="../php/spedizione.php" class="btn button ps-4 pe-4">Procedi con l'ordine</a>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>
