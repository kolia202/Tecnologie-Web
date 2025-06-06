<div class="container mt-4 ps-4 pe-4 cont-account">
    <div class="d-flex align-items-center justify-content-center">
        <span class="bi bi-person-fill me-2" aria-hidden="true"></span>
        <h1 class="title mb-0">Gestione Utenti</h1>
    </div>
    <div class="container pe-0 ps-0 mt-3">
        <div class="row">
            <?php foreach ($utenti as $utente): ?>
                <div class="col-12 col-md-6 mb-2 p-3"> 
                    <div class="card shadow card-border">
                        <div class="card-body">
                            <h2 class="card-title fw-bold text mb-3">
                                <?php echo htmlspecialchars($utente['Nome'] . ' ' . $utente['Cognome']); ?>
                            </h2>
                            <p class="text mb-2"><strong>Email:</strong> <?php echo htmlspecialchars($utente['E_mail']); ?></p>
                            <p class="text mb-2"><strong>Telefono:</strong> <?php echo $utente["Numero_telefono"]  != null ? $utente['Numero_telefono'] : 'Non Disponibile' ?></p>
                            <p class="text mb-2"><strong>Data di Nascita:</strong> <?php echo $utente['Data_di_nascita'] != '0000-00-00' ? getFormattedDate($utente["Data_di_nascita"]) : 'Non Disponibile' ?></p>
                            <p class="text mb-2"><strong>Punti:</strong> <?php echo htmlspecialchars($utente['Punti']); ?></p>
                            <div class="text-center mt-3 mb-1">
                                <a href="gestioneAccount.php?email=<?php echo urlencode($utente['E_mail']); ?>" class="btn btn-danger btn-delete text w-75">
                                    Elimina Utente
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>