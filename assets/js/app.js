const visibility = document.getElementById('visibility');
const passwordBox = document.getElementById('passwordBox');

visibility.addEventListener('change', () => {
  passwordBox.classList.toggle('d-none', visibility.value !== 'private');
});
