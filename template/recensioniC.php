<div class="container mt-4 ps-4 pe-4 cont-reviews">
    <div class="d-flex align-items-center justify-content-center gap-2">
        <i class="bi bi-clipboard-heart"></i>
        <h1 class="title mb-0">Recensioni</h1>
    </div>
    <div class="text-center ms-4 me-4 mb-5">
        <div class="card card-media shadow-sm card-border mt-4 mx-auto">
            <h2 class="text fw-bold mt-3 mb-1">Valutazione media</h2>
            <div class="text-center">
                <p class="stars-rating mb-0"><?php echo getStarRating($mediaVoti); ?></p>
                <p class="text mb-0"><?php echo number_format($mediaVoti, 1); ?> / 5 su <?php echo number_format($templateParams["numeroRecensioni"]); ?> recensioni</p>
            </div>
            <p class="text-center mt-3">
                <span class="text text-success">
                    <i class="bi bi-emoji-smile-fill"></i> 
                    <?php echo $recensioniDistribuzione["positive"]["percent"]; ?>%  
                    <?php echo number_format($recensioniDistribuzione["positive"]["count"], 0, ',', '.'); ?> recensioni
                </span><br>
                <span class="text text-warning">
                    <i class="bi bi-emoji-neutral-fill"></i> 
                    <?php echo $recensioniDistribuzione["neutral"]["percent"]; ?>%  
                    <?php echo number_format($recensioniDistribuzione["neutral"]["count"], 0, ',', '.'); ?> recensioni
                </span><br>
                <span class="text text-danger">
                    <i class="bi bi-emoji-frown-fill"></i> 
                    <?php echo $recensioniDistribuzione["negative"]["percent"]; ?>%  
                    <?php echo number_format($recensioniDistribuzione["negative"]["count"], 0, ',', '.'); ?> recensioni
                </span>
            </p>
        </div>
    </div>
    <?php if (isUserLoggedIn() && !isAdminLoggedIn()): ?>
        <div class="text-center">
            <button type="button" class="btn button mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Scrivi una Recensione</button>
        </div>
    <?php endif; ?>
    <div class="row align-items-stretch"> 
        <?php foreach ($templateParams["recensioni"] as $recensione): ?>
            <div class="col-12 col-md-6 mb-4 ps-3 pe-3 d-flex"> 
                <div class="card shadow card-border p-1 w-100 card-review">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h3 class="text fw-bold mb-0 text-start"><?php echo htmlspecialchars($recensione["Nome"] . " " . $recensione["Cognome"]); ?></h3>
                        <p class="mt-1 mb-0 text-italic text-start"><?php echo getFormattedDate($recensione["Data"]) ?></p>
                        <p class="star-rating mb-0"><?php echo getStarRating($recensione["Voto"]); ?></p>
                        <p class="text text-start mt-2 mb-1"><?php echo htmlspecialchars($recensione["Commento"]); ?></p>
                        <?php if (isAdminLoggedIn()): ?>
                            <form method="POST" action="recensioni.php" class="mt-3 mb-2">
                                <input type="hidden" name="id-recensione" value="<?php echo htmlspecialchars($recensione['Id_recensione']); ?>">
                                <button type="submit" class="btn btn-danger btn-delete text w-100">Elimina Recensione</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="text-center mt-4">
        <a href="../php/index.php" class="text back">Indietro</a>
    </div>
</div>
    

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header pb-2">
                <h1 class="title" id="exampleModalLabel">Nuova Recensione</h1>
                <button type="button" class="btn button-empty ms-auto" data-bs-dismiss="modal" aria-label="Close">
                    <span class="bi bi-x-lg" aria-hidden="true"></span>                          
                </button>
            </div>
            <form id="reviewForm" action="recensioni.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="ps-1 pb-0 text-italic">Voto:</label>
                        <select class="form-control text text-input" id="voto" name="voto" required>
                            <option value="" disabled selected>Seleziona un voto</option>
                            <option value="1">1 - Pessimo</option>
                            <option value="2">2 - Scarso</option>
                            <option value="3">3 - Medio</option>
                            <option value="4">4 - Buono</option>
                            <option value="5">5 - Ottimo</option>
                        </select>
                    </div>
                    <div class="mb-0">
                        <label for="commento" class="ps-1 pb-0 text-italic">Commento:</label>
                        <textarea class="form-control text text-input" id="commento" name="commento" required></textarea>
                    </div>
                </div>
                <div class="modal-footer mt-2">
                    <button type="button" class="btn button-outline me-auto ps-4 pe-4" data-bs-dismiss="modal">Annulla</button>
                    <button type="submit" class="btn button ms-auto ps-5 pe-5">Salva</button>
                </div>
            </form>
        </div>
    </div>
</div>
