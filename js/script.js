// navbar hide
let navbar = document.querySelectorAll(".nav-link");

let navbarCollapse = document.querySelector(".navbar-collapse.collapse");

navbar.forEach(navElement => {
    navElement.addEventListener('click', () => {
        navbarCollapse.classList.remove("show");
    })
});





/* Counter */

function counter(countId, target) {
    let count = 1;
    setInterval(() => {
        if (count < target) {
            count++;
            document.getElementById(countId).innerHTML = count;
        }


    }, 1)

}
document.addEventListener('DOMContentLoaded', () => {

    counter("count1", 40);
    counter("count2", 300);
    counter("count3", 80);
})

/* Sign up validation */




let id = (id) => document.getElementById(id);
let signup_form = id('signup-form'),
    user_name = id('username'),
    user_pass = id('password'),
    user_email = id('useremail');
let user_name_value = user_name.value.trim(),
    user_pass_value = user_pass.value.trim();


function showError(ID, value) {
    document.getElementById(ID).innerHTML = value;
}


const isEmailValid = (email) => {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
};
const isRequired = value => value == '' ? true : false;

let regex = /^[a-zA-Z]([0-9a-zA-Z]){4,11}$/;
let valid_regex = regex.test(user_name_value);
// Validation of user name
function checkUserName() {
    if (isRequired(user_name_value)) {
        showError("user_name_error", "Username is required");
        user_name.classList.add('is-invalid');
        return false;
    } else if (!valid_regex) {
        showError("user_name_error", "Spaces is not allowed and Length should be more than 5 and less than 11");
        user_name.classList.add('is-invalid');
        return false;
    } else {
        showError("user_name_error", "");
        user_name.classList.remove('is-invalid');
        return true;
    }

};

// Validation of email
function checkUserEmail() {
    if (!isRequired(user_email.value)) {
        showError("user_email_error", "Email is required");
        user_email.classList.add('is-invalid');
        return false;

    } else if (!isEmailValid(user_email.value.trim())) {
        showError("user_email_error", "Email is in invalid format");
        user_email.classList.add('is-invalid');
        return false;
    } else {
        showError("user_email_error", "");
        user_email.classList.remove('is-invalid');
        return true;
    }
};
// Validation of password
function checkUserPassword() {

    if (!isRequired(user_pass_value)) {
        showError("user_pass_error", "Password is required");
        user_pass.classList.add('is-invalid');
        return false;
    } else if (user_pass_value.length() < 6) {
        showError("user_pass_error", "Length of password is must be atleast 6 character");
        user_pass.classList.add('is-invalid');
        return false;
    } else {
        showError("user_pass_error", "");
        user_pass.classList.remove('is-invalid');
        return true;
    }
};

function checkValidation() {
    if (checkUserPassword() && checkUserEmail() && checkUserName()) {
        return true;
    } else {
        return false;
    }

}