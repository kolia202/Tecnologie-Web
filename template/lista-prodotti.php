<?php if ($category): ?>
    <h1><?php echo $category; ?></h1>
<?php elseif(isset($_GET["search"])): ?>
    <h1>Risultati per '<?php echo $_GET["search"] ?>'</h1>
<?php else: ?>
    <h1>Tutti i peluches</h1>
<?php endif; ?>
<?php if(isAdminLoggedIn()): ?>
    <button type="button" class="btn btn-primary ms-5" data-bs-toggle="modal" data-bs-target="#aggiungiprodotto">
        Aggiungi Prodotto
    </button>
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
                <input type="hidden" name="previous" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
                <button type='submit' class='btn btn-primary' name='eliminaprodotto' value="<?php echo $prodotto['Id_prodotto']; ?>">Elimina Prodotto</button>
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
<div class="modal fade" id="aggiungiprodotto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Nuovo Prodotto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="gestisci-prodotto.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <label for="immagineprodotto"></label>
                    <input type="file" id="immagineprodotto" name="immagineprodotto" accept="image/*" required/>
                    <br><label for="nomeprodotto"></label>
                    <input type="text" id="nomeprodotto" name="nomeprodotto" placeholder="Nome" required/>
                    <br><label for="categoriaprodotto"></label>
                    <select id="categoriaprodotto" name="categoriaprodotto" required>
                        <option value="" disabled selected>Categoria</option>
                        <?php foreach($templateParams["categorie"] as $categoria): ?>
                            <option value="<?php echo $categoria["Nome_categoria"]; ?>"><?php echo $categoria["Nome_categoria"] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br><label for="tagliaprodotto"></label>
                    <select id="tagliaprodotto" name="tagliaprodotto" required>
                        <option value="" disabled selected>Taglia</option>
                        <option value="S">S - Small</option>
                        <option value="M">M - Medium</option>
                        <option value="L">L - Large</option>
                    </select>
                    <br><label for="prezzoprodotto"></label>
                    <input type="number" step="0.01" min="0" id="prezzoprodotto" name="prezzoprodotto" placeholder="Prezzo" required/>
                    <br><label for="puntiprodotto"></label>
                    <input type="number" id="puntiprodotto" name="puntiprodotto" min="0" placeholder="Punti" required/>
                    <br><label for="scorteprodotto"></label>
                    <input type="number" id="scorteprodotto" name="scorteprodotto" min="1" placeholder="Scorte" required/>
                    <br><label for="descrizioneprodotto">Descrizione:</label>
                    <textarea rows="10" style="width: 100%" id="descrizioneprodotto" name="descrizioneprodotto" placeholder="Scrivi qui..." required/></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button type="submit" class="btn btn-primary" name="aggiungiprodotto">Salva</button>
                </div>
            </form>
        </div>
    </div>
</div>
