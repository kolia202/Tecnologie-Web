<h1 class="total-price">Spedizione <i class="bi bi-truck"></i></h1>
<form method="POST" action="spedizione.php" class="custom-form">
    <?php if (isset($_SESSION["shippingerror"])): ?>
        <p class="error"><?php echo $_SESSION["shippingerror"]; ?></p>
    <?php endif; ?>
    <?php if($spedizioneGratuita): ?>
        <p class="spedizione-alert">
            Congratulazioni! Hai diritto alla spedizione Premium gratuita!
        </p>
    <?php endif; ?>
    <?php foreach($templateParams["spedizioni"] as $spedizione): ?>
        <section class="border-bottom ps-3">
            <div class="form-check ms-4">
                <input class="form-check-input shipping-radio" type="radio" name="shipping" id="<?php echo $spedizione["Id_spedizione"] ?>" value="<?php echo $spedizioneGratuita ? 3 : $spedizione["Id_spedizione"] ?>" <?php echo $spedizioneGratuita ? 'disabled' : ''; ?>/>
                <label class="form-check-label" for="<?php echo $spedizione["Id_spedizione"] ?>">
                    <?php echo $spedizione["Nome"]; ?>
                </label>
            </div> 
            <p class="spedizione-p"><?php echo $spedizione["Descrizione"] ?></p>
            <p class="shipping-price<?php echo $spedizione["Id_spedizione"]; ?>">Prezzo: <?php echo getFormattedPrice($spedizione["Costo"]) ?></p>
        </section>   
    <?php endforeach; ?>
    <section>
        <h4 class="subtotale">Subtotale: <?php echo getFormattedPrice($totale); ?></h4>
        <h4 class="shipping-cost">Spedizione:
            <?php echo $spedizioneGratuita ? 'Gratuita' : '' ?>
        </h4>
        <h2 class="totale">Totale <?php echo getFormattedPrice($totale); ?></h2>
    </section>
    <div class="text-center">
        <button class="button-invia" type="submit" name="invia" class="btn btn-sm fw-bold">Vai al pagamento</button>
    </div>
</form>


 