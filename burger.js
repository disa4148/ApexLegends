let burgerbutton = document.querySelector(".gamburger-menu"), /*Записывает класс в переменную*/
  burgernav = document.querySelector(".nav-bar");
burgerbutton.addEventListener("click", () => {
  burgerbutton.classList.toggle("active");
  burgernav.classList.toggle("active");
})