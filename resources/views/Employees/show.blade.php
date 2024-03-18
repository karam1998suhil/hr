<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employee Profile</title>
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

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .profile-details {
        margin-bottom: 20px;
    }

    .profile-details p {
        margin: 5px 0;
    }

    .profile-details strong {
        color: #277582;
    }

    .profile-picture img {
        border-radius: 50%;
        width: 200px;
        height: 200px;
        border: 2px solid #277582; /* Add border */
    }

    .file-input {
        display: block;
        margin-top: 10px;
    }

    .file-preview {
        display: none;
        margin-top: 10px;
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
    <h2>Employee Profile</h2>
    <div class="profile-details">
        <div class="profile-picture">
            <img src="http://localhost/img/person.png" alt="Profile Picture">
            <form action="{{ route('submit_approval') }}" method="POST">
            @csrf
            <!-- Include form fields here -->
            <button type="submit">Submit for Approval</button>
        </form>        
    </div>
        <hr>
        <p><strong>Name:</strong> {{ $employee->name }}</p>
        <p><strong>Email:</strong> {{ $employee->email }}</p>
        <p><strong>Phone Number:</strong> {{ $employee->phone_number }}</p>
        <p><strong>Address:</strong> {{ $employee->address }}</p>
        <p><strong>Position:</strong> {{ $employee->position }}</p>
        <p><strong>Department:</strong> {{ $employee->department }}</p>
        <hr>

       
            <label for="driving_license">Driving License Number:</label>
            <input type="file" id="driving_license" name="driving_license" class="file-input" onchange="previewImage(this, 'driving_license_preview')">
            <img id="driving_license_preview" class="file-preview" src="#" alt="Driving License Preview">
            <button type="submit">Upload Driving License</button>
<hr>
        <!-- Add file input and image preview for Background Check Report -->
        <label for="background_check">Background Check Report:</label>
        <input type="file" id="background_check" name="background_check" class="file-input" onchange="previewImage(this, 'background_check_preview')">
        <img id="background_check_preview" class="file-preview" src="#" alt="Background Check Preview">
        <hr>

        <!-- Add file input and image preview for Employee ID -->
        <label for="employee_id">Employee ID:</label>
        <input type="file" id="employee_id" name="employee_id" class="file-input" onchange="previewImage(this, 'employee_id_preview')">
        <img id="employee_id_preview" class="file-preview" src="#" alt="Employee ID Preview">
   
    </div>
</div>

</body>
</html>
