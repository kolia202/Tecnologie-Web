<div class="container mt-4 ps-4 pe-4 cont-payment">
    <div class="d-flex align-items-center justify-content-center gap-2">
        <span class="bi bi-wallet2" aria-hidden="true"></span>
        <h1 class="title mb-0">Pagamento</h1> 
    </div>
    <form action="pagamento.php" method="POST">
                <fieldset class="border-0 p-0 m-0">
            <legend class="visually-hidden">Metodo di pagamento</legend>
            <div class="card stock-warning d-block card-border shadow-sm p-2 ms-3 me-3 mt-4">
                <div class="form-check d-flex align-items-center ms-2 mb-1">
                    <input class="form-check-input carta-radio radio-input mb-1 me-1" type="radio" name="payment" id="carta" checked />
                    <label class="text fw-bold" for="carta">Carta di Credito</label>
                </div>
                <div class="form-check d-flex align-items-center ms-2 mb-0">
                    <input class="form-check-input punti-radio radio-input mb-1 me-1" type="radio" name="payment" id="punti"/>
                    <label class="text fw-bold" for="punti">Punti Fedeltà</label>
                </div>
            </div>
        </fieldset>
        <div class="card card-border shadow mt-4 p-4 ms-1 me-1 sezioneCarta">
            <h2 class="text fw-bold mb-3">Dati della Carta</h2>
            <div class="row mb-3">
                <div class="col-6 pe-1">
                    <label for="nome" class="ps-1 text-italic">
                        Nome
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control text text-input" id="nome" name="nome" autocomplete="off" required>
                </div>
                <div class="col-6 ps-1">
                    <label for="cognome" class="ps-1 text-italic">
                        Cognome
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control text text-input" id="cognome" name="cognome" autocomplete="off" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="numeroCarta" class="ps-1 text-italic">
                        Numero Carta
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control text text-input" id="numeroCarta" name="numeroCarta" pattern="\d{16}" maxlength="16" required />
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6 pe-1">
                    <label for="scadenza" class="ps-1 text-italic">
                        Scadenza
                        <span class="text-danger">*</span>
                    </label>
                    <input type="month" class="form-control text text-input" id="scadenza" name="scadenza" placeholder="MM/AA" required>
                </div>
                <div class="col-6 ps-1">
                    <label for="cvv" class="ps-1 text-italic">
                        CVV
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control text text-input" id="cvv" name="cvv" pattern="\d{3}" maxlength="3" required>
                </div>
            </div>
        </div>
        <div class="card card-border shadow mt-4 p-4 ms-1 me-1 d-none sezionePunti">
            <h3 class="text fw-bold mb-2">Punti Fedeltà</h3>
            <p class="text">Usa i tuoi punti fedeltà per acquistare i peluche che ami!</p>
            <p class="punti-utente text fw-bold mb-2">Punti: <?php echo $userDetails["Punti"] ?></p>
            <div class="text-center ms-2 me-2">
                <label for="selezionaprodotto" class="visually-hidden">
                    Seleziona un peluche
                    <span class="text-danger">*</span>
                </label>
                <select class="form-control text text-input" id="selezionaprodotto" name="selezionaprodotto">
                <option class="text-start text-italic" value="" disabled selected>Seleziona un peluche</option>
                <?php foreach ($templateParams['carrello'] as $prodotto): ?>
                    <?php for($i = 0; $i < $prodotto['Quantita']; $i++): ?>
                        <option class="text-start text" value="<?php echo $prodotto['Nome'] ?>" 
                        data-punti="<?php echo $prodotto['Prezzo_punti']; ?>"
                        data-prezzo="<?php echo $prodotto['Prezzo']; ?>">
                        <?php echo $prodotto['Nome'] . ' - ' . $prodotto['Prezzo_punti'] . ' punti'?></option>                           
                    <?php endfor; ?>
                <?php endforeach; ?>
            </select>
            </div>
            <div class="rounded card-border stock-warning errore-selezione pe-3 ps-3 pb-2 pt-2 ms-3 me-3 mt-3">
                <p class="text-italic mb-0">Per favore, seleziona un peluche!</p>                
            </div>
            <div class="rounded card-border stock-warning errore-punti pe-3 ps-3 pb-2 pt-2 ms-3 me-3 mt-3">
                <p class="text-italic mb-0">Ops! Non hai abbastanza punti per questo peluche.</p>                
            </div>
            <div class="text-center mt-4">
                <button type="button" class="btn button-outline paga-punti">Paga con i punti</button>
                <input type="hidden" name="usapunti" class="usa-punti" value="0">
            </div>
        </div>
        <section class="mt-4">
            <h4 class="text-italic totale-carrello"><strong>Subtotale:</strong> <?php echo getFormattedPrice($totale) ?></h4>
            <h4 class="text-italic costo-spedizione"><strong>Spedizione:</strong> <?php echo getFormattedPrice($costospedizione) == '0,00€' ? 'Gratuita' : getFormattedPrice($costospedizione); ?></h4>
            <h2 class="text fw-bold totale-finale">Totale: <?php echo getFormattedPrice($totale + $costospedizione); ?></h2>   
            <input type="hidden" name="nuovotot" class="nuovo-tot" value="0">
            <input type="hidden" name="prezzopunti" class="prezzo-punti" value="0">
        </section>
        <div class="rounded card-border stock-warning errore-pagamento pe-3 ps-3 pb-2 pt-2 ms-3 me-3 mt-3">
            <p class="text-italic mb-0">Per favore, inserisci i dati della carta per completare il pagamento.</p>                
        </div>
        <div class="text-center mt-4">
            <button type="submit" name="invia" class="btn button">Riepilogo Ordine</button>
        </div>
    </form>
    <div class="text-center mt-4">
        <a href="../php/spedizione.php" class="text back">Indietro</a>
    </div>
</div>