<h1>Tutti i peluches</h1>
<?php foreach($templateParams["prodotti"] as $prodotto): ?>
    <a href="../php/dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>">
        <img src="<?php echo IMG_DIR.$prodotto["Immagine"]; ?>" alt=""/>
        <h2><?php echo $prodotto["Nome"]; ?></h2>
    </a>
    <p><?php echo $prodotto["Nome_categoria"]; ?></p>
    <p><?php echo getFormattedPrice($prodotto["Prezzo"]); ?></p>
<?php endforeach; ?>
