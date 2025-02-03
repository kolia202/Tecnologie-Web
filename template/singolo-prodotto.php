<?php if(count($templateParams["prodotto"]) == 0): ?>
    <article>
        <p>Prodotto non presente</p>
    </article>
<?php
    else:
        $prodotto = $templateParams["prodotto"][0];
?>
    <article>
        <section>
            <div>
                <img src="<?php echo IMG_DIR.$prodotto["Immagine"]; ?>" alt=""/>
            </div>
            <h1><?php echo $prodotto["Nome"]; ?></h1>
            <p><?php echo $prodotto["Nome_categoria"]; ?></p>
            <?php if($prodotto["Scorta"] <= 0): ?>
                <span type="button" class="btn btn-sm fw-bold" style="background-color: black; color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px;">Esaurito</span>
            <?php endif; ?>
        </section>
        <section>
            <p>Prezzo: <?php echo getFormattedPrice($prodotto["Prezzo"]); ?></p>
            <p>Taglia: <?php echo $prodotto["Grandezza"]; ?></p>
            <?php if ($prodotto["Scorta"] > 0): ?>
                <div class="text-center">
                    <button type="button" class="btn btn-sm fw-bold add-to-cart" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;" id="<?php echo $prodotto["Id_prodotto"]; ?>">Aggiungi al carrello</button>
                </div>
            <?php elseif (isUserLoggedIn()): ?>
                <p>Vuoi essere tra i primi a sapere quando questo fantastico peluche sarà di nuovo disponibile?</p>
                <form class="avviso-disponibilita" method="POST">
                    <input type="hidden" class="id-utente" value="<?php echo $_SESSION["utente"]; ?>">
                    <input type="hidden" class="id-prodotto" value="<?php echo $prodotto["Id_prodotto"]; ?>">
                    <button type="submit" class="btn btn-sm fw-bold btn-avviso" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Avviso Disponibilità</button>
                </form>
            <?php else: ?>
                <p>Vuoi essere tra i primi a sapere quando questo fantastico peluche sarà di nuovo disponibile?<br>Prima esegui l'accesso al tuo account.</p>
                <button type="button" class="btn btn-sm fw-bold" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;" disabled>Avviso Disponibilità</button>
            <?php endif; ?>
            <a href="<?php echo isUserLoggedIn() ? 'dettaglioProdotto.php?azione=aggiungi&id_prodotto=' . $prodotto["Id_prodotto"] : 'account.php'; ?>">
                Aggiungi ai Preferiti
            </a>
            <h2>Descrizione</h2>
            <p><?php echo $prodotto["Descrizione"]; ?></p>
        </section>
    </article>
<?php endif; ?>