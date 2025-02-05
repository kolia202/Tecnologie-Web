<div class="container mt-5">
    <h2 class="mb-4 text-center">Gestione Utenti</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark text-center">
                <tr>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Email</th>
                    <th>Numero di Telefono</th>
                    <th>Data di Nascita</th>
                    <th>Punti</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($utenti as $utente): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($utente['Nome']); ?></td>
                        <td><?php echo htmlspecialchars($utente['Cognome']); ?></td>
                        <td><?php echo htmlspecialchars($utente['E_mail']); ?></td>
                        <td><?php echo htmlspecialchars($utente['Numero_telefono']); ?></td>
                        <td><?php echo htmlspecialchars($utente['Data_di_nascita']); ?></td>
                        <td><?php echo htmlspecialchars($utente['Punti']); ?></td>
                        <td class="text-center">
                            <a href="gestisciAccount.php?email=<?php echo urlencode($utente['E_mail']); ?>" 
                               class="btn btn-danger btn-sm w-100" 
                               onclick="return confirm('Sei sicuro di voler eliminare questo utente?');">
                               Elimina
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>