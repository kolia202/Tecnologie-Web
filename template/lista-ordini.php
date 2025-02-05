<?php if (isAdminLoggedIn()): ?>
    <h1>Gestione ordini</h1>
    <p>Qui trovi tutti gli ordini effettuati dagli utenti.</p>
<?php else: ?>
    <h1>I tuoi ordini morbidosi!</h1>
    <p>Qui trovi tutti i peluche che hai acquistato finora!</p>
<?php endif; ?>

<?php if(count($templateParams["ordini"]) == 0): ?>
    <div class="card ms-3 me-3" style="border-color: rgb(245, 222, 179);">
        <div class="card-body text-center">
            <p>Oh no! Nessun ordine per ora! Scopri la nostra collezione e troverai i peluches perfetti per te!</p>
            <a href="../php/prodotti.php" type="button" class="btn btn-sm fw-bold" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Scopri tutti i nostri Peluches</a>
        </div>
    </div>
<?php else: ?>
    <?php foreach($templateParams["ordini"] as $ordine): ?>
        <div class="card ms-3 me-3 mb-3" style="border-color: rgb(245, 222, 179);">
            <div class="card-body">
                <h2 class="mb-0" style="font-size: 20px;">Ordine #<?php echo $ordine["Id_ordine"] ?>  -  <?php echo $ordine["Stato"] ?></h2>
                <p style="font-size:15px;"><?php echo getFormattedDate($ordine["Data_effettuazione"]) ?></p>
                <a href="../php/tracciamento.php?id=<?php echo $ordine["Id_ordine"] ?>" type="button" class="btn fw-bold" style="background-color: rgb(204, 153, 102); color: white;">Traccia il tuo ordine</a>
                <a href="../php/singolo-ordine.php?id=<?php echo $ordine["Id_ordine"] ?>" type="button" class="btn fw-bold" style="background-color: rgb(204, 153, 102); color: white;">Dettagli Ordine</a>
                <p style="font-size:15px;">Data: <?php echo getFormattedDate($ordine["Data_effettuazione"]) ?></p>
                
                <?php if (isAdminLoggedIn()): ?>
                    <p><strong>Utente:</strong> <?php echo $ordine["E_mail"] ?></p>
                    <a href="../php/singolo-ordine.php?id=<?php echo $ordine["Id_ordine"] ?>" type="button" class="btn fw-bold" style="background-color: rgb(204, 153, 102); color: white;">Vedi Ordine</a>
                    <div class="container mt-5">
        <h1>Gestisci Ordine #<?php echo $ordine["Id_ordine"]; ?></h1>
        <p>Stato attuale: <strong><?php echo $ordine["Stato"]; ?></strong></p>
        <form method="POST">
    <input type="hidden" name="id_ordine" value="<?php echo $ordine["Id_ordine"]; ?>">
    <div class="mb-3">
        <label for="stato" class="form-label">Cambia Stato</label>
        <select class="form-select" name="stato" id="stato">
            <option value="In lavorazione">In lavorazione</option>
            <option value="Spedito">Spedito</option>
            <option value="Consegnato">Consegnato</option>
        </select>
    </div>
    </div>
    <button type="submit" name="cambiaStato" class="btn btn-primary">Aggiorna Stato</button>
</form>

                <?php else: ?>
                    <a href="#" type="button" class="btn fw-bold" style="background-color: rgb(204, 153, 102); color: white;">Traccia il tuo ordine</a>
                    <a href="../php/singolo-ordine.php?id=<?php echo $ordine["Id_ordine"] ?>" type="button" class="btn fw-bold" style="background-color: rgb(204, 153, 102); color: white;">Dettagli Ordine</a>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>