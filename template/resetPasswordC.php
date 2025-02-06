<div class="container mt-4 ps-4 pe-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center account">Reset Password</h1>
            <p class="text-center howto">Inserisci una nuova Password per il tuo Account.</p>
            <?php if (isset($_SESSION["error"])): ?>
                <div class="alert alert-danger text-center mt-3 alerts">
                    <i class="bi bi-exclamation-triangle align-center"></i>
                    <?php echo $_SESSION["error"];
                    unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="resetPassword.php">
                <div class="mb-3">
                    <label for="password" class="form-label infologin ps-1">
                        Nuova Password
                        <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <input type="password" class="form-control inputlogin" id="password" name="password" required>
                        <button class="btn show-password" type="button">
                            <i class="bi bi-eye-slash"></i>
                        </button>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label infologin ps-1">
                        Conferma Password
                        <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <input type="password" class="form-control inputlogin" id="confirm_password" name="confirm_password" required>
                        <button class="btn show-password" type="button">
                            <i class="bi bi-eye-slash"></i>
                        </button>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-accedi fw-bold ps-4 pe-4">Resetta Password</button>
                </div>
            </form>
            <div class="text-center mt-4">
                <a href="../php/controlloEmail.php">Indietro</a>
            </div>
        </div>
    </div>
</div>