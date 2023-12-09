let confirmWindow = document.querySelector('.confirm_wrapper');
let no = document.querySelector('.no');
document.addEventListener('click', function (event) {
    if (!confirmWindow.contains(event.target)) {
        confirmWindow.classList.remove('shows2');
        confirmWindow.style.display = 'none';
    }
})
no.addEventListener('click', () => {
    confirmWindow.style.display = 'none'
})


