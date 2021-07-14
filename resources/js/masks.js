var dateInput = document.querySelector('input[name="release_date"');
dateInput.addEventListener('keypress', function(event) {
    event.preventDefault();
    let position = this.value.split("").length;
    if (position < 10) {
        if (position != 2 && position != 5) {
            if ((event.keyCode >= 48 && event.keyCode <= 57)) {
                this.value += event.key;
                if (position == 1 || position == 4) {
                    if (position == 1) {
                        let month = parseInt(this.value);
                        if (month == 0) {
                            this.value = "00";
                        }
                        if (month > 12) {
                            this.value = '12';
                        }
                    }
                    if (position == 4) {
                        let date = this.value.split("");
                        let month = parseInt(date[0] + "" + date[1]);
                        let day = parseInt(date[3] + "" + date[4]);
                        let lastDay = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
                        if (day > lastDay[month - 1]) {
                            this.value = "" + date[0] + date[1] + date[2] + lastDay[month - 1];
                        }
                    }
                    this.value += '-';
                } else if (position == 9) {
                    let date = this.value.split("");
                    let month = parseInt(date[0] + "" + date[1]);
                    let day = parseInt(date[3] + "" + date[4]);
                    let year = parseInt(date[6] + "" + date[7] + "" + date[8] + "" + date[9]);
                    if (month == 2) {
                        if (day == 29) {
                            if (!(year % 4 == 0)) {
                                this.value = "02-28-" + year;
                            } else {
                                if (year % 100 == 0 && !(year % 400 == 0)) {
                                    this.value = "02-28-" + year;
                                }
                            }
                        }
                    }
                }
            }
        }else{
            if(event.key == "-"){
                this.value += "-";
            }
        }
    }
});
dateInput.addEventListener('blur', function(){
    let inputValue = this.value.split("");
    inputValue.forEach(function(el, index){
        if( index == 2 || index == 5 ){
            if(el != "-"){
                dateInput.value = "";
                return;
            }
        }else{
            if(isNaN(el)){
                console.log(el, index);
                dateInput.value = "";
                return;
            }
        }
    });
}, true);
var priceInput = document.querySelector('input[name="price"]');
priceInput.addEventListener('keypress', function(event){
    event.preventDefault();
    let position = this.value.split("").length; 
    let chars = this.value.split("");
    let hasPoint = false;
    let indexPoint = 0;
    for (let index = 0; index < position; index++) {
        if(chars[index] == "."){
            hasPoint = true;
            indexPoint = index;
        }
    }
    if(event.key == "." && position > 0){
        if(!hasPoint){
            this.value += event.key;
            return;
        }
    }
    if ((event.keyCode >= 48 && event.keyCode <= 57)) {
        if(hasPoint){
            if(position < (indexPoint + 3)){
                this.value += event.key;
                return;
            }
        }else{
            this.value += event.key;
            return;
        }
    }
});
var imageInput = document.querySelector('input[name="image"]');
imageInput.addEventListener('change', function(event){
    var imageOutput = document.querySelector('#preview');
    var nameOutput = document.querySelector('.file-name');
    imageOutput.src = URL.createObjectURL(event.target.files[0]);
    imageOutput.onload = function() {
        URL.revokeObjectURL(imageOutput.src);
    }
    nameOutput.innerHTML = event.target.files[0].name;
});