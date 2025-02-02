<form method="POST" action="resetPassword.php">
    <h1 style="text-align: left; margin-left: 2%;">Reset Password</h1>
    <?php
    if (isset($_SESSION["error"])) {
        echo "<div style='color: red;'>" . $_SESSION["error"] . "</div>";
        unset($_SESSION["error"]);
    }
    ?>
    <div class="mb-3">
        <label for="password" class="form-label">Nuova Password<span style="color: red;">*</span></label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3">
        <label for="confirm_password" class="form-label">Conferma Password<span style="color: red;">*</span></label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
    </div>
    <button type="submit" class="btn btn-primary">Resetta Password</button>
</form>
<p><a href="../php/controlloEmail.php">Indietro</a></p>