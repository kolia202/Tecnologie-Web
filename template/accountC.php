<?php if (isAdminLoggedIn()): ?>
  <h1>Il mio Account</h1>
  <section class="border-bottom text-center">
    <h2 style="text-align: left; margin-left: 2%;">Ciao, 
        <?php echo $userDetails["Nome"] ?>! 
        <i class="bi bi-person-circle"></i>
    </h2>
    <form method="POST" action="account.php">
        <button type="submit" name="logout" class="btn" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Logout</button>
    </form>
    <a href="../php/index.php" type="button" class="btn mt-2 mb-2" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Torna alla Home</a>
  </section>
  <section>
    <h3>Attività admin</h3>
    <div class="row mb-3 mx-2 mt-2">
        <div class="col-4 mb-2">
            <a href="../php/notifiche.php" type="button" class="btn fw-bold w-100 position-relative" style="background-color: rgb(204, 153, 102); color: white;">
              Notifiche admin
              <?php if($numeronotifiche != 0): ?>
                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle nuova-notifica">
                    <span class="visually-hidden">New alerts</span>
                </span>
              <?php endif; ?>
            </a>
        </div>
        <div class="col-4 mb-2">
            <a href="../php/recensioni.php" type="button" class="btn fw-bold w-100" style="background-color: rgb(204, 153, 102); color: white;">Gestione recensioni</a>
        </div>
        <div class="col-4 mb-2">
            <a href="../php/ordini.php" type="button" class="btn fw-bold w-100" style="background-color: rgb(204, 153, 102); color: white;">Gestione ordini</a>
        </div>
        <div class="col-4 mb-2">
            <a href="../php/prodotti.php" type="button" class="btn fw-bold w-100" style="background-color: rgb(204, 153, 102); color: white;">Gestione prodotti</a>
        </div>
        <div class="col-4 mb-2">
            <a href="../php/gestisciAccount.php" type="button" class="btn fw-bold w-100" style="background-color: rgb(204, 153, 102); color: white;">Gestione utenti</a>
        </div>
    </div>
<?php elseif (isUserLoggedIn()): ?>
  <h1>Il mio Account</h1>
  <section class="border-bottom text-center">
    <h2 style="text-align: left; margin-left: 2%;">Ciao, 
        <?php echo $userDetails["Nome"] ?>! 
        <i class="bi bi-person-circle"></i>
    </h2>
    <p class="mb-1"><strong>Nome: </strong><?php echo $userDetails["Nome"] . " " . $userDetails["Cognome"]; ?></p>
    <p class="mb-2"><strong>Email: </strong><?php echo $userDetails["E_mail"] ?></p>
    <p class="mb-2"><strong>Telefono: </strong><?php echo $userDetails["Numero_telefono"] ?></p>
    <p class="mb-2"><strong>Data di Nascita: </strong><?php echo getFormattedDate($userDetails["Data_di_nascita"]) ?></p>
    <button type="button" class="btn btn-outline mb-2" data-bs-toggle="collapse" data-bs-target="#collapsePoints" aria-expanded="false" aria-controls="collapsePoints" style="border-color: rgb(137, 85, 32); background-color: rgb(255, 255, 153); color: black; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 15px; font-style: italic;"><i class="bi bi-star-fill" style="color: rgb(255, 165, 0)"></i> <?php echo $userDetails["Punti"]; ?> Punti Fedeltà</button>

    <div class="collapse" id="collapsePoints" style="border: none; ">
        <div class="card card-body border-0 pt-0" style="background-color: rgb(1, 1, 1, 0)">
            <p class="mb-1" style="font-weight: bold">Punti Fedeltà</p>
            <p>Con il nostro sistema di punti fedeltà, ogni acquisto ti avvicina a un peluche gratuito!<br>Ogni 10€ di spesa, guadagni 1 punto.<br>Quando accumuli abbastanza punti, puoi usarli per ottenere un peluche a tua scelta dalla nostra collezione!</p>
        </div>
    </div>
    <form method="POST" action="account.php">
        <button type="submit" name="logout" class="btn" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Logout</button>
    </form>
    <a href="../php/index.php" type="button" class="btn mt-2 mb-2" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Torna alla Home</a>
  </section>
  <section>
    <h3>Attività</h3>
    <div class="row mb-3 mx-2 mt-2">
        <div class="col-4 mb-2">
            <a href="../php/notifiche.php" type="button" class="btn fw-bold w-100 position-relative" style="background-color: rgb(204, 153, 102); color: white;">
              Notifiche
              <?php if($numeronotifiche != 0): ?>
                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle nuova-notifica">
                    <span class="visually-hidden">New alerts</span>
                </span>
              <?php endif; ?>
            </a>
        </div>
        <div class="col-4 mb-2">
            <a href="../php/recensioniMie.php" type="button" class="btn fw-bold w-100" style="background-color: rgb(204, 153, 102); color: white;">Recensioni</a>
        </div>
        <div class="col-4 mb-2">
            <a href="../php/ordini.php" type="button" class="btn fw-bold w-100" style="background-color: rgb(204, 153, 102); color: white;">Ordini</a>
        </div>
    </div>
    <div class="row mx-2">
        <div class="col-6 mb-2">
            <a href="../php/preferiti.php" type="button" class="btn fw-bold w-100" style="background-color: rgb(204, 153, 102); color: white;">I tuoi Preferiti</a>
        </div>
        <div class="col-6 mb-2">
            <a href="../php/account.php" type="button" class="btn fw-bold w-100" data-bs-toggle="modal" data-bs-target="#editProfileModal" style="background-color: rgb(204, 153, 102); color: white;">
                Impostazioni
            </a>
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
                        <label for="email" class="col-form-label">E_mail:</label>
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
                        <button type="submit" name="update_profile" class="btn btn-primary">Salva Modifiche</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
  </section>
<?php else: ?>
    <div class="container mt-4 ps-4 pe-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center account">Account</h1>
                <?php if (isset($templateParams["errorelogin"])): ?>
                    <div class="alert alert-danger text-center mt-3 loginerror" role="alert">
                        <i class="bi bi-exclamation-triangle align-center"></i>
                        <?php echo $templateParams["errorelogin"]; ?>
                    </div>
                <?php endif; ?>
                <form action="account.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label ps-1 infologin">
                            <i class="bi bi-envelope align-middle"></i>
                            E-mail
                            <span class="text-danger">*</span>
                        </label>
                        <input type="email" class="form-control inputlogin" id="email" name="email" required/>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label ps-1 infologin">
                            <i class="bi bi-key align-middle"></i>
                            Password
                            <span class="text-danger">*</span>
                        </label>
                        <input type="password" class="form-control inputlogin" id="password" name="password" required/>
                    </div>
                    <button type="submit" name="accedi" class="btn btn-primary w-100 fw-bold btn-accedi">Accedi</button>
                </form>
                <div class="text-center mt-3">
                    <a href="../php/controlloEmail.php" class="d-block">Password dimenticata?</a>
                    <p class="mt-3 newsignin">Non sei ancora registrato?</p>
                    <a href="registrati.php" class="btn btn-outline-secondary ps-5 pe-5 registrati">Registrati</a>
                    <p class="mt-4"><a href="../php/index.php">Annulla</a></p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>