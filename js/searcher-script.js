console.log("hello searcher page");

const searchertTitle = document.querySelector(".searcher-page__title");
const logoNavbar = document.getElementsByClassName("nav-bar__logo");
const donateBtn = document.querySelector(".nav-bar__donate-btn");

logoNavbar[0].addEventListener("click", () => {
  window.location.href = "../index.html";
});

donateBtn.addEventListener("click", () => {
  window.location.href = "../donaciones/donaciones-inicio.html";
});
