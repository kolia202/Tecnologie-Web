<div class="container-register mt-4 ps-4 pe-4">
    <h1 class="title mb-3">Iscrizione</h1>
    <?php if (isset($_SESSION["error"])): ?>
        <div class="alert alert-danger mt-3 text" role="alert">
            <i class="bi bi-exclamation-triangle align-center"></i>
            <?php echo $_SESSION['error'];
            unset($_SESSION["error"]); ?>
        </div>    
    <?php endif; ?>
    <form id="registerForm" action="registrazione.php" method="POST">
        <div class="row">
            <div class="col-md-6">
                <label for="nome" class="ps-1 text-italic">
                    Nome
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control text text-input" id="nome" name="nome" autocomplete="off" required>
            </div>
            <div class="col-md-6">
                <label for="cognome" class="ps-1 text-italic">
                    Cognome
                    <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control text text-input" id="cognome" name="cognome" autocomplete="off" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="telefono" class="ps-1 text-italic">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-telephone me-1"></i>Telefono
                    </div>
                </label>
                <input type="text" class="form-control text text-input" id="telefono" name="telefono" autocomplete="off">
            </div>
            <div class="col-md-6">
                <label for="data_nascita" class="ps-1 text-italic">Data di nascita</label>
                <input type="date" class="form-control text text-input" id="data_nascita" name="data_nascita">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="email" class="ps-1 text-italic">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-envelope me-1"></i>    
                        E-mail
                        <span class="text-danger">*</span>
                    </div>
                </label>
                <input type="email" class="form-control text text-input" id="email" name="email" autocomplete="off" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="password" class="ps-1 text-italic">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-key me-1"></i>    
                        Password
                        <span class="text-danger">*</span>
                    </div>
                </label>
                <div class="input-group">
                    <input type="password" class="form-control text text-input" id="password" name="password" required>
                    <button class="btn show-password" type="button">
                        <i class="bi bi-eye-slash"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <label for="password_confirm" class="ps-1 text-italic">
                    Conferma Password
                    <span class="text-danger">*</span>
                </label>
                <div class="input-group">
                    <input type="password" class="form-control text text-input" id="password_confirm" name="password_confirm" required>
                    <button class="btn show-password" type="button">
                        <i class="bi bi-eye-slash"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="text-center mt-3 pb-2">
            <button type="submit" class="btn button ps-5 pe-5 mt-1">Iscriviti</button>
        </div>
    </form>
    <div class="text-center mt-4">
        <a href="../php/account.php" class="text d-block mt-4 back">Indietro</a>
    </div>
</div>
