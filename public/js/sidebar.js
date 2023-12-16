const toggleButton = document.getElementById('toggleButton');
const sidebar = document.getElementById('sidebar');

toggleButton.addEventListener('click', function() {
    sidebar.classList.toggle('open');
    toggleButton.classList.toggle('open');
});