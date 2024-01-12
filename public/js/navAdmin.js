const hamButton = document.getElementById("hamButtonAdmin");
const responsiveMenu = document.getElementById("responsiveNavAdmin");
let showAdminMenu = false;

hamButton.addEventListener("click", () => {
    if (showAdminMenu === false){
        responsiveMenu.style.display = "flex";
        hamButton.style.transform = "rotate(90deg)";
        showAdminMenu = true;
    }else{
        responsiveMenu.style.display = "none";
        hamButton.style.transform = "rotate(0deg)";
        showAdminMenu = false;
    }
})
