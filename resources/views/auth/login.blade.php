<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            max-width: 100%;
        }
        .login-container h2 {
            margin: 0 0 20px;
            font-size: 24px;
            color: #333;
            text-align: center;
        }
        .input-group {
            margin-bottom: 15px;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        .forgot-password {
            display: block;
            margin-bottom: 20px;
            text-align: right;
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
        }
        .forgot-password:hover {
            text-decoration: underline;
        }
        .button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            margin-bottom: 15px;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .social-buttons {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }
        .social-buttons button {
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            flex: 1;
            font-size: 14px;
        }
        .google-button {
            background-color: #4285F4;
            color: white;
        }
        .google-button:hover {
            background-color: #357ae8;
        }
        .apple-button {
            background-color: #000;
            color: white;
        }
        .apple-button:hover {
            background-color: #333;
        }
        .sign-up {
            text-align: center;
            margin-top: 20px;
        }
        .sign-up p {
            margin: 0;
            font-size: 14px;
            color: #555;
        }
        .sign-up a {
            color: #007bff;
            text-decoration: none;
        }
        .sign-up a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <a href="#" class="forgot-password">Forgot Password?</a>
        <button class="button">Login</button>
        <div class="social-buttons">
            <a href="{{ url('auth/google') }}">
                <button class="google-button">Sign in with Google</button>
            </a>
            <a href="{{ url('auth/apple') }}">
                <button class="apple-button">Sign in with Apple</button>
            </a>
        </div>
        <div class="sign-up">
            <p>Don’t have an account? <a href="#">Sign Up</a></p>
        </div>
    </div>
</body>
</html>
