const IMG_DIR = "../utilities/img/";

document.addEventListener("DOMContentLoaded", handleCart);

function handleCart() {
    
    document.querySelectorAll(".increase").forEach(b => {
        b.addEventListener("click", function() {
            updateCart(b, 1, true);
        });
    });

    document.querySelectorAll(".decrease").forEach(b => {
        b.addEventListener("click", function() {
            updateCart(b, -1, true);
        });
    });

    document.querySelectorAll(".add-to-cart").forEach(b => {
        b.addEventListener("click", function() {
            updateCart(b, 1, false);
        });
    });

}

function updateCart(button, update, isCart) {
    
    const idprodotto = button.getAttribute("id");

    fetch("../php/aggiorna-carrello.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            id: idprodotto,
            quantity: update,
        })
    })
    .then(response => response.json())
    .then(data => {
        if(data.status == "success") {
            if (isCart) {
                updateQuantity(button, update);
            }
            if (!isCart) {
                const cartOffcanvas = new bootstrap.Offcanvas(document.getElementById("offcanvasRight"));
                cartOffcanvas.show();
                updateMenu(data.cart);
            }

            updateCartBadge(data.cart);
        }
    })
    .catch(error => {
        console.error("Errore nell'aggiornamento del carrello:", error);
    });
    
}


function updateQuantity(button, update) {
    let currentQuantity = button.parentElement.querySelector(".quantity");
    let productPrice = button.closest('section').querySelector(".product-price");
    let productPoints = button.closest('section').querySelector(".product-points");

    let quantity = parseInt(currentQuantity.innerText);
    let newQuantity = quantity + update;
    currentQuantity.innerText = newQuantity;

    let price = parseFloat(productPrice.innerText.replace("Prezzo:", "").replace(",", ".").replace("€", "").trim());
    let newProductPrice = price / quantity * newQuantity;
    productPrice.innerText = "Prezzo: " + newProductPrice.toFixed(2).replace(".", ",") + "€";

    let points = parseInt(productPoints.innerText.replace("Punti:", "").trim());
    let newProductPoints = points / quantity * newQuantity;
    productPoints.innerText = "Punti: " + newProductPoints;

    if (update != 0) {
        updateTotal(price / quantity * update);
    }
}

function updateTotal(newPrice) {
    const totalPrice = document.querySelector(".total-price");
    let total = parseFloat(totalPrice.innerText.replace("Totale Carrello:", "").replace(",", ".").replace("€", "").trim());
    let newTotal = total + newPrice;
    totalPrice.innerText = "Totale Carrello: " + newTotal.toFixed(2).replace(".", ",") + "€";
}

function updateMenu(cart) {
    const cartMenu = document.querySelector("#cart-menu");
    let total = 0;

    cartMenu.innerHTML = "";

    if(cart.length == 0) {
        const emptyCart = document.createElement('article');
        emptyCart.innerHTML = `
            <p>Il tuo carrello è vuoto</p>
            <div class="text-center">
            <a href="../php/prodotti.php" class="btn btn-sm fw-bold" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Torna al negozio</a>
            </div>
        `;
        cartMenu.appendChild(emptyCart);
    } else {
        cart.forEach(i => {
            total = total + (i.Prezzo * i.Quantita);
            const productSection = document.createElement("section");
            productSection.classList.add("d-flex", "align-items-center", "border-bottom");
            productSection.innerHTML = `
                <a href="../php/dettaglioProdotto.php?id=${i.Id_prodotto}" style="width: 50%;">
                    <img src="${IMG_DIR + i.Immagine}" class="img-fluid" alt=""/>
                </a>
                <div class="d-flex flex-column">
                   <a href="../php/dettaglioProdotto.php?id=${i.Id_prodotto}">
                        <p>${i.Nome}</p>
                    </a>
                    <p class="text-muted">${i.Quantita + 'x' + parseFloat(i.Prezzo).toFixed(2).replace(".", ",")}€</p>
                </div>     
            `; 
            cartMenu.appendChild(productSection);
        });

        const totalPrice = document.createElement("h2");
        totalPrice.classList.add("total-price");
        totalPrice.innerHTML = `Totale Carrello: ${parseFloat(total).toFixed(2).replace(".", ",")}€`;
        cartMenu.appendChild(totalPrice);

        const button = document.createElement('div');
        button.classList.add("text-center");
        button.innerHTML = `
            <a href="../php/carrello.php" class="btn btn-sm fw-bold" style="background-color: rgb(137, 85, 32); color: white; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 12px; font-style: italic;">Visualizza carrello</a>
        `;
        cartMenu.appendChild(button);

    }

}


function updateCartBadge(cart) {
    const badges = document.querySelectorAll(".cart-badge");
    let totalProducts = 0;
    cart.forEach(p => {
        totalProducts += p.Quantita;
    })
    badges.forEach(b => {
        b.innerHTML = totalProducts;
    })
}