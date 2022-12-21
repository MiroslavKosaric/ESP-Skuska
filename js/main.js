console.log("Hello, World!");

// nastavit indicatorom farbu podla suboru


// function readFile(input) {;
//     let reader = new FileReader();
  
//     reader.readAsText(file);
  
//     console.log(reader.result);
// }

function setIndicatorColors() {
    // readFile("data.txt");
    let indicator = document.getElementById("blindsIndicator");
    let rangeValue = document.getElementById("slider").value;

    if (rangeValue == 0) {
        indicator.style.color = "red";
    }
    else if (rangeValue == 100) {
        indicator.style.color = "green";
    }
    else {
        indicator.style.color = "orange";
    }
}

function changeIndicatorColor(className) {
    let indicator = document.getElementsByClassName(className);

    if (indicator[0].style.color == "red") {
        indicator[0].style.color = "green";
    }
    else {
        indicator[0].style.color = "red";
    }
}

function changeRangeIndicatorColor() { 
    let indicator = document.getElementById("blindsIndicator");
    let rangeValue = document.getElementById("slider").value;

    if (rangeValue == 0) {
        indicator.style.color = "red";
    }
    else if (rangeValue == 100) {
        indicator.style.color = "green";
    }
    else {
        indicator.style.color = "orange";
    }
}
