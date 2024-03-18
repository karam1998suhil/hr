<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    p {
        color: #666;
        font-size: 16px;
        margin-bottom: 30px;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #277582;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #155e63;
    }

    .logout-link {
        float: right;
        color: #333;
        font-size: 14px;
        text-decoration: none;
    }
</style>
</head>
<body>

<div class="container">
    @if (Auth::check())
        <h1>Welcome to the Dashboard, {{ Auth::user() }}</h1>
        <p>This is where you can manage your account and access exclusive features.</p>
        <a href="{{ route('employee') }}" class="btn">Employees</a>
        <a href="{{ route('logout') }}" class="logout-link">Logout</a>
    @else
        <p>You are not logged in. Please <a href="{{ route('login') }}">log in</a> to access the dashboard.</p>
    @endif
</div>

</body>
</html>
