function validateForm() {
    let name = document.getElementById("name").value;
    let nameError = document.getElementById("nameError");
    let namePattern = /^[A-Z][a-z]+(?: [A-Z][a-z]+)*$/;

    if (!namePattern.test(name)) {
        nameError.textContent = "First letter must be uppercase. Minimum 3 characters required.";
    } else {
        nameError.textContent = ""; // Clear error message when validation passes
    }

    let mobile = document.getElementById("mobile").value;
    let mobileError = document.getElementById("mobileError");
    let mobilePattern = /^[0-9]{10}$/;

    if (!mobilePattern.test(mobile)) {s
        mobileError.textContent = "Please enter a valid 10-digit mobile number.";
    } else {
        mobileError.textContent = ""; // Clear error message when validation passes
    }

    let aadhar = document.getElementById("aadhar").value;
    let aadharError = document.getElementById("aadharError");
    let aadharPattern = /^[0-9]{12}$/;

    if (!aadharPattern.test(aadhar)) {
        aadharError.textContent = "Please enter a valid 12-digit aadhar number.";
    } else {
        aadharError.textContent = ""; // Clear error message when validation passes
    }

    // Only show the success message if there are no errors
    if (!nameError.textContent && !mobileError.textContent && !aadharError.textContent) {
        alert("Form submitted successfully!");
    }
}
