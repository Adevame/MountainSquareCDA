import confetti from 'https://cdn.skypack.dev/canvas-confetti';

function bienvenue(){
    confetti();
}

window.addEventListener('DOMContentLoaded', ()=>{
    const userConnecte = document.getElementById('confetti');
    if (userConnecte) {
        bienvenue();
    }
})