<?php if (isAdminLoggedIn()): ?>
    <div class="container mt-4 ps-4 pe-4 cont-account">
        <h1 class="title">Account Admin</h1>
        <section class="card p-4 mb-4 mt-4 card-account shadow">
            <div class="d-flex align-items-center justify-content-center">
                <i class="bi bi-person-circle me-2"></i>
                <h2 class="fw-bold text mb-0">Ciao, <?php echo $userDetails["Nome"] ?>!</h2>
            </div>
            <div class="d-flex flex-column align-items-center mt-3">
                <p class="text"><strong>Nome: </strong><?php echo $userDetails["Nome"] . " " . $userDetails["Cognome"]; ?></p>
                <p class="text"><strong>Email: </strong><?php echo $userDetails["E_mail"] ?></p>
                <p class="text"><strong>Telefono: </strong><?php echo $userDetails["Numero_telefono"]  != null ? $userDetails['Numero_telefono'] : 'Non Disponibile' ?></p>
                <p class="text"><strong>Data di Nascita: </strong><?php echo $userDetails['Data_di_nascita'] != '0000-00-00' ? getFormattedDate($userDetails["Data_di_nascita"]) : 'Non Disponibile' ?></p>
                <div class="d-flex align-items-center mt-4 mb-2">
                    <form method="POST" action="login.php">
                        <button type="submit" name="logout" class="btn button me-2 ps-4 pe-4">Logout</button>
                    </form>
                    <a href="../php/index.php" class="btn ms-2 button ps-4 pe-4">Torna alla Home</a>       
                </div>
            </div>
        </section>
        <section class="card p-4 shadow card-account">
            <h3 class="text fw-bold">Attività Admin</h3>
            <div class="row mb-3 mt-3">
                <div class="col-6">
                    <a href="../php/notifiche.php" type="button" class="btn button-light w-100 position-relative d-flex align-items-center justify-content-center">
                        <i class="bi bi-bell ms-1 me-1"></i>
                        Gestione Notifiche
                        <?php if($numeronotifiche != 0): ?>
                            <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger rounded-circle nuova-notifica">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                        <?php endif; ?>
                    </a>
                </div>
                <div class="col-6">
                    <a href="../php/ordini.php" type="button" class="btn button-light w-100 d-flex align-items-center justify-content-center">
                        <i class="bi bi-box-seam ms-1 me-1"></i>
                        Gestione Ordini
                    </a>
                </div>
            </div>
            <div class="text-center mb-3">
                <a href="../php/recensioni.php" type="button" class="btn button-light w-100 d-flex align-items-center justify-content-center">
                    <i class="bi bi-pen ms-1 me-1"></i>
                    Gestione Recensioni
                </a>                   
            </div>
            <div class="row mb-2">
                <div class="col-6">
                    <a href="../php/prodotti.php" type="button" class="btn button-light w-100 d-flex align-items-center justify-content-center">
                        <i class="bi bi-boxes ms-1 me-1"></i>
                        Gestione Prodotti
                    </a>
                </div>
                <div class="col-6">
                    <a href="../php/gestisciAccount.php" type="button" class="btn button-light w-100 d-flex align-items-center justify-content-center">
                        <i class="bi bi-people ms-1 me-1"></i>
                        Gestione Utenti
                    </a>
                </div>
            </div>
        </section>
    </div>
<?php elseif (isUserLoggedIn()): ?>
    <div class="container mt-4 ps-4 pe-4 cont-account">
        <h1 class="title">Il mio Account</h1>
        <section class="card p-4 mb-4 mt-4 card-account shadow">
            <div class="d-flex align-items-center justify-content-center">
                <i class="bi bi-person-circle me-2"></i>
                <h2 class="fw-bold text mb-0">Ciao, <?php echo $userDetails["Nome"] ?>!</h2>
            </div>
            <div class="d-flex flex-column align-items-center mt-3">
                <p class="text"><strong>Nome: </strong><?php echo $userDetails["Nome"] . " " . $userDetails["Cognome"]; ?></p>
                <p class="text"><strong>Email: </strong><?php echo $userDetails["E_mail"] ?></p>
                <p class="text"><strong>Telefono: </strong><?php echo $userDetails["Numero_telefono"]  != null ? $userDetails['Numero_telefono'] : 'Non disponibile' ?></p>
                <p class="text"><strong>Data di Nascita: </strong><?php echo $userDetails['Data_di_nascita'] != '0000-00-00' ? getFormattedDate($userDetails["Data_di_nascita"]) : 'Non disponibile' ?></p>
                <button type="button" class="btn button-outline mb-2 mt-2 pe-4 ps-4 btn-points" data-bs-toggle="collapse" data-bs-target="#collapsePoints" aria-expanded="false" aria-controls="collapsePoints">
                    <i class="bi bi-star-fill me-1"></i> <?php echo $userDetails["Punti"]; ?> Punti Fedeltà
                </button>
                <div class="collapse" id="collapsePoints">
                    <div class="card card-body mb-3 mt-2 border-0 collapse-points">
                        <h3 class="mb-1 text fw-bold">Punti Fedeltà</h3>
                        <p class="text mt-2 mb-1"><strong>Come funziona?</strong><br>Ogni 10€ di spesa, guadagni 1 punto. Accumula punti per ottenere un peluche gratuito a tua scelta dalla nostra collezione!</p>
                    </div>
                </div>
                <div class="d-flex align-items-center mt-4 mb-2">
                    <form method="POST" action="login.php">
                        <button type="submit" name="logout" class="btn button me-2 ps-4 pe-4">Logout</button>
                    </form>
                    <a href="../php/index.php" class="btn ms-2 button ps-4 pe-4">Torna alla Home</a>       
                </div>
            </div>
        </section>
        <section class="card p-4 shadow card-account">
            <h3 class="fw-bold text">Attività</h3>
            <div class="row mb-3 mt-3">
                <div class="col-6">
                    <a href="../php/notifiche.php" type="button" class="btn button-light w-100 position-relative">
                        <i class="bi bi-bell"></i>
                        Notifiche
                        <?php if($numeronotifiche != 0): ?>
                            <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger rounded-circle nuova-notifica">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                        <?php endif; ?>
                    </a>
                </div>
                <div class="col-6">
                    <a href="../php/recensioniMie.php" type="button" class="btn button-light w-100">
                        <i class="bi bi-pen"></i>
                        Recensioni
                    </a>
                </div>
            </div>
            <div class='mb-3'>
                <a href="../php/preferiti.php" type="button" class="btn button-light w-100">
                    <i class="bi bi-bookmark-heart"></i>
                    I tuoi Preferiti
                </a>
            </div>
            <div class="row mb-2">
                <div class="col-5">
                    <a href="../php/ordini.php" type="button" class="btn button-light w-100">
                        <i class="bi bi-box-seam"></i>
                        Ordini
                    </a>            
                </div>
                <div class="col-7">
                    <button type="button" class="btn button-light w-100" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        <i class="bi bi-gear"></i>
                        Impostazioni
                    </button> 
                </div>
            </div>
        </section>
    </div>
<?php endif; ?>

<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header pb-3">
                <h5 class="modal-title title" id="editProfileModalLabel">Modifica Profilo</h5>
                <button type="button" class="btn button-empty ms-auto" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <div class="modal-body pt-0">
                <form method="POST" action="account.php">
                    <div class="mb-3">
                        <label for="nome" class="col-form-label ps-1 pb-0 text-italic">Nome:</label>
                        <input type="text" class="form-control text text-input" id="nome" name="nome" value="<?php echo htmlspecialchars($userDetails['Nome']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="cognome" class="col-form-label ps-1 pb-0 text-italic">Cognome:</label>
                        <input type="text" class="form-control text text-input" id="cognome" name="cognome" value="<?php echo htmlspecialchars($userDetails['Cognome']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label ps-1 pb-0 text-italic">E-mail:</label>
                        <input type="text" class="form-control text text-input" id="email" name="email" value="<?php echo htmlspecialchars($userDetails['E_mail']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="col-form-label ps-1 pb-0 text-italic">Telefono:</label>
                        <input type="text" class="form-control text text-input" id="telefono" name="numero_telefono" value="<?php echo htmlspecialchars($userDetails['Numero_telefono']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="data_nascita" class="col-form-label ps-1 pb-0 text-italic">Data di Nascita:</label>
                        <input type="date" class="form-control text text-input" id="data_nascita" name="data_nascita" value="<?php echo htmlspecialchars($userDetails['Data_di_nascita']); ?>" required>
                    </div>
                    <div class="modal-footer mt-4">
                        <button type="button" class="btn button-outline me-auto ps-4 pe-4" data-bs-dismiss="modal">Annulla</button>
                        <button type="submit" name="update_profile" class="btn button ms-auto ps-5 pe-5">Salva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>