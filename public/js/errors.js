const errorDiv = document.getElementById('errorDiv');
const success = document.getElementsByClassName('success-message');
const registered = document.getElementById('')
const errorMessage = document.getElementsByClassName('error-message');
function hideDiv(){
    errorDiv.style.display = 'none';
}
function hideSuccess(){
    success[0].style.display = 'none';
}

setTimeout(hideDiv, 5000)
setTimeout(hideSuccess, 5000)
setTimeout(errorMessage, 5000)
