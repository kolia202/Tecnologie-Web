<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $templateParams["titolo"]; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <header>
        <button class="btn p-0" style="background-color: white" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
            <i class="bi bi-list ps-3" style="color: rgb(137, 85, 32); font-size: 50px;"></i>
        </button>
        <div class="offcanvas offcanvas-start offcanvas-custom" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
            <div class="offcanvas-header">
                <p>Menù</p>
                <button type="button" style="background-color: white;" class="btn" data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="bi bi-x-lg" style="color:rgb(137, 85, 32); font-size: 35px"></i>
                </button>
            </div>
                <div class="offcanvas-body">
                    <div>
                        <form class="d-flex">
                            <input class="form-control me-2" type="text" placeholder="Search">
                            <button class="btn" style="color: rgb(137, 85, 32);" type="button">
                                <i class="bi bi-search-heart" style="font-size: 30px;"></i>
                            </button>
                        </form>
                        <a href="#">Account<br></a>
                        <a href="#">Tutti i nostri peluche<br></a>
                        <a href="#">Animali<br></a>
                        <a href="#">Cibo<br></a>
                    </div>
                </div>
        </div>
        <img src="img/img.png"/>
        <i class="bi bi-bag pe-3" style="color: rgb(137, 85, 32); font-size: 40px;"></i>
    </header>
    <footer>
        <p>Informazioni su Mondo Morbidoso<br></p>
        <p>Assistenza Clienti.<br></p>
        <p>Informativa Privacy.<br></p>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>