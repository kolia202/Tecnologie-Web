<div class="container mt-4 ps-4 pe-4 cont-notifiche">
    <div class="d-flex align-items-center justify-content-center gap-2">
        <span class="bi bi-chat-heart" aria-hidden="true"></span>
        <h1 class="title mb-0">Notifiche</h1>
    </div>
    <p class="text mt-2">Tieni d'occhio questa pagina per rimanere aggiornato su tutte le novità!</p>
    <?php if(count($templateParams["notifiche"]) == 0): ?>
        <div class="card shadow-sm card-border card-empty ms-2 me-2 p-2">
            <div class="card-body">
                <p class="text-italic">Nessuna nuova notifica!</p>
            </div>
        </div>
    <?php else: ?>
        <form action="notifiche.php" method="POST">
            <div class="text-center mb-3">
                <button type="submit" class="btn button-light ps-4 pe-4 mb-1" name="eliminanotifiche">Elimina tutte</button>
            </div>
        </form>
        <?php foreach($templateParams["notifiche"] as $notifica): ?>
            <div class="container mb-3 ps-1 pe-1">
                <div class="card shadow card-border p-1">
                    <div class="card-body">
                        <h2 class="text text-start fw-bold mb-0"><?php echo $notifica["Tipo_notifica"] ?></h2>
                        <?php if($notifica["Stato"] == 0): ?>
                            <span class="btn button-black fw-bold pt-0 pb-0 ps-2 pe-2 nuova-notifica">Da leggere</span>
                        <?php else: ?>
                            <span class="btn button-black fw-bold pt-0 pb-0 ps-2 pe-2 notifica-letta">Letta</span>
                        <?php endif; ?>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mt-1 mb-0 text-italic text-start"><?php echo getFormattedDate($notifica["Giorno"]) ?></p>
                            <button type="button" class="btn button ps-3 pe-3 pt-0 pb-0 leggi-notifica">Leggi</button>
                        </div>
                        <input type="hidden" class="stato-notifica" value="<?php echo $notifica["Stato"]; ?>"/>
                        <p class="text text-start messaggio-notifica mt-2"><?php echo $notifica["Testo"] ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="button" class="btn button-outline pt-0 pb-0 ps-3 pe-3 chiudi-notifica">Chiudi</button>
                            <form action="notifiche.php" method="POST">
                                <button type="submit" class="btn button pt-0 pb-0 ps-3 pe-3 me-2 elimina-notifica" name="eliminanotifica" value="<?php echo $notifica['Id_notifica'] ?>">Elimina</button>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>      
        <?php endforeach; ?>
    <?php endif; ?>
    <div class="text-center mt-4">
        <a href="../php/account.php" class="text back">Indietro</a>
    </div>
</div>