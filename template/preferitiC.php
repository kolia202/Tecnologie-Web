<h1 class="text-center favorite-store-titlee">I tuoi Preferiti</h1>
<article class="container mt-4">
    <?php if (empty($templateParams["preferiti"])): ?>
        <p class="text-center">Non hai ancora aggiunto prodotti ai preferiti.</p>
    <?php else: ?>
        <div class="row">
            <?php foreach ($templateParams["preferiti"] as $prodotto): ?>
                <div class="col-12 col-lg-4 mb-4"> 
                    <div class="card shadow-sm h-100">
                        <div class="card-body text-center">
                            <img src="<?php echo IMG_DIR . $prodotto["Immagine"]; ?>" 
                                 alt="<?php echo $prodotto["Nome"]; ?>" 
                                 class="img-fluid mb-3">
                            <h5 class="card-title"><?php echo htmlspecialchars($prodotto["Nome"]); ?></h5>
                            <p class="card-text"><strong>Prezzo:</strong> €<?php echo number_format($prodotto["Prezzo"], 2); ?></p>
                            <div class="d-grid gap-2">
                                <a href="dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>" 
                                   class="btn btn-primary">
                                   Vedi Dettagli
                                </a>
                                <a href="preferiti.php?azione=rimuovi&id_prodotto=<?php echo $prodotto["Id_prodotto"]; ?>" 
                                   class="btn btn-danger">
                                   Rimuovi dai Preferiti
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</article>
