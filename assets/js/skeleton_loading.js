//loading skeleton
const skeleton = document.querySelector(".skeleton");
const content = document.querySelector(".content");
window.addEventListener("load", () => {
   skeleton.classList.remove("skeleton");
   content.classList.add("show");
 
});