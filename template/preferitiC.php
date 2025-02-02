<article>
    <h1>I tuoi Preferiti</h1>
    <?php if (empty($templateParams["preferiti"])): ?>
        <p>Non hai ancora aggiunto prodotti ai preferiti.</p>
    <?php else: ?>
        <div class="product-list">
            <?php foreach ($templateParams["preferiti"] as $prodotto): ?>
                <div class="product-item">
                    <img src="<?php echo IMG_DIR . $prodotto["Immagine"]; ?>" alt="<?php echo $prodotto["Nome"]; ?>" width="100">
                    <h2><?php echo $prodotto["Nome"]; ?></h2>
                    <p>Prezzo: €<?php echo number_format($prodotto["Prezzo"], 2); ?></p>
                    <a href="dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>">Vedi Dettagli</a>
                    <a href="preferitiC.php?azione=rimuovi&id_prodotto=<?php echo $prodotto["Id_prodotto"]; ?>">Rimuovi dai Preferiti</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</article>
