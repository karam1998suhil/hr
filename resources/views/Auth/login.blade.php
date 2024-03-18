<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #6abadeba;
        font-family: 'Arial', sans-serif;
    }

    .login {
        width: 350px;
        margin: 100px auto;
        padding: 40px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #277582;
        margin-bottom: 30px;
    }

    label {
        color: #333;
        font-size: 16px;
    }

    input[type="email"],
    input[type="password"] {
        width: 100%;
        height: 40px;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 0 10px;
    }

    button[type="submit"] {
        width: 100%;
        height: 40px;
        border: none;
        border-radius: 5px;
        background-color: #277582;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #155e63;
    }

    #check {
        margin-right: 5px;
    }

    span {
        font-size: 16px;
    }

    a {
        float: right;
        color: #333;
        font-size: 14px;
        text-decoration: none;
    }
</style>
</head>
<body>

<div class="login">
    <h2>Login Page</h2>
    <form method="POST" action="{{ route('login') }}">
    @csrf

        <label for="email"><b>Email</b></label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        <br><br>
        <label for="password"><b>Password</b></label>
        <input id="password" type="password" name="password" required autocomplete="current-password">
        <br><br>
        <button type="submit">Login</button>
        <br><br>
        <input type="checkbox" id="check">
        <span>Remember me</span>
    </form>
</div>

</body>
</html>
