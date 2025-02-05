document.addEventListener("DOMContentLoaded", progressBar);

function progressBar() {
    let progressBar = document.querySelector('.progress-bar');

    if(progressBar) {
        let orderStatus = document.querySelector('.order-status').value;
        let finalProgress = 0;
        let progress = 0;

        if (orderStatus == 'In lavorazione') {
            finalProgress = 30;
        } else if (orderStatus == 'Spedito') {
            finalProgress = 60;
        } else if (orderStatus == "Consegnato") {
            finalProgress = 100;
        }

        function updateProgressBar() {
            if (progress < finalProgress) {
                progress++;
                progressBar.style.width = progress + "%";
                progressBar.setAttribute("aria-valuenow", progress);

                progressBar.classList.remove("bg-danger", "bg-warning", "bg-success");
                if (progress <= 30) {
                    progressBar.classList.add("bg-danger");
                } else if (progress <= 60) {
                    progressBar.classList.add("bg-warning");
                } else {
                    progressBar.classList.add("bg-success");
                }
            }
        }

        setInterval(updateProgressBar, 20);

    }

}