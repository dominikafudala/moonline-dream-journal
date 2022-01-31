const emailInput = document.querySelector('input[name = "email"]');
const passwordInput = document.querySelector('input[name = "password"]');
const repeatPasswordInput = document.querySelector('input[name = "repeat-password"]');

function isValidEmail(email) {
    return /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/.test(email);
}

function isValidPassword(password1, password2) {
    return password1 === password2;
}

function markValidation(element, condition) {
    !condition ? element.classList.add('not-valid') : element.classList.remove('not-valid');
}

function validateEmail() {
    setTimeout(
        () => {
            markValidation(emailInput, isValidEmail(emailInput.value));
        },
        1000
    )
}

function validatePassword() {
    setTimeout(function () {
            const condition = isValidPassword(
                passwordInput.value,
                repeatPasswordInput.value
            );
            markValidation(repeatPasswordInput, condition);
        },
        1000
    );
}

emailInput.addEventListener('keyup', validateEmail);
repeatPasswordInput.addEventListener('keyup', validatePassword);