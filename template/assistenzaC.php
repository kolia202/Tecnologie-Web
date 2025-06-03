<h1 class="text-center account">Assistenza Clienti</h1>
<div class="container mt-4 cont-account">
    <div class="box p-4 mb-5 rounded shadow bg-white mx-auto">
        <h2 class="text-center asstitle">Hai bisogno di aiuto?</h2>
        <?php if(isset($_SESSION['successo'])): ?>
            <div class="alert alert-success text-center mt-3 text" role="alert">
                <i class="bi bi-check-circle align-center"></i>
                <?php echo $_SESSION["successo"];
                unset($_SESSION['successo']); ?>
            </div>                  
        <?php endif; ?>
        <h4 class="fw-bold mt-1 asstitle">Contattaci</h4>
        <form action="assistenza.php" method="POST">
            <div class="mb-3">
                <label class="form-label ps-1 infologin">Nome e Cognome <span class="text-danger">*</span></label>
                <div class="d-flex gap-2">
                    <input type="text" class="form-control inputlogin" placeholder="Nome" required>
                    <input type="text" class="form-control inputlogin" placeholder="Cognome" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label ps-1 infologin">E-mail <span class="text-danger">*</span></label>
                <input type="email" class="form-control inputlogin" placeholder="Inserisci la tua E-mail" required>
            </div>
            <div class="mb-3">
                <label class="form-label ps-1 infologin">Messaggio <span class="text-danger">*</span></label>
                <textarea class="form-control inputlogin" rows="3" placeholder="Scrivi il tuo messaggio..." required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn bmenu fw-bold ps-5 pe-5">Invia</button>
            </div>
        </form>
    </div>
</div>