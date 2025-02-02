<h1>Pagamento</h1>

<form method="POST" action="pagamento.php">
    <?php if (isset($_SESSION["paymenterror"])): ?>
        <p style="color: red;"><?php echo $_SESSION["paymenterror"]; ?></p>
    <?php endif; ?>
    <?php foreach($templateParams["pagamenti"] as $pagamento): ?>
        <div class="form-check ms-4">
            <input class="form-check-input" type="radio" name="payment" id="<?php echo $pagamento["Id_pagamento"] ?>" value="<?php echo $pagamento["Id_pagamento"] ?>">
            <label class="form-check-label" for="<?php echo $pagamento["Id_pagamento"] ?>">
                <?php echo $pagamento["Descrizione"]; ?>
            </label>
        </div>   
    <?php endforeach; ?>
    <div class="text-center">
        <button type="submit" name="invia" class="btn btn-sm fw-bold" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Riepilogo Ordine</button>
    </div>
</form>