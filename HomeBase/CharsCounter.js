console.log('lala')
let counter = document.querySelector('.counter');
let textarea = document.querySelector('#message');
let sendBtn = document.querySelector('.send');
let messageLength = textarea.getAttribute('maxlength');
counter.innerText = +messageLength;
let count =  +counter.innerText;
textarea.addEventListener('input', function(){
    if(count >0){
        counter.innerText =  count - textarea.value.length;
    }
})


textarea.addEventListener('keydown',(e)=>{
    if(e.code === 'Enter'){
        e.preventDefault();
        sendBtn.click();
        console.log(textarea.innerHTML)

    }
    else if(e.code === 'Enter' && textarea.value == ''){
        alert('nope')
    }
})
