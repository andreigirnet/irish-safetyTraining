
let buttonCount = document.getElementById('countPackages');

buttonCount.addEventListener('click', function (){
    let from = document.getElementById('fromBulk').value;
    let to = document.getElementById('toBulk').value;
    console.log(from);
    console.log(to);
    if (to && from){
        let result = to - from;
        if (result > 0){
            document.getElementById('countResult').innerHTML = 'Selected: ' + result + ''
        }else{
            document.getElementById('countResult').innerHTML = "The range is wrong";
        }
    }

})
