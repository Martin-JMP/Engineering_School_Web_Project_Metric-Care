document.getElementById("inscription-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission to validate the data first

    // Get form inputs
    var prenom = document.getElementById("prenom").value;
    var nom = document.getElementById("nom").value;
    var email = document.getElementsByName("email")[0].value;
    var identification = document.getElementsByName("identification")[0].value;
    var password = document.getElementsByName("password")[0].value;
    var password1 = document.getElementsByName("password1")[0].value;
    var cgu = document.getElementById("cgu").checked;

    // Perform validation
    var isValid = true;

    // Validate prenom (first name)
    if (prenom === "") {
        isValid = false;
        // Display an error message or highlight the field
        alert("Please enter your first name.");
    }

    // Validate nom (last name)
    if (nom === "") {
        isValid = false;
        // Display an error message or highlight the field
        alert("Please enter your last name.");
    }

    // Validate email
    if (email === "") {
        isValid = false;
        // Display an error message or highlight the field
        alert("Please enter your email.");
    }

    // Validate identification
    if (identification === "" || identification.length !== 6 || isNaN(identification)) {
        isValid = false;
        // Display an error message or highlight the field
        alert("Please enter a valid six-digit identification number.");
    }

    // Validate password
    if (password === "") {
        isValid = false;
        // Display an error message or highlight the field
        alert("Please enter a password.");
    }

    // Validate password confirmation
    if (password1 === "") {
        isValid = false;
        // Display an error message or highlight the field
        alert("Please confirm your password.");
    }

    // Validate terms acceptance
    if (!cgu) {
        isValid = false;
        // Display an error message or highlight the checkbox
        alert("Please accept the terms and conditions.");
    }

    if (isValid) {
        // Proceed with form submission
        event.target.submit();
    }
});
