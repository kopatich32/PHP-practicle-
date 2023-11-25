let editBtn = document.querySelectorAll('.editBtn');
let deleteBtn = document.querySelectorAll('.delete');
let confirmWindow = document.querySelector('.confirm_wrapper');
let no = document.querySelector('.no');
let saveBtn = document.querySelectorAll('.save');


// For JS -PHP
let tag = document.querySelectorAll('.entered_message');
let obj = [];
tag.forEach(elem => {
    obj.push({elem: elem.innerText})
})
// console.log(obj)


    deleteBtn.forEach(delBtn => {
        delBtn.addEventListener('click',function(event){
            if (delBtn.contains(event.target)) {
                let thisCoords = delBtn.getBoundingClientRect();
                console.log(thisCoords)
                confirmWindow.classList.add("visible")
                confirmWindow.style.top = thisCoords.top - confirmWindow.offsetHeight - window.pageYOffset - 60 + 'px';
                confirmWindow.style.left = thisCoords.left - delBtn.offsetWidth / 2 + window.pageXOffset + 'px';
                event.stopPropagation()
            }
        })
    })
document.addEventListener('click', function(event){
if (!confirmWindow.contains(event.target)) {
        // confirmWindow.style.visibility = 'hidden';
        confirmWindow.classList.remove('visible');
        console.log('yes')
    }

})




// document.addEventListener('click', event => {
//     deleteBtn.forEach(item => {
//
//         event.preventDefault();
//     if (item.contains(event.target)) {
//         confirmWindow.style.visibility = 'visible';
//         console.log('la')
//     }
//     else if(!confirmWindow.contains(event.target)){
//         confirmWindow.style.visibility = 'hidden';
//     }
//
//     let questionBlock = item.getBoundingClientRect();
//     let questionBlockHeight = confirmWindow.offsetHeight;
//     confirmWindow.style.top = questionBlock.top - questionBlockHeight - 20 + window.pageYOffset + 'px';
//     confirmWindow.style.left = questionBlock.left - item.clientWidth + 20 + window.pageXOffset + 'px';
//     event.stopPropagation();
// })
// })
//
// document.addEventListener('click', e => {
//     if (!confirmWindow.contains(e.target)) {
//         confirmWindow.style.visibility = 'hidden';
//     }
// })


//Edit message
editBtn.forEach(item => {

    item.addEventListener('click', event => {

        // event.preventDefault();
        let thisMessage = event.target.closest('.edit_buttons').previousElementSibling.firstElementChild;

        if (item.contains(event.target)) {
            thisMessage.removeAttribute('contenteditable');
            thisMessage.setAttribute('contenteditable', "true");
            item.style.display = 'none';
            item.nextElementSibling.firstElementChild.style.display = 'block';

            thisMessage.style.background = 'rgba(82, 176, 112, 0.85)';
            thisMessage.style.transition = '1s';
            thisMessage.style.padding = '5px 0';
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
        // e.preventDefault()
        item.style.display = 'none';
        item.parentElement.previousElementSibling.style.display = 'block';
        e.stopPropagation()
        let form = document.forms.showed_mess;
        let formData = new FormData(form);
        // let text = document.querySelector('.entered_message').value;
        // formData.set('mess', 'ololo');
        fetch('/HomeBase/homeBase.php', {
            method: "POST",
            body: formData
        })
            .then(response => console.log(response.json()))
    }

})
// no.addEventListener('click', () => {
//     confirmWindow.style.visibility = 'hidden';
// })




