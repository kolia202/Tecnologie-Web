<?php if ($category): ?>
    <h1><?php echo $category; ?></h1>
<?php elseif(isset($_GET["search"])): ?>
    <h1>Risultati per '<?php echo $_GET["search"] ?>'</h1>
<?php else: ?>
    <h1>Tutti i peluches</h1>
<?php endif; ?>
<?php if(isAdminLoggedIn()): ?>
    <a href="#" type="button" class="btn btn-primary">Aggiungi Prodotto</a>
<?php endif; ?>
<?php foreach($templateParams["prodotti"] as $prodotto): ?>
    <a href="../php/dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>">
        <img src="<?php echo IMG_DIR.$prodotto["Immagine"]; ?>" alt=""/>
        <h2><?php echo $prodotto["Nome"]; ?></h2>
    </a>
    <?php if(isAdminLoggedIn() && $prodotto['attivo'] == 0): ?>
        <span type="button" class="btn btn-sm fw-bold" style="background-color: black; color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px;">Prodotto Disattivato</span>
    <?php elseif($prodotto["Scorta"] <= 0): ?>
        <span type="button" class="btn btn-sm fw-bold" style="background-color: black; color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px;">Esaurito</span>
    <?php endif; ?>
    <p><?php echo $prodotto["Nome_categoria"]; ?></p>
    <p><?php echo getFormattedPrice($prodotto["Prezzo"]); ?></p>
    <?php if(isAdminLoggedIn()): ?>
        <div class="d-flex justify-content-between ms-5 me-5">        
            <a href="../php/dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>" type="button" class="btn btn-sm fw-bold" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">
                Gestisci prodotto
            </a>
            <form action="gestisci-prodotto.php" method="POST">
                    <input type="hidden" name="idprodotto" value="<?php echo $prodotto['Id_prodotto']; ?>"/>
                    <button type='submit' class='btn btn-primary' name='eliminaprodotto'>Elimina Prodotto</button>
            </form>
        </div>
    <?php else: ?>
        <div class="text-center">        
            <button type="button" class="btn btn-sm fw-bold add-to-cart" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;" id="<?php echo $prodotto["Id_prodotto"]; ?>">
                Aggiungi al carrello
            </button>
        </div>
    <?php endif; ?>
<?php endforeach; ?>
