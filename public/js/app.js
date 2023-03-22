
//botones de navegación de carousel de de libros

// Obtener elementos
const carousel = document.querySelector('.carousel');
const prevButton = document.querySelector('.carousel-control.prev');
const nextButton = document.querySelector('.carousel-control.next');

const scrollAmount = carousel.offsetWidth / 2;

// Función de botón de avance
nextButton.addEventListener('click', () => {
  carousel.scrollBy({
    left: scrollAmount,
    behavior: 'smooth'
  });
});

// Función de botón de retroceso
prevButton.addEventListener('click', () => {
  carousel.scrollBy({
    left: -scrollAmount,
    behavior: 'smooth'
  });
});

// ----------------------------------------------------------------------------------------------------------------

//caja desplegable del usuario en el navbar
const iconoUsuario = document.getElementById('icon-user');
const floatingBox = document.querySelector('.floating-box');

iconoUsuario.addEventListener('click', function() {
  if (floatingBox.classList.contains('visible')) {
    floatingBox.classList.remove('visible');
  } else {
    floatingBox.classList.add('visible');
  }
});


// ----------------------------------------------------------------------------------------------------------------


const arrowDown1 = document.getElementById("arrow-down1");
const arrowDown2 = document.getElementById("arrow-down2");
const menu1 = document.querySelector(".menu1");
const menu2 = document.querySelector(".menu2");

function toggleMenu1() {
  menu1.classList.toggle("show");
}

function toggleMenu2() {
  menu2.classList.toggle("show");
}

arrowDown1.addEventListener("click", toggleMenu1);
arrowDown2.addEventListener("click", toggleMenu2);











