const alertPlaceholder = document.getElementById('liveAlertPlaceholder');
const emailInput = document.getElementById('emailInput');
const subscribeBtn = document.getElementById('subscribeBtn');

function isValidEmail(email) {
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return emailPattern.test(email);
}

function appendAlert(message, type) {
    // Rimuove eventuali alert esistenti prima di crearne uno nuovo
    alertPlaceholder.innerHTML = '';

    const wrapper = document.createElement('div');
    wrapper.innerHTML = `
        <div class="alert alert-${type} text-center fade show w-100" role="alert">
            <div>${message}</div>
        </div>
    `;

    alertPlaceholder.append(wrapper);

    // Rimuove l'alert automaticamente dopo 3 secondi
    setTimeout(() => {
        wrapper.remove();
    }, 3000);
}

subscribeBtn.addEventListener('click', () => {
    const email = emailInput.value.trim();

    if (isValidEmail(email)) {
        appendAlert(`${email} - A breve riceverai nostre notizie!`, 'success');
        emailInput.value = ''; // Pulisce il campo email dopo l'invio
    } else {
        appendAlert('Inserisci un indirizzo email valido!', 'danger');
    }
});
