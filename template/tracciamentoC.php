<div class="container mt-4 ps-4 pe-4 cont-tracking">
    <h1 class="title mb-0">Traccia Ordine</h1>
    <div class="card shadow-sm card-border card-tracking ms-3 me-3 mb-3 mt-4 p-1">
        <div class="card-body">
            <h2 class="fw-bold text">Ordine #<?php echo $ordine['Id_ordine'] ?></h2>
            <div class="progress mt-4" role="progressbar" aria-label="Animated striped example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar progress-bar-striped progress-bar-animated"></div>
            </div>
            <p class="mt-3 mb-0 text"><strong>Stato: </strong><?php echo $ordine['Stato'] ?></p>
            <input type="hidden" class="order-status" value="<?php echo $ordine['Stato'] ?>">
        </div>
    </div>
    <div class="card shadow card-border mt-4 ms-2 me-2">
        <div class="card-body">
            <h3 class="text-start text fw-bold mb-2">Dettagli Spedizione</h3>
            <p class="text-start text mb-0"><strong>Spedizione: </strong><?php echo $spedizione['Nome'] ?></p>
            <p class="text-start text mb-0"><strong>Indirizzo: </strong>Via Cesare Pavese, 50, Cesena</p>
            <p class="text-start text mb-0"><strong>Data di Consegna: </strong><?php echo $dataprevista ?></p>
        </div>
    </div>
    <div class="text-center mt-4">
        <a href="../php/ordini.php" class="text back">Indietro</a>
    </div>
</div>