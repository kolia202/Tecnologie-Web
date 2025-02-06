<div class="container mt-4">
  <div class="card p-4">
    <h1 class="text-center text-uppercase fw-bold custom-boldd">Recensioni dei clienti Mondo Morbidoso</h1>
    <div class="row mt-3">
      <div class="col-md-6">
        <p class="pRecensioni">Calcolato a partire da <?php echo number_format($templateParams["numeroRecensioni"]); ?> recensioni</p>
        <div class="container mt-4">
          <p class="star-rating">
            <?php echo getStarRating($mediaVoti); ?> 
            <?php echo number_format($mediaVoti, 1); ?> / 5
          </p>
        </div>
        <p class="mt-3">
          <span class="text-success">
            <i class="bi bi-emoji-smile-fill"></i> 
            <?php echo $recensioniDistribuzione["positive"]["percent"]; ?>%  
            <?php echo number_format($recensioniDistribuzione["positive"]["count"], 0, ',', '.'); ?> recensioni
          </span><br>
          <span class="text-warning">
            <i class="bi bi-emoji-neutral-fill"></i> 
            <?php echo $recensioniDistribuzione["neutral"]["percent"]; ?>%  
            <?php echo number_format($recensioniDistribuzione["neutral"]["count"], 0, ',', '.'); ?> recensioni
          </span><br>
          <span class="text-danger">
            <i class="bi bi-emoji-frown-fill"></i> 
            <?php echo $recensioniDistribuzione["negative"]["percent"]; ?>%  
            <?php echo number_format($recensioniDistribuzione["negative"]["count"], 0, ',', '.'); ?> recensioni
          </span>
        </p>
      </div>
      <div class="col-md-6 text-center">
        <h1 class="custom-boldd">Mondo Morbidoso</h1>
        <p class="pRecensioni"><small>Recensione sottoposta a verifica</small></p>
      </div>
    </div>
    <?php if (isUserLoggedIn() && !isAdminLoggedIn()): ?>
      <button type="button" class="btn btn-primary custom-btnRec" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Scrivi una recensione
      </button>
    <?php elseif (!isUserLoggedIn()): ?>
      <a href="../php/account.php" class="btn btn-primary custom-primary custom-btnRec">Scrivi una recensione</a>
    <?php endif; ?>
          <h5 class="fw-bold text-center custom-centerT">Valutazioni clienti</h5>
          <div class="container mt-4">
    <div class="row"> 
        <?php foreach ($templateParams["recensioni"] as $recensione): ?>
            <div class="col-md-12 col-lg-4 mb-4"> 
                <div class="card p-3 border custom-border">
                    <h6 class="fw-bold"> 
                        <?php echo htmlspecialchars($recensione["Nome"] . " " . $recensione["Cognome"]); ?> 
                    </h6>
                    <p class="text-muted"> 
                        <?php echo date("d/m/Y", strtotime($recensione["Data"])); ?> 
                    </p>
                    <p class="star-rating"> 
                        <?php echo getStarRating($recensione["Voto"]); ?> 
                    </p>
                    <p> 
                        <?php echo nl2br(htmlspecialchars($recensione["Commento"])); ?> 
                    </p>
                    <?php if (isAdminLoggedIn()): ?>
                        <form method="POST" action="recensioni.php">
                            <input type="hidden" name="nome" value="<?php echo htmlspecialchars($recensione['Nome']); ?>">
                            <input type="hidden" name="cognome" value="<?php echo htmlspecialchars($recensione['Cognome']); ?>">
                            <button type="submit" class="btn btn-danger btn-sm custom-btnRec">Elimina</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div> 
</div> 
</div>
<?php if (isUserLoggedIn() && !isAdminLoggedIn()): ?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 custom-boldd" id="exampleModalLabel">Scrivi una recensione</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="reviewForm" action="recensioni.php" method="POST">
          <div class="mb-31">
            <label class="col-form-label">Voto:</label>
            <select class="form-control" id="voto" name="voto" required>
              <option value="1">1 - Pessimo</option>
              <option value="2">2 - Scarso</option>
              <option value="3">3 - Medio</option>
              <option value="4">4 - Buono</option>
              <option value="5">5 - Ottimo</option>
            </select>
          </div>
          <div class="mb-31">
            <label for="commento" class="col-form-label">Commento:</label>
            <textarea class="form-control" id="commento" name="commento" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary custom-btnRec">Invia Recensione</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
