const settingsIcon = document.getElementById('settings-icon');
const colorChoice = document.getElementById('color-choice');
const colors = document.querySelectorAll('.color');

// Fonction pour choisir la couleur
function applyTheme(theme) {
    switch (theme) {
        case 'theme1':
            document.documentElement.style.setProperty('--principal-color', '#007a9c');
            document.documentElement.style.setProperty('--border-color', '#007a9c');
            document.documentElement.style.setProperty('--box-color', '#04ABD9');
            break;
        case 'theme2':
            document.documentElement.style.setProperty('--principal-color', '#589458');
            document.documentElement.style.setProperty('--border-color', '#589458');
            document.documentElement.style.setProperty('--box-color', '#8CED8C');
            break;
        case 'theme3':
            document.documentElement.style.setProperty('--principal-color', '#CE86A4');
            document.documentElement.style.setProperty('--border-color', '#CE86A4');
            document.documentElement.style.setProperty('--box-color', '#CE86A4');
            break;
        case 'theme4':
            document.documentElement.style.setProperty('--principal-color', '#C9C9A0');
            document.documentElement.style.setProperty('--border-color', '#C9C9A0');
            document.documentElement.style.setProperty('--box-color', '#C9C9A0');
            break;
    }
}

// Vérification de la couleur existante
const savedTheme = localStorage.getItem('selectedTheme');
if (savedTheme) {
    applyTheme(savedTheme);
}

// montrer ou pas la palette de couleurs
settingsIcon.addEventListener('click', function () {
    colorChoice.style.display = colorChoice.style.display === 'none' ? 'block' : 'none';
});

// Appliquer un thème lorsqu'une couleur est sélectionnée
//color seleccionant toutes les class .color, devenant ainsi un NodeList(tableau) et ainsi chaque index = une div differente.
//Donc, theme = la couleur choisie (theme1 2 3). 
colors.forEach((color, index) => {
    color.addEventListener('click', function () {
        let theme = '';
        if (index === 0) theme = 'theme1';
        else if (index === 1) theme = 'theme2';
        else if (index === 2) theme = 'theme3';
        else if (index === 3) theme = 'theme4';

        //on envoi en paramettre "theme" dans la fonction applyTheme qui elle defini la palette de couleurs selon la valeur de "theme"
        applyTheme(theme);
        localStorage.setItem('selectedTheme', theme);
        colorChoice.style.display = 'none';
    });
});


window.addEventListener('click', function (event) {
    if (!settingsIcon.contains(event.target) && !colorChoice.contains(event.target)) {
        colorChoice.style.display = 'none';
    }
});