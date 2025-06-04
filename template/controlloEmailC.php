<div class="container mt-4 ps-4 pe-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="title">Recupero Password</h1>
            <p class="text">Hai dimenticato la tua password? Nessun problema! Inserisci il tuo indirizzo E-mail e verrai subito reindirizzato alla pagina di Reset.</p>
            <?php if (isset($_SESSION["error"])): ?>
                <div class="alert alert-danger mt-3 text" role="alert">
                    <i class="bi bi-exclamation-triangle align-center"></i>
                    <?php echo $_SESSION["error"];
                    unset($_SESSION["error"]); ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="controlloEmail.php">
                <div class="mb-3">
                    <label for="email" class="form-label ps-1 text-italic">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-envelope me-1"></i>
                            E-mail
                            <span class="text-danger">*</span>
                        </div>
                    </label>
                    <input type="email" class="form-control text text-input" id="email" name="email" autocomplete="off" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn button ps-5 pe-5 mt-1">Avanti</button>
                </div>
            </form>
            <div class="text-center mt-4">
                <a href="../php/account.php" class="text d-block mt-4 back">Indietro</a>
            </div>
        </div>
    </div>    
</div>