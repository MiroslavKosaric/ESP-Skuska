console.log("Hello, World!");

// nastavit indicatorom farbu podla suboru


function setIndicatorColors() {
    var indicator = document.getElementById("blindsIndicator");
    var rangeValue = document.getElementById("slider").value;

    if (rangeValue == 0) {
        indicator.style.color = "red";
    }
    else if (rangeValue == 100) {
        indicator.style.color = "green";
    }
    else {
        indicator.style.color = "orange";
    }
};


function changeIndicatorColor(className) {
    var indicator = document.getElementsByClassName(className);

    if (indicator[0].style.color == "red") {
        indicator[0].style.color = "green";
    }
    else {
        indicator[0].style.color = "red";
    }
};

function changeRangeIndicatorColor() { 
    var indicator = document.getElementById("blindsIndicator");
    var rangeValue = document.getElementById("slider").value;

    if (rangeValue == 0) {
        indicator.style.color = "red";
    }
    else if (rangeValue == 100) {
        indicator.style.color = "green";
    }
    else {
        indicator.style.color = "orange";
    }
};
