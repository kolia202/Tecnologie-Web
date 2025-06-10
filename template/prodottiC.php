<div class="container mt-4 ps-4 pe-4 cont-prodotti">
    <?php if ($category): ?>
        <h1 class="title"><?php echo $category; ?></h1>
    <?php elseif(isset($_GET["search"])): ?>
        <h1 class="title">Risultati per '<?php echo $_GET["search"] ?>'</h1>
    <?php else: ?>
        <h1 class="title">Tutti i Peluches</h1>
    <?php endif; ?>
    <?php if (isset($_SESSION["eliminapeluche"])): ?>
        <div class="alert alert-success mt-3 text" role="alert">
            <span class="bi bi-check-circle align-center"></span>
            <?php echo $_SESSION["eliminapeluche"];
            unset($_SESSION['eliminapeluche']); ?>
        </div>             
    <?php endif; ?>
    <?php if(isAdminLoggedIn()): ?>
        <div class="text-center mt-4">
            <button type="button" class="btn button-light ps-4 pe-4" data-bs-toggle="modal" data-bs-target="#aggiungiprodotto">
                Nuovo Prodotto
            </button>
        </div>
    <?php endif; ?>
    <div class="row mt-5 mb-5">
        <?php if(empty($templateParams['prodotti'])): ?>
            <div class="card shadow-sm card-border card-empty mx-auto">
                <div class="card-body">
                    <p class="text-italic mb-0">Non sono presenti peluches che corrispondono alla tua ricerca!</p>
                </div>
            </div>
        <?php else: ?>
            <?php foreach($templateParams["prodotti"] as $prodotto): ?>
                <div class="col-12 col-md-4 mb-5" id='<?php echo $prodotto['Id_prodotto']; ?>'>
                    <div class="text-center">
                        <a class="text-decoration-none" href="../php/dettaglioProdotto.php?id=<?php echo $prodotto['Id_prodotto']; ?>">
                            <img class="imgProdotto shadow img-fluid" src="<?php echo IMG_DIR.$prodotto['Immagine']; ?>" alt="Foto prodotto"/>
                            <h2 class="text mt-3 fw-bold mb-1"><?php echo $prodotto["Nome"]; ?></h2>
                        </a>
                    </div>
                    <div class="text-center">
                        <?php if(isAdminLoggedIn() && $prodotto['attivo'] == 0): ?>
                            <span class="btn button-black fw-bold mb-2 mt-1 pt-0 pb-0 ps-2 pe-2">Disattivato</span>
                        <?php elseif($prodotto["Scorta"] <= 0): ?>
                            <span class="btn button-black fw-bold mb-2 mt-1 pt-0 pb-0 ps-2 pe-2">Esaurito</span>
                        <?php endif; ?>
                    </div>
                    <?php if(!isAdminLoggedIn()): ?>
                        <p class="text text-muted mb-2"><?php echo getFormattedPrice($prodotto["Prezzo"]); ?></p>
                    <?php endif; ?>
                    <?php if(isAdminLoggedIn()): ?>
                        <div class="d-flex justify-content-between ms-3 me-3 mt-3">        
                            <a href="../php/dettaglioProdotto.php?id=<?php echo $prodotto['Id_prodotto']; ?>" class="btn button">
                                Gestisci Prodotto
                            </a>
                            <form action="gestisci-prodotto.php" method="POST">
                                <button type='submit' class='btn btn-danger btn-delete text' name='eliminaprodotto' value="<?php echo $prodotto['Id_prodotto']; ?>">Elimina Prodotto</button>
                            </form>
                        </div>
                    <?php elseif($prodotto["Scorta"] > 0): ?>
                        <div class="text-center">        
                            <button type="button" class="btn button add-to-cart" data-productid="<?php echo $prodotto['Id_prodotto']; ?>">
                                Aggiungi al carrello
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="text-center">
        <a href="../php/index.php" class="text back">Indietro</a>
    </div>
</div>


<div class="modal fade" id="aggiungiprodotto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header pb-3">
                <h1 class="modal-title title" id="staticBackdropLabel">Nuovo Prodotto</h1>
                <button type="button" class="btn button-empty ms-auto" data-bs-dismiss="modal" aria-label="Close">
                    <span class="bi bi-x-lg" aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
               <form action="gestisci-prodotto.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="immagineprodotto" class="visually-hidden">Carica immagine prodotto</label>
                        <input class="text" type="file" id="immagineprodotto" name="immagineprodotto" accept="image/*" required/>
                    </div>
                    <div class="mb-3">
                        <label for="nomeprodotto" class="visually-hidden">Nome prodotto</label>
                        <input class="form-control text text-input" type="text" id="nomeprodotto" name="nomeprodotto" placeholder="Nome" required/>
                    </div>
                    <div class="mb-3">
                        <label for="categoriaprodotto" class="visually-hidden">Categoria prodotto</label>
                        <select class="form-control text text-input" id="categoriaprodotto" name="categoriaprodotto" required>
                            <option class="text-start text-italic" value="" disabled selected>Categoria</option>
                            <?php foreach($templateParams["categorie"] as $categoria): ?>
                                <option class="text-start text" value="<?php echo $categoria['Nome_categoria']; ?>"><?php echo $categoria['Nome_categoria'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tagliaprodotto" class="visually-hidden">Taglia prodotto</label>
                        <select class="form-control text text-input" id="tagliaprodotto" name="tagliaprodotto" required>
                            <option class="text-start text-italic" value="" disabled selected>Taglia</option>
                            <option class="text-start text" value="S">S - Small</option>
                            <option class="text-start text" value="M">M - Medium</option>
                            <option class="text-start text" value="L">L - Large</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="prezzoprodotto" class="visually-hidden">Prezzo prodotto</label>
                        <input class="form-control text text-input" type="number" step="0.01" min="0" id="prezzoprodotto" name="prezzoprodotto" placeholder="Prezzo" required/>
                    </div>
                    <div class="mb-3">
                        <label for="puntiprodotto" class="visually-hidden">Punti prodotto</label>
                        <input class="form-control text text-input" type="number" id="puntiprodotto" name="puntiprodotto" min="0" placeholder="Punti" required/>
                    </div>
                    <div class="mb-3">
                        <label for="scorteprodotto" class="visually-hidden">Scorte prodotto</label>
                        <input class="form-control text text-input" type="number" id="scorteprodotto" name="scorteprodotto" min="1" placeholder="Scorte" required/>
                    </div>
                    <div class="mb-3">
                        <label for="descrizioneprodotto" class="visually-hidden">Descrizione prodotto</label>
                        <textarea class="form-control text text-input" rows="5" id="descrizioneprodotto" name="descrizioneprodotto" placeholder="Scrivi qui la descrizione..." required></textarea>
                    </div>
                    <div class="modal-footer mt-4">
                        <button type="button" class="btn button-outline me-auto ps-4 pe-4" data-bs-dismiss="modal">Annulla</button>
                        <button type="submit" class="btn button ms-auto ps-5 pe-5" name="aggiungiprodotto">Salva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
