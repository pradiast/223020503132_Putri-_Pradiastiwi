function validateinput() {
    // Reset errors
    document.getElementById("usernameError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";

    // Get input values
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    var valid = true;

    // Validate username length
    if (username.length > 7) {
        document.getElementById("usernameError").innerHTML = "Username tidak boleh lebih dari tujuh karakter.";
        valid = false;
    }

    // Validate password length and complexity
    if (password.length < 10) {
        document.getElementById("passwordError").innerHTML = "Password harus terdiri dari minimal sepuluh karakter.";
        valid = false;
    } else if (!password.match(/[A-Z]/) || !password.match(/[a-z]/) || !password.match(/[0-9]/) || !password.match(/[!@#$%^&*()_+]/)) {
        document.getElementById("passwordError").innerHTML = "Password harus terdiri dari huruf kapital, huruf kecil, angka, dan karakter khusus.";
        valid = false;
    }



    return valid;
    }
