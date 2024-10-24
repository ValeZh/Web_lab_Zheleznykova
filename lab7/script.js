$(document).ready(function() {
    $('#loginBtn').click(function() {
        $('#loginFormElement').toggle();
        $('#registerFormElement').hide();
    });


    $('#registerBtn').click(function() {
        $('#registerFormElement').toggle();
        $('#loginFormElement').hide();
    });

    $('#registerFormElement').on('submit', function(event) {
        event.preventDefault();

        var username = this.username.value;
        var email = this.email.value;
        var password = this.password.value;
        var confirmPassword = this.confirm_password.value;

        if (password !== confirmPassword) {
            $('#registerError').text("Паролі не співпадають.");
            return;
        }

        $.ajax({
            url: 'register.php',
            type: 'POST',
            data: {
                username: username,
                email: email,
                password: password
            },
            success: function(response) {
                if (response === 'success') {
                    alert('Реєстрація успішна!');
                    window.location.href = 'index.html';
                } else {
                    $('#registerError').text(response);
                }
            }
        });
    });


    $('#loginFormElement').on('submit', function(event) {

        event.preventDefault();

        var email = this.email.value;
        var password = this.password.value;

        $.ajax({
            url: 'login.php',
            type: 'POST',
            data: {
                email: email,
                password: password
            },
            success: function(response) {
                if (response === 'success') {
                    alert('Вхід успішний!');
                    window.location.href = 'profile.php';
                } else {
                    $('#loginError').text(response);
                }
            }
        });
    });
});