<div class="container mt-4">
    <div class="card p-4">
        <h1 class="text-center text-uppercase fw-bold">Recensioni dei clienti Mondo Morbidoso</h1>
        <div class="row mt-3">
            <div class="col-md-6">
                <p>Calcolato a partire da <?php echo number_format($templateParams["numeroRecensioni"])?> recensioni</p>
                <div class="container mt-4">
                    <p class="star-rating">
                        <?php echo getStarRating($mediaVoti); ?> 
                        <?php echo number_format($mediaVoti, 1); ?> / 5</p>
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
                    <h1 class="fw-bold">Mondo Morbidoso</h1>
                    <p class="text-muted"><small>Recensione sottoposta a verifica</small></p>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-8">
                <div class="card p-3">
                    <h5 class="fw-bold text-center">Valutazioni clienti</h5>
                    <div class="review-card">
                        <?php foreach ($templateParams["recensioni"] as $recensione): ?>
                            <div class="card mb-3 p-3 border">
                                <h6 class="fw-bold"> <?php echo htmlspecialchars($recensione["Nome"] . " " . $recensione["Cognome"]); ?> </h6>
                                <p class="text-muted"> <?php echo date("d/m/Y", strtotime($recensione["Data"])); ?> </p>
                                <p class="star-rating"> <?php echo getStarRating($recensione["Voto"]); ?> </p>
                                <p> <?php echo nl2br(htmlspecialchars($recensione["Commento"])); ?> </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (isUserLoggedIn()): ?>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Scrivi una recensione
    </button>
<?php else: ?>
    <button type="button" class="btn btn-primary" onclick="window.location.href='account.php'">
        Scrivi una recensione
    </button>
<?php endif; ?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Scrivi una recensione</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="reviewForm" action="recensioni.php" method="POST">
          <div class="mb-3">
            <label class="col-form-label">Nome:</label>
            <input type="text" class="form-control" 
                   value="<?php echo htmlspecialchars($templateParams['utente']['Nome'] ?? ''); ?>" 
                   readonly>
          </div>
          <div class="mb-3">
            <label class="col-form-label">Cognome:</label>
            <input type="text" class="form-control" 
                   value="<?php echo htmlspecialchars($templateParams['utente']['Cognome'] ?? ''); ?>" 
                   readonly>
          </div>
          <div class="mb-3">
            <label for="voto" class="col-form-label">Voto:</label>
            <select class="form-control" id="voto" name="voto" required>
              <option value="1">1 - Pessimo</option>
              <option value="2">2 - Scarso</option>
              <option value="3">3 - Medio</option>
              <option value="4">4 - Buono</option>
              <option value="5">5 - Ottimo</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="commento" class="col-form-label">Commento:</label>
            <textarea class="form-control" id="commento" name="commento" required></textarea>
          </div>
          <input type="hidden" name="email" value="<?php echo $_SESSION['utente'] ?? ''; ?>">
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
            <button type="submit" class="btn btn-primary">Invia Recensione</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>