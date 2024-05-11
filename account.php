<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProfile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Profile
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownProfile">
                    <a class="dropdown-item" href="account.php">Account</a>
                    <a class="dropdown-item" href="update_account_form.html">Update Account</a>
                    <a class="dropdown-item" href="delete_account_form.php">Delete Account</a>
                    
                </div>
        
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <h2>Display Account</h2>
        <form id="DisplayAccountForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                        echo "<option value='" . $row['resident_id'] . "'>" . $row['resident_id'] . "</option>";
                    }
                }
                ?>
            </select>
            <button type="submit">Display Information</button>
        </form>

        <?php
        if (isset($_POST['resident_id'])) {
            $resident_id = $_POST['resident_id'];

            $servername = "localhost";
            $username = "root";
            $password = ""; 
            $dbname = "society"; 

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM residents WHERE resident_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $resident_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<div>";
                echo "<p>Name: " . $row['name'] . "</p>";
                echo "<p>Contact Details: " . $row['contact_details'] . "</p>";
                echo "<p>Unit Number: " . $row['unit_number'] . "</p>";
                echo "<p>Vehicle Info: " . $row['vehicle_info'] . "</p>";
                echo "</div>";
            } else {
                echo "<p>No user found with the provided Resident ID.</p>";
            }

            $stmt->close();
            $conn->close();
        }
        ?>
    </div>

    <div class="card">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <center><p class="card-text">&copy; 2024 Smart Society. All rights reserved.</p></center>
        </div>
    </div>
</body>
</html>