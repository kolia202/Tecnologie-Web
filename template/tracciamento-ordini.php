<h1 class="text-center account">Traccia il tuo Ordine</h1>

<div class="container">
    <div class="box p-4 mx-auto">
        <div class="card mb-3">
            <div class="card-body">
                <h2 class="fw-bold">Ordine #<?php echo $ordine['Id_ordine'] ?></h2>
                <div class="progress mt-3" role="progressbar" aria-label="Animated striped example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-striped progress-bar-animated"></div>
                </div>
                <p class="mt-2"><strong>Stato: </strong><?php echo $ordine['Stato'] ?></p>
                <input type="hidden" class="order-status" value="<?php echo $ordine['Stato'] ?>">
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="fw-bold">Dettagli Spedizione</h4>
                <p><strong>Spedizione: </strong><?php echo $spedizione['Nome'] ?></p>
                <p><strong>Indirizzo di Spedizione: </strong>Via Cesare Pavese, 50, Cesena</p>
                <p><strong>Data di consegna prevista: </strong><?php echo $dataprevista ?></p>
            </div>
        </div>
    </div>
</div>