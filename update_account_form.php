<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "society"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $resident_id = $_POST['resident_id'];
    $name = $_POST['name'];
    $contact_details = $_POST['contact_details'];
    $unit_number = $_POST['unit_number'];
    $vehicle_info = $_POST['vehicle_info'];

    $sql = "UPDATE residents SET name='$name', contact_details='$contact_details', unit_number='$unit_number', vehicle_info='$vehicle_info' WHERE resident_id='$resident_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Account updated successfully";
    } else {
        echo "Error updating account: " . $conn->error;
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update account</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>

        body 

        {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }


    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
          <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
          <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z"/>
        </svg>
        <a class="navbar-brand" href="#">Smart Society</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

     <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.html">Home</a>
                </li>
                <li class="nav-item">   
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="register.html">Register</a>
                </li>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProfile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Amenities
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownProfile">
                    <a class="dropdown-item" href="amenities.html">Book Amenity</a>
                    <a class="dropdown-item" href="update_amenity.html">Update Amenity</a>
                    <a class="dropdown-item" href="delete_amenity.html">Delete Amenity</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="display.html.html">display</a>
                </div>
                </li>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProfile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Profile
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownProfile">
                    <a class="dropdown-item" href="account.php">Account</a>
                    <a class="dropdown-item" href="update_account_form.php">Update Account</a>
                    <a class="dropdown-item" href="delete_account_form.php">Delete Account</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Logout</a>
                </div>
                </li>
            </ul>
            
        </div>
    </nav>
<div class="container">
    <h2>Update Account</h2>
    <form id="updateAccountForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="resident_id">Resident ID:</label>
<select id="resident_id" name="resident_id" required>
            <option value="">Select Resident ID</option>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = ""; 
            $dbname = "society"; 

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT resident_id, name, contact_details, unit_number, vehicle_info FROM residents";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['resident_id'] . "' data-name='" . $row['name'] . "' data-contact_details='" . $row['contact_details'] . "' data-unit_number='" . $row['unit_number'] . "' data-vehicle_info='" . $row['vehicle_info'] . "'>" . $row['resident_id'] . "</option>";
                }
            }
            ?>
        </select>

        <label for="Name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter Name" required>

        <label for="contact_details">contact_details:</label>
        <input type="text" id="contact_details" name="contact_details" placeholder="Enter contact_details" required>

        <label for="unit_number">unit_number:</label>
        <input type="text" id="unit_number" name="unit_number" placeholder="Enter unit_number" required>

        <label for="vehicle_info">vehicle_info:</label>
        <input type="text" id="vehicle_info" name="vehicle_info" placeholder="Enter vehicle_info" required>

        <button type="submit" name="submit">Update Account</button>
    </form>
</div>

<script>
    document.getElementById('resident_id').addEventListener('change', function() {
    var selectedOption = this.options[this.selectedIndex];
    document.getElementById('name').value = selectedOption.getAttribute('data-name');
    document.getElementById('contact_details').value = selectedOption.getAttribute('data-contact_details');
    document.getElementById('unit_number').value = selectedOption.getAttribute('data-unit_number');
    document.getElementById('vehicle_info').value = selectedOption.getAttribute('data-vehicle_info');
});

    
</script>

</body>
</html>