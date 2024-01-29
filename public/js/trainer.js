const trainerTriggerNav = document.getElementById('trainerNavButton');
const dropTrainerAdminDiv = document.getElementById('trainerAdminDrop');

trainerTriggerNav.addEventListener('click', ()=>{
    if(showTrainer === false){
        dropTrainerAdminDiv.style.display = 'flex';
        showTrainer = true;
    }else{
        dropTrainerAdminDiv.style.display = 'none';
        showTrainer = false;
    }
})
