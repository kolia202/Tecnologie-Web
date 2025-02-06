<div class="container mt-4 ps-4 pe-4">
    <?php if ($category): ?>
        <h1 class="text-center favorite-store-titlee"><?php echo $category; ?></h1>
    <?php elseif(isset($_GET["search"])): ?>
        <h1 class="text-center favorite-store-titlee">Risultati per '<?php echo $_GET["search"] ?>'</h1>
    <?php else: ?>
        <h1 class="text-center favorite-store-titlee">
            Tutti i peluches
            <i class="bi bi-stars"></i>
        </h1>
    <?php endif; ?>

    <?php if(isAdminLoggedIn()): ?>
        <div class="text-center mt-5 mb-2">
            <button type="button" class="btn btn-primary aggiungiprodottob ps-4 pe-4 fw-bold" data-bs-toggle="modal" data-bs-target="#aggiungiprodotto">
                Aggiungi Prodotto
            </button>
        </div>
    <?php endif; ?>

    <div class="row mt-4">
        <?php foreach($templateParams["prodotti"] as $prodotto): ?>
            <div class="col-12 col-md-4 mb-5">
                <a class="dettaglio" href="../php/dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>">
                    <img class="fotoProdotto img-fluid" src="<?php echo IMG_DIR.$prodotto["Immagine"]; ?>" alt="Foto prodotto"/>
                    <h2 class="nomeProdotto text-center mt-3"><?php echo $prodotto["Nome"]; ?></h2>
                </a>
                <div class="text-center">
                    <?php if(isAdminLoggedIn() && $prodotto['attivo'] == 0): ?>
                        <span class="btn btn-sm fw-bold blackb mb-2">Prodotto Disattivato</span>
                    <?php elseif($prodotto["Scorta"] <= 0): ?>
                        <span class="btn btn-sm fw-bold blackb mb-2">Esaurito</span>
                    <?php endif; ?>
                </div>
                <p class="text-center pProdotto"><?php echo getFormattedPrice($prodotto["Prezzo"]); ?></p>

                <?php if(isAdminLoggedIn()): ?>
                    <div class="d-flex justify-content-between ms-4 me-4">        
                        <a href="../php/dettaglioProdotto.php?id=<?php echo $prodotto["Id_prodotto"]; ?>" type="button" class="btn btn-sm fw-bold gestiscip">
                            Gestisci prodotto
                        </a>
                        <form action="gestisci-prodotto.php" method="POST">
                            <input type="hidden" name="previous" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
                            <button type='submit' class='btn btn-danger btn-sm eliminap' name='eliminaprodotto' value="<?php echo $prodotto['Id_prodotto']; ?>">Elimina Prodotto</button>
                        </form>
                    </div>
                <?php else: ?>
                    <div class="text-center">        
                        <button type="button" class="btn btn-sm fw-bold add-to-cart" id="<?php echo $prodotto["Id_prodotto"]; ?>">
                            Aggiungi al carrello
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<div class="modal fade" id="aggiungiprodotto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-titlep fs-5" id="staticBackdropLabel">Nuovo Prodotto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="gestisci-prodotto.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <label for="immagineprodotto"></label>
                    <input type="file" id="immagineprodotto" name="immagineprodotto" accept="image/*" required/>
                    <br><label for="nomeprodotto"></label>
                    <input class="mt-3 modal-text" type="text" id="nomeprodotto" name="nomeprodotto" placeholder="Nome" required/>
                    <br><label for="categoriaprodotto"></label>
                    <select class="mt-3" id="categoriaprodotto" name="categoriaprodotto" required>
                        <option class="modal-text" value="" disabled selected>Categoria</option>
                        <?php foreach($templateParams["categorie"] as $categoria): ?>
                            <option class="modal-text" value="<?php echo $categoria["Nome_categoria"]; ?>"><?php echo $categoria["Nome_categoria"] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br><label for="tagliaprodotto"></label>
                    <select class="mt-3" id="tagliaprodotto" name="tagliaprodotto" required>
                        <option class="modal-text" value="" disabled selected>Taglia</option>
                        <option class="modal-text" value="S">S - Small</option>
                        <option class="modal-text" value="M">M - Medium</option>
                        <option class="modal-text" value="L">L - Large</option>
                    </select>
                    <br><label for="prezzoprodotto"></label>
                    <input class="modal-text mt-3" type="number" step="0.01" min="0" id="prezzoprodotto" name="prezzoprodotto" placeholder="Prezzo" required/>
                    <br><label for="puntiprodotto"></label>
                    <input class="mt-3 modal-text" type="number" id="puntiprodotto" name="puntiprodotto" min="0" placeholder="Punti" required/>
                    <br><label for="scorteprodotto"></label>
                    <input class="mt-3 modal-text" type="number" id="scorteprodotto" name="scorteprodotto" min="1" placeholder="Scorte" required/>
                    <br><label class="mt-3 modal-text" for="descrizioneprodotto">Descrizione:</label>
                    <textarea class="modal-text" rows="10" style="width: 100%" id="descrizioneprodotto" name="descrizioneprodotto" placeholder="Scrivi qui..." required/></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn modallink" data-bs-dismiss="modal">Annulla</button>
                    <button type="submit" class="btn btn-primary modalbutton ps-4 pe-4" name="aggiungiprodotto">Salva</button>
                </div>
            </form>
        </div>
    </div>
</div>
