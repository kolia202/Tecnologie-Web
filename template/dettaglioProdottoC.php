<div class="container mt-4 ps-4 pe-4">
    <?php if(count($templateParams["prodotto"]) == 0): ?>
        <div class="p-4">
            <p class="text">Prodotto non presente</p>
        </div>
    <?php else: $prodotto = $templateParams["prodotto"][0]; ?>
        <div class="row align-items-center">
            <div class="col-12 col-md-6 text-center mt-1">
                <img src="<?php echo IMG_DIR.$prodotto['Immagine']; ?>" alt="Immagine <?php echo $prodotto['Nome']; ?>" class="img-fluid img-singola shadow" />
            </div>
            <div class="col-12 col-md-6 text-center cont-prodotto">
                <h1 class="title mt-2"><?php echo $prodotto["Nome"]; ?></h1>
                <?php if(isAdminLoggedIn() && !$prodotto['attivo']): ?>
                    <span class="btn button-black fw-bold pt-0 pb-0 ps-2 pe-2">Disattivato</span> 
                <?php elseif($prodotto["Scorta"] <= 0): ?>
                    <span class="btn button-black fw-bold pt-0 pb-0 ps-2 pe-2">Esaurito</span>
                <?php endif; ?>             
                <section class="mt-3">
                    <p class="text mb-1"><strong>Categoria : </strong><?php echo $prodotto["Nome_categoria"]; ?></p> 
                    <p class="text mb-1"><strong>Taglia: </strong><?php echo $prodotto["Grandezza"]; ?></p>
                    <?php if(isAdminLoggedIn()): ?>
                        <p class="text mb-0"><strong>Scorte disponibili: </strong><?php echo $prodotto["Scorta"]; ?></p>
                        <button type="button" class="btn button-small fw-bold pt-0 pb-0 mb-2" data-bs-toggle="modal" data-bs-target="#stock" <?php echo $prodotto['attivo'] ? '' : 'disabled' ?>>Modifica</button>
                    <?php endif; ?>
                    <p class="text mb-4"><strong>Prezzo: </strong><?php echo getFormattedPrice($prodotto["Prezzo"]); ?> - <?php echo $prodotto["Prezzo_punti"]; ?> punti</p>
                    <!-- carrello e preferiti -->
                    <?php if ($prodotto["Scorta"] > 0  && !isAdminLoggedIn()): ?>
                        <div class="d-flex justify-content-center align-items-center gap-4">
                            <a 
                            href="<?php echo $prodottopreferito ? 'dettaglioProdotto.php?azione=rimuovi&id_prodotto=' . $prodotto['Id_prodotto']  : 'dettaglioProdotto.php?azione=aggiungi&id_prodotto=' . $prodotto['Id_prodotto']; ?>"
                            aria-label="<?php echo $prodottopreferito ? 'Rimuovi dai preferiti' : 'Aggiungi ai preferiti'; ?>">
                            <?php echo $prodottopreferito ? '<span class="bi bi-heart-fill" aria-hidden="true"></span>' : '<span class="bi bi-heart" aria-hidden="true"></span>' ?>
                            <span class="visually-hidden">preferiti</span>
                        </a>
                            <button type="button" class="btn button add-to-cart pe-4 ps-4" data-productid="<?php echo $prodotto['Id_prodotto']; ?>">Aggiungi al Carrello</button>
                        </div>
                    <?php elseif (isUserLoggedIn() && !isAdminLoggedIn()): ?>
                        <div class="stock-warning d-block rounded pt-2 pb-2 ps-3 pe-3 ms-3 me-3 mb-3 card-border">
                            <p class="text-italic mb-0">Vuoi essere tra i primi a sapere quando questo fantastico peluche sarà di nuovo disponibile?</p>
                        </div>
                        <div class="d-flex justify-content-center align-items-center gap-4">
                            <a href="<?php echo $prodottopreferito ? 'dettaglioProdotto.php?azione=rimuovi&id_prodotto=' . $prodotto['Id_prodotto'] : 'dettaglioProdotto.php?azione=aggiungi&id_prodotto=' . $prodotto['Id_prodotto']; ?>"
                            aria-label="<?php echo $prodottopreferito ? 'Rimuovi dai preferiti' : 'Aggiungi ai preferiti'; ?>">
                            <?php echo $prodottopreferito ? '<span class="bi bi-heart-fill" aria-hidden="true"></span>' : '<span class="bi bi-heart" aria-hidden="true"></span>' ?>
                            <span class="visually-hidden">preferiti</span>
                        </a>
                            <?php if ($avvisodisponibilità): ?>
                                <button class="btn button ps-4 pe-4" disabled>Richiesta inviata</button>
                            <?php else: ?>
                                <div class="avviso-disponibilita" data-utente="<?php echo $_SESSION['utente'] ?>" data-prodotto="<?php echo $prodotto["Id_prodotto"] ?>">
                                    <button type="submit" class="btn button ps-4 pe-4 btn-avviso">Avviso Disponibilità</button>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php elseif (!isAdminLoggedIn()): ?>
                        <div class="stock-warning d-block mt-4 rounded pt-2 pb-2 ps-3 pe-3 ms-3 me-3 mb-3 card-border">
                            <p class="text-italic mb-0">
                                Vuoi essere tra i primi a sapere quando questo fantastico peluche sarà di nuovo disponibile?
                                Esegui l'accesso al tuo account per chiedere di ricevere un avviso.
                            </p>
                        </div>
                        <div class="d-flex justify-content-center align-items-center gap-4">
                            <a href="<?php echo 'dettaglioProdotto.php?azione=aggiungi&id_prodotto=' . $prodotto['Id_prodotto']; ?>">
                                <span class="bi bi-heart me-2" alt="Icona cuore per aggiungere ai preferiti"></span>
                            </a>
                            <button type="button" class="btn button pe-4 ps-4" disabled>Avviso Disponibilità</button>
                        </div>
                    <?php endif; ?>
                    <!-- gestione prodotto -->
                    <?php if(isAdminLoggedIn() && !$prodotto['attivo']): ?>
                        <form action="gestisci-prodotto.php" method="POST">
                            <button type='submit' class='btn button ps-4 pe-4' name='attivaprodotto' value="<?php echo $prodotto['Id_prodotto']; ?>">Attiva Prodotto</button>
                        </form>
                    <?php elseif(isAdminLoggedIn()): ?>
                        <button type="button" class="btn button ps-4 pe-4" data-bs-toggle="modal" data-bs-target="#modificaprodotto">
                            <span class="bi bi-pencil-square me-1" aria-hidden="true"></span>  
                            Modifica Prodotto
                        </button>
                        <div class="d-flex align-items-center justify-content-center gap-4">
                            <form action="gestisci-prodotto.php" method="POST">
                                <button type='submit' class='btn btn-secondary btn-delete text ps-4 pe-4 mt-3 opacity-75' name='disattivaprodotto' value="<?php echo $prodotto['Id_prodotto']; ?>">
                                    <span class="bi bi-x-circle-fill" aria-hidden="true"></span>
                                    Disattiva
                                </button>
                            </form>
                            <form action="gestisci-prodotto.php" method="POST">
                                <button type='submit' class='btn btn-danger btn-delete text mt-3 ps-4 pe-4' name='eliminaprodotto' value="<?php echo $prodotto['Id_prodotto']; ?>">
                                    <span class="bi bi-trash3-fill" aria-hidden="true"></span>
                                    Elimina
                                </button>
                            </form>
                        </div>
                    <?php endif; ?>
                </section>
            </div>
        </div>
        <!-- descrizione -->
        <div class="accordion mt-4" id="descrizione">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button text fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Descrizione
                        <span class="bi bi-chevron-down ms-auto"></span>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#descrizione">
                    <div class="accordion-body pt-2">
                        <p class="text mb-0"><?php echo $prodotto['Descrizione']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>  
    <div class="text-center mt-5">
        <a href="../php/prodotti.php#<?php echo htmlspecialchars($prodotto['Id_prodotto']); ?>" class="text back">Indietro</a>
    </div>
</div>

<!-- modal aggiornamento scorte -->
<div class="modal fade" id="stock" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelScorte" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header pb-2">
                <h1 class="title" id="staticBackdropLabelScorte">Modifica Scorte</h1>
                <button type="button" class="btn button-empty ms-auto" data-bs-dismiss="modal" aria-label="Close">
                    <span class="bi bi-x-lg" aria-hidden="true"></span>
                </button>
            </div>
            <form action="gestisci-prodotto.php" method="POST">
                <div class="modal-body">
                    <label for="num-scorte" class="visually-hidden">Scorte</label>
                    <input class="form-control text text-input" type="number" id="num-scorte" name="num-scorte" min="0" required/>
                    <input type="hidden" name="idprodotto" value="<?php echo $prodotto['Id_prodotto']; ?>"/>
                    <div class="modal-footer mt-2">
                        <button type="button" class="btn button-outline me-auto ps-4 pe-4" data-bs-dismiss="modal">Annulla</button>
                        <button type="submit" class="btn button ms-auto ps-5 pe-5">Salva</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal modifica prodotto -->
<div class="modal fade" id="modificaprodotto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelProdotto" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="title" id="staticBackdropLabelProdotto">Modifica Prodotto</h1>
                <button type="button" class="btn button-empty ms-auto" data-bs-dismiss="modal" aria-label="Close">
                    <span class="bi bi-x-lg" aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="gestisci-prodotto.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <p class="text-italic text-start mb-1 ms-1">Immagine: <?php echo $prodotto['Immagine'] ?></p>
                        <label for="immagineprodotto" class="visually-hidden">Carica immagine prodotto</label>
                        <input class="text" type="file" id="immagineprodotto" name="immagineprodotto" accept="image/*"/>
                        <input type="hidden" name="immagineattuale" value="<?php echo $prodotto['Immagine']; ?>"/>
                    </div>
                    <div class="mb-3">
                        <label class="modal-text ps-1 pb-0 text-italic" for="nomeprodotto">Nome</label>
                        <input class="text text-input form-control" type="text" id="nomeprodotto" name="nomeprodotto" value="<?php echo $prodotto['Nome']; ?>" required/>
                    </div>
                    <div class="mb-3">
                        <label class="text-italic ps-1 pb-0" for="categoriaprodotto">Categoria</label>
                        <select class="form-control text text-input" id="categoriaprodotto" name="categoriaprodotto" required>
                            <option class="text-italic text-start" value="" disabled <?php if(empty($prodotto["Nome_categoria"])) echo "selected"; ?>>Seleziona una categoria</option>
                            <?php foreach($templateParams["categorie"] as $categoria): ?>                                
                                <option class="text text-start" value="<?php echo $categoria['Nome_categoria']; ?>" <?php echo $categoria['Nome_categoria'] == $prodotto['Nome_categoria'] ? 'selected' : '' ?>>
                                <?php echo $categoria["Nome_categoria"] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="text-italic ps-1 mb-0" for="tagliaprodotto">Taglia</label>
                        <select class="form-control text text-input" id="tagliaprodotto" name="tagliaprodotto" required>
                        <option class="text-italic text-start" value="" disabled <?php if(empty($prodotto["Grandezza"])) echo "selected"; ?>>Seleziona una taglia</option>
                        <option class="text-start text" value="S" <?php echo 'S' == $prodotto["Grandezza"] ? 'selected' : '' ?>>S - Small</option>
                        <option class="text-start text" value="M" <?php echo 'M' == $prodotto["Grandezza"] ? 'selected' : '' ?>>M - Medium</option>
                        <option class="text-start text" value="L" <?php echo 'L' == $prodotto["Grandezza"] ? 'selected' : '' ?>>L - Large</option>
                    </select>
                    </div>
                    <div class="mb-3">
                        <label class="text-italic ps-1 mb-0" for="prezzoprodotto">Prezzo</label>
                        <input class="form-control text text-input" type="number" step="0.01" min="0" id="prezzoprodotto" name="prezzoprodotto" value="<?php echo $prodotto["Prezzo"]; ?>" required/>
                    </div>
                    <div class="mb-3">
                        <label class="text-italic ps-1 mb-0" for="puntiprodotto">Punti</label>
                        <input class="text text-input form-control" type="number" id="puntiprodotto" name="puntiprodotto" min="0" value="<?php echo $prodotto['Prezzo_punti']; ?>" required/>
                    </div>
                    <div class="mb-3">
                        <label class="text-italic ps-1 mb-0" for="descrizioneprodotto">Descrizione</label>
                        <textarea rows="5" class="form-control text text-input" id="descrizioneprodotto" name="descrizioneprodotto" required><?php echo $prodotto["Descrizione"]; ?></textarea>
                        <input type="hidden" name="idprodotto" value="<?php echo $prodotto['Id_prodotto']; ?>">
                    </div>
                    <div class="modal-footer mt-4">
                        <button type="button" class="btn button-outline me-auto ps-4 pe-4" data-bs-dismiss="modal">Annulla</button>
                        <button type="submit" class="btn button ms-auto ps-5 pe-5" name="modificaprodotto">Salva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>