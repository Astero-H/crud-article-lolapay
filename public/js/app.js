// Fadeout the success message after updating an article
window.addEventListener('DOMContentLoaded', (event) => {
    const alert = document.querySelector('.alert-success');
    if (alert) {
        setTimeout(() => {
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500); 
        }, 2000); 
    }
});