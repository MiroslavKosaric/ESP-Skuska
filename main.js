console.log("Hello, World!");

function changeIndicatorColor() {
    var indicator = document.getElementById("fanIndicator");

    if (indicator.style.color == "red") {
        indicator.style.color = "green";
    }
    else {
        indicator.style.color = "red";
    }
}

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
}