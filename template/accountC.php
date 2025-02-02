<h1 style="text-align: left; margin-left: 2%;">Il mio account</h1>

<?php if (isset($_SESSION["utente"])): ?>
    <h2 style="text-align: left; margin-left: 2%;">Ciao 
        <?php echo $_SESSION["nome"] ?>!
    </h2>
    <p>Nome: <?php echo $_SESSION["nome"]; ?></p>
    <p>Cognome: <?php echo $_SESSION["cognome"]; ?></p>
    <p>Email: <?php echo $_SESSION["utente"]; ?></p>
    <p>Telefono: <?php echo $_SESSION["telefono"]; ?></p>
    <p>Data di nascita: <?php echo getFormattedDate($_SESSION["data_nascita"]); ?></p>
    <p>Punti: <?php echo $_SESSION["punti"]; ?></p>
    <form method="POST" action="account.php">
        <button type="submit" name="logout">Logout</button>
    </form>
    <form action="../php/index.php" method="get">
        <button type="submit">Torna alla home</button>
    </form>
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
