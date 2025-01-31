<h1 style="text-align: left; margin-left: 2%;">Il mio account</h1>

<?php if (isset($_SESSION["utente"])): ?>
    <h2 style="text-align: left; margin-left: 2%;">Benvenut*, 
        <?php echo isset($_SESSION["nome"]) ? $_SESSION["nome"] : "Nome non disponibile"; ?> 
        <?php echo isset($_SESSION["cognome"]) ? $_SESSION["cognome"] : "Cognome non disponibile"; ?>!
    </h2>
    <p>Email: <?php echo $_SESSION["utente"]; ?></p>
    <p>Telefono: <?php echo isset($_SESSION["telefono"]) ? $_SESSION["telefono"] : "Non disponibile"; ?></p>
    <p>Data di nascita: <?php echo isset($_SESSION["data_nascita"]) ? $_SESSION["data_nascita"] : "Non disponibile"; ?></p>
    <p>Punti: <?php echo isset($_SESSION["punti"]) ? $_SESSION["punti"] : "0"; ?></p>
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
            <label for="email" class="form-label">Indirizzo email<span style="color: red;">*</span></label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password<span style="color: red;">*</span></label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" name="accedi">Accedi</button>
        <a href="registrati.php" class="btn btn-secondary">Registrati</a>
    </form>
    <p><a href="../php/controlloEmail.php">Password dimenticata?</a></p>
    <p><a href="../php/index.php">Indietro</a></p>
<?php endif; ?>
