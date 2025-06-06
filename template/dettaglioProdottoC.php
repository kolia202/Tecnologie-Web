<div class="container mt-4 ps-4 pe-4">
    <?php if(count($templateParams["prodotto"]) == 0): ?>
        <article class="p-4">
            <p class="text">Prodotto non presente</p>
        </article>
    <?php else: $prodotto = $templateParams["prodotto"][0]; ?>
        <div class="row align-items-center">
            <div class="col-12 col-md-6 text-center mt-1">
                <img src="<?php echo IMG_DIR.$prodotto["Immagine"]; ?>" alt="<?php echo $prodotto["Nome"]; ?>" class="img-fluid img-singola shadow" />
            </div>
            <div class="col-12 col-md-6 text-center cont-prodotto">
                <h1 class="title mt-2"><?php echo $prodotto["Nome"]; ?></h1>
                <?php if(isAdminLoggedIn() && !$prodotto['attivo']): ?>
                    <span class="btn btn-sm fw-bold blackb">Prodotto Disattivato</span> 
                <?php elseif($prodotto["Scorta"] <= 0): ?>
                    <span class="btn button-black fw-bold pt-0 pb-0 ps-2 pe-2">Esaurito</span>
                <?php endif; ?>             
                <section class="mt-3">
                    <p class="text mb-1"><strong>Categoria : </strong><?php echo $prodotto["Nome_categoria"]; ?></p> 
                    <p class="text mb-1"><strong>Taglia: </strong><?php echo $prodotto["Grandezza"]; ?></p>
                    <?php if(isAdminLoggedIn()): ?>
                        <p class="text mb-1"><strong>Scorte disponibili: </strong><?php echo $prodotto["Scorta"]; ?></p>
                        <button type="button" class="btn btn-outline mb-3 aumentab" data-bs-toggle="modal" data-bs-target="#stock" <?php echo $prodotto['attivo'] ? '' : 'disabled' ?>>Aumenta</button>
                    <?php endif; ?>
                    <p class="text mb-4"><strong>Prezzo: </strong><?php echo getFormattedPrice($prodotto["Prezzo"]); ?> - <?php echo $prodotto["Prezzo_punti"]; ?> punti</p>
                    <!-- carrello e preferiti -->
                    <?php if ($prodotto["Scorta"] > 0  && !isAdminLoggedIn()): ?>
                        <div class="d-flex justify-content-center align-items-center gap-4">
                            <a href="<?php echo $prodottopreferito ? 'dettaglioProdotto.php?azione=rimuovi&id_prodotto=' . $prodotto["Id_prodotto"]  : 'dettaglioProdotto.php?azione=aggiungi&id_prodotto=' . $prodotto["Id_prodotto"]; ?>">
                                <?php echo $prodottopreferito ? '<i class="bi bi-heart-fill"></i>' : '<i class="bi bi-heart"></i>' ?>
                            </a>
                            <button type="button" class="btn button add-to-cart pe-4 ps-4" id="<?php echo $prodotto["Id_prodotto"]; ?>">Aggiungi al Carrello</button>
                        </div>
                    <?php elseif (isUserLoggedIn() && !isAdminLoggedIn()): ?>
                        <div class="stock-warning d-block rounded pt-2 pb-2 ps-3 pe-3 ms-3 me-3 mb-3">
                            <p class="text-italic mb-0">Vuoi essere tra i primi a sapere quando questo fantastico peluche sarà di nuovo disponibile?</p>
                        </div>
                        <div class="d-flex justify-content-center align-items-center gap-4">
                            <a href="<?php echo $prodottopreferito ? 'dettaglioProdotto.php?azione=rimuovi&id_prodotto=' . $prodotto["Id_prodotto"]  : 'dettaglioProdotto.php?azione=aggiungi&id_prodotto=' . $prodotto["Id_prodotto"]; ?>">
                                <?php echo $prodottopreferito ? '<i class="bi bi-heart-fill"></i>' : '<i class="bi bi-heart"></i>' ?>
                            </a>
                            <?php if ($avvisodisponibilità): ?>
                                <button class="btn button ps-4 pe-4" disabled>Richiesta inviata</button>
                            <?php else: ?>
                                <div class="avviso-disponibilita" data-utente="<?php echo $_SESSION["utente"] ?>" data-prodotto="<?php echo $prodotto["Id_prodotto"] ?>">
                                    <button type="submit" class="btn button ps-4 pe-4 btn-avviso">Avviso Disponibilità</button>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php elseif (!isAdminLoggedIn()): ?>
                        <div class="stock-warning d-block mt-4 rounded pt-2 pb-2 ps-3 pe-3 ms-3 me-3 mb-3">
                            <p class="text-italic mb-0">
                                Vuoi essere tra i primi a sapere quando questo fantastico peluche sarà di nuovo disponibile?
                                <br>Esegui l'accesso al tuo account per chiedere di ricevere un avviso.
                            </p>
                        </div>
                        <div class="d-flex justify-content-center align-items-center gap-4">
                            <a href="<?php echo 'dettaglioProdotto.php?azione=aggiungi&id_prodotto=' . $prodotto["Id_prodotto"]; ?>">
                                <i class="bi bi-heart me-2"></i>
                            </a>
                            <button type="button" class="btn button pe-4 ps-4" disabled>Avviso Disponibilità</button>
                        </div>
                    <?php endif; ?>
                    <!-- gestione prodotto -->
                    <?php if(isAdminLoggedIn() && !$prodotto['attivo']): ?>
                        <form action="gestisci-prodotto.php" method="POST">
                            <button type='submit' class='btn gestiscib' name='attivaprodotto' value="<?php echo $prodotto['Id_prodotto']; ?>">Attiva Prodotto</button>
                        </form>
                    <?php elseif(isAdminLoggedIn()): ?>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <button type="button" class="btn me-3 gestiscib" data-bs-toggle="modal" data-bs-target="#modificaprodotto">
                                <i class="bi bi-pencil-square"></i>    
                                Modifica Prodotto
                            </button>
                            <form action="gestisci-prodotto.php" method="POST">
                                <button type='submit' class='btn ms-3 gestiscib' name='disattivaprodotto' value="<?php echo $prodotto['Id_prodotto']; ?>">Disattiva Prodotto</button>
                            </form>
                        </div>
                        <form action="gestisci-prodotto.php" method="POST">
                            <button type='submit' class='btn btn-danger mt-3 ps-4 pe-4 eliminab' name='eliminaprodotto' value="<?php echo $prodotto['Id_prodotto']; ?>">
                            <i class="bi bi-trash3-fill"></i>
                            Elimina Prodotto    
                            </button>
                        </form>
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
</div>

<!-- modal aggiornamento scorte -->
<div class="modal fade" id="stock" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Aumenta Scorte</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="gestisci-prodotto.php" method="POST">
                <div class="modal-body">
                    <label for="nuove-scorte">Nuove scorte:</label>
                    <input type="number" id="nuove-scorte" name="nuove-scorte" min="1" placeholder="Numero di scorte" required/>
                    <input type="hidden" name="idprodotto" value="<?php echo $prodotto['Id_prodotto']; ?>"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button type="submit" class="btn btn-primary">Salva</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal modifica prodotto -->
<div class="modal fade" id="modificaprodotto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-titlep fs-5" id="staticBackdropLabel">Modifica Prodotto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="gestisci-prodotto.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <p>Immagine: <?php echo $prodotto['Immagine'] ?></p>
                    <label for="immagineprodotto"></label>
                    <input type="file" id="immagineprodotto" name="immagineprodotto" accept="image/*"/>
                    <input type="hidden" name="immagineattuale" value="<?php echo $prodotto['Immagine']; ?>"/>
                    <br><label class="mt-3 modal-text" for="nomeprodotto">Nome:</label>
                    <input type="text" id="nomeprodotto" name="nomeprodotto" value="<?php echo $prodotto["Nome"]; ?>" required/>
                    <br><label class="mt-3 modal-text" for="categoriaprodotto">Categoria:</label>
                    <select id="categoriaprodotto" name="categoriaprodotto" required>
                        <?php foreach($templateParams["categorie"] as $categoria): ?>
                            <option value="<?php echo $categoria["Nome_categoria"]; ?>" <?php echo $categoria['Nome_categoria'] == $prodotto["Nome_categoria"] ? 'selected' : '' ?>><?php echo $categoria["Nome_categoria"] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br><label class="mt-3 modal-text" for="tagliaprodotto">Taglia:</label>
                    <select id="tagliaprodotto" name="tagliaprodotto" required>
                        <option value="S" <?php echo 'S' == $prodotto["Grandezza"] ? 'selected' : '' ?>>S - Small</option>
                        <option value="M" <?php echo 'M' == $prodotto["Grandezza"] ? 'selected' : '' ?>>M - Medium</option>
                        <option value="L" <?php echo 'L' == $prodotto["Grandezza"] ? 'selected' : '' ?>>L - Large</option>
                    </select>
                    <br><label class="mt-3 modal-text" for="prezzoprodotto">Prezzo:</label>
                    <input type="number" step="0.01" min="0" id="prezzoprodotto" name="prezzoprodotto" value="<?php echo $prodotto["Prezzo"]; ?>" required/>
                    <br><label class="mt-3 modal-text" for="puntiprodotto">Punti:</label>
                    <input type="number" id="puntiprodotto" name="puntiprodotto" min="0" value="<?php echo $prodotto["Prezzo_punti"]; ?>" required/>
                    <br><label class="mt-3 modal-text" for="descrizioneprodotto">Descrizione:</label>
                    <textarea rows="10" class="text-area-row" id="descrizioneprodotto" name="descrizioneprodotto" required><?php echo $prodotto["Descrizione"]; ?></textarea>
                    <input type="hidden" name="idprodotto" value="<?php echo $prodotto["Id_prodotto"]; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn modallink" data-bs-dismiss="modal">Annulla</button>
                    <button type="submit" class="btn btn-primary modalbutton ps-4 pe-4" name="modificaprodotto">Salva</button>
                </div>
            </form>
        </div>
    </div>
</div>