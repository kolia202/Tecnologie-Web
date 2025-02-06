<div class="container mt-5">
  <!-- Sezione del profilo utente -->
  <section class="card shadow-lg p-4 mb-4 rounded bg-light">
    <h2 class="fw-bold text-left mb-3">Ciao, <?php echo $userDetails["Nome"]; ?> <i class="bi bi-person-circle"></i></h2>
    
    <!-- Dettagli utente -->
    <div class="d-flex flex-column align-items-start">
      <p><strong>Nome:</strong> <?php echo $userDetails["Nome"] . " " . $userDetails["Cognome"]; ?></p>
      <p><strong>Email:</strong> <?php echo $userDetails["E_mail"]; ?></p>
      <p><strong>Telefono:</strong> <?php echo $userDetails["Numero_telefono"]; ?></p>
      <p><strong>Data di Nascita:</strong> <?php echo $userDetails['Data_di_nascita'] != '0000-00-00' ? getFormattedDate($userDetails["Data_di_nascita"]) : 'Non disponibile'; ?></p>
      
      <!-- Punti Fedeltà -->
      <button type="button" class="btn btn-warning text-dark fw-semibold" data-bs-toggle="collapse" data-bs-target="#collapsePoints" aria-expanded="false" aria-controls="collapsePoints">
        <i class="bi bi-star-fill" style="color: rgb(255, 165, 0)"></i> <?php echo $userDetails["Punti"]; ?> Punti Fedeltà
      </button>
      
      <!-- Dettagli Punti Fedeltà -->
      <div class="collapse" id="collapsePoints">
        <div class="card card-body mt-2" style="background-color: rgba(0, 0, 0, 0.05);">
          <p><strong>Come funziona?</strong> Ogni 10€ di spesa guadagni 1 punto. Accumula punti per ottenere un peluche gratuito!</p>
        </div>
      </div>

      <!-- Logout e Navigazione -->
      <form method="POST" action="account.php">
        <button type="submit" name="logout" class="btn btn-danger mt-3">Logout</button>
      </form>
      <a href="../php/index.php" class="btn btn-secondary mt-2">Torna alla Home</a>
    </div>
  </section>
  
  <!-- Sezione Attività -->
  <section class="card shadow-lg p-4 mb-4 rounded bg-light">
    <h3 class="fw-bold">Attività</h3>
    <div class="row mb-3">
      
      <!-- Bottone Notifiche -->
      <div class="col-4">
        <a href="../php/notifiche.php" class="btn btn-info fw-bold w-100 position-relative">
          Notifiche
          <?php if ($numeronotifiche != 0): ?>
            <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
              <span class="visually-hidden">New alerts</span>
            </span>
          <?php endif; ?>
        </a>
      </div>
      
      <!-- Bottone Recensioni -->
      <div class="col-4">
        <a href="../php/recensioniMie.php" class="btn btn-info fw-bold w-100">Recensioni</a>
      </div>
      
      <!-- Bottone Ordini -->
      <div class="col-4">
        <a href="../php/ordini.php" class="btn btn-info fw-bold w-100">Ordini</a>
      </div>
    </div>
    
    <div class="row">
      <!-- Bottone Preferiti -->
      <div class="col-6">
        <a href="../php/preferiti.php" class="btn btn-info fw-bold w-100">I tuoi Preferiti</a>
      </div>
      
      <!-- Bottone Impostazioni -->
      <div class="col-6">
        <a href="../php/account.php" class="btn btn-info fw-bold w-100" data-bs-toggle="modal" data-bs-target="#editProfileModal">Impostazioni</a>
        
        <!-- Modale per modificare profilo -->
        <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Modifica Profilo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="POST" action="account.php">
                  <div class="mb-3">
                    <label for="nome" class="col-form-label">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($userDetails['Nome']); ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="cognome" class="col-form-label">Cognome:</label>
                    <input type="text" class="form-control" id="cognome" name="cognome" value="<?php echo htmlspecialchars($userDetails['Cognome']); ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="col-form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($userDetails['E_mail']); ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="telefono" class="col-form-label">Telefono:</label>
                    <input type="text" class="form-control" id="telefono" name="numero_telefono" value="<?php echo htmlspecialchars($userDetails['Numero_telefono']); ?>" required>
                  </div>
                  <div class="mb-3">
                    <label for="data_nascita" class="col-form-label">Data di Nascita:</label>
                    <input type="date" class="form-control" id="data_nascita" name="data_nascita" value="<?php echo htmlspecialchars($userDetails['Data_di_nascita']); ?>" required>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button type="submit" name="update_profile" class="btn btn-primary">Salva Modifiche</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
