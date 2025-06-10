<div class="container mt-4 ps-4 pe-4 cont-orders">
    <?php if (isAdminLoggedIn()): ?>
        <h1 class="title mb-0">Gestione Ordini</h1>
        <p class="text mt-2">Qui trovi tutti gli ordini effettuati dagli utenti.</p>
    <?php else: ?>
        <h1 class="title mb-0">I tuoi Ordini</h1>
        <p class="text mt-2">Qui trovi tutti i peluche che hai acquistato finora!</p>
    <?php endif; ?>
    <div class="container mt-4 pt-1">
        <?php if(count($templateParams["ordini"]) == 0): ?>
            <div class="card card-empty shadow card-border ms-2 me-2 p-2">
                <div class="card-body">
                    <p class="text-italic">Oh no! Nessun ordine presente per ora!</p>
                </div>
            </div>
        <?php else: ?>
            <div class="row">
                <?php foreach($templateParams["ordini"] as $ordine): ?>
                    <div class="col-12 col-md-4 mb-4 pb-2 pe-1 ps-1">
                        <div class="card shadow card-border">
                            <div class="card-body">
                                <h2 class="mb-3 text fw-bold">Ordine #<?php echo $ordine["Id_ordine"] ?></h2>
                                <?php if (isAdminLoggedIn()): ?>
                                    <p class="text mb-2"><strong>Utente:</strong> <?php echo $ordine["E_mail"] ?></p>
                                    <p class="text mb-0"><strong>Stato: </strong><?php echo $ordine["Stato"]; ?></p>
                                    <div class="text-center">
                                        <button type="button" class="btn button-small fw-bold pt-0 pb-0 mb-2"
                                        data-bs-toggle="modal"
                                        data-bs-target="#order-<?php echo $ordine["Id_ordine"]; ?>"
                                        <?php echo $ordine['Stato'] == 'Consegnato' ? 'disabled' : '' ?>>
                                        Aggiorna
                                    </button>
                                    <div class="modal fade"
                                        id="order-<?php echo $ordine["Id_ordine"]; ?>"
                                        data-bs-backdrop="static"
                                        data-bs-keyboard="false"
                                        tabindex="-1"
                                        aria-labelledby="staticBackdropLabel-<?php echo $ordine["Id_ordine"]; ?>"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header pb-2">
                                                    <h1 class="title" id="staticBackdropLabel-<?php echo $ordine["Id_ordine"]; ?>">Aggiorna Stato</h1>
                                                    <button type="button" class="btn button-empty ms-auto" data-bs-dismiss="modal" aria-label="Close">
                                                        <span class="bi bi-x-lg" aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="ordini.php">
                                                        <input type="hidden" name="id_ordine" value="<?php echo $ordine['Id_ordine']; ?>">
                                                        <label for="stato-<?php echo $ordine['Id_ordine']; ?>" class="ps-1 d-block text-start text-italic">Stato</label>
                                                        <select class="form-control text text-input" name="stato" id="stato-<?php echo $ordine['Id_ordine']; ?>">
                                                            <option class="text-start text" value="In lavorazione">In lavorazione</option>
                                                            <option class="text-start text" value="Spedito">Spedito</option>
                                                            <option class="text-start text" value="Consegnato">Consegnato</option>
                                                        </select>
                                                        <div class="modal-footer mt-4">
                                                            <button type="button" class="btn button-outline me-auto ps-4 pe-4" data-bs-dismiss="modal">Annulla</button>
                                                            <button type="submit" class="btn button ms-auto ps-5 pe-5">Salva</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                </div>
                                    <p class="text mb-2"><strong>Data: </strong><?php echo getFormattedDate($ordine["Data_effettuazione"]) ?></p>
                                    <div class="text-center mt-3 mb-1">
                                        <a href="../php/dettaglioOrdine.php?id=<?php echo $ordine['Id_ordine'] ?>" class="btn button w-75">Riepilogo Ordine</a>
                                    </div>
                                <?php else: ?>
                                    <p class="text mb-2"><strong>Data: </strong><?php echo getFormattedDate($ordine["Data_effettuazione"]) ?></p>
                                    <p class="text mb-0"><strong>Stato: </strong><?php echo $ordine["Stato"]; ?></p>
                                    <div class="text-center mt-3">
                                        <a href="../php/tracciamento.php?id=<?php echo $ordine['Id_ordine'] ?>" class="btn button-outline w-75 mb-2">Traccia Ordine</a><br>
                                        <a href="../php/dettaglioOrdine.php?id=<?php echo $ordine['Id_ordine'] ?>" class="btn button w-75">Riepilogo Ordine</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="text-center mt-4">
        <a href="../php/account.php" class="text back">Indietro</a>
    </div>
</div>