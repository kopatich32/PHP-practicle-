let editBtn = document.querySelectorAll('.edit');
let deleteBtn = document.querySelectorAll('.delete');
let confirmWindow = document.querySelector('.confirm_delete_message');
let messageArea = document.querySelector('.entered_message');
let yes = document.querySelector('.yes');
let no = document.querySelector('.no');
deleteBtn.forEach(item => {

    item.addEventListener('click', event => {
        event.preventDefault();
        if (item.contains(event.target)) {
            confirmWindow.style.visibility = 'visible';
        }

        let questionBlock = item.getBoundingClientRect()
        let questionBlockHeight = confirmWindow.offsetHeight;
        confirmWindow.style.top = questionBlock.top - questionBlockHeight - 20 + window.pageYOffset + 'px';
        confirmWindow.style.left = questionBlock.left - item.clientWidth + 20 + window.pageXOffset + 'px';

    })
})

//Edit message

editBtn.forEach(item => {

    item.addEventListener('click', event => {
        event.preventDefault();
        let thisMessage = event.target.closest('.edit_buttons').previousElementSibling;
        if (item.contains(event.target)) {
            item.firstElementChild.innerText = 'Сохранить';
            thisMessage.removeAttribute('contenteditable');
            thisMessage.setAttribute('contenteditable', "true")
            thisMessage.style.background = 'rgba(82, 176, 112, 0.85)';
            thisMessage.style.transition = '1s';
            thisMessage.style.padding = '5px 0';
            setTimeout(()=>{
                thisMessage.style.background = '';
                thisMessage.style.transition = '1s';
            },500);
            thisMessage.focus();
        }
        thisMessage.addEventListener('blur', function(){
            item.firstElementChild.innerText = 'Редактировать';

        })


    })
})


// document.addEventListener('mouseover', event=>{
//     editBtn.forEach(item=>{
//
//          if(!item.contains(event.target)){
//             console.log('ne lala')
//              event.stopPropagation()
//         }
//          else if(item.contains(event.target)){
//              console.log('lalal')
//          }
//     })
// })