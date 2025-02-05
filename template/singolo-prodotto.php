<?php if(count($templateParams["prodotto"]) == 0): ?>
    <article>
        <p>Prodotto non presente</p>
        <?php var_dump($templateParams['prodotto']);
        var_dump($idprodotto) ?>
    </article>
<?php
    else:
        $prodotto = $templateParams["prodotto"][0];
?>
    <article>
        <section>
            <!-- immagine -->
            <div>
                <img src="<?php echo IMG_DIR.$prodotto["Immagine"]; ?>" alt=""/>
            </div>
            <!-- Intestazione prodotto -->
            <?php if(isAdminLoggedIn()): ?>
                <div class="d-flex justify-content-center align-items-center">
                    <h1><?php echo $prodotto["Nome"]; ?></h1>
                    <i class="bi bi-trash3-fill ms-5"></i>                    
                </div>
            <?php else: ?>
                <h1><?php echo $prodotto["Nome"]; ?></h1>
            <?php endif; ?>
            <p><?php echo $prodotto["Nome_categoria"]; ?></p>
            <?php if($prodotto["Scorta"] <= 0): ?>
                <span type="button" class="btn btn-sm fw-bold" style="background-color: black; color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px;">Esaurito</span>
            <?php elseif(isAdminLoggedIn() && !$prodotto['attivo']): ?>
                <span type="button" class="btn btn-sm fw-bold" style="background-color: black; color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px;">Prodotto Disattivato</span>
            <?php endif; ?>
        </section>
        <section>
            <!-- dettagli prodotto -->
            <p>Prezzo: <?php echo getFormattedPrice($prodotto["Prezzo"]); ?> (o <?php echo $prodotto["Prezzo_punti"]; ?> punti)</p>
            <p>Taglia: <?php echo $prodotto["Grandezza"]; ?></p>
            <!-- gestione scorte -->
            <?php if(isAdminLoggedIn()): ?>
                <div class="d-flex align-items-center">
                    <p>Scorte disponibili: <?php echo $prodotto["Scorta"]; ?></p>
                    <button type="button" class="btn btn-outline-primary ms-2" data-bs-toggle="modal" data-bs-target="#stock" <?php echo $prodotto['attivo'] ? '' : 'disabled' ?>>Aumenta</button>
                </div>
            <?php endif; ?>
            <!-- carrello e preferiti -->
            <?php if ($prodotto["Scorta"] > 0  && !isAdminLoggedIn()): ?>
                <div class="text-center">
                    <button type="button" class="btn btn-sm fw-bold add-to-cart" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;" id="<?php echo $prodotto["Id_prodotto"]; ?>">Aggiungi al carrello</button>
                    <a href="<?php echo isUserLoggedIn() ? 'dettaglioProdotto.php?azione=aggiungi&id_prodotto=' . $prodotto["Id_prodotto"] : 'account.php'; ?>">Aggiungi ai Preferiti</a>
                </div>
            <?php elseif (isUserLoggedIn() && !isAdminLoggedIn()): ?>
                <p>Vuoi essere tra i primi a sapere quando questo fantastico peluche sarà di nuovo disponibile?</p>
                <form class="avviso-disponibilita" method="POST">
                    <input type="hidden" class="id-utente" value="<?php echo $_SESSION["utente"]; ?>">
                    <input type="hidden" class="id-prodotto" value="<?php echo $prodotto["Id_prodotto"]; ?>">
                    <button type="submit" class="btn btn-sm fw-bold btn-avviso" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Avviso Disponibilità</button>
                </form>
                <a href="dettaglioProdotto.php?azione=aggiungi&id_prodotto=$prodotto['Id_prodotto']">Aggiungi ai Preferiti</a>
            <?php elseif (!isAdminLoggedIn()): ?>
                <p>Vuoi essere tra i primi a sapere quando questo fantastico peluche sarà di nuovo disponibile?<br>Prima esegui l'accesso al tuo account.</p>
                <button type="button" class="btn btn-sm fw-bold" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;" disabled>Avviso Disponibilità</button>
                <a href="<?php echo isUserLoggedIn() ? 'dettaglioProdotto.php?azione=aggiungi&id_prodotto=' . $prodotto["Id_prodotto"] : 'account.php'; ?>">Aggiungi ai Preferiti</a>
            <?php endif; ?>
            <!-- descrizione -->
            <div class="accordion mt-2" id="descrizione">
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
            <!-- gestione prodotto -->
            <?php if(isAdminLoggedIn() && !$prodotto['attivo']): ?>
                <form action="gestisci-prodotto.php" method="POST">
                    <input type="hidden" name="idprodotto" value="<?php echo $prodotto['Id_prodotto']; ?>"/>
                    <button type='submit' class='btn btn-primary' name='attivaprodotto'>Attiva Prodotto</button>
                </form>
            <?php elseif(isAdminLoggedIn()): ?>
                <div class="d-flex align-items-center mt-2">
                    <button type="button" class="btn btn-primary ms-5" data-bs-toggle="modal" data-bs-target="#modificaprodotto" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">
                        <i class="bi bi-pencil-square"></i>    
                        Modifica Prodotto
                    </button>
                    <form action="gestisci-prodotto.php" method="POST">
                        <input type="hidden" name="idprodotto" value="<?php echo $prodotto['Id_prodotto']; ?>"/>
                        <button type='submit' class='btn btn-primary' name='disattivaprodotto'>Disattiva Prodotto</button>
                    </form>
                </div>
            <?php endif; ?>
        </section>
    </article>
<?php endif; ?>

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
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modifica Prodotto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="gestisci-prodotto.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <p>Immagine: <?php echo $prodotto['Immagine'] ?></p>
                    <label for="immagineprodotto"></label>
                    <input type="file" id="immagineprodotto" name="immagineprodotto" accept="image/*"/>
                    <input type="hidden" name="immagineattuale" value="<?php echo $prodotto['Immagine']; ?>"/>
                    <br><label for="nomeprodotto">Nome:</label>
                    <input type="text" id="nomeprodotto" name="nomeprodotto" value="<?php echo $prodotto["Nome"]; ?>" required/>
                    <br><label for="categoriaprodotto">Categoria:</label>
                    <select id="categoriaprodotto" name="categoriaprodotto" required>
                        <?php foreach($templateParams["categorie"] as $categoria): ?>
                            <option value="<?php echo $categoria["Nome_categoria"]; ?>" <?php echo $categoria['Nome_categoria'] == $prodotto["Nome_categoria"] ? 'selected' : '' ?>><?php echo $categoria["Nome_categoria"] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br><label for="tagliaprodotto">Taglia:</label>
                    <select id="tagliaprodotto" name="tagliaprodotto" required>
                        <option value="S" <?php echo 'S' == $prodotto["Grandezza"] ? 'selected' : '' ?>>S - Small</option>
                        <option value="M" <?php echo 'M' == $prodotto["Grandezza"] ? 'selected' : '' ?>>M - Medium</option>
                        <option value="L" <?php echo 'L' == $prodotto["Grandezza"] ? 'selected' : '' ?>>L - Large</option>
                    </select>
                    <br><label for="prezzoprodotto">Prezzo:</label>
                    <input type="number" step="0.01" min="0" id="prezzoprodotto" name="prezzoprodotto" value="<?php echo $prodotto["Prezzo"]; ?>" required/>
                    <br><label for="puntiprodotto">Punti:</label>
                    <input type="number" id="puntiprodotto" name="puntiprodotto" min="0" value="<?php echo $prodotto["Prezzo_punti"]; ?>" required/>
                    <br><label for="descrizioneprodotto">Descrizione:</label>
                    <textarea rows="10" style="width: 100%" id="descrizioneprodotto" name="descrizioneprodotto" required/><?php echo $prodotto["Descrizione"]; ?></textarea>
                    <input type="hidden" name="idprodotto" value="<?php echo $prodotto["Id_prodotto"]; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button type="submit" class="btn btn-primary">Salva</button>
                </div>
            </form>
        </div>
    </div>
</div>