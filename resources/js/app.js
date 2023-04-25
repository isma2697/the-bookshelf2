import './bootstrap';
import 'alpinejs';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();


 console.log('Hello World!');

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

document.addEventListener('click', function(event) {
  const target = event.target;
  const isClickInsideIconoUsuario = iconoUsuario.contains(target);
  const isClickInsideFloatingBox = floatingBox.contains(target);

  if (!isClickInsideIconoUsuario && !isClickInsideFloatingBox && floatingBox.classList.contains('visible')) {
    floatingBox.classList.remove('visible');
  }
});



// ----------------------------------------------------------------------------------------------------------------

const arrowDown1 = document.getElementById("arrow-down1");
const arrowDown2 = document.getElementById("arrow-down2");
const menu1 = document.querySelector(".menu1");
const menu2 = document.querySelector(".menu2");

function closeBothMenus() {
  menu1.classList.remove("show");
  menu2.classList.remove("show");
}

function toggleMenu1() {
  closeBothMenus();
  menu1.classList.toggle("show");
}

function toggleMenu2() {
  closeBothMenus();
  menu2.classList.toggle("show");
}

arrowDown1.addEventListener("click", function(event) {
  event.stopPropagation();
  toggleMenu1();
});

arrowDown2.addEventListener("click", function(event) {
  event.stopPropagation();
  toggleMenu2();
});

document.addEventListener("click", function() {
  closeBothMenus();
});



// ----------------------------------------------------------------------------------------------------------------

// ----------------------------------------------------------------------------------------------------------------

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

