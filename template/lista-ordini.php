<?php if (isAdminLoggedIn()): ?>
    <h1 class="account">Gestione ordini</h1>
    <p>Qui trovi tutti gli ordini effettuati dagli utenti.</p>
<?php else: ?>
    <h1 class="account">I tuoi ordini morbidosi!</h1>
    <p>Qui trovi tutti i peluche che hai acquistato finora!</p>
<?php endif; ?>

<div class="container ordercont mt-3">
<?php if(count($templateParams["ordini"]) == 0): ?>
    <div class="card ms-3 me-3">
        <div class="card-body text-center card-ordini">
            <p>Oh no! Nessun ordine per ora!</p>
            <a href="../php/prodotti.php" type="button" class="btn btn-sm fw-bold btn-avviso">Scopri tutti i nostri Peluches</a>
        </div>
    </div>
<?php else: ?>
    <?php foreach($templateParams["ordini"] as $ordine): ?>
        <div class="card ms-3 me-3 mb-3 card-ordini">
            <div class="card-body">
                <h2 class="mb-0 ordineid">Ordine #<?php echo $ordine["Id_ordine"] ?>  -  <?php echo $ordine["Stato"] ?></h2>
                <p><?php echo getFormattedDate($ordine["Data_effettuazione"]) ?></p>
                <?php if (isAdminLoggedIn()): ?>
                    <p><strong>Utente:</strong> <?php echo $ordine["E_mail"] ?></p>
                        <p><strong>Stato attuale: </strong><?php echo $ordine["Stato"]; ?></p>
                        <form method="POST">
                            <input type="hidden" name="id_ordine" value="<?php echo $ordine["Id_ordine"]; ?>">
                            <div class="mb-3">
                                <label for="stato" class="form-label fw-bold">Cambia Stato</label>
                                <select class="form-select inputlogin" name="stato" id="stato">
                                    <option value="In lavorazione">In lavorazione</option>
                                    <option value="Spedito">Spedito</option>
                                    <option value="Consegnato">Consegnato</option>
                                </select>
                            </div>
                            <div class="d-flex align-items-center">
                                <a href="../php/singolo-ordine.php?id=<?php echo $ordine["Id_ordine"] ?>" type="button" class="btn fw-bold ordinib me-3">Vedi Ordine</a>
                                <button type="submit" name="cambiaStato" class="btn fw-bold ordinib">Aggiorna Stato</button>
                            </div>
                        </form>
                <?php else: ?>
                    <a href="../php/tracciamento.php?id=<?php echo $ordine["Id_ordine"] ?>" type="button" class="btn fw-bold ordinib">Traccia il tuo ordine</a><br>
                    <a href="../php/singolo-ordine.php?id=<?php echo $ordine["Id_ordine"] ?>" type="button" class="btn fw-bold mt-2 ordinib">Dettagli Ordine</a>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
</div>
<div class="text-center">
    <a href="../php/account.php" type="button" class="btn btn-outline custom-indietro mb-4">Indietro</a>
</div>