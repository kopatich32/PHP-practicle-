let $ = document.querySelector.bind(document);
let editBtn = document.querySelectorAll('.editBtn');
let deleteBtn = document.querySelectorAll('.delete');
let confirmWindow = document.querySelector('.confirm_delete_message');
let no = document.querySelector('.no');
let saveBtn = document.querySelectorAll('.save');


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
        // e.preventDefault();
        item.style.display = 'none';
        item.parentElement.nextElementSibling.style.display = 'block';
        e.stopPropagation()
        let form = document.forms.showed_mess;
        let formData = new FormData(form);
        fetch('/HomeBase/homeBase.php', {
            method: "GET",
            body: formData
        })
            .then(response => response.json())
            .then(data =>console.log(data))
    }

})
