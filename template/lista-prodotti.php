<h1>Tutti i peluches</h1>
<?php foreach($templateParams["prodotti"] as $prodotto): ?>
    <img src="<?php echo IMG_DIR.$prodotto["Immagine"]; ?>" alt=""/>
    <h2><a href="#"><?php echo $prodotto["Nome"]; ?></a></h2>
    <p><?php echo $prodotto["Nome_categoria"]; ?></p>
    <p><?php echo getFormattedPrice($prodotto["Prezzo"]); ?></p>
<?php endforeach; ?>
