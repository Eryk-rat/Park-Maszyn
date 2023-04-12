const showFormBtn = document.getElementById('show-form-btn');
const hideFormBtn = document.getElementById('hide-form-btn');
const formOverlay = document.querySelector('.form-overlay');

showFormBtn.addEventListener('click', () => {
  formOverlay.style.display = 'block';
});

hideFormBtn.addEventListener('click', () => {
  formOverlay.style.display = 'none';
});