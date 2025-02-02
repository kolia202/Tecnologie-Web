<h1>Pagamento</h1>

<form method="POST" action="pagamento.php">
    <?php if (isset($_SESSION["paymenterror"])): ?>
        <p style="color: red;"><?php echo $_SESSION["paymenterror"]; ?></p>
    <?php endif; ?>
    <section class="border-bottom">
        <?php foreach($templateParams["pagamenti"] as $pagamento): ?>
            <div class="form-check ms-4">
                <input class="form-check-input payment-radio" type="radio" name="payment" id="<?php echo $pagamento["Id_pagamento"] ?>" value="<?php echo $pagamento["Id_pagamento"] ?>">
                <label class="form-check-label" for="<?php echo $pagamento["Id_pagamento"] ?>">
                    <?php echo $pagamento["Descrizione"]; ?>
                </label>
            </div>   
        <?php endforeach; ?>
    </section>
    <p style="font-weight: bold;">Hai abbastanza punti per questo acquisto?</p>
    <p>Sei a un passo dal completare l'acquisto! Se desideri utilizzare i tuoi punti fedeltà, puoi farlo qui.</p>
    <p class="totale-punti">Per questo ordine sono necessari <?php echo $totalepunti; ?> punti</p>
    <p class="punti-utente" style="display: none;"><?php echo $userDetails["Punti"] ?></p>
    <button type="button" class="btn btn-outline paga-punti" style="border-color: rgb(137, 85, 32); color: rgb(137, 85, 32); font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Paga con i punti</button>
    <input type="hidden" name="usapunti" class="usa-punti" value="0">
    <p class="errore-punti" style="display: none;"></p>
    <section>
        <h4 class="totale-carrello">Carrello: <?php echo getFormattedPrice($totale) ?></h4>
        <h4 class="costo-spedizione">Spedizione: <?php echo getFormattedPrice($costospedizione) ?></h4>
        <h2 class="totale-finale">Totale: <?php echo getFormattedPrice($totale + $costospedizione); ?></h2>   
    </section>
    <div class="text-center">
        <button type="submit" name="invia" class="btn btn-sm fw-bold" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Riepilogo Ordine</button>
    </div>
</form>