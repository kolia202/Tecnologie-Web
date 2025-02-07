html, body {
    height: 100%;
    margin: 0;
    display: flex;
    flex-direction: column;
}

body {
    background-color: rgb(245, 222, 179, 0.3);
    /*background-color: white;*/
}

/* HEADER */

header {
    padding-top: 3px;
    background-color: white;
    height: 115px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 2px solid rgb(137, 85, 32);
    padding-bottom: 2px;
}

.bi-list {
    color: rgb(137, 85, 32); 
    font-size: 50px;
}

.iconaorsetto {
    height: 55%;
    width: auto;
    margin-left: 6%;
   
}

header h2 { 
    color: rgb(137, 85, 32); 
    margin-top: 3%;
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 35px;
}

.bi-x-lg {
    color: rgb(137, 85, 32); 
    font-size: 30px;
}

.search {
    background-color: rgb(245, 222, 179, 0.4);
    border-color: rgb(245, 222, 179);
    height: 40px;
    margin-top: 2%;
}

.search::placeholder {
    color: rgb(137, 85, 32);
    opacity: 0.8;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 15px;
}

.search:focus {
    background-color: rgb(245, 222, 179, 0.3);
    border-color: rgb(137, 85, 32);
    box-shadow: 0 0 5px rgb(245, 222, 179);
    color: rgb(137, 85, 32);
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 15px;
}

.btn-search {
    color: rgb(137, 85, 32);
    font-size: 25px;
}

.btn-search:hover {
    color: rgb(137, 85, 32);
}

header > a {
    height: 100%;
}

header > a > img {
    height: 100%;
    width: auto;
}

div.offcanvas.offcanvas-start.offcanvas-custom {
    width: 75%;
}

div.offcanvas.offcanvas-end.offcanvas-custom {
    width: 75%;
}

.offcanvas-body ul li a {
    display: inline-block;
    width:100%;
    height: 100%;
    padding: 4%;
    color: rgb(137, 85, 32);
    text-decoration: none;
    text-align: center;
    font-size: 18px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

.offcanvas-body ul li a:hover {
    text-decoration: underline;
}

.offcanvas-body ul li button {
    display: inline-block;
    height: 100%;
    padding: 4%;
    color: rgb(137, 85, 32);
    text-align: center;
    font-size: 18px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

.offcanvas-body ul li button:focus {
    color: rgb(137, 85, 32);
}

.offcanvas-body ul li button:hover {
    color: rgb(137, 85, 32);
    border-color: rgb(137, 85, 32);
}

.offcanvas-body ul li button.logout {
    background-color: rgb(137, 85, 32);
    color: white;
    width: 60%;
    padding-top: 2%;
    padding-bottom: 2%;
    padding-left: 2%;
    padding-right: 2%;
    margin-top: 5%;
}

.categoriesmenu {
    background-color: rgb(245, 222, 179, 0.2);
}

.bi-person {
    color: rgb(137, 85, 32); 
    font-size: 40px;
}

.user {
    height: 70%;
}

.user-badge {
    font-size: 12px;
    padding: 4px 6px;
    background-color: rgb(204, 153, 102);
}

.bi-bag {
    color: rgb(137, 85, 32); 
    font-size: 40px;
}

.cart {
    height: 70%;
}

.cart-badge {
    font-size: 12px; 
    padding: 4px 6px;
    background-color: rgb(204, 153, 102);
}

.offcanvas-body p {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 15px;
    text-align: center;
}

.offcanvas-body .accesso {
    background-color: rgb(137, 85, 32); 
    color: white; 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px; 
    font-style: italic;
    text-align: center;
}

.offcanvas-body .vuoto {
    background-color: rgb(137, 85, 32); 
    color: white; 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px; 
    font-style: italic;
    text-align: center;
}

.offcanvas-body .cartmenu-item {
    width: 40%;
}

.offcanvas-body .cartmenu-info {
    width: 60%;
}

.offcanvas-body .cartmenu-info a {
    text-decoration: none;
}

.offcanvas-body .cartmenu-info a p {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 17px;
    color: rgb(204, 153, 102);
}

.offcanvas-body section {
    border-bottom: 1px solid rgb(137, 85, 32);
}

.offcanvas-body h3 {
    color: rgb(137, 85, 32);
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 20px;
}

.offcanvas-body .vaicarrello {
    background-color: rgb(137, 85, 32); 
    color: white; 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px; 
    font-style: italic;
    text-align: center;
}

/* MAIN */

main {
    margin-bottom: 5%;
}

/* HOME */

.carousel-item img {
    width: 250px;  
    height: 200px; 
    object-fit: cover;
    margin: 0 auto; 
}

.carousel-control-prev-icon, .carousel-control-next-icon {
    background-color: rgb(245, 222, 179);
    border-radius: 50%; 
    padding: 10px; 
}

main img {
    width: 85%; 
    height: auto; 
    display:block; 
    margin: 15px auto 0 auto; 
    border: 4px solid rgb(245, 222, 179);
}

main > h1 {
    text-align: center; 
    color: rgb(137, 85, 32); 
    margin-top: 10px;
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 25px;
    margin-bottom: 5px;
}

main > p {
    text-align: center; 
    color: rgb(137, 85, 32);
    margin-left: 2%;
    margin-right: 2%;
    padding-left: 2%;
    padding-right: 2%;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 14px;
    margin-bottom: 8px;
}

/* LOGIN & CO */

main h1.account {
    color: rgb(137, 85, 32);
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 28px;
}

.bi-telephone {
    color: rgb(137, 85, 32);
    font-size: 17px;
}

.bi-envelope {
    color: rgb(137, 85, 32);
    font-size: 18px;
}

.bi-key {
    color: rgb(137, 85, 32);
    font-size: 20px;
}

main .infologin {
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
}

main .inputlogin {
    border-color: rgb(245, 222, 179);
    font-size: 15px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

main .inputlogin:focus {
    border-color: rgb(137, 85, 32);
    box-shadow: 0 0 5px rgb(245, 222, 179);
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 15px;
}

main .btn-accedi {
    background-color: rgb(137, 85, 32);
    border-color: rgb(137, 85, 32);
    font-size: 16px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
}

.btn-accedi:hover {
    background-color: rgb(137, 85, 32);
    border-color: rgb(137, 85, 32);
    transform: scale(0.95);
}

main div a {
    color: rgb(190, 140, 90);
    font-size: 15px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

main div a:hover {
    color: rgb(137, 85, 32);
}

main div p.newsignin {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 15px;
    font-style: italic;
}

main div .howto {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 14px;    
}

main div .registrati {
    border-color: rgb(137, 85, 32);
    color: rgb(137, 85, 32);
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: 15px;
}

main div .registrati:hover {
    background-color: rgb(204, 153, 102);
    border-color:rgb(204, 153, 102);
}

main .alerts {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: 16px;
}

.bi-exclamation-triangle {
    font-size: 18px;
}

main .show-password {
    border-color: rgb(245, 222, 179);
    background-color: rgb(245, 222, 179, 0.8)
}

main .show-password:hover {
    background-color: rgb(245, 222, 179, 0.5);
    border-color: rgb(245, 222, 179);
}

.bi-eye-slash {
    color: rgb(137, 85, 32);
}

.bi-eye {
    color: rgb(137, 85, 32);
}

.bi-check-circle {
    font-size: 18px;
}

/* ACCOUNT */

main .cardaccount {
    border: 1px solid rgb(137, 85, 32);
}

.bi-person-circle {
    font-size: 40px;
    color: rgb(204, 153, 102);
}

main .details {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 15px;
}

main .btn-points {
    border-color: rgb(137, 85, 32); 
    background-color: rgb(255, 255, 153); 
    color: rgb(137, 85, 32); 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px; 
    font-style: italic;
}

main .btn-points:focus {
    border-color: rgb(137, 85, 32); 
    background-color: rgb(255, 255, 153); 
}

main .btn-points:hover {
    border-color: rgb(137, 85, 32); 
    background-color: rgb(255, 255, 153); 
}

.bi-star-fill {
    color: rgb(255, 165, 0);
    font-size: 20px;
}

main .collapse-points {
    background-color: rgb(245, 222, 179, 0.3);
}

main .pointstitle {
    color: rgb(137, 85, 32);
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

main .pointsdetails {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 15px;
}

main .bmenu {
    background-color: rgb(137, 85, 32); 
    color: white; 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px; 
    font-style: italic;
}

main .bmenu:hover {
    background-color: rgb(137, 85, 32); 
    color: white; 
    transform: scale(0.95);
}

main .userbutton {
    font-size: 15px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    background-color: rgb(204, 153, 102); 
    color: white;
}

main .userbutton:hover {
    background-color: rgb(204, 153, 102);
    color: white;
    transform: scale(0.95);
}

.bi-gear {
    font-size: 18px;
}

.bi-box-seam {
    font-size: 18px;
}

.bi-bell {
    font-size: 18px;
}

.bi-pen {
    font-size: 18px;
}

.bi-bookmark-heart {
    font-size: 18px;
}

.bi-boxes {
    font-size: 18px;
}

.bi-people {
    font-size: 18px;
}

/* FOOTER */

footer {
    margin-top: auto;
    background-color: rgb(137, 85, 32);
    text-align: center;
    padding-top: 1%;
    padding-bottom: 2%;
}

footer a {
    color: white;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-style: italic;
    font-size: 14px;
}



/*index.php*/

.img-vetrina {
    background-size: cover; 
    background-position: center;
    width: 300px;
    height: 200px; 
    margin-top: 10px;
    margin-bottom: 10px;
    border: 4px solid rgb(245, 222, 179);
}

.favorite-store-title {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 20px;
    margin-top: 10px;
    margin-bottom: 10px;
    text-align: center;
}

.welcome-message {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 15px;
    margin-top: 10px;
    margin-bottom: 10px;
    text-align: center;
}

.text-centerA {
    text-align: center;
    margin-top: 15px;
    margin-bottom: 10px;
}

.custom-buttonA {
    background-color: rgb(137, 85, 32);
    border-radius: 10px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 18px;
    color: white;
    width: 250px;
    height: 40px;
}

.custom-buttonA:hover,
.custom-buttonA:active {
    background-color: rgb(137, 85, 32);
    color: white;
    transform: none;
}

.rating {
    margin-top: 15px;
    margin-bottom: 15px;
    text-align: left;
}
.rating-star {
    color: rgb(240, 191, 16);
    font-size: 25px; 
}

.rating-score {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    color: rgb(137, 85, 32);
    font-size: 20px; 
}

.rating-reviews {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    color: rgb(137, 85, 32);
    font-size: 15px
}

.custom-biB {
    margin-top: 15px;
    margin-bottom: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 30px; 
    color: rgb(137, 85, 32);
}

.Consegna {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 20px;
    margin-top: 10px;
    margin-bottom: 5px;
    text-align: center; 
}

.ordinip {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 15px;
    margin-top: 5px;
    margin-bottom: 15px;
    text-align: center
}

.custom-biBB {
    margin-top: 15px;
    margin-bottom: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 30px; 
    color: rgb(137, 85, 32);
}

.pagamentoS {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 20px;
    margin-top: 10px;
    margin-bottom: 5px;
    text-align: center; 
}

.tipoCarte {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 15px;
    margin-top: 5px;
    margin-bottom: 15px;
    text-align: center
}

.custom-box {
    width: 85%;
    margin: 20px auto;
    border: 4px solid rgb(245, 222, 179);
    border-radius: 10px;
}

.carousel-inner {
    width: 100%;
    height: 285px;
}

.slide {
    width: 100%;
    height: 100%;
   
}

.immCours {
    width: 100%;
    height: 100%;
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    border: 0px solid rgb(254, 254, 254);
}

.dettaglio {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 20px;
    text-decoration: none;
    color: rgb(137, 85, 32);
}

.fw-bold {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 20px;
}

.collezioni {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 20px;
    padding-top: 20px;
}

.bg-whitee {
    margin-top: 30px;
    width: 100%;
    background-color: #fff;
    border: 4px solid rgb(245, 222, 179);
    border-radius: 10px; 
    text-align: center;
    padding: 10px;
}

.fw-boldSS {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.text-centerP h3 {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 18px; 
    font-weight: bold;
    color: rgb(137, 85, 32);
    margin-bottom: 8px;
}

.text-centerP h3 i {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 18px; 
    margin-right: 3px;
    color: rgb(137, 85, 32);
}

.text-centerP p {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 14px; 
    color: rgb(137, 85, 32);
    margin-bottom: 12px;
}

.text-centerP .form-control {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    width: 100%;
    padding: 8px; 
    font-size: 14px;
    text-align: center;
    border: 1.5px solid rgb(137, 85, 32);
    border-radius: 4px;
    outline: none;
}

.text-centerP .btn-primary {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    width: 100%;
    padding: 8px;
    font-size: 14px;
    font-weight: bold;
    background-color: rgb(137, 85, 32);
    color: white;
    border: none;
    border-radius: 10px;
}

.fotoTonda {
    margin-top: 30px;
    width: 200px; 
    height: 175px;
    border-radius: 50%; 
    object-fit: cover;
}

.bg-whiteee {
    margin: 20px auto;
    width: 85%;
    height: 275px;
    background-color: #fff;
    border-radius: 10px;
    border: 4px solid rgb(245, 222, 179);
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.bg-whiteee h1{
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 20px;
    font-weight: bold;
    color: rgb(137, 85, 32);
    margin-bottom: 10px;
}

.bg-whiteee p{
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 14px;
    font-weight: bold;
    color: rgb(137, 85, 32);
    margin-bottom: 10px;
}

.align-items-centerr {
    text-align: center;
    padding: 20px;
}

.slidee {
height: 100px;
}

.custom-inner {
    height: 100px;
}

.cookie {
    display: none; 
    position: fixed; 
    bottom: 20px; 
    left: 50%; 
    transform: translateX(-50%); 
    width: 90%; 
    max-width: 500px; 
    background: #fff; 
    color: #333; 
    padding: 20px; 
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2); 
    border-radius: 10px; 
    border: 2px solid #FFD700; 
    text-align: center; z-index: 1000
}

.cookie h5 {
    font-weight: bold;
}

.cookie p {
    margin-bottom: 10px;
}

.divCookie {
    display: flex; 
    justify-content: space-evenly; 
    margin-top: 15px
}

/*priacyC.php*/

.titoloP {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 18px;
    margin-top: 20px;
    margin-bottom: 5px;
    text-align: left;
    color: rgb(137, 85, 32);
    font-weight: bold;
    padding-left: 25px;
}

.welcome-messagee {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 15px;
    margin-bottom: 5px;
    text-align: left;
    color: rgb(137, 85, 32);
    padding-left: 18px;
}

.ulP {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 12px;
    color: rgb(137, 85, 32);
    text-align: left;
    padding-left: 25px;
}

/*lista-prodotti*/

.favorite-store-titlee {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 28px;
    color: rgb(137, 85, 32);
}

.bi-stars {
    font-size: 25px;
    color: rgb(240, 191, 16);
}

main .aggiungiprodottob {
    background-color: rgb(204, 153, 102);
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 16px;
    border-color: rgb(204, 153, 102);
}

main .aggiungiprodottob:hover {
    background-color: rgb(204, 153, 102);
    border-color: rgb(204, 153, 102);
    transform: scale(0.95);
}

.dettaglio {
    text-decoration: none;
}

.fotoProdotto {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
}

.nomeProdotto {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 20px;
    color: rgb(137, 85, 32);
}

main .blackb {
    background-color: black; 
    color: white; 
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: 14px;
    font-style: normal;
}

main .blackb:hover {
    background-color: black; 
    color: white;
}

.pProdotto {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 18px;
    color: black;
}

main .gestiscip {
    background-color: rgb(137, 85, 32); 
    color: white; 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px; 
}

main .gestiscip:hover {
    background-color: rgb(137, 85, 32); 
    color: white; 
    transform: scale(0.95);
}

main .eliminap { 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px;
    font-style: italic;
}

.add-to-cart {
    background-color: rgb(137, 85, 32); 
    color: white; 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px; 
    font-style: italic;
}

.add-to-cart:hover {
    background-color: rgb(137, 85, 32); 
    color: white;
    transform: scale(0.95);
}

/* MODAL */

.modal-titlep {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    color: rgb(137, 85, 32);
    font-style: italic;
}

.modal-text {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

.modal-text:focus {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

.modalbutton {
    background-color: rgb(137, 85, 32); 
    color: white; 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px;
    font-style: italic;
    border-color: rgb(137, 85, 32);
    font-weight: bold;
}

.modalbutton:hover {
    background-color: rgb(137, 85, 32); 
    color: white; 
    border-color: rgb(137, 85, 32);
    transform: scale(0.95);
}

.modallink {
    color: rgb(204, 153, 102);
    font-size: 15px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    text-decoration: underline;
}

.modallink:hover {
    color: rgb(190, 140, 90);
}

/*recensioniC*/

.custom-boldd {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 20px;
    text-align: center;
    color: rgb(137, 85, 32);
}

.pRecensioni {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 15px;
    color: rgb(137, 85, 32);
}

.star-rating {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 15px;
}

.custom-primary {
    background-color: rgb(137, 85, 32);
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 15px;
    border: #fff;
}

.custom-centerT {
    margin-top: 20px;
    margin-bottom: 20px;
    color: rgb(137, 85, 32);
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 15px;
}

.custom-border {
    color: rgb(137, 85, 32);
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
}

.custom-btnRec {
    background-color: rgb(137, 85, 32);
    border: #fff;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
}

.custom-btnRec:hover,
.custom-btnRec:active {
    background-color: rgb(137, 85, 32);
}

.mb-31 {
    color: rgb(137, 85, 32);
    border: #fff;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    margin-bottom: 20px;
}

/* SINGOLO PRODOTTO */

main .sp-titolo {
    color: rgb(137, 85, 32);
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
}

main .sp-details {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 18px;
}

main .sp-aggiungi {
    background-color: rgb(137, 85, 32); 
    color: white; 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px; 
    font-style: italic;
}

main .sp-aggiungi:hover {
    background-color: rgb(137, 85, 32); 
    color: white; 
    transform: scale(0.95);
}

main .sp-prefe {
    font-size: 16px;
}

.bi-heart {
    font-size: 22px;
    color: red;
}

.bi-heart-fill {
    font-size: 22px;
    color: red;
}

main .accordion-item {
    border: none;
}

main .accordion-button {
    background-color: rgb(245, 222, 179, 0.5);
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-weight: bold;
    font-size: 20px;
}

main .accordion-body {
    background-color: rgb(245, 222, 179, 0.5);
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 15px;
    color: rgb(137, 85, 32);
    text-align: center;
}

.accordion-button:focus {
    box-shadow: none;
    outline: none;
}

.accordion-button:not(.collapsed) {
    background-color: rgb(245, 222, 179, 0.5);
}

main .btn-avviso {
    background-color: rgb(137, 85, 32); 
    color: white; 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px; 
    font-style: italic;
}

main .btn-avviso:hover {
    background-color: rgb(137, 85, 32); 
    color: white; 
    transform: scale(0.95);
}

main .btn-avviso:disabled {
    background-color: rgb(137, 85, 32); 
    color: white; 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px; 
    font-style: italic;
}

main .avvisop {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    font-size: 15px;
    color: rgb(137, 85, 32);
    text-align: center;
}

main .avvisob:disabled {
    background-color: rgb(137, 85, 32); 
    color: white; 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px; 
    font-style: italic;
}

main .aumentab {
    border-color: rgb(190, 140, 90);
    color: rgb(190, 140, 90);
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 15px;
}

main .aumentab:hover {
    border-color: rgb(190, 140, 90);
    color: rgb(190, 140, 90);
}

main .gestiscib {
    background-color: rgb(204, 153, 102);
    border-color: rgb(204, 153, 102);
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 15px;
    font-style: italic;
    font-weight: bold;
}

main .gestiscib:hover {
    background-color: rgb(204, 153, 102);
    border-color: rgb(204, 153, 102);
}

.bi-pencil-square {
    font-size: 15px;
}

main .eliminab {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 15px;
}

/*recensioniMieC*/

.custom-row {
    color: rgb(137, 85, 32);
    border: #fff;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    margin-bottom: 20px;
}

.custon-sm {
    background-color: rgb(137, 85, 32);
    border-color: white;
}

.custon-sm:hover,
.custon-sm:active {
    background-color: rgb(137, 85, 32);
}

.cusotm-mt4 {
    margin-bottom: 20px;
}

/*prodotti-carrello*/

.imgCar {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    width: 300px;
    height: auto;   
}

.prodotto-carrello-a {
    text-decoration: none;
}

.nomeProdottoC {
    color: rgb(137, 85, 32);
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    text-align: center;
    font-size: 20px;
    margin-top: 10px;
}

.custom-col {
    text-align: center;
    color: rgb(0, 0, 0);
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    text-align: center;
    font-size: 16px;
}

.quanità-prodotti {
    margin-left: 125px;
    color: black;
}

.custom-iProdotti {
    text-align: center;
    color: rgb(0, 0, 0);
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    text-align: center;
    font-size: 15px;
}

.product-price {
    color: black;
}

.product-points {
    color: black;
}


.stock-warning {
    display: none; 
    color: red; 
    font-size: 14px;
}

.total-price {
    text-align: center;
    margin-bottom: 10px;
    color: rgb(137, 85, 32);
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-style: italic;
    text-align: center;
    font-size: 25px;
}

.p-avviso {
    color: red;
}

.custom-spedizioneButton {
    background-color: rgb(137, 85, 32); 
    color: white; 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 12px; 
    font-style: italic;
    width: 50%;
    text-align: center;
}

.custom-spedizioneButton2 {
    background-color: rgb(137, 85, 32); 
    color: white; 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 12px; 
    font-style: italic;
    width: 50%;
    text-align: center;
}

.custom-spedizioneButton2:hover,
.custom-spedizioneButton2:active {
    background-color: rgb(137, 85, 32); 
    color: white; 
}

.custom-spedizioneButton:hover,
.custom-spedizioneButton:active {
    background-color: rgb(137, 85, 32); 
    color: white; 
}

/*spedizione-scelta*/

.spedizione-alert {
    color: green; 
    font-weight: bold;
    text-align: center;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px; 
    font-style: italic;
}

.custom-form {
    color: rgb(0, 0, 0); 
    text-align: left;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px;
    font-style: italic;
    padding-left: 10px;
    padding-right: 10px;
    
}
.spedizione-p {
    color: rgb(137, 85, 32); 
    font-weight: bold;
    text-align: left;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px; 
    font-style: italic;
}

.error {
    color: red;
    text-align: left;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px; 
    font-style: italic;
    margin-top: 10px;
    margin-left: 10px;
    margin-right: 5px;
    margin-bottom: 5px;
}

.subtotale {
    margin-top: 10px;
    color: rgb(137, 85, 32); 
    text-align: center;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 20px; 
    font-style: italic;
}

.shipping-cost {
    color: rgb(137, 85, 32); 
    text-align: center;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 20px; 
    font-style: italic;
}

.totale {
    color: rgb(137, 85, 32); 
    font-weight: bold;
    text-align: center;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 30px; 
    font-style: italic;
}

.button-invia {
    background-color: rgb(137, 85, 32); 
    color: white; 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 12px; 
    font-style: italic;
}

/* ASSISTENZA */

main .asstitle {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

main .ordineconferma {
    color: black;
    font-size: 15px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

main .confermab {
    background-color: rgb(137, 85, 32);
    color: white;
}

main .confermab:hover {
    background-color: rgb(137, 85, 32);
    color: white;
    transform: scale(0.95);
}

main .totalee {
    color: rgb(137, 85, 32);
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 30px;
}

/*pagina pagamento*/

.border-bottom {
    margin-top: 20px;
    color: rgb(0, 0, 0); 
    text-align: left;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px;
    font-style: italic;
    padding-left: 10px;
    padding-right: 10px;
}

.spedizione-punti {
    color: rgb(137, 85, 32); 
    font-weight: bold;
    text-align: left;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px; 
    font-style: italic;
    margin-top: 15px;
    margin-left: 10px;
}

.spiegazione-punti {
    color: rgb(137, 85, 32); 
    text-align: left;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px; 
    font-style: italic;
    margin-top: 10px;
    margin-left: 10px;
    margin-right: 5px;
    margin-bottom: 5px;
}

.totale-punti {
    color: rgb(137, 85, 32); 
    text-align: left;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px; 
    font-style: italic;
    margin-left: 10px;
    margin-right: 5px;
}

.paga-punti {
    border-color: rgb(137, 85, 32); 
    color: rgb(137, 85, 32); 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 12px; 
    font-style: italic;
    margin-left: 10px;
}

.paga-punti:hover,
.paga-punti:active {
    border-color: rgb(137, 85, 32); 
    color: rgb(137, 85, 32); 
}

.punti-utente {
    display: none;
}

.errore-punti {
    display: none;
    color: red;
    text-align: left;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px; 
    font-style: italic;
    margin-top: 10px;
    margin-left: 10px;
    margin-right: 5px;
    margin-bottom: 5px;
}

.totale-carrello{
    margin-top: 10px;
    color: rgb(137, 85, 32); 
    text-align: center;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 20px; 
    font-style: italic;
}

.costo-spedizione {
    color: rgb(137, 85, 32); 
    text-align: center;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 20px; 
    font-style: italic;
}

.totale-finale {
    color: rgb(137, 85, 32); 
    font-weight: bold;
    text-align: center;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 28px; 
    font-style: italic;

}

.custom-fw {
    background-color: rgb(137, 85, 32); 
    color: white; 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 20px; 
    font-style: italic;
}

.custom-fw:hover,
.custom-fw:active {
    background-color: rgb(137, 85, 32); 
    color: white; 
}

.favorite-store-titlee {
    color: rgb(137, 85, 32); 
    font-weight: bold;
    text-align: center;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size:25px; 
    font-style: italic;
    margin-left: 10px;
}
.notifiche-p{
    color: rgb(137, 85, 32); 
    font-weight: bold;
    text-align: left;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px; 
    font-style: italic;
    margin-top: 15px;
    margin-left: 10px;
}
.nuova-notifica2 {
    background-color: green;
}
.mb-0 {
    font-size: 12px;
    display: none;
    color: rgb(137, 85, 32); 
    font-weight: bold;
    text-align: left;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 13px; 
    font-style: italic;
    margin-bottom: 20px;
}
.mt-1{
    font-size: 15px;
    color: rgb(137, 85, 32); 
    font-weight: bold;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-style: italic;
}
.leggi-notifica {
    font-size: 12px
}
.mt-2 {
    font-size: 12px;
    display: none;
    color: rgb(137, 85, 32); 
    font-weight: bold;
    text-align: left;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 13px; 
    font-style: italic;
    margin-bottom: 20px;
}
.elimina-notifica {
    display: none;
}
.custom-indietro {
    background-color: rgb(137, 85, 32); 
    color: white; 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-style: italic;
    margin-left: 20px;
    border-color: rgb(137, 85, 32);
}
.leggi-notifica {
    background-color: rgb(137, 85, 32); 
    color: white; 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px; 
    font-style: italic;
    border-color: rgb(137, 85, 32); 
}

.leggi-notifica:hover {
    background-color: rgb(137, 85, 32); 
    color: white;
    border-color: rgb(137, 85, 32); 
}

.chiudi-notifica {
    background-color: rgb(137, 85, 32); 
    color: white; 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px; 
    font-style: italic;
    border-color: rgb(137, 85, 32);
    display: none;
}

.chiudi-notifica:hover {
    background-color: rgb(137, 85, 32); 
    color: white; 
    border-color: rgb(137, 85, 32);  
}

.elimina-notifica {
    background-color: rgb(137, 85, 32); 
    color: white; 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px; 
    font-style: italic;
    border-color: rgb(137, 85, 32);
    display: none;
}

.elimina-notifica:hover {
    background-color: rgb(137, 85, 32); 
    color: white; 
    border-color: rgb(137, 85, 32);
}

.custom-indietro {
    margin-top: 20px;
    font-size: 14px;
}

.custom-indietro:hover {
    background-color: rgb(137, 85, 32); 
    color: white; 
    border-color: rgb(137, 85, 32);
}

.card-ordini {
    border-color: rgb(245, 222, 179);
}

.ordineid {
    font-size: 20px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

.ordinib {
    background-color: rgb(204, 153, 102); 
    color: white;
}

.ordinib:hover {
    background-color: rgb(204, 153, 102); 
    color: white;
}

/*gestione account*/

.custom-cardmt {
    color: white; 
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 18px; 
    font-style: italic;
    border-color: rgb(137, 85, 32);
}

/* info */

.h2-info {
    color: rgb(137, 85, 32); 
    font-weight: bold;
    text-align: center;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 18px; 
    font-style: italic;
    margin-top: 15px;
    margin-left: 10px;
}

.p-info{
    color: rgb(137, 85, 32); 
    text-align: left;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
    font-size: 15px; 
    font-style: italic;
    margin-top: 15px;
    margin-left: 10px;
}

.p-info a{
    text-decoration: none;
    color: rgb(137, 85, 32); 
}

.mappa {
    width: 100%; 
    max-width: 400px; 
    margin: 0 auto; 
    text-align: center;
}

.mappa iframe {
    border: 2px solid rgb(137, 85, 32); 
    display: block; 
    margin: 0 auto;
}

.custom-aa {
    background-color: rgb(204, 153, 102); 
    color: white;
}

.custom-aa:hover,
.custom-aa:active  {
    background-color: rgb(204, 153, 102); 
    color: white;
}


.text-muted {
margin-left: 175px;
font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
font-size: 15px; 
font-style: italic;
}

.text-area-row {
    width: 100%
}





@media screen and (min-width: 768px) {

    .text-muted {
        margin-left: 200px;
        }
        

    main .ordercont {
        width: 70%;
    }

    main .cont-account {
        width: 70%;
    }
    
    /* HEADER */

    div.offcanvas.offcanvas-start.offcanvas-custom {
        width: 30%;
    }

    div.offcanvas.offcanvas-end.offcanvas-custom {
        width: 30%;
    }

    header button:first-child {
        margin-left: 2%;
    }

    .bi-list {
        font-size: 60px;
    }

    header .user {
        margin-right: 2%;
        margin-bottom: 1%;
    }

    .bi-person {
        font-size: 50px;
    }

    .user-badge {
        font-size: 15px;
        padding: 4px 7px;
    }

    header .cart {
        margin-right: 2%;
        margin-bottom: 1%;
    }

    .bi-bag {
        font-size: 50px;
    }

    .cart-badge {
        font-size: 15px;
        padding: 4px 7px;
    }

    .iconaorsetto {
        height: 80%;
        width: auto;
        margin-left: 10%;
    }

    header h2 { 
        font-size: 40px;
        margin-left: 3%;
    }

    .bi-x-lg {
        font-size: 40px;
    }

    .search {
        height: 50px;
        margin-right: 1%;
    }
    
    .search:focus {
        font-size: 18px;
    }

    .search-bar {
        width: 100%;
        margin-left: 3%;
    }
    
    .btn-search {
        font-size: 35px;
    }

    .offcanvas-body ul li button {
        width: 80%;
    }

    .offcanvas-body p {
        font-size: 16px;
    }
    
    .offcanvas-body .accesso {
        font-size: 18px;
        margin-top: 5%;
    }
    
    .offcanvas-body .vuoto {
        font-size: 18px; 
        margin-top: 5%;
    }
    
    .offcanvas-body .cartmenu-info a p {
        font-size: 20px;
    }
    
    .offcanvas-body h3 {
        font-size: 24px;
    }
    
    .offcanvas-body .vaicarrello {
        font-size: 18px;
    }

    /* MAIN */

    main {
        margin-bottom: 0;
    }

    /* FOOTER */

    footer {
        padding-bottom: 1%;
    }

    /*index.php*/

    .img-vetrina {
        width: auto;
        height: 500px; 
    }

    .favorite-store-title {
        font-size: 40px;
    }

    .welcome-message {
        font-size: 26px;
    }
    
    .custom-buttonA {
        margin-top: 15px;
        font-size: 20px;
        width: 20%;
        height: 70px;
    }

    .rating-star {
        font-size: 40px; 
    }
    
    .rating-score {
        font-size: 30px; 
    }
    
    .rating-reviews {
        font-size: 20px
    }

    .custom-biB {
        font-size: 50px; 
    }
    
    .Consegna {
        font-size: 35px;
    }
    
    .ordinip {
        font-size: 20px;
        margin-bottom: 20px;
    }
    
    .custom-biBB {
        margin-top: 30px;
        font-size: 50px; 
    }
    
    .pagamentoS {
        font-size: 35px;
    }
    
    .tipoCarte {
        font-size: 20px;
        padding-bottom: 30px;
    }

    .custom-box {
        width: 60%;
        margin: 20px auto;
    }
    
    .carousel-inner {
        width: 100%;
        height: 100%;
    }
    
    .slide {
        width: 100%;
        height: 100%
    }
    
    .immCours {
        width: 100%;
        height: 100%;
    }
    
    .dettaglio {
        font-size: 20px;
    }
    
    .fw-bold {
        font-size: 20px;
    }

    .collezioni {
        font-size: 35px;
        margin-top: 20px;
    }

    .my-56 {
        width: 60%;
    }

    .fotoTonda {
        width: 500px; 
        height: 475px;
    }

    .bg-whiteee {
        width: 60%;
    }

    .bg-whiteee h1 {
        font-size: 35px;
    }

    .bg-whiteee p {
        font-size: 18px;
    }

    /*privacyC.php*/

    .titoloP {
        font-size: 30px;
        margin-top: 80px;
        margin-bottom: 5px;
        padding-left: 35px;
    }
    
    .welcome-messagee {
        font-size: 25px;
        margin-bottom: 5px;
        padding-left: 4px;
    }
    
    .ulP {
        font-size: 20px;
        text-align: left;
        padding-left: 50px;
    }

    main .favorite-store-titlee {
        font-size: 45px;
    }

    main .add-to-cart {
        font-size: 15px;
    }

    /* SINGOLO PRODOTTO */

    .accordion {
        width: 70%; /* Imposta la larghezza desiderata */
        margin: auto; /* Lo centra orizzontalmente */
        text-align: center; /* Centra il contenuto */
    }

    /*prodotti-carrello*/

    .custom-spedizioneButton {
        margin-bottom: 30px;
        margin-top: 15px;
    }

    .custom-spedizioneButton2 {
        margin-bottom: 30px;
        margin-top: 15px;
        width: 200px;
    }
    
    .quanità-prodotti {
        margin-left: 175px;
    }
    
    /*spedizione-scelta*/

    .spedizione-alert {  
        font-size: 18px; 
    }

    .custom-form {
        font-size: 20px;    
    }
    .spedizione-p {
        font-size: 20px; 
    }

    .subtotale {
        font-size: 30px; 
    }

    .shipping-cost {
        font-size: 28px; 
    }

    .totale {
        font-size: 32px; 
    }

    .button-invia {
        margin-bottom: 10px;
        font-size: 12px; 
        width: 200px;
        height: 40px;
    }

    /*pagina pagamento*/

    .border-bottom {
        font-size: 20px;
    }

    .spedizione-punti {
        font-size: 20px; 
    }

    .spiegazione-punti {
        font-size: 20px; 
    }

    .totale-punti {
        font-size: 20px; 
    }

    .paga-punti {
        font-size: 18px; 
    }

    .paga-punti:hover,
    .paga-punti:active {
        border-color: rgb(137, 85, 32); 
        color: rgb(137, 85, 32); 
    }

    .punti-utente {
        display: none;
    }

    .errore-punti {
        font-size: 20px; 
    }

    .totale-carrello{
        font-size: 30px; 
    }

    .costo-spedizione {
        font-size: 30px; 
    }

    .totale-finale {
        font-size: 38px; 
    }

    .custom-fw {
        font-size: 20px;
        margin-bottom: 20px;
    }

    .custom-fw:hover,
    .custom-fw:active {
        background-color: rgb(137, 85, 32); 
        color: white; 
    }

        /* info */

    .h2-info {
        font-size: 23px; 
    }

    .p-info{
        font-size: 18px; 
    }

    
    .mappa {
        width: 100%; 
        max-width: 800px; /* Limite massimo per schermi grandi */
        margin: 0 auto; 
        text-align: center;
    }
    
    .mappa iframe {
        border: 2px solid rgb(137, 85, 32); 
        display: block; 
        margin: 0 auto;
        width: 100%; /* Occupa tutto lo spazio del div */
        height: 400px; /* Altezza aumentata */
    }


    
}