<h1>Spedizione</h1>

<form method="POST" action="spedizione.php">
    <?php if (isset($_SESSION["shippingerror"])): ?>
        <p style="color: red;"><?php echo $_SESSION["shippingerror"]; ?></p>
    <?php endif; ?>
    <?php if($spedizioneGratuita): ?>
        <p style="color: green; font-weight: bold;">
            Congratulazioni! Hai diritto alla spedizione Premium gratuita!
        </p>
    <?php endif; ?>
    <?php foreach($templateParams["spedizioni"] as $spedizione): ?>
        <section class="border-bottom">
            <div class="form-check ms-4">
                <input class="form-check-input shipping-radio" type="radio" name="shipping" id="<?php echo $spedizione["Id_spedizione"] ?>" value="<?php echo $spedizioneGratuita ? 3 : $spedizione["Id_spedizione"] ?>" <?php echo $spedizioneGratuita ? 'disabled' : ''; ?>/>
                <label class="form-check-label" for="<?php echo $spedizione["Id_spedizione"] ?>">
                    <?php echo $spedizione["Nome"]; ?>
                </label>
            </div> 
            <p><?php echo $spedizione["Descrizione"] ?></p>
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
        <button type="submit" name="invia" class="btn btn-sm fw-bold" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Vai al pagamento</button>
    </div>
</form>