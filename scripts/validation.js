// JavaScript source code By Joseph Marsh

var $ = function (id) {
    return document.getElementById(id);
};



var validation = function () {
    var email = $("email").value;
    var firstName = $("firstname").value;
    var lastName = $("lastname").value;
    var error = $("contact_form_error");
    if (email == "") {
        error.textContent = " Must enter an email address.";
    } else if (lastName == "") {
        error.textContent = " Must enter a last name.";
    } else if (firstName == "") {
        error.textContent = " Must enter a first name.";
    } else {
        error.textContent = "";
        //Check to see if user wants to send
        //disabled due to potential php conflict.
        //exit(); 
    }
};

var exit = function () {
    if (confirm('Are you sure this information is correct?')) {
        //check if they want the news letter
        if (jQuery('#newsLetter').is(':checked')) {
            //if checkbox is checked send this
            window.location.href = "thankYou/thankYouNewsLetter.html";
        } else {
            //if checkbox is not...
            window.location.href = "thankYou/thankYou.html";
        }
    } else {
        void ('derp');
    }
}

window.onload = function () {
    //assign the validation function to the submit button
    $("mailMe").onclick = validation;
  
};
