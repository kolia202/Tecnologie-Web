<div class="container-login mt-4 ps-4 pe-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="title mb-3">Login</h1>
            <?php if (isset($_SESSION["errorelogin"])): ?>
                <div class="alert alert-danger mt-3 text" role="alert">
                    <i class="bi bi-exclamation-triangle align-center"></i>
                    <?php echo $_SESSION["errorelogin"];
                    unset($_SESSION['errorelogin']); ?>
                </div>
            <?php elseif (isset($_SESSION["success"])): ?>
                <div class="alert alert-success mt-3 text" role="alert">
                    <i class="bi bi-check-circle align-center"></i>
                    <?php echo $_SESSION["success"];
                    unset($_SESSION['success']); ?>
                </div>             
            <?php endif; ?>
            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label ps-1 text-italic mb-0">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-envelope me-1"></i>
                            E-mail
                            <span class="text-danger">*</span>
                        </div>
                    </label>
                    <input type="email" class="form-control text text-input" id="email" name="email" autocomplete="off" required/>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label ps-1 text-italic mb-0">
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
                <div class="text-center">
                    <button type="submit" name="accedi" class="btn button ps-5 pe-5 mt-1">Accedi</button>
                </div>
            </form>
            <div class="text-center mt-4">
                <a href="../php/controlloEmail.php" class="text fw-bold">Password dimenticata?</a>
                <p class="mt-4 mb-2 text-italic">Non sei ancora registrato?</p>
                <a href="registrazione.php" class="btn button-outline mt-1 ps-5 pe-5 mb-2">Registrati</a>
                <a href="../php/index.php" class="text d-block mt-4 back">Indietro</a>
            </div>
        </div>
    </div>
</div>