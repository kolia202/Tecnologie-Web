<div class="container mt-4 ps-4 pe-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center account">Recupero Password</h1>
            <p class="text-center pt-2 howto">Hai dimenticato la tua password? Nessun problema!<br>Inserisci il tuo indirizzo E-mail qui sotto e verrai subito reindirizzato alla pagina di Reset.</p>
            <?php if (isset($_SESSION["error"])): ?>
                <div class="alert alert-danger text-center mt-3 loginerror" role="alert">
                    <i class="bi bi-exclamation-triangle align-center"></i>
                    <?php echo $_SESSION["error"];
                    unset($_SESSION["error"]); ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="controlloEmail.php">
                <div class="mb-3">
                    <label for="email" class="form-label ps-1 infologin">
                        <i class="bi bi-envelope align-middle"></i>
                        E-mail
                        <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control inputlogin" id="email" name="email" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 btn-accedi fw-bold">Avanti</button>
            </form>
            <div class="text-center mt-4">
                <a href="../php/account.php">Annulla</a>
            </div>
        </div>
    </div>    
</div>