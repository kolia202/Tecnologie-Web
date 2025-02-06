<?php if(!isUserLoggedIn()) : ?>
    <p class="mt-2 ps-3 pe-3">Per visualizzare il carrello, accedi al tuo account.</p>
    <div class="text-center mt-4">
        <a href="../php/account.php" class="btn fw-bold ps-4 pe-4 accesso">Accedi</a>
    </div>
<?php else: ?>
    <?php if(count($templateParams["carrello"]) == 0): ?>
        <article>
            <p class="mt-2 ps-3 pe-3">Il tuo carrello è vuoto.</p>
            <div class="text-center mt-4">
                <a href="../php/prodotti.php" class="btn fw-bold ps-3 pe-3 vuoto">Vai al Negozio</a>
            </div>
        </article>
    <?php
        else:
            foreach($templateParams["carrello"] as $prodotto): ?>
                <section class="d-flex align-items-center mt-1 mb-1">
                    <a href="../php/dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>" class="cartmenu-item">
                        <img src="<?php echo IMG_DIR.$prodotto["Immagine"]; ?>" class="img-fluid" alt=""/>
                    </a>
                    <div class="d-flex flex-column pt-3 pe-3 cartmenu-info">
                        <a href="../php/dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>">
                            <p class="mb-1 fw-bold"><?php echo $prodotto["Nome"]; ?></p>
                        </a>
                        <p class="text-muted"><?php echo $prodotto["Quantita"] . " x " . getFormattedPrice($prodotto["Prezzo"]); ?></p>
                    </div>
                </section>
            <?php endforeach; ?>
            <div class="text-center mt-4">
                <h3>Totale Carrello: <?php echo getFormattedPrice($totale); ?></h3>        
                <a href="../php/carrello.php" class="btn fw-bold ps-3 pe-3 mt-5 vaicarrello">Visualizza Carrello</a>
            </div>
    <?php endif; ?>
<?php endif; ?>