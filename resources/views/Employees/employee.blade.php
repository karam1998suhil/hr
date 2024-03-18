<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employee List</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
    }

    .container {
        max-width: 1000px;
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

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #277582;
        color: #fff;
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
    tr:hover {
        background-color: #f2f2f2;
    }

    .search-bar {
        margin-bottom: 20px;
    }

    .search-bar input[type="text"] {
        width: 300px;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-right: 10px;
        box-sizing: border-box;
    }

    .search-bar button {
        padding: 8px 15px;
        background-color: #277582;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .search-bar button:hover {
        background-color: #155e63;
    }
    .btn-edit, .btn-delete {
    display: inline-block;
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s;
}

.btn-edit {
    background-color: #4CAF50; /* Green */
    color: white;
}

.btn-delete {
    background-color: #f44336; /* Red */
    color: white;
}

.btn-edit:hover, .btn-delete:hover {
    background-color: #45a049; /* Darker Green */ 
}

</style>
</head>
<body>

<div class="container">
    <h2>Employee List</h2>

    <div class="search-bar">
        <input type="text" id="searchInput" placeholder="Search...">
        <button onclick="searchTable()">Search</button>
        <a href="{{ route('add_employee') }}" class="btn" style="float: right;">New Employee</a>

    </div>

    <table id="employeeTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Position</th>
                <th>Department</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
        <tr>
            <td><a href="{{ route('employees.show', $employee->id) }}">{{ $employee->name }}</a></td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->phone_number }}</td>
            <td>{{ $employee->address }}</td>
            <td>{{ $employee->position }}</td>
            <td>{{ $employee->department }}</td>
            <td style='width: 10%;'>
                <a href="{{ route('add_employee', $employee->id) }}" class="btn-edit">Edit</a>

                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="form-delete">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">Delete</button>
                </form>
            </td>

        </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script>
function searchTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("employeeTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (var j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break;
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
}
</script>

</body>
</html>
