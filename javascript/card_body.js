let recommend = document.getElementById("recommned");
let viral1 = document.getElementById("viral");
let contact = document.getElementById("contact");

function Popular(){
    recommend.style.display = "block";
    viral1.style.display = "none";
}
function viral(){
    recommend.style.display = "none";
    viral1.style.display = "block";
}
function openContact(){
    contact.style.display = "block";
}
function closecontact(){
    contact.style.display = "none";
}
