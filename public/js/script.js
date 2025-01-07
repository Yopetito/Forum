
const settingsIcon = document.getElementById('settings-icon');
const colorChoice = document.getElementById('color-choice');
const colors = document.querySelectorAll('.color');
 
// document.addEventListener("DOMContentLoaded", (event) => {
//     colorChoice.style.display = "none"
// });

settingsIcon.addEventListener('click', function() {
    colorChoice.style.display = colorChoice.style.display === 'none' ? 'block' : 'none';
});
 
colors.forEach(color => {
    color.addEventListener('click', function() {
        const selectedColor = this.getAttribute('data-color');
        document.documentElement.style.setProperty('--principal-color', selectedColor);
        document.documentElement.style.setProperty('--border-color', selectedColor);
        document.documentElement.style.setProperty('--box-color', selectedColor);
        colorChoice.style.display = 'none';
    });
});
 
window.addEventListener('click', function(event) {
    if (!settingsIcon.contains(event.target) && !colorChoice
.contains(event.target)) {
        colorChoice.style.display = 'none';
    }
});