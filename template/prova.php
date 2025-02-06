<h1 class="text-center text-primary my-4">Pagamento</h1>

<div class="container my-5">
    <div class="box p-4 rounded shadow bg-white mx-auto" style="max-width: 600px;">
        <form method="POST" action="pagamento.php">
            <?php if (isset($_SESSION["paymenterror"])): ?>
                <p class="text-danger text-center fw-bold"><?php echo $_SESSION["paymenterror"]; ?></p>
            <?php endif; ?>
            
            <section class="border-bottom pb-3">
                <h3 class="fw-bold">Metodo di Pagamento</h3>
                <?php foreach($templateParams["pagamenti"] as $pagamento): ?>
                    <div class="form-check ms-3">
                        <input class="form-check-input payment-radio" type="radio" name="payment" id="<?php echo $pagamento["Id_pagamento"] ?>" value="<?php echo $pagamento["Id_pagamento"] ?>">
                        <label class="form-check-label" for="<?php echo $pagamento["Id_pagamento"] ?>">
                            <?php echo $pagamento["Descrizione"]; ?>
                        </label>
                    </div>   
                <?php endforeach; ?>
            </section>
            
            <section class="my-3">
                <h4 class="fw-bold">Usa i tuoi punti fedeltà</h4>
                <p>Hai abbastanza punti per questo acquisto? Se lo desideri, puoi utilizzarli ora.</p>
                <p class="totale-punti">Punti necessari: <strong><?php echo $totalepunti; ?></strong></p>
                <p class="punti-utente text-muted" style="display: none;"><?php echo $userDetails["Punti"] ?></p>
                <button type="button" class="btn btn-outline-secondary paga-punti">Paga con i punti</button>
                <input type="hidden" name="usapunti" class="usa-punti" value="0">
                <p class="errore-punti text-danger" style="display: none;"></p>
            </section>
            
            <section class="border-top pt-3">
                <h4 class="fw-bold">Riepilogo Ordine</h4>
                <p class="totale-carrello">Carrello: <strong><?php echo getFormattedPrice($totale) ?></strong></p>
                <p class="costo-spedizione">Spedizione: <strong><?php echo getFormattedPrice($costospedizione) ?></strong></p>
                <h2 class="totale-finale text-primary">Totale: <strong><?php echo getFormattedPrice($totale + $costospedizione); ?></strong></h2>
            </section>
            
            <div class="text-center mt-4">
                <button type="submit" name="invia" class="btn btn-primary fw-bold">Riepilogo Ordine</button>
            </div>
        </form>
    </div>
</div>
