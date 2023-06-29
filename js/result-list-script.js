console.log("hello results list");

const logoNavbar = document.getElementsByClassName("nav-bar__logo");
const searchAgainBtn = document.querySelector(".results__cta--secondary");
const seeMoreBtn = document.getElementsByClassName("seeMorePet");
const donateBtn = document.querySelector(".nav-bar__donate-btn");

logoNavbar[0].addEventListener("click", () => {
  window.location.href = "../index.html";
});

searchAgainBtn.addEventListener("click", () => {
  window.location.href = "../buscador/buscador-mascotas.html";
});

donateBtn.addEventListener("click", () => {
  window.location.href = "../donaciones/donaciones-pasy.html";
});
