let editBtn = document.querySelectorAll('.edit');
let deleteBtn = document.querySelectorAll('.delete');
let confirmWindow = document.querySelector('.confirm_delete_message');
let yes = document.querySelector('.yes');
let no = document.querySelector('.no');
deleteBtn.forEach(item=>{

item.addEventListener('click', event =>{
    let choosenElem = event.target;
        event.preventDefault();
    if(item.contains(event.target)){
       confirmWindow.style.visibility = 'visible';
    }

    let questionBlock = item.getBoundingClientRect()
    let questionBlockHeight = confirmWindow.offsetHeight;
    confirmWindow.style.top = questionBlock.top - questionBlockHeight - 20 + window.pageYOffset + 'px';
    confirmWindow.style.left = questionBlock.left - item.clientWidth  + 20 + window.pageXOffset  + 'px';

})
})


