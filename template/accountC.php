<h1 style="text-align: left; margin-left: 2%;">Il mio account</h1>

<?php if (isset($_SESSION["utente"])): ?>
    <h2 style="text-align: left; margin-left: 2%;">Benvenuto, <?php echo $_SESSION["utente"]; ?>!</h2>
    <p>Sei attualmente connesso.</p>
    <form method="POST" action="account.php">
        <button type="submit" name="logout">Logout</button>
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
        <button type="submit" class="btn btn-primary" name="accedi">Accedi</button>
    </form>
    <p><a href="../php/controlloEmail.php">Password dimenticata?</a></p>
    <p><a href="../php/index.php">Inietro</a></p>
<?php endif; ?>
