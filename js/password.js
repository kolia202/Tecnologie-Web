document.addEventListener("DOMContentLoaded", showPassword);

function showPassword() {
    document.querySelectorAll(".show-password").forEach(b => {
        b.addEventListener('click', () => {
            let input = b.previousElementSibling;

            if(input.type == 'password') {
                input.type = Text;
                b.innerHTML = '<i class="bi bi-eye"></i>';
            } else {
                input.type = 'password';
                b.innerHTML = '<i class="bi bi-eye-slash"></i>';
            }
        });
    });
}