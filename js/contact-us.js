// Contact form validation



/* Full Name Validation */
/* fullName.addEventListener('blur', () => {

}) */

/* Contact us form submission */

let fullName = document.getElementById('contact-user-name');
let email = document.getElementById('contact-user-email');
let message = document.getElementById('contact-message');
let myForm = document.getElementById('form-submission');


const regexName = /^[a-zA-Z]{3,}$/;

const isEmpty = value => value === '' ? true : false;

function checkName(input) {
    input = input.value.trim();
    if (isEmpty(input)) {
        showError("name_error", "First name cannot be blank.");
        fullName.classList.add('is-invalid');
        return false;

    }
    if (!regexName.test(input)) {
        showError("name_error", "First name should contain letters with more than 3 characters.");
        fullName.classList.add('is-invalid');
        return false;
    }

    showError("name_error", "");
    fullName.classList.remove('is-invalid');
    return true;
}




//Validation for email


const EmailValid = (e) => {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(e);
};

function checkEmail(input) {
    input = input.value.trim();
    if (isEmpty(input)) {
        showError("email_error", "Email cannot be blank");
        email.classList.add('is-invalid');
        return false;
    }
    if (!EmailValid(input)) {
        showError("email_error", "Invalid email format");
        email.classList.add('is-invalid');
        return false;
    }
    showError("email_error", "");
    email.classList.remove('is-invalid');
    return true;


}

function checkMessage(input) {
    console.log(input);
    input = input.value.trim();
    if (isEmpty(input)) {
        showError("message_error", "Message cannot be blank");
        message.classList.add('is-invalid');
        return false;
    }
    showError("message_error", "");
    message.classList.remove('is-invalid');
    return true;


}

function submitForm() {
    if (checkName() && checkEmail() && checkMessage()) {
        return true;
    } else {
        return false;
    }
}