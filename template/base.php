<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $templateParams["titolo"]; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css?v=114" />
</head>
<body>
    <!-- HEADER -->
    <header>
        <!-- BOTTONE MENU -->
        <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft" aria-controls="offcanvasLeft">
            <i class="bi bi-list"></i>
        </button>
        <!-- MENU LATERALE -->
        <div class="offcanvas offcanvas-start offcanvas-custom" tabindex="-1" id="offcanvasLeft" aria-labelledby="offcanvasLeftLabel">
            <!-- HEADER MENU -->
            <div class="offcanvas-header pb-0 pt-4 d-flex align-items-center">
                <img class="iconaorsetto" src="../utilities/logo/orsetto.png" alt="">
                <h2>Menu</h2>
                <!-- BOTTONE X -->
                <button type="button" class="btn ms-auto" data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <!-- BODY MENU -->
            <div class="offcanvas-body pt-3">
                <div>
                    <!-- BARRA DI RICERCA -->
                    <form class="d-flex mb-4" method="GET" action="prodotti.php">
                        <div class="d-flex align-items-center search-bar">
                            <input id="search" name="search" class="form-control search ms-1" type="text" placeholder="Cerca" autocomplete="off">
                            <!-- BOTTONE CERCA -->
                            <button type="submit" for="search" class="btn pt-0 pb-0 ps-2 pe-2 ms-2 btn-search">
                                <i class="bi bi-search-heart"></i>
                            </button>
                        </div>
                    </form>
                    <!-- LINK NEL MENU -->
                    <ul class="list-unstyled pt-3 mb-5">
                        <li><a href="../php/index.php">Home<br></a></li>
                        <li><a href="../php/account.php">Account<br></a></li>
                        <?php if(!isAdminLoggedIn()): ?>
                            <li><a href="<?php echo isUserLoggedIn() ? '../php/preferiti.php' : 'account.php?error=devi_accedere'; ?>">I tuoi Preferiti</a></li>
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
                                        <?php foreach($templateParams["categorie"] as $categoria): ?>
                                            <li><a href="../php/prodotti.php?categoria=<?php echo $categoria["Nome_categoria"]; ?>"><?php echo $categoria["Nome_categoria"]; ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li><a href="../php/informazioni.php">Chi siamo<br></a></li>
                        <?php if(isUserLoggedIn()): ?>
                            <li>
                                <form method="POST" action="account.php">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="logout" class="btn rounded-pill fw-bold logout">Logout</button>
                                    </div>
                                </form>
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
            <a href="../php/account.php" class="btn position-relative user pe-3 ps-1">
                <i class="bi bi-person"></i>
                <span class="position-absolute top-50 start-60 translate-middle badge rounded-pill user-badge" value="<?php echo $nuovenotificheadmin ?>">
                    <?php echo $nuovenotificheadmin ?>
                </span>
            </a>
        <?php else: ?>
            <!-- BOTTONE CARRELLO -->
            <?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
            <?php if($currentPage === "carrello.php"): ?>
                <a href="../php/carrello.php" class="btn position-relative cart pe-3 ps-1">
                    <i class="bi bi-bag"></i>
                    <span class="position-absolute top-50 start-75 translate-middle badge rounded-pill cart-badge">
                        <?php echo $numeroprodotti ?>
                    </span>
                </a>
            <?php else: ?>
                <button class="btn position-relative cart pe-3 ps-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="bi bi-bag"></i>
                    <span class="position-absolute top-50 start-75 translate-middle badge rounded-pill cart-badge">
                        <?php echo $numeroprodotti ?>
                    </span>
                </button>
            <?php endif; ?>
        <?php endif; ?>

        <!-- MENU LATERALE -->
        <div class="offcanvas offcanvas-end offcanvas-custom" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <!-- HEADER MENU -->
            <div class="offcanvas-header d-flex align-items-center pb-0 pt-4">
                <!-- BOTTONE X -->
                <button type="button" class="btn ps-2" data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
                <h2 class="ms-4 mb-2">Carrello</h2>
            </div>
            <!-- BODY MENU -->
            <div class="offcanvas-body pt-4 ps-1 pe-1" id="cart-menu">
                <?php include 'menu-carrello.php'; ?>
            </div>
        </div>
    </header>

    <!-- MAIN -->
    <main>
        <?php 
        require($templateParams["nome"]);
        ?>
    </main>

    <!-- FOOTER (CHE FOOTA!!!) -->
    <footer>
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
