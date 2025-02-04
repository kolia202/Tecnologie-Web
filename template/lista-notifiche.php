<h1>Le tue Notifiche</h1>
<p>Tieni d'occhio questa pagina per rimanere aggiornato su tutte le novità!</p>
<?php if(count($templateParams["notifiche"]) == 0): ?>
    <div class="card ms-3 me-3" style="border-color: rgb(245, 222, 179);">
        <div class="card-body text-center">
            <p style="font-weight: bold">Nessuna nuova notifica!</p>
        </div>
    </div>
<?php else: ?>
    <?php foreach($templateParams["notifiche"] as $notifica): ?>
        <div class="card ms-4 me-4 mb-3" style="border-color: rgb(245, 222, 179);">
            <div class="card-body">
                <?php if($notifica["Stato"] == 0): ?>
                    <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle nuova-notifica">
                        <span class="visually-hidden">New alerts</span>
                    </span>
                <?php else: ?>
                    <span class="position-absolute top-0 start-100 translate-middle p-2 border border-light rounded-circle nuova-notifica" style="background-color: green">
                        <span class="visually-hidden">New alerts</span>
                    </span>
                <?php endif; ?>
                <p class="mb-0" style="font-size: 12px"><?php echo getFormattedDate($notifica["Giorno"]) ?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="mt-1" style="font-size: 15px;"><?php echo $notifica["Tipo_notifica"] ?></h2>
                    <button type="button" class="btn btn-outline-primary leggi-notifica" style="font-size: 12px">Leggi</button>
                </div>
                <input type="hidden" class="stato-notifica" value="<?php echo $notifica["Stato"]; ?>"/>
                <p class="messaggio-notifica mb-0 mt-2" style="display: none;"><?php echo $notifica["Testo"] ?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <button type="button" class="btn btn-outline-primary chiudi-notifica" style="font-size: 12px; display: none;">Chiudi</button>
                    <form action="notifiche.php" method="POST">
                        <button style="display: none;" type="submit" class="btn btn-primary elimina-notifica" name="eliminanotifica" value="<?php echo $notifica["Id_notifica"] ?>">Elimina</button>
                    </form>
                </div>
            </div>
        </div>        
    <?php endforeach; ?>
<?php endif; ?>