const employerTriggerNav = document.getElementById('employersNavButton');
const billingTriggerButton = document.getElementById('billingNavButton');
const dropEmployerDiv = document.getElementById('employersDrop');
const dropBillingDiv = document.getElementById('billingDrop');
const adminTriggerNav = document.getElementById('adminNavButton');
const dropAdminDiv = document.getElementById('adminDrop');

let showEmployer = false;
let showBilling = false;
let showAdmin = false;
let showTrainer = false;

employerTriggerNav.addEventListener('click', ()=>{
    if(showEmployer === false){
        dropEmployerDiv.style.display = 'flex';
        showEmployer = true;
    }else{
        dropEmployerDiv.style.display = 'none';
        showEmployer = false;
    }
})

billingTriggerButton.addEventListener('click', ()=>{
    if(showBilling === false){
        dropBillingDiv.style.display = 'flex';
        showBilling = true;
    }else{
        dropBillingDiv.style.display = 'none';
        showBilling = false;
    }
})

adminTriggerNav.addEventListener('click', ()=>{
    if(showAdmin === false){
        dropAdminDiv.style.display = 'flex';
        showAdmin = true;
    }else{
        dropAdminDiv.style.display = 'none';
        showAdmin = false;
    }
})



