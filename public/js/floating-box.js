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
