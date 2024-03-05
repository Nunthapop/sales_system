// let delivery = document.getElementById("delivery");
// delivery.parentElement.addEventListener("click", () => {
//   delivery.classList.add("fa-solid fa-truck fa-shake fa-xl");
// });
// let delivery = document.getElementById("delivery");

// delivery.addEventListener("click", () => {
//   delivery.classList.add("fa-solid", "fa-truck", "fa-shake", "fa-xl");
// });

// delivery.addEventListener("mouseleave", () => {
//   delivery.classList.remove("fa-solid", "fa-truck", "fa-shake", "fa-xl");
// });
let delivery = document.getElementById("delivery");

delivery.addEventListener("click", () => {
    delivery.classList.remove("fa-truck", "fa-lg", "fa-xl");
    delivery.classList.add("fa-circle-check");})

 