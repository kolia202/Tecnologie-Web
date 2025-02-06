<div class="container mt-4 ps-4 pe-4">
    <h1 class="text-center account">Iscrizione</h1>
    <?php if (isset($_SESSION["error"])): ?>
            <div class="alert alert-danger text-center mt-3 loginerror" role="alert">
                <i class="bi bi-exclamation-triangle align-center"></i>
                <?php echo $_SESSION['error'];
                unset($_SESSION["error"]); ?>
            </div>    
    <?php endif; ?>
    <form id="registerForm" action="registrati.php" method="POST">
        <div class="row">
            <div class="col-md-6">
                <label for="nome" class="ps-1 infologin">
                    Nome
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control inputlogin" id="nome" name="nome" required>
            </div>
            <div class="col-md-6 mt-1">
                <label for="cognome" class="ps-1 infologin">
                    Cognome
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control inputlogin" id="cognome" name="cognome" required>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <label for="telefono" class="ps-1 infologin">
                    <i class="bi bi-telephone align-middle"></i>    
                    Telefono
                </label>
                <input type="text" class="form-control inputlogin" id="telefono" name="telefono">
            </div>
            <div class="col-md-6 mt-1">
                <label for="data_nascita" class="ps-1 infologin">Data di Nascita</label>
                <input type="date" class="form-control inputlogin" id="data_nascita" name="data_nascita">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <label for="email" class="ps-1 infologin">
                    <i class="bi bi-envelope align-middle"></i>    
                    E-mail
                    <span class="text-danger">*</span>
                </label>
                <input type="email" class="form-control inputlogin" id="email" name="email" required>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <label for="password" class="ps-1 infologin">
                    <i class="bi bi-key align-middle"></i>    
                    Password
                    <span class="text-danger">*</span>
                </label>
                <input type="password" class="form-control inputlogin" id="password" name="password" required>
            </div>
            <div class="col-md-6 mt-1">
                <label for="password_confirm" class="ps-1 infologin">
                    Conferma Password
                    <span class="text-danger">*</span>
                </label>
                <input type="password" class="form-control inputlogin" id="password_confirm" name="password_confirm" required>
            </div>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary ps-5 pe-5 btn-accedi fw-bold">Iscriviti</button>
        </div>
    </form>
    <div class="text-center mt-4 mb-4">
        <a href="../php/account.php">Annulla</a>
    </div>
</div>
