let confirmWindow = document.querySelector('.confirm_wrapper');
let no = document.querySelector('.no');
document.addEventListener('click', function (event) {
    if (!confirmWindow.contains(event.target)) {
        confirmWindow.classList.remove('shows2');
        confirmWindow.style.display = 'none';
    }
})
no.addEventListener('click', () => {
    console.log('no btn')
    // confirmWindow.classList.remove('shows');
    confirmWindow.style.display = 'none'
})


