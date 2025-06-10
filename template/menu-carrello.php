<?php if(!isUserLoggedIn()) : ?>
    <p class="mt-2 ps-3 pe-3 text-italic">Per visualizzare il carrello, accedi al tuo account.</p>
    <div class="text-center mt-4">
        <a href="../php/login.php" class="btn mt-2 ps-4 pe-4 button">Accedi</a>
    </div>
<?php else: ?>
    <?php if(count($templateParams["carrello"]) == 0): ?>
        <section class="border-0">
            <p class="mt-2 ps-3 pe-3 text-italic">Il tuo carrello è vuoto.</p>
            <div class="text-center mt-4">
                <a href="../php/prodotti.php" class="btn mt-2 ps-3 pe-3 button">I nostri Peluches</a>
            </div>
        </section>
    <?php
        else:
            foreach($templateParams["carrello"] as $prodotto): ?>
                <section class="d-flex align-items-center mb-1">
                    <a href="../php/dettaglioProdotto.php?id=<?php echo $prodotto['Id_prodotto']; ?>" class="cartmenu-item">
                    <img class="img-fluid" alt="Peluche <?php echo htmlspecialchars($prodotto['Nome']); ?>" src="<?php echo IMG_DIR.$prodotto['Immagine']; ?>" />
                </a>
                    <div class="d-flex flex-column pt-3 pe-3 cartmenu-info">
                        <a href="../php/dettaglioProdotto.php?id=<?php echo $prodotto['Id_prodotto']; ?>">
                            <p class="mb-1 fw-bold"><?php echo $prodotto["Nome"]; ?></p>
                        </a>
                        <p class="text-muted text-italic"><?php echo $prodotto["Quantita"] . " x " . getFormattedPrice($prodotto["Prezzo"]); ?></p>
                    </div>
                </section>
            <?php endforeach; ?>
            <div class="text-center mt-4">
                <h3><strong>Totale Carrello:</strong> <?php echo getFormattedPrice($totale); ?></h3>        
                <a href="../php/carrello.php" class="btn ps-3 pe-3 mt-5 button">Visualizza Carrello</a>
            </div>
    <?php endif; ?>
<?php endif; ?>