console.log("hello world JS home page");

const heroCta = document.querySelector(".hero__cta");
const howAdoptPage = document.getElementsByClassName("info-panel__how-adopt");
const logoNavbar = document.getElementsByClassName("nav-bar__logo");
const donateBtn = document.querySelector(".nav-bar__donate-btn");
const frecuentQuestions = document.querySelector("#faq-box");
const giveInAdoption = document.querySelector("#in-adoption-box");

heroCta.addEventListener("click", function () {
  window.location.href = "buscador/buscador-mascotas.html";
});

howAdoptPage[0].addEventListener("click", () => {
  window.location.href = "informacion-adoptar/como-adoptar.html";
});

logoNavbar[0].addEventListener("click", () => console.log("hello home button"));

donateBtn.addEventListener("click", () => {
  window.location.href = "donaciones/donaciones-inicio.html";
});

frecuentQuestions.addEventListener("click", () =>
  alert(
    "Nuestras disculpas, estamos trabajando en este botón, muy pronto estará disponible"
  )
);

giveInAdoption.addEventListener("click", () =>
  alert(
    "Nuestras disculpas, estamos trabajando en este botón, muy pronto estará disponible"
  )
);
