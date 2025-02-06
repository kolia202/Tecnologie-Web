<div class="container mt-5">
    <div class="card shadow p-4 rounded bg-white">
        <h1 class="fw-bold text-start">Il mio account</h1>
        <p class="text-muted">
            Hai perso la password? Inserisci il tuo indirizzo email.<br>
            Verrai reindirizzato alla pagina di reset della password.
        </p>

        <!-- MESSAGGIO DI ERRORE -->
        <?php if (isset($_SESSION["error"])): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION["error"]; unset($_SESSION["error"]); ?>
            </div>
        <?php endif; ?>

        <!-- FORM RECUPERO PASSWORD -->
        <form method="POST" action="controlloEmail.php">
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email<span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <!-- BOTTONE AVANTI -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4 py-2">Avanti</button>
            </div>
        </form>

        <!-- LINK INDIETRO -->
        <div class="text-center mt-3">
            <a href="../php/account.php" class="text-decoration-none fw-semibold">
                ← Torna indietro
            </a>
        </div>
    </div>
</div>
