<?php if ($category): ?>
    <h1><?php echo $category; ?></h1>
<?php else: ?>
    <h1>Tutti i peluches</h1>
<?php endif; ?>
<?php foreach($templateParams["prodotti"] as $prodotto): ?>
    <a href="../php/dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>">
        <img src="<?php echo IMG_DIR.$prodotto["Immagine"]; ?>" alt=""/>
        <h2><?php echo $prodotto["Nome"]; ?></h2>
    </a>
    <p><?php echo $prodotto["Nome_categoria"]; ?></p>
    <p><?php echo getFormattedPrice($prodotto["Prezzo"]); ?></p>
    <div class="text-center">        
        <button type="button" class="btn btn-sm fw-bold add-to-cart" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;" id="<?php echo $prodotto["Id_prodotto"]; ?>">
            Aggiungi al carrello
        </button>
    </div>
<?php endforeach; ?>
