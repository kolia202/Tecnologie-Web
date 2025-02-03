<h1 class="text-center mb-4">Le Mie Recensioni</h1>
<?php if (!empty($templateParams["recensioni"])): ?>
    <div class="list-group">
        <?php foreach ($templateParams["recensioni"] as $recensione): ?>
            <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center flex-column flex-md-row">
                <div>
                    <strong>Voto:</strong> <?php echo htmlspecialchars($recensione['Voto']); ?>/5<br>
                    <strong>Commento:</strong> <?php echo htmlspecialchars($recensione['Commento']); ?><br>
                    <strong>Data:</strong> <?php echo htmlspecialchars($recensione['Data']); ?>
                </div>
                <form method="POST" action="">
                    <input type="hidden" name="id_recensione" value="<?php echo $recensione['Id_recensione']; ?>">
                    <button type="submit" class="btn btn-danger btn-sm">Elimina</button>
                </form>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
            <div class="alert alert-warning text-center">Non hai ancora scritto recensioni.
            </div>
            <?php endif; ?>
            <div class="text-center mt-4">
                <a href="../php/recensioni.php" class="btn btn-sm fw-bold text-white" style="background-color: rgb(137, 85, 32); font-size: 14px;">Invia una recensione</a>
            </div>