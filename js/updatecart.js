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
    
    let idprodotto = button.dataset.productid;

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
        if(data.status === "not_logged_in") {
            const cartOffcanvas = new bootstrap.Offcanvas(document.getElementById("offcanvasRight"));
            cartOffcanvas.show();
            if (!document.querySelector('#cart-menu p.mt-2')) {
                const newp = document.createElement('p');
                newp.classList.add('mt-2', 'ps-3', 'pe-3', 'text-italic');
                newp.innerText = 'Per visualizzare il carrello, accedi al tuo account.';
                document.querySelector("#cart-menu").appendChild(newp);
                const newd = document.createElement('div');
                newd.classList.add('text-center', 'mt-4');
                const newa = document.createElement('a');
                newa.classList.add("btn", 'mt-2', 'ps-4', 'pe-4', 'button');
                newa.href = "../php/login.php";
                newa.innerText = 'Accedi';
                newd.appendChild(newa);
                document.querySelector("#cart-menu").appendChild(newd);
            }
        } else if(data.status == "success") {
            if (isCart) {
                button.closest("section").querySelector(".stock-warning").style.display = "none";
                updateQuantity(button, update);
            }
            if (!isCart) {
                const cartOffcanvas = new bootstrap.Offcanvas(document.getElementById("offcanvasRight"));
                cartOffcanvas.show();
                updateMenu(data.cart);
            }

            updateCartBadge(data.cart);
        } else if(data.status === "not_available") {
            button.closest("section").querySelector(".stock-warning").style.display = "block";
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

    let points = parseInt(productPoints.innerText.replace("punti", "").trim());
    let newProductPoints = points / quantity * newQuantity;
    productPoints.innerText = newProductPoints + " punti";

    if (update != 0) {
        updateTotal(price / quantity * update);
    }
}

function updateTotal(newPrice) {
    const totalPrice = document.querySelector(".total-price");
    let total = parseFloat(totalPrice.innerText.replace("Totale Carrello:", "").replace(",", ".").replace("€", "").trim());
    let newTotal = total + newPrice;
    totalPrice.innerHTML = "<strong>Totale Carrello:</strong> " + newTotal.toFixed(2).replace(".", ",") + "€";
}

function updateMenu(cart) {
    const cartMenu = document.querySelector("#cart-menu");
    let total = 0;

    cartMenu.innerHTML = "";

    if(cart.length == 0) {
        const emptyCart = document.createElement('article');
        emptyCart.innerHTML = `
            <p class="mt-2 ps-3 pe-3 text-italic">Il tuo carrello è vuoto</p>
            <div class="text-center mt-4">
            <a href="../php/prodotti.php" class="btn mt-2 ps-3 pe-3 button">I nostri Peluches</a>
            </div>
        `;
        cartMenu.appendChild(emptyCart);
    } else {
        cart.forEach(i => {
            total = total + (i.Prezzo * i.Quantita);
            const productSection = document.createElement("section");
            productSection.classList.add("d-flex", "align-items-center", 'mb-1');
            const cartmenuItem = document.createElement('a');
            cartmenuItem.classList.add('cartmenu-item');
            cartmenuItem.href = `../php/dettaglioProdotto.php?id=${i.Id_prodotto}`;
            const img = document.createElement('img');
            img.src = IMG_DIR + i.Immagine;
            img.classList.add('img-fluid');
            img.alt = '';
            cartmenuItem.appendChild(img);
            const div = document.createElement('div');
            div.classList.add('d-flex', 'flex-column', 'pt-3', 'pe-3', 'cartmenu-info');
            const link = document.createElement('a');
            link.href = `../php/dettaglioProdotto.php?id=${i.Id_prodotto}`;
            const par = document.createElement('p');
            par.classList.add('mb-1', 'fw-bold');
            par.innerText = i.Nome;
            link.appendChild(par);
            div.appendChild(link);
            const p = document.createElement('p');
            p.classList.add('text-muted', 'text-italic');
            p.innerText = i.Quantita + ' x ' + parseFloat(i.Prezzo).toFixed(2).replace(".", ",") + '€';
            div.appendChild(p);
            productSection.appendChild(cartmenuItem);
            productSection.appendChild(div);
            cartMenu.appendChild(productSection);
        });

        const totalPrice = document.createElement("h3");
        totalPrice.innerHTML = "<strong>Totale Carrello:</strong> " + parseFloat(total).toFixed(2).replace(".", ",") + "€";

        const button = document.createElement('div');
        button.classList.add("text-center", 'mt-4');

        const a = document.createElement('a');
        a.classList.add('btn', 'ps-3', 'pe-3', 'mt-5', 'button');
        a.href = "../php/carrello.php";
        a.innerText = 'Visualizza Carrello';
        
        button.appendChild(totalPrice);
        button.appendChild(a);
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