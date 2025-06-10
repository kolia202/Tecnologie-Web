<div class="container mt-4 ps-4 pe-4 cont-order">
    <h1 class="title mb-0">Riepilogo Ordine</h1>
    <div class="row mt-4">
        <?php foreach($templateParams["carrello"] as $prodotto): ?>
            <div class="col-12 col-md-6 mb-3">
                <div class="card shadow card-border d-flex">
                    <div class="card-body d-flex align-items-center ps-0 pt-1 pb-1">
                        <img class="img-fluid" src="<?php echo IMG_DIR.$prodotto['Immagine']; ?>" alt="Immagine prodotto ordinato"/>
                        <div>
                            <h2 class="text text-start fw-bold"><?php echo $prodotto["Nome"]; ?></h2>
                            <p class="text text-start mb-0"><strong>Quantità: </strong><?php echo $prodotto["Quantita"]; ?></p>
                            <p class="text text-start mb-0"><strong>Prezzo: </strong><?php echo getFormattedPrice($prodotto["Prezzo"]) . ' - ' . $prodotto["Prezzo_punti"]; ?> punti</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <h3 class="text mt-3"><strong>Punti usati: </strong><?php echo $_SESSION["puntiusati"]; ?></h3>
    <h3 class="text"><strong>Totale: </strong><?php echo getFormattedPrice($_SESSION["totalecarrello"] + $costospedizione); ?></h3>
    <form method="POST" action="aggiungi-ordine.php">
        <div class="text-center mt-4">
            <button type="submit" class="btn button">Conferma Ordine</button>
        </div>
    </form>
    <div class="text-center mt-4">
        <a href="../php/pagamento.php" class="text back">Indietro</a>
    </div>
</div>