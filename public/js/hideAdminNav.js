let showHideButton = document.getElementById('showHideNav');
let showNavState = true;
let navBar = document.getElementById('side');

// Add click event listener to the slider span element
showHideButton.querySelector('.slider').addEventListener('click', function() {
    showNavState = !showNavState;
    if (showNavState === true) {
        navBar.style.display = 'block';
        showNavState = true;
    } else {
        navBar.style.display = 'none';
        showNavState = false;
    }
});
