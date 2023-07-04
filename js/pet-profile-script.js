console.log("hello pet profile");

const logoNavbar = document.getElementsByClassName("nav-bar__logo");
const donateToPetBtn = document.querySelector("#donateToPet");
const donateToShelterBtn = document.querySelector("#donateToShelter");
const donateBtn = document.querySelector(".nav-bar__donate-btn");

logoNavbar[0].addEventListener("click", () => {
  window.location.href = "../index.html";
});

donateToPetBtn.addEventListener("click", () => alert("in progress"));

donateToShelterBtn.addEventListener("click", () => alert("in progress"));

donateBtn.addEventListener("click", () => {
  window.location.href = "../donaciones/donaciones-inicio.html";
});
