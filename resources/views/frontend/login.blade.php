<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page | {{ env('APP_NAME') }}</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #1eaf58, #8f94fb);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            width: 400px; /* Adjust as needed */
        }

        .login-container h3 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .login-container p {
            font-size: 14px;
            color: #666;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            background-color:black;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .text-danger {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h3>Login</h3>
        <p>Enter your email and password to login:</p>
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="E-mail">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Login</button>
            </div>
        </form>
        <div class="text-center mt-3">
            <span>Don't have an account?</span>
            <a href="/registerform" style="color: #1e3c72; font-weight: bold; text-decoration: none;">Register here</a>
        </div>
    </div>
</body>
</html>
