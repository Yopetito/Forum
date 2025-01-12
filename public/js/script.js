const settingsIcon = document.getElementById('settings-icon');
const colorChoice = document.getElementById('color-choice');
const colors = document.querySelectorAll('.color');

// Fonction pour choisir la couleur
function applyTheme(theme) {
    switch (theme) {
        case 'theme1':
            document.documentElement.style.setProperty('--principal-color-dark', '#003949');
            document.documentElement.style.setProperty('--principal-color-middle', '#057797');
            document.documentElement.style.setProperty('--principal-color-light', '#7bd5ee');
            document.documentElement.style.setProperty('--letter-color', '#d7dadb');
            document.documentElement.style.setProperty('--info-letter-color', '#01161d');
            document.documentElement.style.setProperty('--button-color', '#555252');
            document.documentElement.style.setProperty('--hover-color', '#807e7e');
            document.documentElement.style.setProperty('--middle-weight', '600');
            document.documentElement.style.setProperty('--bg-color', '#d0dadd');
            document.documentElement.style.setProperty('--border-color', 'rgb(3, 43, 95)');
            document.documentElement.style.setProperty('--principal-font', 'krub');
            document.documentElement.style.setProperty('--secondary-font', 'playwrite AU SA');
            document.documentElement.style.setProperty('--box-color', '#9fc8e0');
            break;
            case 'theme2': // Vert forêt doux
            document.documentElement.style.setProperty('--principal-color-dark', '#3d6c3d');
            document.documentElement.style.setProperty('--principal-color-middle', '#589458');
            document.documentElement.style.setProperty('--principal-color-light', '#a8d3a8');
            document.documentElement.style.setProperty('--border-color', '#589458');
            document.documentElement.style.setProperty('--box-color', '#8CED8C');
            break;
        case 'theme3': // Rose pastel
            document.documentElement.style.setProperty('--principal-color-dark', '#a46278');
            document.documentElement.style.setProperty('--principal-color-middle', '#CE86A4');
            document.documentElement.style.setProperty('--principal-color-light', '#f6c2d1');
            document.documentElement.style.setProperty('--border-color', '#CE86A4');
            document.documentElement.style.setProperty('--box-color', '#F4B2C3');
            break;
        case 'theme4': // Vert amande doux
            document.documentElement.style.setProperty('--principal-color-dark', '#a3a37c');
            document.documentElement.style.setProperty('--principal-color-middle', '#C9C9A0');
            document.documentElement.style.setProperty('--principal-color-light', '#ececc8');
            document.documentElement.style.setProperty('--border-color', '#C9C9A0');
            document.documentElement.style.setProperty('--box-color', '#E1E1C1');
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
//colors seleccionant toutes les class .color, devenant ainsi un NodeList(tableau) et ainsi chaque index = une div differente.
//Donc, theme = la couleur choisie (theme1 2 3). 
colors.forEach((color, index) => {
    color.addEventListener('click', function () {
        let theme = '';
        switch (index) {
            case 0:
                theme = 'theme1';
                break;
            case 1:
                theme = 'theme2'
                break;
            case 2:
                theme = 'theme3'
                break;
            case 3:
                theme = 'theme4'
                break;
                
            }
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