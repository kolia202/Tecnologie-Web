<h1 class="text-center mb-4 favorite-store-titlee">Le tue Notifiche <i class="bi bi-bell-fill"></i></h1>
<p class="notifiche-p text-center">Tieni d'occhio questa pagina per rimanere aggiornato su tutte le novità!</p>
<?php if(count($templateParams["notifiche"]) == 0): ?>
    <div class="card ms-3 me-3">
        <div class="card-body text-center">
            <p class="notifiche-p text-center">Nessuna nuova notifica!</p>
        </div>
    </div>
<?php else: ?>
    <?php foreach($templateParams["notifiche"] as $notifica): ?>
        <div class="container ordercont">
        <div class="card ms-4 me-4 mb-3">
            <div class="card-body">
                <?php if($notifica["Stato"] == 0): ?>
                    <span class="position-absolute top-0 start-100 translate-middle p-2 border border-light rounded-circle nuova-notifica">
                        <span class="visually-hidden">New alerts</span>
                    </span>
                <?php else: ?>
                    <span class="position-absolute top-0 start-100 translate-middle p-2 border border-light rounded-circle notifica-letta">
                        <span class="visually-hidden">New alerts</span>
                    </span>
                <?php endif; ?>
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="mt-1 notifichetitolo"><?php echo $notifica["Tipo_notifica"] ?></h2>
                    <button type="button" class="btn btn-outline leggi-notifica">Leggi</button>
                </div>
                <p class="mb-0"><?php echo getFormattedDate($notifica["Giorno"]) ?></p>
                <input type="hidden" class="stato-notifica" value="<?php echo $notifica["Stato"]; ?>"/>
                <p class="messaggio-notifica mb-0 mt-2"><?php echo $notifica["Testo"] ?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <button type="button" class="btn btn-outline chiudi-notifica mt-2">Chiudi</button>
                    <form action="notifiche.php" method="POST">
                        <button type="submit" class="btn elimina-notifica" name="eliminanotifica" value="<?php echo $notifica["Id_notifica"] ?>">Elimina</button>
                    </form>
                </div>
            </div>
        </div>  
        </div>      
    <?php endforeach; ?>
<?php endif; ?>
<div class="text-center">
    <a href="../php/account.php" type="button" class="btn btn-outline custom-indietro mb-4">Indietro</a>
</div>