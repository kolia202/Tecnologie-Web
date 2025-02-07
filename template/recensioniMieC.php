<h1 class="text-center mb-4 favorite-store-title ">Le Mie Recensioni <i class="bi bi-mailbox-flag"></i></h1>
<?php if (!empty($templateParams["recensioni"])): ?>
    <div class="container mt-4">
    <div class="row">  
        <?php foreach ($templateParams["recensioni"] as $recensione): ?>
            <div class="col-md-12 col-lg-6 mb-4"> 
                <div class="card p-3 border custom-border">
                    <strong>Voto: <?php echo getStarRating($recensione["Voto"]); ?><br></strong> 
                    <strong>Commento:</strong> <?php echo nl2br(htmlspecialchars($recensione['Commento'])); ?><br>
                    <strong>Data:</strong> <?php echo htmlspecialchars($recensione['Data']); ?>
                <form method="POST" action="">
                    <input type="hidden" name="id_recensione" value="<?php echo htmlspecialchars($recensione['Id_recensione']); ?>">
                    <button type="submit" class="btn btn-danger btn-sm custon-sm">Elimina</button>
                </form>
            </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php else: ?>
    <div class="alert alert-warning text-center">Non hai ancora scritto recensioni.</div>
    <?php endif; ?>
    <div class="text-center mt-4 cusotm-mt4">
        <a href="../php/recensioni.php" class="btn btn-sm fw-bold text-white custom-btnRec">Invia una recensione</a>
    </div>
<div class="text-center">
    <a href="../php/account.php" type="button" class="btn btn-outline custom-indietro mb-4">Indietro</a>
</div>