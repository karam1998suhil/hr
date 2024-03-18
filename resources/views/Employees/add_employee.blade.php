<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ isset($employee) ? 'Edit Employee' : 'Add Employee' }}</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }

    input[type="text"] {
        width: 100%;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        margin-bottom: 15px;
    }

    button[type="submit"] {
        padding: 10px 20px;
        background-color: #277582;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #155e63;
    }
</style>
</head>
<body>

<div class="container">
    <h2>{{ isset($employee) ? 'Edit Employee' : 'Add Employee' }}</h2>
    @if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

    <form action="{{ isset($employee) ? route('employees.update', $employee->id) : route('employees.store') }}" method="POST">
        @csrf
        @if(isset($employee))
            @method('PUT')
        @endif

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ isset($employee) ? $employee->name : '' }}" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ isset($employee) ? $employee->email : '' }}" required>

        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" value="{{ isset($employee) ? $employee->phone_number : '' }}" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="{{ isset($employee) ? $employee->address : '' }}" required>

        <label for="position">Position:</label>
        <input type="text" id="position" name="position" value="{{ isset($employee) ? $employee->position : '' }}" required>

        <label for="department">Department:</label>
        <input type="text" id="department" name="department" value="{{ isset($employee) ? $employee->department : '' }}" required>

        <button type="submit">{{ isset($employee) ? 'Update Employee' : 'Add Employee' }}</button>
    </form>
</div>

</body>
</html>