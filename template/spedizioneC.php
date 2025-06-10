<div class="container mt-4 ps-4 pe-4 cont-shipping">
    <div class="d-flex align-items-center justify-content-center gap-2">
        <span class="bi bi-truck" aria-hidden="true"></span>
        <h1 class="title mb-0">Spedizione</h1>
    </div>
    <form method="POST" action="spedizione.php">
        <?php if($spedizioneGratuita): ?>
            <div class="stock-warning card-border d-block rounded pt-2 pb-2 ps-3 pe-3 ms-3 me-3 mt-4">
                <p class="text-italic mb-0">Congratulazioni! Hai diritto alla spedizione Premium gratuita.</p>
            </div>
            <section class="mt-5 pt-4">
                <h4 class="text-italic pt-1"><strong>Subtotale:</strong> <?php echo getFormattedPrice($totale); ?></h4>
                <h4 class="text-italic"><strong>Spedizione:</strong> Gratuita</h4>
                <h2 class="text fw-bold">Totale: <?php echo getFormattedPrice($totale); ?></h2>
                <div class="text-center mt-4">
                    <button class="btn button ps-4 pe-4" type="submit" name="invia">Vai al pagamento</button>
                </div>
            </section>
        <?php else: ?>
                <fieldset class="border-0 p-0 m-0">
                <legend class="visually-hidden">Seleziona il metodo di spedizione</legend>
                <?php foreach($templateParams["spedizioni"] as $spedizione): ?>
                    <div class="card shadow card-border ps-3 pe-3 pt-2 pb-2 mt-4">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="form-check d-flex align-items-center ms-2 mb-0">
                                <input class="form-check-input shipping-radio radio-input mb-1 me-1"
                                    type="radio"
                                    name="shipping"
                                    id="<?php echo $spedizione['Id_spedizione'] ?>"
                                    value="<?php echo $spedizioneGratuita ? 3 : $spedizione["Id_spedizione"] ?>"
                                    required />
                                <label class="text fw-bold" for="<?php echo $spedizione['Id_spedizione'] ?>">
                                    <?php echo $spedizione["Nome"]; ?>
                                </label>
                            </div>
                            <p class="shipping-price<?php echo $spedizione['Id_spedizione']; ?> mb-0 ms-auto text-italic me-2">
                                <strong>Prezzo:</strong> <?php echo getFormattedPrice($spedizione["Costo"]) ?>
                            </p>
                        </div>
                        <p class="text mb-0 ps-2 pe-2"><?php echo $spedizione["Descrizione"] ?></p>                    
                    </div>
                <?php endforeach; ?>
            </fieldset>
            <section class="mt-4">
                <h4 class="text-italic pt-1 subtotale"><strong>Subtotale:</strong> <?php echo getFormattedPrice($totale); ?></h4>
                <h4 class="text-italic shipping-cost"><strong>Spedizione:</strong> <?php echo $spedizioneGratuita ? 'Gratuita' : '' ?></h4>
                <h2 class="text totale fw-bold">Totale: <?php echo getFormattedPrice($totale); ?></h2>
                <div class="text-center mt-4">
                    <button class="btn button ps-4 pe-4" type="submit" name="invia">Vai al pagamento</button>
                </div>
            </section>
        <?php endif; ?>
    </form>
    <div class="text-center mt-4">
        <a href="../php/carrello.php" class="text back">Indietro</a>
    </div>
</div>



 