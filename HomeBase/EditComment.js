let editBtn = document.querySelectorAll('.edit');
let deleteBtn = document.querySelectorAll('.delete');
let confirmWindow = document.querySelector('.confirm_delete_message');
let no = document.querySelector('.no');
deleteBtn.forEach(item => {

    item.addEventListener('click', event => {
        event.preventDefault();
        if (item.contains(event.target)) {
            confirmWindow.style.visibility = 'visible';
        }
        // if(!item.contains(event.target)){
        //     confirmWindow.style.visibility = 'hidden';
        // }

        let questionBlock = item.getBoundingClientRect();
        let questionBlockHeight = confirmWindow.offsetHeight;
        confirmWindow.style.top = questionBlock.top - questionBlockHeight - 20 + window.pageYOffset + 'px';
        confirmWindow.style.left =  questionBlock.left - item.clientWidth + 20 + window.pageXOffset + 'px';
        event.stopPropagation();

    })
})
// document.addEventListener('click',(event)=>{
//    event.stopPropagation()
//     if(!confirmWindow.contains(event.target)){
//         confirmWindow.style.visibility = 'hidden';
//     }
// })

//Edit message

editBtn.forEach(item => {

    item.addEventListener('click', event => {
        console.log(event.target.innerText)
        event.preventDefault();
        // console.log(item.firstElementChild.innerText)
        let thisMessage = event.target.closest('.edit_buttons').previousElementSibling;
        if (item.contains(event.target) && item.firstElementChild.innerText === 'Редактировать') {
            // console.log('bugaga')
            thisMessage.removeAttribute('contenteditable');
            thisMessage.setAttribute('contenteditable', "true");
            item.firstElementChild.innerText = 'Сохранить';
            thisMessage.style.background = 'rgba(82, 176, 112, 0.85)';
            thisMessage.style.transition = '1s';
            thisMessage.style.padding = '5px 0';
            setTimeout(()=>{
                thisMessage.style.background = '';
                thisMessage.style.transition = '1s';
            },500);
            thisMessage.focus();
        }


        if(item.contains(event.target) && item.firstElementChild.innerText === 'Сохранить'){
            item.onclick = ()=>{
                thisMessage.removeAttribute('contenteditable');
                thisMessage.setAttribute('contenteditable', 'false');
                item.firstElementChild.innerText = 'Редактировать';
                // console.log('lala')
            }
        }
    })

})

no.addEventListener('click',()=>{
    confirmWindow.style.visibility = 'hidden';
})
let thisMess = document.querySelector('.entered_message');
thisMess.addEventListener('blur', function (event) {
        console.log('lalal')
        // item.firstElementChild.innerText = 'Редактировать';
        // thisMessage.setAttribute('contenteditable', "false");
        fetch('/homeBase.php',{
            method: "POST",
            body: new FormData(document.forms.showed_mess)
        })
            .then(res => res.json())
            .then(data => {
                console.log(data)

        })

    })




