<h1 style="text-align: left; margin-left: 2%;">Il mio account</h1>

<?php if (isUserLoggedIn()): ?>
    <section class="border-bottom text-center">
        <h2 style="text-align: left; margin-left: 2%;">Ciao,
            <?php echo $userDetails["Nome"] ?>!
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
                <a href="#" type="button" class="btn fw-bold w-100" style="background-color: rgb(204, 153, 102); color: white;">Notifiche</a>
            </div>
            <div class="col-4 mb-2">
                <a href="../php/recensioni.php" type="button" class="btn fw-bold w-100" style="background-color: rgb(204, 153, 102); color: white;">Recensioni</a>
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
                <a href="#" type="button" class="btn fw-bold w-100" style="background-color: rgb(204, 153, 102); color: white;">Impostazioni</a>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="text-align: left; margin-left: 2%;">Accedi</h2>
    <?php if (isset($templateParams["errorelogin"])): ?>
        <p style="color: red; font-weight: bold;"><?php echo $templateParams["errorelogin"]; ?></p>
    <?php endif; ?>
    <form action="account.php" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email<span style="color: red;">*</span></label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password<span style="color: red;">*</span></label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" name="accedi">Accedi</button>
    </form>
    <p><a href="../php/controlloEmail.php">Password dimenticata?</a></p>
    <p>Non sei ancora registrato?</p>
    <a href="registrati.php" class="btn btn-secondary">Registrati</a>
    <p><a href="../php/index.php">Indietro</a></p>
<?php endif; ?>
