<h1>I tuoi ordini morbidosi!</h1>
<p>Qui trovi tutti i peluche che hai acquistato finora!</p>
<?php if(count($templateParams["ordini"]) == 0): ?>
    <div class="card ms-3 me-3" style="border-color: rgb(245, 222, 179);">
        <div class="card-body text-center">
            <p>Oh no! Nessun ordine per ora! Scopri la nostra collezione e troverai i peluches perfetti per te!</p>
            <a href="../php/prodotti.php" type="button" class="btn btn-sm fw-bold" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Scopri tutti i nostri Peluches</a>
        </div>
    </div>
<?php else: ?>
    <?php foreach($templateParams["ordini"] as $ordine): ?>
        <div class="card ms-3 me-3 mb-3" style="border-color: rgb(245, 222, 179);">
            <div class="card-body">
                <h2 class="mb-0" style="font-size: 20px;">Ordine #<?php echo $ordine["Id_ordine"] ?>  -  <?php echo $ordine["Stato"] ?></h2>
                <p style="font-size:15px;"><?php echo getFormattedDate($ordine["Data_effettuazione"]) ?></p>
                <a href="#" type="button" class="btn fw-bold" style="background-color: rgb(204, 153, 102); color: white;">Traccia il tuo ordine</a>
                <a href="../php/singolo-ordine.php?id=<?php echo $ordine["Id_ordine"] ?>" type="button" class="btn fw-bold" style="background-color: rgb(204, 153, 102); color: white;">Dettagli Ordine</a>
            </div>
        </div>        
    <?php endforeach; ?>
<?php endif; ?>