let $ = document.querySelector.bind(document);
let editBtn = document.querySelectorAll('.editBtn');
let deleteBtn = document.querySelectorAll('.delete');
let confirmWindow = document.querySelector('.confirm_delete_message');
let no = document.querySelector('.no');
let saveBtn = document.querySelectorAll('.save');


//send without reload
let send = document.querySelector('.send');
send.onclick = event=>{
    // event.preventDefault();

    fetch('homeBase.php',{
        method: 'POST',
        body:  new FormData(document.forms.commentArea)
    })
        .then(resp => resp.json())
        .then(data => console.log(data))
}

//Для одного окна
deleteBtn.forEach(delBtn=>{
  delBtn.addEventListener('click', event=>{
      // event.preventDefault()
      let thisCoords = delBtn.getBoundingClientRect();
      confirmWindow.style.visibility = 'visible';
      confirmWindow.style.top = thisCoords.top - confirmWindow.offsetHeight + window.pageYOffset  - 20 + 'px';
      confirmWindow.style.left = thisCoords.left - delBtn.offsetWidth/2+ window.pageXOffset + 'px';
      let form1 = event.target.closest('.edit_buttons').parentElement;
      $('.yes').onclick = function(e){
          // e.preventDefault();
          let formData = new FormData(form1);
          fetch('homeBase.php',{
              method: 'POST',
              body: formData,
          })
              .then(response =>response.json())
              .then((data=> console.log(data)))




          for (const saveBtnElement of formData) {
              console.log(saveBtnElement)
          }
      }
})
})



// For JS -PHP
let tag = document.querySelectorAll('.entered_message');
let obj =[];
tag.forEach(elem=>{
    obj.push({elem: elem.innerText})
})
// console.log(obj)
$('#message').focus();

//Edit message
editBtn.forEach(item => {
    item.addEventListener('click', event => {

        let thisMessage = event.target.closest('#forma').querySelector('.entered_message');
        if (item.contains(event.target)) {
            thisMessage.removeAttribute('readonly');
            item.style.display = 'none';
            item.previousElementSibling.style.display = 'block';
            thisMessage.style.background = 'rgba(82, 176, 112, 0.85)';
            thisMessage.style.transition = '1s';
            thisMessage.style.padding = '5px 0';
            setTimeout(()=>{
                thisMessage.style.background = '';
                thisMessage.style.transition = '1s';
            },500);
            thisMessage.focus();
        }
    })
})
saveBtn.forEach(item=>{
    item.onclick = e=>{
        e.preventDefault();
        item.style.display = 'none';
        item.nextElementSibling.style.display = 'block';
        e.stopPropagation()
        let form = e.target.parentElement.parentElement;
        console.log(form)
        let formData = new FormData(form);
        fetch('homeBase.php', {
            method: "POST",
            body: formData
        })
            .then(response => response.json())
            .then(data =>console.log(data))
    }

})

no.addEventListener('click', () => {
    confirmWindow.style.visibility = 'hidden';
})