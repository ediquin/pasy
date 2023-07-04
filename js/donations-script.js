console.log("hello donations js");

const homeBtn = document.querySelector(".donate-go-home");
const donatePasyBtn = document.querySelector(".donatePasy");
const shelterCards = document.querySelectorAll(".pets-showcase__card");

homeBtn.addEventListener("click", () => {
  window.location.href = "../index.html";
});

donatePasyBtn.addEventListener("click", () => {
  window.location.href = "./donaciones-pasy.html";
});

for (let card of shelterCards) {
  card.addEventListener("click", () => {
    window.location.href = "./donaciones-pasy.html";
  });
}
