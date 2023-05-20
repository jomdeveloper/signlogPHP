var inputContainers = document.querySelectorAll('.input-container');
var inputPassword = document.getElementById('password');
var inputPasswordConfirm = document.getElementById('password_confirm');
var togglePassword = document.getElementById('toggle_password');
var togglePasswordConfirm = document.getElementById('toggle_password_confirm');

if (inputContainers) {
    inputContainers.forEach(function(inputContainer) {
        var spanElement = inputContainer.querySelector('span');
        var spanText = spanElement ? spanElement.textContent.trim() : '';
    
        if (spanText !== '') {
            inputContainer.classList.add('input-error');
        }
    });
}

if (inputPassword) {
    inputPassword.addEventListener('keyup', function() {
        if (this.value.length > 0) {
            togglePassword.style.display = 'block';
        } else {
            togglePassword.style.display = 'none';
        }
        clearInputError(this);
    });
}

if (inputPasswordConfirm) {
    inputPasswordConfirm.addEventListener('keyup', function() {
        if (this.value.length > 0) {
            togglePasswordConfirm.style.display = 'block';
        } else {
            togglePasswordConfirm.style.display = 'none';
        }
        clearInputError(this);
    });
}

if (togglePassword) {
    togglePassword.addEventListener('click', function() {
        if (inputPassword.type == 'password') {
            inputPassword.type = 'text';
            this.classList.remove('bx-show');
            this.classList.add('bx-hide');
        } else {
            inputPassword.type = 'password';
            this.classList.remove('bx-hide');
            this.classList.add('bx-show');
        }
    });
}

if (togglePasswordConfirm) {
    togglePasswordConfirm.addEventListener('click', function() {
        if (inputPasswordConfirm.type == 'password') {
            inputPasswordConfirm.type = 'text';
            this.classList.remove('bx-show');
            this.classList.add('bx-hide');
        } else {
            inputPasswordConfirm.type = 'password';
            this.classList.remove('bx-hide');
            this.classList.add('bx-show');
        }
    });
}

function clearInputError(inputElement) {
    var parentElement = inputElement.parentElement;
    parentElement.classList.remove('input-error');

    var spanElement = parentElement.querySelector('span');
    spanElement.textContent = '';
}