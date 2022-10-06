// Contact form validation



/* Full Name Validation */
/* fullName.addEventListener('blur', () => {

}) */

/* Contact us form submission */
function submitForm() {
    let fullName = document.getElementById('contact-user-name');
    let email = document.getElementById('contact-user-email');
    let myForm = document.getElementById('form-submission');

    myForm.addEventListener('submit', function() {

        function createItem(element) {
            let p = document.createElement('p');
            p.textContent = element;
            return p;

        }
        if (fullName.value == null) {
            document.getElementById('error-handling-name').appendChild(createItem("INvalid username"));
            return false;
        }
    })
}