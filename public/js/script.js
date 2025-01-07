
const settingsIcon = document.getElementById('settings-icon');
const colorChoice = document.getElementById('color-choice');
const colors = document.querySelectorAll('.color');
 
// document.addEventListener("DOMContentLoaded", (event) => {
//     colorChoice.style.display = "none"
// });

//verif de la couleur stocké.
const savedColor = localStorage.getItem('selectedColor');
if (savedColor) {
    document.documentElement.style.setProperty('--principal-color', savedColor);
    document.documentElement.style.setProperty('--border-color', savedColor);
    document.documentElement.style.setProperty('--box-color', savedColor);
}

//montrer ou pas la palette de couleurs
settingsIcon.addEventListener('click', function() {
    colorChoice.style.display = colorChoice.style.display === 'none' ? 'block' : 'none';
});
 
//changer la couleur des var en css selon la couleur choisie
colors.forEach(color => {
    color.addEventListener('click', function() {
        const selectedColor = this.getAttribute('data-color');
        document.documentElement.style.setProperty('--principal-color', selectedColor);
        document.documentElement.style.setProperty('--border-color', selectedColor);
        document.documentElement.style.setProperty('--box-color', selectedColor);
        localStorage.setItem('selectedColor', selectedColor);
        colorChoice.style.display = 'none';
    });
});
 
window.addEventListener('click', function(event) {
    if (!settingsIcon.contains(event.target) && !colorChoice
.contains(event.target)) {
        colorChoice.style.display = 'none';
    }
});