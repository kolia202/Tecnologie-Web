<div class="container mt-4 ps-4 pe-4">
    <?php if(count($templateParams["prodotto"]) == 0): ?>
        <article class="p-4">
            <p>Prodotto non presente</p>
        </article>
    <?php
        else:
            $prodotto = $templateParams["prodotto"][0];
    ?>
        <div class="row align-items-center">
            <div class="col-12 col-md-6 text-center">
                <img src="<?php echo IMG_DIR.$prodotto["Immagine"]; ?>" alt="<?php echo $prodotto["Nome"]; ?>" class="img-fluid rounded"/>
            </div>
            <div class="col-12 col-md-6 text-center">
                <!-- Intestazione prodotto -->
                <h1 class="text-center mt-2 sp-titolo"><?php echo $prodotto["Nome"]; ?></h1>
                <?php if(isAdminLoggedIn() && !$prodotto['attivo']): ?>
                    <span class="btn btn-sm fw-bold blackb">Prodotto Disattivato</span> 
                <?php elseif($prodotto["Scorta"] <= 0): ?>
                    <span class="btn btn-sm fw-bold blackb">Esaurito</span>
                <?php endif; ?>             
                <section class="mt-3">
                    <!-- dettagli prodotto -->
                    <p class="sp-details"><strong>Categoria : </strong><?php echo $prodotto["Nome_categoria"]; ?></p> 
                    <p class="sp-details"><strong>Taglia: </strong><?php echo $prodotto["Grandezza"]; ?></p>
                    <?php if(isAdminLoggedIn()): ?>
                        <p class="sp-details mb-1"><strong>Scorte disponibili: </strong><?php echo $prodotto["Scorta"]; ?></p>
                        <button type="button" class="btn btn-outline mb-3 aumentab" data-bs-toggle="modal" data-bs-target="#stock" <?php echo $prodotto['attivo'] ? '' : 'disabled' ?>>Aumenta</button>
                    <?php endif; ?>
                    <p class="sp-details"><strong>Prezzo: </strong><?php echo getFormattedPrice($prodotto["Prezzo"]); ?></p>
                    <p class="sp-details"><strong>Punti: </strong><?php echo $prodotto["Prezzo_punti"]; ?></p>
                    <!-- carrello e preferiti -->
                    <?php if ($prodotto["Scorta"] > 0  && !isAdminLoggedIn()): ?>
                        <button type="button" class="btn btn-lg text-center fw-bold add-to-cart sp-aggiungi pe-4 ps-4 mt-2" id="<?php echo $prodotto["Id_prodotto"]; ?>">Aggiungi al Carrello</button>
                        <div class="mt-4">
                            <a class="sp-prefe text-center" href="<?php echo isUserLoggedIn() ? 'dettaglioProdotto.php?azione=aggiungi&id_prodotto=' . $prodotto["Id_prodotto"] : 'account.php'; ?>">
                                <?php echo $prodottopreferito ? '<i class="bi bi-heart-fill me-2"></i>' : '<i class="bi bi-heart me-2"></i>' ?>
                                Aggiungi ai Preferiti
                            </a>
                        </div>
                    <?php elseif (isUserLoggedIn() && !isAdminLoggedIn()): ?>
                        <p class="avvisop">Vuoi essere tra i primi a sapere quando questo fantastico peluche sarà di nuovo disponibile?</p>
                        <form class="avviso-disponibilita" method="POST">
                            <input type="hidden" class="id-utente" value="<?php echo $_SESSION["utente"]; ?>">
                            <input type="hidden" class="id-prodotto" value="<?php echo $prodotto["Id_prodotto"]; ?>">
                            <button type="submit" class="btn fw-bold btn-avviso">Avviso Disponibilità</button>
                        </form>
                        <div class="mt-4">
                            <a class="sp-prefe text-center" href="<?php echo isUserLoggedIn() ? 'dettaglioProdotto.php?azione=aggiungi&id_prodotto=' . $prodotto["Id_prodotto"] : 'account.php'; ?>">
                                <?php echo $prodottopreferito ? '<i class="bi bi-heart-fill me-2"></i>' : '<i class="bi bi-heart me-2"></i>' ?>
                                Aggiungi ai Preferiti
                            </a>
                        </div>
                    <?php elseif (!isAdminLoggedIn()): ?>
                        <p class="avvisop">Vuoi essere tra i primi a sapere quando questo fantastico peluche sarà di nuovo disponibile?<br>Prima esegui l'accesso al tuo account.</p>
                        <button type="button" class="btn fw-bold avvisob" disabled>Avviso Disponibilità</button>
                        <div class="mt-4">
                            <a class="sp-prefe text-center" href="<?php echo isUserLoggedIn() ? 'dettaglioProdotto.php?azione=aggiungi&id_prodotto=' . $prodotto["Id_prodotto"] : 'account.php'; ?>">
                                <i class="bi bi-heart me-2"></i>
                                Aggiungi ai Preferiti
                            </a>
                        </div>
                    <?php endif; ?>
                    <!-- gestione prodotto -->
                    <?php if(isAdminLoggedIn() && !$prodotto['attivo']): ?>
                        <form action="gestisci-prodotto.php" method="POST">
                            <button type='submit' class='btn btn-primary gestiscib' name='attivaprodotto' value="<?php echo $prodotto['Id_prodotto']; ?>">Attiva Prodotto</button>
                        </form>
                    <?php elseif(isAdminLoggedIn()): ?>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <button type="button" class="btn btn-primary me-3 gestiscib" data-bs-toggle="modal" data-bs-target="#modificaprodotto">
                                <i class="bi bi-pencil-square"></i>    
                                Modifica Prodotto
                            </button>
                            <form action="gestisci-prodotto.php" method="POST">
                                <button type='submit' class='btn btn-primary ms-3 gestiscib' name='disattivaprodotto' value="<?php echo $prodotto['Id_prodotto']; ?>">Disattiva Prodotto</button>
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
        <div class="accordion mb-3 mt-3" id="descrizione">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Descrizione</button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#descrizione">
                    <div class="accordion-body">
                        <?php echo $prodotto['Descrizione']; ?>
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