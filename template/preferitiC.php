<div class="container mt-4 ps-4 pe-4 cont-prodotti">
    <div class="d-flex align-items-center justify-content-center gap-2">
        <i class="bi bi-balloon-heart"></i>
        <h1 class="title mb-0">Preferiti</h1>
    </div>
    <?php if (empty($templateParams["preferiti"])): ?>
        <div class="card shadow card-border mt-4 ms-2 me-2 p-2">
            <div class="card-body">
                <p class="text-italic mb-0">Non hai ancora aggiunto peluches ai preferiti!</p>
            </div>
        </div>
    <?php else: ?>
        <div class="row mt-4">
            <?php foreach ($templateParams["preferiti"] as $prodotto): ?>
                <div class="col-12 col-md-4 mb-4 mt-2"> 
                    <div class="text-center">
                        <a class="text-decoration-none" href="../php/dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>">
                            <img src="<?php echo IMG_DIR . $prodotto["Immagine"]; ?>" alt="<?php echo $prodotto["Nome"]; ?>" class="img-fluid shadow img-carrello favourite">
                            <h2 class="text mt-3 fw-bold mb-2"><?php echo htmlspecialchars($prodotto["Nome"]); ?></h2>
                        </a>
                        <div class="d-flex align-items-center justify-content-center gap-3">
                            <button type="button" class="btn button add-to-cart ps-3 pe-3" data-productid="<?php echo $prodotto["Id_prodotto"]; ?>">
                                Aggiungi al carrello
                            </button>
                            <a href="preferiti.php?azione=rimuovi&id_prodotto=<?php echo $prodotto["Id_prodotto"]; ?>" class="btn button-outline ps-3 pe-3">
                                Rimuovi
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>