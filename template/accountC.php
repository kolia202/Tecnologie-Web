<?php if (isAdminLoggedIn()): ?>
<div class="container mt-4 ps-4 pe-4 cont-account">
    <h1 class="text-center account">Account Admin</h1>
    <section class="card p-4 mb-4 mt-4 cardaccount">
      <div class="d-flex align-items-center justify-content-center">
          <i class="bi bi-person-circle me-2"></i>
          <h2 class="fw-bold mb-0">Ciao, <?php echo $userDetails["Nome"] ?>!</h2>
      </div>
      <div class="d-flex flex-column align-items-center mt-2">
        <p class="details"><strong>Nome: </strong><?php echo $userDetails["Nome"] . " " . $userDetails["Cognome"]; ?></p>
        <p class="details"><strong>Email: </strong><?php echo $userDetails["E_mail"] ?></p>
        <p class="details"><strong>Telefono: </strong><?php echo $userDetails["Numero_telefono"]  != null ? $userDetails['Numero_telefono'] : 'Non Disponibile' ?></p>
        <p class="details"><strong>Data di Nascita: </strong><?php echo $userDetails['Data_di_nascita'] != '0000-00-00' ? getFormattedDate($userDetails["Data_di_nascita"]) : 'Non Disponibile' ?></p>
        <div class="d-flex align-items-center mt-4 mb-2">
          <form method="POST" action="account.php">
            <button type="submit" name="logout" class="btn me-2 bmenu ps-4 pe-4 fw-bold">Logout</button>
          </form>
          <a href="../php/index.php" class="btn ms-2 bmenu ps-4 pe-4 fw-bold">Torna alla Home</a>       
        </div>
      </div>
    </section>
    <section class="card p-4 mb-4 cardaccount">
      <h3 class="text-center fw-bold mb-4">Attività Admin</h3>
      <div class="row mb-3">
        <div class="col-6">
            <a href="../php/notifiche.php" type="button" class="btn w-100 fw-bold position-relative userbutton">
                <i class="bi bi-bell"></i>
                Gestione Notifiche
                <?php if($numeronotifiche != 0): ?>
                    <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle nuova-notifica">
                        <span class="visually-hidden">New alerts</span>
                    </span>
                <?php endif; ?>
            </a>
        </div>
        <div class="col-6">
            <a href="../php/ordini.php" type="button" class="btn fw-bold w-100 userbutton">
                <i class="bi bi-box-seam"></i>
                Gestione Ordini
            </a>
        </div>
      </div>
      <div class="text-center mb-3">
          <a href="../php/recensioni.php" type="button" class="btn fw-bold w-100 userbutton">
            <i class="bi bi-pen"></i>
            Gestione Recensioni
          </a>                   
      </div>
      <div class="row mb-2">
        <div class="col-6">
          <a href="../php/prodotti.php" type="button" class="btn fw-bold w-100 userbutton">
            <i class="bi bi-boxes"></i>
            Gestione Prodotti
          </a>
        </div>
        <div class="col-6">
          <a href="../php/gestisciAccount.php" type="button" class="btn fw-bold w-100 userbutton">
            <i class="bi bi-people"></i>
            Gestione Utenti
          </a>
        </div>
      </div>
    </section>
</div>
<?php elseif (isUserLoggedIn()): ?>
  <div class="container mt-4 ps-4 pe-4 cont-account">
    <h1 class="text-center account">Il mio Account</h1>
    <section class="card p-4 mb-4 mt-4 cardaccount">
      <div class="d-flex align-items-center justify-content-center">
        <i class="bi bi-person-circle me-2"></i>
        <h2 class="fw-bold mb-0">Ciao, <?php echo $userDetails["Nome"] ?>!</h2>
      </div>
      <div class="d-flex flex-column align-items-center mt-2">
        <p class="details"><strong>Nome: </strong><?php echo $userDetails["Nome"] . " " . $userDetails["Cognome"]; ?></p>
        <p class="details"><strong>Email: </strong><?php echo $userDetails["E_mail"] ?></p>
        <p class="details"><strong>Telefono: </strong><?php echo $userDetails["Numero_telefono"]  != null ? $userDetails['Numero_telefono'] : 'Non Disponibile' ?></p>
        <p class="details"><strong>Data di Nascita: </strong><?php echo $userDetails['Data_di_nascita'] != '0000-00-00' ? getFormattedDate($userDetails["Data_di_nascita"]) : 'Non Disponibile' ?></p>
        <button type="button" class="btn btn-outline mb-2 btn-points fw-bold" data-bs-toggle="collapse" data-bs-target="#collapsePoints" aria-expanded="false" aria-controls="collapsePoints">
          <i class="bi bi-star-fill"></i> <?php echo $userDetails["Punti"]; ?> Punti Fedeltà
        </button>
        <div class="collapse" id="collapsePoints">
          <div class="card card-body mb-3 mt-2 border-0 collapse-points">
              <h4 class="mb-1 text-center fw-bold pointstitle">Punti Fedeltà</h4>
              <p class="text-center pointsdetails mt-2 mb-1"><strong>Come funziona?</strong><br>Ogni 10€ di spesa, guadagni 1 punto. Accumula punti per ottenere un peluche gratuito a tua scelta dalla nostra collezione!</p>
          </div>
        </div>
        <div class="d-flex align-items-center mt-4 mb-2">
          <form method="POST" action="account.php">
            <button type="submit" name="logout" class="btn me-2 bmenu ps-4 pe-4 fw-bold">Logout</button>
          </form>
          <a href="../php/index.php" class="btn ms-2 bmenu ps-4 pe-4 fw-bold">Torna alla Home</a>       
        </div>
      </div>
    </section>
    <section class="card p-4 mb-4 cardaccount">
      <h3 class="text-center fw-bold mb-4">Attività</h3>
      <div class="row mb-3">
        <div class="col-6">
          <a href="../php/notifiche.php" type="button" class="btn w-100 position-relative userbutton">
            <i class="bi bi-bell"></i>
            Notifiche
            <?php if($numeronotifiche != 0): ?>
              <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle nuova-notifica">
                <span class="visually-hidden">New alerts</span>
              </span>
            <?php endif; ?>
          </a>
        </div>
        <div class="col-6">
            <a href="../php/recensioniMie.php" type="button" class="btn w-100 userbutton">
                <i class="bi bi-pen"></i>
                Recensioni
            </a>
        </div>
    </div>
    <div class='text-center mb-3'>
        <a href="../php/preferiti.php" type="button" class="btn w-100 userbutton">
            <i class="bi bi-bookmark-heart"></i>
            I tuoi Preferiti
        </a>
    </div>
    <div class="row mb-2">
        <div class="col-5">
            <a href="../php/ordini.php" type="button" class="btn w-100 userbutton">
                <i class="bi bi-box-seam"></i>
                Ordini
            </a>            
        </div>
        <div class="col-7">
            <button type="button" class="btn w-100 userbutton" data-bs-toggle="modal" data-bs-target="#editProfileModal">
              <i class="bi bi-gear"></i>
              Impostazioni
            </button> 
        </div>
      </div>
    </section>
</div>
<?php else: ?>
    <div class="container-login mt-4 ps-4 pe-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="title mb-3">Account</h1>
                <?php if (isset($_SESSION["errorelogin"])): ?>
                    <div class="alert alert-danger mt-3 text" role="alert">
                        <i class="bi bi-exclamation-triangle align-center"></i>
                        <?php echo $_SESSION["errorelogin"];
                        unset($_SESSION['errorelogin']); ?>
                    </div>                 
                <?php endif; ?>
                <form action="account.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label ps-1 text-italic">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-envelope me-1"></i>
                                E-mail
                                <span class="text-danger">*</span>
                            </div>
                        </label>
                        <input type="email" class="form-control text text-input" id="email" name="email" required/>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label ps-1 text-italic">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-key me-1"></i>
                                Password
                                <span class="text-danger">*</span>
                            </div>
                        </label>
                        <div class="input-group">
                            <input type="password" class="form-control text text-input" id="password" name="password" required>
                            <button class="btn show-password" type="button">
                                <i class="bi bi-eye-slash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="accedi" class="btn button ps-5 pe-5 mt-1">Accedi</button>
                    </div>
                </form>
                <div class="text-center mt-4">
                    <a href="../php/controlloEmail.php" class="text fw-bold">Password dimenticata?</a>
                    <p class="mt-4 mb-2 text-italic">Non sei ancora registrato?</p>
                    <a href="registrati.php" class="btn button-outline mt-1 ps-5 pe-5 mb-2">Registrati</a>
                    <a href="../php/index.php" class="text d-block mt-4 back">Indietro</a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProfileModalLabel">Modifica Profilo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="account.php">
          <div class="mb-3">
            <label for="nome" class="col-form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($userDetails['Nome']); ?>" required>
          </div>
          <div class="mb-3">
            <label for="cognome" class="col-form-label">Cognome:</label>
            <input type="text" class="form-control" id="cognome" name="cognome" value="<?php echo htmlspecialchars($userDetails['Cognome']); ?>" required>
          </div>
          <div class="mb-3">
            <label for="email" class="col-form-label">E-mail:</label>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($userDetails['E_mail']); ?>" required>
          </div>
          <div class="mb-3">
            <label for="telefono" class="col-form-label">Telefono:</label>
            <input type="text" class="form-control" id="telefono" name="numero_telefono" value="<?php echo htmlspecialchars($userDetails['Numero_telefono']); ?>" required>
          </div>
          <div class="mb-3">
            <label for="data_nascita" class="col-form-label">Data di Nascita:</label>
            <input type="date" class="form-control" id="data_nascita" name="data_nascita" value="<?php echo htmlspecialchars($userDetails['Data_di_nascita']); ?>" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
            <button type="submit" name="update_profile" class="btn btn-primary">Salva</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>