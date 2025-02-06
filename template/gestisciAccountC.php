<h1 class="mb-4 text-center favorite-store-titlee">Gestione Utenti <i class="bi bi-person-fill"></i></h1>
<div class="container mt-4">
    <div class="row">
        <?php foreach ($utenti as $utente): ?>
            <div class="col-12 col-lg-6 mb-4 custom-cardmt"> 
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">
                            <?php echo htmlspecialchars($utente['Nome'] . ' ' . $utente['Cognome']); ?>
                        </h5>
                        <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($utente['E_mail']); ?></p>
                        <p class="card-text"><strong>Telefono:</strong> <?php echo htmlspecialchars($utente['Numero_telefono']); ?></p>
                        <p class="card-text"><strong>Data di Nascita:</strong> <?php echo htmlspecialchars($utente['Data_di_nascita']); ?></p>
                        <p class="card-text"><strong>Punti:</strong> <?php echo htmlspecialchars($utente['Punti']); ?></p>
                        <div class="text-center mt-3">
                            <a href="gestisciAccount.php?email=<?php echo urlencode($utente['E_mail']); ?>" 
                               class="btn btn-danger w-100" 
                               onclick="return confirm('Sei sicuro di voler eliminare questo utente?');">
                               Elimina Utente
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>