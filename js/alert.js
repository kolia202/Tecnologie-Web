const alertPlaceholder = document.getElementById('liveAlertPlaceholder');
const emailInput = document.getElementById('emailInput');
const subscribeBtn = document.getElementById('subscribeBtn');

function isValidEmail(email) {
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return emailPattern.test(email);
}

function appendAlert(message, type) {
    alertPlaceholder.innerHTML = '';

    const wrapper = document.createElement('div');
    wrapper.innerHTML = `
        <div class="alert alert-${type} text-center fade show w-100" role="alert">
            <div>${message}</div>
        </div>
    `;
    alertPlaceholder.append(wrapper);
    setTimeout(() => {
        wrapper.remove();
    }, 3000);
}

subscribeBtn.addEventListener('click', () => {
    const email = emailInput.value.trim();

    if (!isValidEmail(email)) {
        appendAlert('Inserisci un indirizzo email valido!', 'danger');
        return;
    }

    fetch('../php/index.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'email=' + encodeURIComponent(email)
    })
    .then(response => response.json())
    .then(data => {
        appendAlert(data.message, data.status);
        if (data.status === 'success') {
            emailInput.value = ''; 
        }
    })
    .catch(error => console.error('Errore:', error));
});
