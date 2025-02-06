<div class="container mt-5">
    <h1 class="fw-bold text-start">Il mio account</h1>
    <h2 class="text-start">Registrati</h2>

    <!-- MESSAGGIO DI ERRORE -->
    <?php if (isset($_SESSION["error"])): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION["error"]; unset($_SESSION["error"]); ?>
        </div>
    <?php endif; ?>

    <!-- FORM DI REGISTRAZIONE -->
    <form id="registerForm" action="registrati.php" method="POST" class="p-4 shadow rounded bg-white">
        <div class="row">
            <div class="col-md-6">
                <label for="nome" class="fw-semibold">Nome<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="col-md-6">
                <label for="cognome" class="fw-semibold">Cognome<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="cognome" name="cognome" required>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label for="telefono" class="fw-semibold">Telefono<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="telefono" name="telefono">
            </div>
            <div class="col-md-6">
                <label for="data_nascita" class="fw-semibold">Data di nascita</label>
                <input type="date" class="form-control" id="data_nascita" name="data_nascita">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <label for="email" class="fw-semibold">Indirizzo email<span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label for="password" class="fw-semibold">Password<span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="col-md-6">
                <label for="password_confirm" class="fw-semibold">Ripeti password<span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="password_confirm" name="password_confirm" required>
            </div>
        </div>

        <!-- BOTTONE DI CONFERMA -->
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary px-4 py-2">Conferma</button>
        </div>
    </form>

    <!-- LINK INDIETRO -->
    <div class="text-center mt-3">
        <a href="../php/account.php" class="text-decoration-none fw-semibold">
            ← Torna indietro
        </a>
    </div>
</div>
