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
    if (prenom.length < 3 ) {
        isValid = false;
        // Display an error message or highlight the field
        alert("Please enter your first name. It should be at least 3 characters long.");
    }

    // Validate nom (last name)
    if (nom.length < 3) {
        isValid = false;
        // Display an error message or highlight the field
        alert("Please enter your last name.It should be at least 3 characters long.");
    }

    // Validate email
    if (!email.includes("@")) {
        isValid = false;
        // Display an error message or highlight the field
        alert("Please enter your valid email. ");
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
    if (password != password1) {
        isValid = false;
        // Display an error message or highlight the field
        alert("Your passwords are not the same. Please, verify it.");
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
