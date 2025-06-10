<div class="container mt-4 ps-4 pe-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="title">Reset Password</h1>
            <p class="text">Inserisci una nuova Password per il tuo Account.</p>
            <?php if (isset($_SESSION["error"])): ?>
                <div class="alert alert-danger mt-3 text">
                    <span class="bi bi-exclamation-triangle align-center"></span>
                    <?php echo $_SESSION["error"];
                    unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="resetPassword.php">
                <div class="mb-3">
                    <label for="password" class="form-label text-italic ps-1 mb-0">
                        Nuova Password
                        <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <input type="password" class="form-control text text-input" id="password" name="password" required>
                        <button class="btn show-password" type="button">
                            <span class="bi bi-eye-slash" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label text-italic ps-1 mb-0">
                        Conferma Password
                        <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <input type="password" class="form-control text text-input" id="confirm_password" name="confirm_password" required>
                        <button class="btn show-password" type="button">
                            <span class="bi bi-eye-slash" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn button ps-5 pe-5 mt-1">Resetta Password</button>
                </div>
            </form>
            <div class="text-center mt-4">
                <a href="../php/controlloEmail.php" class="text d-block mt-4 back">Indietro</a>
            </div>
        </div>
    </div>
</div>