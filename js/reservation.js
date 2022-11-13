let IDs = (id) => document.getElementById(id);


let validFirstName = false,
    validSecondName = false,
    validAge = false,
    validPhone = false,
    validEmailAddress = false,
    validAddress = false,
    validCity = false,
    validState = false;


// Variable with their respective ids
let detail_first_name = IDs("detail-first-name"),
    detail_second_name = IDs("detail-second-name"),
    detail_age = IDs("detail-age"),
    detail_phone = IDs("detail-phone"),
    detail_email = IDs("detail-user-email"),
    detail_address = IDs("detail-address"),
    detail_city = IDs("detail-city"),
    detail_state = IDs("detail-state");

// Variable is shown after submission unsuccessful
let submitFailed = IDs("requiredField");




const isEmpty = value => value === '' ? true : false;

function showError(ID, value) {
    document.getElementById(ID).innerHTML = value;
}

// Validation of FirstName 
const regexName = /^[a-zA-Z]{4,}$/;

function validateFirstName(inputFirstName) {
    input = inputFirstName.value.trim();
    if (isEmpty(input)) {
        showError("first_name_error", "First name cannot be blank.");
        detail_first_name.classList.add('is-invalid');
        console.log("first name");

    } else if (!regexName.test(input)) {
        showError("first_name_error", "First name should contain letters with more than 4 characters.");
        detail_first_name.classList.add('is-invalid');
        console.log("second one");

    } else {
        showError("first_name_error", "");
        detail_first_name.classList.remove('is-invalid');
        validFirstName = true;
        console.log("first valid");

    }

}
// Validation for last name
function validateSecondName(input) {
    input = input.value.trim();
    if (isEmpty(input)) {
        showError("second_name_error", "Last name cannot be blank.");
        detail_second_name.classList.add('is-invalid');
    } else if (!regexName.test(input)) {
        showError("second_name_error", "First name should contain letters with more than 4 characters.");
        detail_first_name.classList.add('is-invalid');
    } else {
        showError("second_name_error", "");
        detail_second_name.classList.remove('is-invalid');
        validSecondName = true;
    }
}

//Validation for age
function validateAge(input) {
    input = input.value.trim();
    if (isEmpty(input)) {
        showError("age_error", "Age cannot ve blank");
        detail_age.classList.add('is-invalid');
    } else if (input.length < 4) {
        showError("age_error", "Age cannot have more than 3 digits.");
        detail_age.classList.add('is-invalid');
    } else if (isNaN(input)) {
        showError("age_error", "Age can only be in numbers.");
        detail_age.classList.add('is-invalid');
    } else {
        showError("age_error", "");
        detail_age.classList.remove('is-invalid');
        validAge = true;
    }
}

//Validation for email


const EmailValid = (email) => {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
};

function validateEmail(input) {
    input = input.value.trim();
    if (isEmpty(input)) {
        showError("user_email_error", "Email cannot be blank");
        detail_email.classList.add('is-invalid');
    } else if (!EmailValid(input)) {
        showError("user_email_error", "Invalid email format");
        detail_email.classList.add('is-invalid');
    } else {
        showError("user_email_error", "");
        detail_email.classList.remove('is-invalid');
        validEmailAddress = true;
    }
}

//Validation for phone 
function validatePhone(input) {
    input = input.value.trim();
    let phoneNo = /^([0-9]){10}$/;
    let notValidphoneNo = phoneNo.test(input);
    if (isEmpty(input)) {
        showError("phone_error", "Phone number cannot be blank");
        detail_phone.classList.add('is-invalid');
    } else if (!notValidphoneNo) {
        showError("phone_error", "Phone number doesnot match pattern");
        detail_phone.classList.add('is-invalid');
    } else {
        showError("phone_error", "");
        detail_phone.classList.remove('is-invalid');
        validPhone = true;
    }
}

//Validation for address

function validateAddress(input) {
    input = input.value.trim();
    if (isEmpty(input)) {
        showError("address_error", "Address cannot be blank");
        detail_address.classList.add('is-invalid');
    } else {
        showError("address_error", "");
        detail_address.classList.remove('is-invalid');
        validAddress = true;
    }
}

//Validation for city

function validateCity(input) {
    input = input.value.trim();
    if (isEmpty(input)) {
        showError("city_error", "City cannot be blank");
        detail_city.classList.add('is-invalid');
    } else {
        showError("city_error", "");
        detail_city.classList.remove('is-invalid');
        validCity = true;
    }
}

//Validation for state

function validateState(input) {
    input = input.value;
    if (isEmpty(input)) {
        showError("state_error", "State should be choosen");
        detail_city.classList.add('is-invalid');
    } else {
        showError("state_error", "");
        detail_city.classList.remove('is-invalid');
        validState = true;
    }
}

function completeReservation() {
    if (validFirstName && validSecondName && validAddress && validAge && validEmailAddress && validPhone && validState && validCity) {
        return true;
    } else {
        submitFailed.innerHTML = "*Please complete the form below";
        return false;
    }
}