<h1 class="text-center favorite-store-titlee">
    I tuoi Preferiti
    <i class="bi bi-balloon-heart"></i>
</h1>
<article class="container mt-4 pe-4 ps-4">
    <?php if (empty($templateParams["preferiti"])): ?>
        <p class="text-center preferitip">Non hai ancora aggiunto prodotti ai preferiti.</p>
    <?php else: ?>
        <div class="row">
            <?php foreach ($templateParams["preferiti"] as $prodotto): ?>
                <div class="col-12 col-md-4 mb-4"> 
                    <div class="card-body text-center">
                        <img src="<?php echo IMG_DIR . $prodotto["Immagine"]; ?>" 
                                alt="<?php echo $prodotto["Nome"]; ?>" 
                                class="img-fluid mb-3">
                        <h5 class="card-title"><?php echo htmlspecialchars($prodotto["Nome"]); ?></h5>
                        <p class="card-text"><strong>Prezzo:</strong> €<?php echo number_format($prodotto["Prezzo"], 2); ?></p>
                        <div class="d-grid gap-2">
                            <a href="dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>" 
                                class="btn prefeb">
                                Vedi Dettagli
                            </a>
                            <a href="preferiti.php?azione=rimuovi&id_prodotto=<?php echo $prodotto["Id_prodotto"]; ?>" class="btn btn-outline-danger rimuoviprefe">
                                Rimuovi dai Preferiti
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</article>
