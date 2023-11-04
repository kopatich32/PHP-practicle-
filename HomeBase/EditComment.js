
let editBtn = document.querySelectorAll('.edit');
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
        confirmWindow.style.left = questionBlock.left - item.clientWidth + 20 + window.pageXOffset + 'px';
        event.stopPropagation();

    })
    document.addEventListener('click', e => {
        if (!confirmWindow.contains(e.target)) {
            confirmWindow.style.visibility = 'hidden';
        }
    })
})



//Edit message
editBtn.forEach(item => {

    item.addEventListener('click', event => {
        event.preventDefault();
        let thisMessage = event.target.closest('.edit_buttons').previousElementSibling;
        if (item.contains(event.target)) {
            thisMessage.removeAttribute('contenteditable');
            thisMessage.setAttribute('contenteditable', "true");
            item.firstElementChild.style.display = 'none';
            item.lastElementChild.style.display = 'block';

            thisMessage.style.background = 'rgba(82, 176, 112, 0.85)';
            thisMessage.style.transition = '1s';
            thisMessage.style.padding = '5px 0';
            setTimeout(()=>{
                thisMessage.style.background = '';
                thisMessage.style.transition = '1s';
            },500);
            thisMessage.focus();
        }



// let myFormData = document.forms.showed_mess;
//      let formdata = new FormData();
//    formdata.set('message', thisMessage.innerText);
//         for (let row of formdata) {
//             console.log(row)
//         }
//         fetch ('/homeBase.php', {
//             method: 'POST',
//             body: formdata
//         })
//             .then(response => response.json())
//             .then(data =>{
//                 console.log(data)
//             })
    })
})

saveBtn.forEach(item=>{
    item.onclick = e=>{
        e.preventDefault()
        item.style.display = 'none';
        item.previousElementSibling.style.display = 'block';
        e.stopPropagation()
        let form = document.forms.showed_mess;
        let formData = new FormData(form);
       let text = document.querySelector('.entered_message').value;
       formData.set('mess', text);
        fetch('/HomeBase/homeBase.php', {
            method: "POST",
            body: formData
        })
            .then(response => console.log(response.json()))

    }



})

no.addEventListener('click', () => {
    confirmWindow.style.visibility = 'hidden';
})
// let thisMess = document.querySelector('.entered_message');
// thisMess.addEventListener('blur', function (event) {
//         console.log('lalal')
//         // item.firstElementChild.innerText = 'Редактировать';
//         // thisMessage.setAttribute('contenteditable', "false");
//         fetch('/homeBase.php',{
//             method: "POST",
//             body: new FormData(document.forms.showed_mess)
//         })
//             .then(res => res.json())
//             .then(data => {
//                 console.log(data)
//
//         })
//
//     })




