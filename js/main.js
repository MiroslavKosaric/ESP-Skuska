console.log("Hello, World!");

// nastavit indicatorom farbu podla suboru


function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

function setIndicatorColors() {
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

function changeIndicatorColor(className, color) {
    let indicator = document.getElementsByClassName(className);

    indicator[0].style.color = color;
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
