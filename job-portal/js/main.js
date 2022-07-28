

// navbar on scroll effects
const header= document.querySelector('#navbar');
document.addEventListener('scroll', ()=>{
    if(window.scrollY>190){
        header.style.backgroundColor='rgba(0,0,0,0.8)';
    }
    else{
        header.style.backgroundColor='transparent';
    }
});







