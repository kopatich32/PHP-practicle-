let $ = document.querySelector.bind(document);
let profile = $('.profile');
let wrapper = $('.reg_wrapper');
let form = document.forms.form;
document.addEventListener('click', (e)=>{
    // e.preventDefault();
    if(profile.contains(e.target)){
wrapper.style.display = 'block';
    }
    else if(!form.contains(e.target)){
        wrapper.style.display = 'none';
    }
    if($('.has_profile').contains(e.target)){
        wrapper.style.display = 'none';
        $('.auth_wrapper').style.display = 'block';
        $('.auth_wrapper').querySelector('input[name="AuthLogin"]').focus();
    }else if(!$('.authForm').contains(e.target)){
        $('.auth_wrapper').style.display = 'none';
    }
})
$('.file').onchange = ()=>{
    let name = $('.file').value.split('\\');
    let res = name[name.length-1];
    path.innerText = res;
}
//Cart counter
let counter = $('.counter');
window.addEventListener('click',function (event){
    if(event.target.dataset.action === 'plus'){
let currentCard = event.target.parentElement;
let thisCounter = currentCard.querySelector('[data-counter]');
        thisCounter.value = ++thisCounter.value;
        let res = currentCard.previousElementSibling.lastElementChild;
        console.log(res.innerText);
    }
    if(event.target.dataset.action === 'minus'){
        let currentCard = event.target.parentElement;
        let thisCounter = currentCard.querySelector('[data-counter]');
        thisCounter.value = --thisCounter.value;
        if(thisCounter.value <= 0){
        thisCounter.value = thisCounter.value.replace(thisCounter.value, '0')
        }
    }
})
