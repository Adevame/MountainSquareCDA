let btn1 = document.getElementById("modalOn");
let modalMockup = document.getElementById("modalMockup");
let btn2 = document.getElementById("modalOff");

function showModal() {
    if(modalMockup.style.display == "none") {
        modalMockup.style.display = "block";
    }
}

function closModal() {
    if (modalMockup.style.display == "block") {
        modalMockup.style.display = "none";
    }
}

btn1.addEventListener("click", showModal);
btn2.addEventListener("click", closModal);