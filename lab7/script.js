$(document).ready(function() {
    $('#loginBtn').click(function() {
        $('#loginForm').toggle();
        $('#registerForm').hide();
    });

    $('#registerBtn').click(function() {
        $('#registerForm').toggle();
        $('#loginForm').hide();
    });

    // Реєстрація користувача
    $('#registerSubmit').click(function() {
        var username = $('#username').val();
        var email = $('#registerEmail').val();
        var password = $('#registerPassword').val();
        var confirmPassword = $('#confirmPassword').val();

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

    // Вхід користувача
    $('#loginSubmit').click(function() {
        var email = $('#loginEmail').val();
        var password = $('#loginPassword').val();

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
