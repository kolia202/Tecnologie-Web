<form method="POST" action="controlloEmail.php">
    <h1 style="text-align: left; margin-left: 2%;">Il mio account</h1>
    <p>Hai perso la password? Inserisci il tuo indirizzo email.<br>
        Verrai reindirizzato alla pagina di reset della password.</p>
    <?php
    if (isset($_SESSION["error"])) {
        echo "<div style='color: red;'>" . $_SESSION["error"] . "</div>";
        unset($_SESSION["error"]); 
    }
    ?>
    <div class="mb-3">
        <label for="email" class="form-label">Email<span style="color: red;">*</span></label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <button type="submit" class="btn btn-primary">Avanti</button>
</form>
<p><a href="../php/account.php">Indietro</a></p>