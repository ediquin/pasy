console.log("hello visit date page");

const confirmVisitBtn = document.querySelector("#confirmVisit");
const googleMapsBtn = document.querySelector("#googleMapsBtn");
const whatsAppBtn = document.querySelector("#whatsAppBtn");
const visitThanksHomeBtn = document.querySelector("#visitThanksHome");

// confirmVisitBtn.addEventListener("click", () => {
//   window.location.href = "../pet-searcher/visit-advices.html";
// });

googleMapsBtn.addEventListener("click", () =>
  alert(
    "Tendrás un link con la dirección del albergue en Google Maps, así puedes llegar siguiendo indicaciones."
  )
);

whatsAppBtn.addEventListener("click", () =>
  alert(
    "Tendrás un grupo de WhatsApp para coordinar los detalles de tu visita, cosas como la hora o transporte"
  )
);

visitThanksHomeBtn.addEventListener("click", () => {
  window.location.href = "../index.html";
});
