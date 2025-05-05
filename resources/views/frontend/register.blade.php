<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .register-box {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
        }

        .register-box h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #1e3c72;
        }

        .register-box input[type="text"],
        .register-box input[type="email"],
        .register-box input[type="password"],
        .register-box input[type="tel"] {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            transition: 0.3s ease;
        }

        .register-box input:focus {
            border-color: #2a5298;
            outline: none;
            box-shadow: 0 0 5px rgba(42, 82, 152, 0.5);
        }

        .register-box button {
            width: 100%;
            padding: 12px;
            background: #1e3c72;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .register-box button:hover {
            background: #16345a;
        }

        .register-box .login-link {
            text-align: center;
            margin-top: 15px;
            color: #333;
        }

        .register-box .login-link a {
            color: #1e3c72;
            text-decoration: none;
            font-weight: bold;
        }

        .register-box .login-link a:hover {
            text-decoration: underline;
        }

        .form-group {
        position: relative;
        margin-bottom: 15px;
    }

    .form-group input {
        width: 100%;
        padding: 10px 40px 10px 10px;
        box-sizing: border-box;
    }
        .form-group .toggle-password {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #888;
    }
    </style>
</head>
<body>
<!-- Head section me add karein -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


<div class="register-box">
    <h2>Register</h2>
    <form method="POST" action="{{ route('author.register') }}">
        @csrf

        <div class="form-group">
            <input type="text" name="name" placeholder="Full Name" required>
        </div>

        <div class="form-group">
            <input type="email" name="email" placeholder="Gmail Address" required>
        </div>

        <div class="form-group">
            <input type="tel" name="phone" placeholder="Phone Number" required>
        </div>

        <!-- Password Field -->
        <div class="form-group">
            <input type="password" id="password" name="password" placeholder="Password" required>
            <i class="fa-solid fa-eye toggle-password" onclick="toggleVisibility('password', this)"></i>
        </div>

        <!-- Confirm Password Field -->
        {{-- <div class="form-group">
            <input type="password" id="confirm_password" name="password_confirmation" placeholder="Confirm Password" required>
            <i class="fa-solid fa-eye toggle-password" onclick="toggleVisibility('confirm_password', this)"></i>
        </div> --}}

        <button type="submit">Create Account</button>

        <div class="login-link">
            Already have an account? <a href="/login">Login here</a>
        </div>
    </form>

</div>
<script>
    function toggleVisibility(fieldId, iconElement) {
        const field = document.getElementById(fieldId);
        if (field.type === "password") {
            field.type = "text";
            iconElement.classList.remove("fa-eye");
            iconElement.classList.add("fa-eye-slash");
        } else {
            field.type = "password";
            iconElement.classList.remove("fa-eye-slash");
            iconElement.classList.add("fa-eye");
        }
    }
</script>

</body>
</html>
