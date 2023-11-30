let editBtn = document.querySelectorAll('.editBtn');
let confirmWindow = document.querySelector('.confirm_wrapper');
let no = document.querySelector('.no');
let saveBtn = document.querySelectorAll('.save');
let deleteBtn = document.querySelectorAll('.delete');


deleteBtn.forEach(delBtn => {
    let currentMess;
    delBtn.addEventListener('click', function (event) {
        if (delBtn.contains(event.target)) {
            currentMess = event.target.closest('.comment_of_user').dataset.num;
            console.log(currentMess)

            let thisCoords = delBtn.getBoundingClientRect();
            // confirmWindow.classList.add("shows")
            confirmWindow.style.position = 'absolute'
            confirmWindow.style.display = 'block'
            confirmWindow.style.top = thisCoords.top - confirmWindow.offsetHeight - window.pageYOffset + window.scrollY - 84 + 'px';
            confirmWindow.style.left = thisCoords.left - delBtn.offsetWidth / 2 + window.pageXOffset + window.scrollX + 'px';
            event.stopPropagation()
        }
    })

    $('.yes').addEventListener('click', function (event) {
        fetch('deleteMess.php', {
            method: 'POST',
            body: JSON.stringify({'delete': {'deleteMessage': currentMess}})
        })
            .then(resp => resp.json())
            .then(data => deleteMessage(data))
    })


})
function deleteMessage(letter){
    let targetDel = document.querySelector(`div[data-num="${letter.id}"]`);
    targetDel.remove();
    confirmWindow.style.display = 'none';

}

document.addEventListener('click', function (event) {
    if (!confirmWindow.contains(event.target)) {
        // confirmWindow.classList.remove('shows');
        confirmWindow.style.display = 'none';
    }
})

//Edit message
editBtn.forEach(item => {
    item.addEventListener('click', event => {
        event.preventDefault();
        let thisMessage = event.target.closest('.edit_buttons').previousElementSibling;
        if (item.contains(event.target)) {
            thisMessage.removeAttribute('contenteditable');
            thisMessage.setAttribute('contenteditable', "true");
            item.style.display = 'none';
            item.nextElementSibling.style.display = 'block';
            thisMessage.style.background = 'rgba(82, 176, 112, 0.85)';
            thisMessage.style.transition = '1s';
            setTimeout(() => {
                thisMessage.style.background = '';
                thisMessage.style.transition = '1s';
            }, 500);
            thisMessage.focus();
        }
    })
})

saveBtn.forEach(item => {
    item.onclick = e => {
        e.preventDefault()
        item.style.display = 'none';
        item.parentElement.previousElementSibling.setAttribute('contenteditable', "false");
        item.previousElementSibling.style.display = 'block';
    }
})
no.addEventListener('click', () => {
    console.log('no btn')
    // confirmWindow.classList.remove('shows');
    confirmWindow.style.display = 'none'
})