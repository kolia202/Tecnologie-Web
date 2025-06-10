<div class="container mt-4 ps-4 pe-4 cont-accounts">
    <div class="d-flex align-items-center justify-content-center">
        <span class="bi bi-person-fill me-2" aria-hidden="true"></span>
        <h1 class="title mb-0">Gestione Utenti</h1>
    </div>
    <?php if (isset($_SESSION["eliminautente"])): ?>
        <div class="alert alert-success mt-3 text" role="alert">
            <span class="bi bi-check-circle align-center"></span>
            <?php echo $_SESSION["eliminautente"];
            unset($_SESSION['eliminautente']); ?>
        </div>             
    <?php endif; ?>
    <div class="container pt-1 mt-4">
        <div class="row">
            <?php if(empty($utenti)): ?>
                <div class="card shadow-sm card-border card-empty mx-auto">
                    <div class="card-body">
                        <p class="text-italic mb-0">Non sono ancora presenti utenti!</p>
                    </div>
                </div>
            <?php else: ?>
                <?php foreach ($utenti as $utente): ?>
                    <div class="col-12 col-md-6 mb-4 pb-2"> 
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
            <?php endif; ?>
        </div>
    </div>
    <div class="text-center mt-5">
        <a href="../php/account.php" class="text back">Indietro</a>
    </div>
</div>