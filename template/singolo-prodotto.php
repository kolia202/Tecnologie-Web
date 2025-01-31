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
        </section>
        <section>
            <p>Prezzo: <?php echo $prodotto["Prezzo"]; ?></p>
            <p>Taglia: <?php echo $prodotto["Grandezza"]; ?></p>
            <div class="text-center">
                <a href="#">
                    <button type="button" class="btn btn-sm fw-bold" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Aggiungi al carrello</button>
                </a>
            </div>
            <a href="#">Aggiungi ai Preferiti</a>
            <h2>Descrizione</h2>
            <p><?php echo $prodotto["Descrizione"]; ?></p>
        </section>
    </article>
<?php endif; ?>