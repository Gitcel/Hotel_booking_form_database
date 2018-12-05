var options = document.getElementsByTagName("option");
var hotelSelected = "";
var hotelSelectedPrice = "";
var hotelSelectedValue = "";
var dailyRate = null;

function validateName() {

    // Check if this function initiates.
    console.log("ValidateName function.");

    // Get the selectors for the name, surname and days form fields.
    var inputName = document.querySelector("#first-name-input");
    var inputSurname = document.querySelector("#surname-input");
    var inputDays = document.querySelector("#days-id");
    
    // Check if the name form field is empty and the surname form field isn't empty.
    if (inputName.value == "" && inputSurname.value != "") {
        console.log("Name is empty. Surname is not empty.");
        alert("Add your name. Do you have one?");
    }
    
    // Check if the surname form field is empty and the name form field isn't empty.
    else if (inputSurname.value == "" && inputName.value != "") {
        console.log("Surname is empty. Name is not empty.");
        alert("Add your surname. Do you have one?");
    }
    
    // Check if the name and surname form fields aren't empty, and that the 'Number of days' form
    // field isn't zero.
    else if (inputName.value != "" && inputSurname.value != "" && inputDays.value < 1) {
        console.log("Days is zero.");
        alert("You must add one day atleast.")
    }
    
    // Check if the name form field and the surname form field is empty.
    else if ((inputName.value || inputSurname.value) == "" || inputDays.value < 1) {
        console.log("All fields are empty.");
        alert("You didn't fill in all of the fields.");
    }
    
    // If all of the form fields are filled, then this alert message will be displayed.
    else {
        console.log("All fields are filled.");
        alert("Thank you. Enjoy your stay.");
    }

}

function getHotel() {

    // Check if this function initiates.
    console.log("GetHotel function.");

    // Loop through the dropdown options, to get the hotel names and prices.
    for (var i = 0; i < options.length; i++) {
        // Check if the hotel is the selected one.
        if (options[i].selected) {

            hotelSelected = options[i].textContent;
            hotelSelectedValue = options[i].value;
            hotelSelectedPrice = hotelSelectedValue;
            dailyRate = hotelSelectedPrice;

        }

    }

}

function getDays() {

    // Check if this function initiates.
    console.log("GetDays function");

    // Get the selector for the number of days.
    var inputDays = document.querySelector("#days-id");
    
    // Check if the form field is not empty.
    if (inputDays.value > 0) {
        totalPrice(hotelSelectedPrice, inputDays.value);
    }

}

function totalPrice (price, days) {

    // Check if this function initiates.
    console.log("TotalPrice function.");

    // Get the selector for the number of days.
    var inputDays = document.querySelector("#days-id");
    
    // Assign variables to the outputs.
    var total = "R" + (price * days);
    var rate = "R" + dailyRate;
    var days = inputDays.value;

    localStorage.setItem("total", total);
    localStorage.setItem("rate", rate);
    localStorage.setItem("days", days);

}

window.onload = function outBooking() {

    // Check if this function initiates.
    console.log("OutBooking function.");

    // Get selectors for the outputs.
    var outputTotal = document.querySelector("#output-total");
    var outputDailyRate = document.querySelector("#output-daily-rate");
    var outputDaysNum = document.querySelector("#output-num-of-days");

    // Store the items from local storage.
    var total = localStorage.getItem("total");
    var rate = localStorage.getItem("rate");
    var days = localStorage.getItem("days");

    // Check the values of the items.
    console.log("Total: " + total);
    console.log("Rate: " + rate);
    console.log("Days: " + days);

    // Check if the three variables are empty or not.
    if ((total && rate && days) != null) {

        outputTotal.textContent = total;
        outputDailyRate.textContent = rate;
        outputDaysNum.textContent = days;

    }

}