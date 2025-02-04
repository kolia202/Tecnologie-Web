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

    if (isValidEmail(email)) {
        appendAlert(`${email} - A breve riceverai nostre notizie!`, 'success');
        emailInput.value = ''; 
    } else {
        appendAlert('Inserisci un indirizzo email valido!', 'danger');
    }
});
