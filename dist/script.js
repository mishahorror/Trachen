function copynumber() {

    /* Copy text into clipboard */
    navigator.clipboard.writeText("+380000000000");
    const alertElement = document.getElementById("popup-modal");
    alertElement.classList.remove("hidden");
    setTimeout(function() {
        alertElement.classList.add("hidden");
    }, 2000); // Delay of 2 seconds (2000 milliseconds)

}
function authentication() {

    const alertElement = document.getElementById("authentication-modal");
    alertElement.classList.remove("hidden");
}

function closemodal() {

    const alertElement = document.getElementById("authentication-modal");
    alertElement.classList.add("hidden");
}

function copymail() {

    /* Copy text into clipboard */
    navigator.clipboard.writeText("info@travelgermany.com");
    const alertElement = document.getElementById("popup-modal");
    alertElement.classList.remove("hidden");
    setTimeout(function() {
        alertElement.classList.add("hidden");
    }, 2000); // Delay of 2 seconds (2000 milliseconds)
}
function newtour() {
    const alertElement = document.getElementById("popup-modal");
    alertElement.classList.remove("hidden");
    setTimeout(function() {
        alertElement.classList.add("hidden");
    }, 2000); // Delay of 2 seconds (2000 milliseconds)
}

function toogleDropdown() {
    let dropdown = document.querySelector("#DropDownButton #dropdown");
    dropdown.classList.toggle('hidden');
}


const menuIcon = document.getElementById("stickchange");
const crossIcon = document.getElementById("stickchangecross");
let dropdown = document.querySelector("#dropdownsm");

function toggleMenu() {
    if (menuIcon.classList.contains("hidden")) {
        menuIcon.classList.remove("hidden");
        crossIcon.classList.add("hidden");
        dropdown.classList.toggle('hidden');
    } else {
        menuIcon.classList.add("hidden");
        crossIcon.classList.remove("hidden");
        dropdown.classList.toggle('hidden');
    }
}