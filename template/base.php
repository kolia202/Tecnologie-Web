<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $templateParams["titolo"]; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<body>
    <!-- HEADER -->
    <header>
        <!-- BOTTONE MENU -->
        <button class="btn" style="background-color: white" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
            <i class="bi bi-list" style="color: rgb(137, 85, 32); font-size: 50px;"></i>
        </button>

        <!-- MENU LATERALE -->
        <div class="offcanvas offcanvas-start offcanvas-custom" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
            <!-- HEADER MENU -->
            <div class="offcanvas-header pb-0">
                <!-- BOTTONE X -->
                <button type="button" style="background-color: white;" class="btn ms-auto p-0" data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="bi bi-x-lg" style="color:rgb(137, 85, 32); font-size: 35px"></i>
                </button>
            </div>
            <!-- BODY MENU -->
            <div class="offcanvas-body">
                <div>
                    <!-- BARRA DI RICERCA -->
                    <form class="d-flex mb-4">
                        <input class="form-control shadow-brown ms-1" style="background-color:  rgb(245, 222, 179, 0.2); height: 40px;" type="text" placeholder="Search">
                        <!-- BOTTONE CERCA -->
                        <button class="btn pt-0 pb-0 ps-2 pe-2 ms-2" style="color: rgb(137, 85, 32);" type="button">
                            <i class="bi bi-search-heart" style="font-size: 25px;"></i>
                        </button>
                    </form>
                    <!-- LINK NEL MENU -->
                    <ul class="list-unstyled">
                        <li><a href="../php/index.php">Home<br></a></li>
                        <li><a href="../php/account.php">Account<br></a></li>
                        <li><a href="#">I tuoi preferiti<br></a></li>
                        <li><a href="#">Tutti i nostri peluche<br></a></li>
                        <!-- MENU A SCOMPARSA -->
                        <li class="d-flex flex-column justify-content-center">
                            <button class="btn" type="button" style="background-color: white; color: rgb(137, 85, 32); font-size: 18px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Categorie</button>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body border-0 pt-0 pb-0" style="background-color: rgb(245, 222, 179, 0.2);">
                                    <!-- ELENCO CATEGORIE -->
                                    <ul class="list-unstyled">
                                        <?php foreach($templateParams["categorie"] as $categoria): ?>
                                            <li><a href="#"><?php echo $categoria["Nome_categoria"]; ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul> 
                </div>
            </div>
        </div>

        <!-- LOGO -->
        <a href="../php/index.php">
            <img src="../utilities/logo/logopeluche.png" alt="Logo"/>
        </a>

        <!--<button class="btn d-none d-md-block ms-30%" type="button">
            <i class="bi bi-heart" style="color: rgb(137, 85, 32); font-size: 40px"></i>
        </button>
        <button class="btn d-none d-md-block ms-auto" type="button">
            <i class="bi bi-person" style="color: rgb(137, 85, 32); font-size: 45px"></i>        
        </button>-->

        <!-- BOTTONE CARRELLO -->
        <button class="btn" type="button">
            <i class="bi bi-bag" style="color: rgb(137, 85, 32); font-size: 40px;"></i>            
        </button>
    </header>

    <!-- MAIN -->
    <main>
        <?php 
        require($templateParams["nome"]);
        ?>
    </main>

    <!-- FOOTER (CHE FOOTA!!!) -->
    <footer>
        <p> 
            | Informazioni su Mondo Morbidoso |<br>
            | Assistenza Clienti |<br>
            | Informativa Privacy |<br>
    </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>