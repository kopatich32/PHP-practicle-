let editBtn = document.querySelectorAll('.edit');
let deleteBtn = document.querySelectorAll('.delete');
let message = document.querySelectorAll('.entered_message');
deleteBtn.forEach(item=>{
item.addEventListener('click', event =>{
    let res = event.target.closest('.edit_buttons').previousElementSibling
  let comment = res.parentElement;
    comment.style.display = 'none';

})
})


