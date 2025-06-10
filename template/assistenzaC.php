<div class="container mt-4 ps-4 pe-4 cont-assistenza">
    <h1 class="title">Assistenza Clienti</h1>
    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success mt-3 text" role="alert">
            <span class="bi bi-check-circle align-center"></span>
            <?php echo $_SESSION['success'];
            unset($_SESSION['success']); ?>
        </div>                  
    <?php endif; ?>
    <div class="card p-4 shadow mt-4 card-border">
        <h2 class="text fw-bold mb-2">Hai bisogno di aiuto?</h2>
        <h3 class="text">Contattaci</h3>
        <form action="assistenza.php" method="POST" class="mt-3">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nome" class="form-label mb-0 ps-1 text-italic">Nome<span class="text-danger">*</span></label>
                    <input type="text" class="form-control text text-input" name="nome" id="nome" required />
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cognome" class="form-label mb-0 ps-1 text-italic">Cognome<span class="text-danger">*</span></label>
                    <input type="text" class="form-control text text-input" name="cognome" id="cognome" required />
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label mb-0 ps-1 text-italic">E-mail<span class="text-danger">*</span></label>
                <input type="email" class="form-control text text-input" name="email" id="email" required />
            </div>
                <div class="mb-3 mt-4">
                    <label for="message" class="form-label mb-0 ps-1 text-italic">
                        Messaggio<span class="text-danger">*</span>
                    </label>
                    <textarea class="form-control text text-input" name="message" id="message" rows="4" placeholder="Scrivi qui il tuo messaggio..." required></textarea>
                </div>
            <div class="text-center mt-3">
                <button type="submit" class="btn button ps-5 pe-5 mt-1">Invia</button>
            </div>
        </form>
    </div>
    <div class="text-center mt-5">
        <a href="../php/index.php" class="text back">Indietro</a>
    </div>
</div>