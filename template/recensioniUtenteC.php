<div class="container mt-4 ps-4 pe-4 cont-userreviews">
    <h1 class="title mb-4">Le mie Recensioni</h1>
    <div class="text-center mb-4">
        <a href="../php/recensioni.php" class="btn button-light">Scrivi una Recensione</a>
    </div>
    <?php if (!empty($templateParams["recensioni"])): ?> 
        <?php foreach ($templateParams["recensioni"] as $recensione): ?>
            <div class="card card-border shadow mb-4 ms-1 me-1">
                <div class="card-body d-flex align-items-center gap-3">
                    <div>
                        <p class="text text-start mb-0"><strong>Voto: <?php echo getStarRating($recensione["Voto"]); ?></strong></p>
                        <p class="text text-start mb-0"><strong>Data:</strong> <?php echo htmlspecialchars($recensione['Data']); ?></p>
                        <p class="text text-start mb-0"><strong>Commento:</strong><br/><?php echo htmlspecialchars($recensione['Commento']); ?></p>
                    </div>
                    <div class="ms-auto">
                        <button type="button" class="btn button-outline ps-3 pe-3 pt-1 pb-1" data-bs-toggle="modal" data-bs-target="#modificarecensione">  
                            Modifica
                        </button>
                        <form method="POST" action="recensioniUtente.php">
                            <input type="hidden" name="id_recensione" value="<?php echo htmlspecialchars($recensione['Id_recensione']); ?>">
                            <button type="submit" class="btn button ps-4 pe-4 pt-1 pb-1 mt-3">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modificarecensione" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="title">Modifica Recensione</h1>
                            <button type="button" class="btn button-empty ms-auto" data-bs-dismiss="modal" aria-label="Close">
                                <span class="bi bi-x-lg" aria-hidden="true"></span>
                            </button>
                        </div>
                        <div class="modal-body pt-0">
                            <form action="recensioniUtente.php" method="POST">
                                <div class="mb-3">
                                    <label class="text-italic ps-1 mb-0" for="voto">Voto</label>
                                    <select class="form-control text text-input" id="voto" name="voto" required>
                                        <option class="text-italic text-start" value="" disabled <?php if(empty($recensione["Voto"])) echo "selected"; ?>>Seleziona un Voto</option>
                                        <option class="text-start text" value="1" <?php echo 1 == $recensione["Voto"] ? 'selected' : '' ?>>1 - Pessimo</option>
                                        <option class="text-start text" value="2" <?php echo 2 == $recensione["Voto"] ? 'selected' : '' ?>>2 - Scarso</option>
                                        <option class="text-start text" value="3" <?php echo 3 == $recensione["Voto"] ? 'selected' : '' ?>>3 - Medio</option>
                                        <option class="text-start text" value="4" <?php echo 4 == $recensione["Voto"] ? 'selected' : '' ?>>4 - Buono</option>
                                        <option class="text-start text" value="5" <?php echo 5 == $recensione["Voto"] ? 'selected' : '' ?>>5 - Ottimo</option>
                                    </select>
                                </div>
                                <div class="mb-0">
                                    <label class="text-italic ps-1 mb-0" for="commento">Commento</label>
                                    <textarea rows="4" class="form-control text text-input" id="commento" name="commento" required><?php echo $recensione["Commento"]; ?></textarea>
                                    <input type="hidden" name="idrecensione" value="<?php echo $recensione["Id_recensione"]; ?>">
                                </div>
                                <div class="modal-footer mt-4">
                                    <button type="button" class="btn button-outline me-auto ps-4 pe-4" data-bs-dismiss="modal">Annulla</button>
                                    <button type="submit" class="btn button ms-auto ps-5 pe-5" name="modificarecensione">Salva</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="card card-empty shadow-sm card-border ms-1 me-1 mb-4">
            <div class="card-body">
                <p class="text-italic">Non hai ancora lasciato recensioni!</p>
            </div>
        </div>
    <?php endif; ?>
    <div class="text-center mt-5">
        <a href="../php/account.php" class="text back">Indietro</a>
    </div>
</div>