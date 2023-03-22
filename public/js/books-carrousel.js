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
