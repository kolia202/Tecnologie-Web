<h1 style="text-align: left; margin-left: 2%;">Il mio account</h1>
<h2 style="text-align: left; margin-left: 2%;">Registrati</h2>
<?php
if (isset($_SESSION["error"])) {
    echo "<div style='color: red;'>" . $_SESSION["error"] . "</div>";
    unset($_SESSION["error"]);
}
?>
<form id="registerForm" action="registrati.php" method="POST">
    <div class="row">
        <div class="col">
            <label for="nome">Nome<span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="col">
            <label for="cognome">Cognome<span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="cognome" name="cognome" required>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <label for="telefono">Telefono<span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="telefono" name="telefono">
        </div>
        <div class="col">
            <label for="data_nascita">Data di nascita</label>
            <input type="date" class="form-control" id="data_nascita" name="data_nascita">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <label for="email">Indirizzo email<span style="color: red;">*</span></label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <label for="password">Password<span style="color: red;">*</span></label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="col">
            <label for="password_confirm">Ripeti password<span style="color: red;">*</span></label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Registrati</button>
</form>
