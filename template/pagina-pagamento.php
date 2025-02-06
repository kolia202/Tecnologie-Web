<h1 class="text-center account">Pagamento</h1>

<div class="container">
<form method="POST" action="pagamento.php">
    <?php if (isset($_SESSION["paymenterror"])): ?>
        <div class="alert alert-danger text-center mt-3 alerts" role="alert">
            <i class="bi bi-exclamation-triangle align-center"></i>
            <?php echo $_SESSION["paymenterror"]; ?>
        </div>
    <?php endif; ?>
    <section class="border-bottom pb-3">
        <h3 class="fw-bold mt-3">Metodo di Pagamento</h3>
        <?php foreach($templateParams["pagamenti"] as $pagamento): ?>
            <div class="form-check ms-3">
                <input class="form-check-input payment-radio" type="radio" name="payment" id="<?php echo $pagamento["Id_pagamento"] ?>" value="<?php echo $pagamento["Id_pagamento"] ?>">
                <label class="form-check-label" for="<?php echo $pagamento["Id_pagamento"] ?>">
                    <?php echo $pagamento["Descrizione"]; ?>
                </label>
            </div>   
        <?php endforeach; ?>
    </section>
    <section>
        <h4 class="fw-bold mt-3">Usa i tuoi Punti Fedeltà!</h4>
        <p style="font-weight: bold;">Hai abbastanza punti per questo acquisto?</p>
        <p class="ordineconferma">Sei a un passo dal completare l'acquisto! Se desideri utilizzare i tuoi punti fedeltà, puoi farlo qui.</p>
        <p class="totale-punti ordineconferma">Per questo ordine sono necessari <?php echo $totalepunti; ?> punti</p>
        <p class="punti-utente" style="display: none;"><?php echo $userDetails["Punti"] ?></p>
        <button type="button" class="btn btn-outline paga-punti mb-3" style="border-color: rgb(137, 85, 32); color: rgb(137, 85, 32); font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Paga con i punti</button>
        <input type="hidden" name="usapunti" class="usa-punti" value="0">
        <p class="errore-punti" style="display: none;"></p>
    </section>

    <section class="border-top pt-3">
        <p class="totale-carrello"><strong>Carrello: </strong><?php echo getFormattedPrice($totale) ?></p>
        <p class="costo-spedizione"><strong>Spedizione: </strong><?php echo getFormattedPrice($costospedizione) ?></p>
        <h2 class="fw-bold totale-finale"><strong>Totale: </strong><?php echo getFormattedPrice($totale + $costospedizione); ?></h2>   
    </section>

    <div class="text-center mt-4">
        <button type="submit" name="invia" class="btn fw-bold confermab mb-5">Riepilogo Ordine</button>
    </div>
</form>    
</div>