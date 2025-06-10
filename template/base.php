<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $templateParams["titolo"]; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Chewy&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css?v=117" />
</head>
<body>
    <!-- HEADER -->
    <header>
        <!-- BOTTONE MENU -->
        <button class="btn button-empty" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft" aria-controls="offcanvasLeft">
            <span class="bi bi-list" aria-hidden="true"></span>
        </button>
        <!-- MENU LATERALE -->
        <div class="offcanvas offcanvas-start offcanvas-custom" tabindex="-1" id="offcanvasLeft" aria-labelledby="offcanvasLeftLabel">
            <h5 id="offcanvasLeftLabel" class="visually-hidden">Menu laterale sinistro</h5>
            <!-- HEADER MENU -->
            <div class="offcanvas-header pb-0 pt-4 d-flex align-items-center">
                <img class="iconaorsetto" src="../utilities/logo/orsetto.png" alt="iconaorsetto">
                <h4 class="mt-2">MENÙ</h4>
                <!-- BOTTONE X -->
                <button type="button" class="btn button-empty ms-auto" data-bs-dismiss="offcanvas" aria-label="Close">
                    <span class="bi bi-x-lg" aria-hidden="true"></span>
                </button>
            </div>
            <!-- BODY MENU -->
            <div class="offcanvas-body pt-2">
                <div>
                    <!-- BARRA DI RICERCA -->
                    <form class="d-flex mb-4" method="GET" action="prodotti.php">
                        <div class="d-flex align-items-center search-bar">
                            <label for="search" class="visually-hidden">Cerca un prodotto</label>
                            <input id="search" name="search" class="form-control search ms-1 mt-1" type="text" placeholder="Cerca" autocomplete="off">
                            <button type="submit" class="btn pt-0 pb-0 ps-2 pe-2 ms-2 mt-1">
                                <span class="bi bi-search-heart" aria-hidden="true"></span>
                            </button>
                        </div>
                    </form>
                    <!-- LINK NEL MENU -->
                    <ul class="list-unstyled pt-1 mb-4">
                        <li><a href="../php/index.php">Home<br></a></li>
                        <li><a href="../php/account.php">Account<br></a></li>
                        <?php if(!isAdminLoggedIn()): ?>
                            <li><a href="../php/preferiti.php">I tuoi Preferiti</a></li>
                        <?php endif; ?>
                        <li><a href="../php/prodotti.php">Tutti i nostri Peluches<br></a></li>
                        <!-- MENU A SCOMPARSA -->
                        <li class="d-flex flex-column justify-content-center">
                            <div class="text-center">
                                <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Categorie</button>
                            </div>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body border-0 pt-0 pb-0 categoriesmenu">
                                    <!-- ELENCO CATEGORIE -->
                                     <ul class="list-unstyled">
                                        <?php if (isset($templateParams["categorie"]) && is_array($templateParams["categorie"])): ?>
                                            <?php foreach($templateParams["categorie"] as $categoria): ?>
                                                <li>
                                                    <a href="../php/prodotti.php?categoria=<?php echo htmlspecialchars($categoria['Nome_categoria']); ?>">
                                                        <?php echo htmlspecialchars($categoria["Nome_categoria"]); ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <li><em>Nessuna categoria disponibile</em></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li><a href="../php/informazioni.php">Chi siamo<br></a></li>
                        <?php if(isUserLoggedIn()): ?>
                            <li>
                                <form method="POST" action="login.php">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="logout" class="btn rounded-pill button logout mt-4">Logout</button>
                                    </div>
                                </form>
                            </li>
                        <?php else: ?>
                            <li>
                                <div class="d-flex justify-content-center">
                                    <a href="../php/login.php" class="btn rounded-pill button logout mt-4">Login</a>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul> 
                </div>
            </div>
        </div>
        <!-- LOGO -->
        <a href="../php/index.php">
            <img src="../utilities/logo/logopeluche.png" alt="Logo"/>
        </a>
        <?php if(isAdminLoggedIn()): ?>
            <!-- BOTTONE UTENTE -->
            <a href="../php/account.php" class="btn position-relative user pe-3 ps-1 button-empty">
                <span class="bi bi-person" aria-hidden="true"></span>
                <span class="position-absolute top-50 start-60 translate-middle badge rounded-pill user-badge">
                    <?php echo $nuovenotificheadmin ?>
                </span>
            </a>
        <?php else: ?>
            <!-- BOTTONE CARRELLO -->
            <?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
            <?php if($currentPage === "carrello.php"): ?>
                <a href="../php/carrello.php" class="btn position-relative cart pe-3 ps-1 button-empty">
                    <span class="bi bi-bag" aria-hidden="true"></span>
                    <span class="position-absolute top-50 start-75 translate-middle badge rounded-pill cart-badge">
                        <?php echo $numeroprodotti ?>
                    </span>
                </a>
            <?php else: ?>
                <button class="btn position-relative cart pe-3 ps-1 button-empty" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <span class="bi bi-bag" aria-hidden="true"></span>
                    <span class="position-absolute top-50 start-75 translate-middle badge rounded-pill cart-badge">
                        <?php echo $numeroprodotti ?>
                    </span>
                </button>
            <?php endif; ?>
        <?php endif; ?>

        <!-- MENU LATERALE -->
        <?php if (!isAdminLoggedIn()): ?>
            <div class="offcanvas offcanvas-end offcanvas-custom" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <h5 id="offcanvasRightLabel" class="visually-hidden">Carrello</h5>
                <!-- HEADER MENU -->
                <div class="offcanvas-header d-flex align-items-center pb-0 pt-4">
                    <!-- BOTTONE X -->
                    <button type="button" class="btn button-empty ps-2" data-bs-dismiss="offcanvas" aria-label="Close">
                        <span class="bi bi-x-lg" aria-hidden="true"></span>
                    </button>
                    <img class="iconaborsa" src="../utilities/logo/borsa.png" alt="iconaborsa">
                    <h4 class="mb-2 mt-2">Carrello</h4>
                </div>
                <!-- BODY MENU -->
                <div class="offcanvas-body pt-4 ps-1 pe-1" id="cart-menu">
                    <?php include 'menu-carrello.php'; ?>
                </div>
            </div>
        <?php endif; ?>
    </header>

    <!-- MAIN -->
    <main>
        <?php 
        require($templateParams["nome"]);
        ?>
    </main>

    <!-- FOOTER -->
    <footer class="pt-2 pb-3 mt-4">
        <a href="../php/assistenza.php">Assistenza Clienti</a><br>
        <a href="../php/informazioni.php">Informazioni su Mondo Morbidoso</a><br>
        <a href="../php/privacy.php">Informativa Privacy</a>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../js/updatecart.js"></script>
    <script src="../js/handleorder.js"></script>
    <script src="../js/handleavailability.js"></script>
    <script src="../js/cookie.js"></script>
    <script src="../js/alert.js"></script>
    <script src="../js/handlemessages.js"></script>
    <script src="../js/tracking.js"></script>
    <script src="../js/password.js"></script>
</body>
</html>