let btn1 = document.getElementById("modalOn");
let modalMockup = document.getElementById("modalMockup");
let btn2 = document.getElementById("modalOff");
let cards = document.querySelector('section');
let overlay = document.getElementById('modalOverlay');

function showModal() {
    if(modalMockup.style.display == "none") {
        overlay.style.display = "block";
        modalMockup.style.display = "grid";
        cards.style.pointerEvents = "none";
    }
}

function closModal() {
    if (modalMockup.style.display == "grid") {
        overlay.style.display = "none";
        modalMockup.style.display = "none";
        cards.style.pointerEvents = "auto";
    }
}

btn1.addEventListener("click", showModal);
btn2.addEventListener("click", closModal);