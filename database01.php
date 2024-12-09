
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <?php
  // Database connection
  $servername = "localhost";
  $username = "root";
  $password = ""; // Default password for WAMP is usually empty
  $dbname = "loginData"; // Your database name

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Get user's email and password (this should be from your login logic)
  $email = "user@example.com"; // Replace with actual email from login form
  $user_password = password_hash("password123", PASSWORD_DEFAULT); // Replace with actual password from login form and hash it

  // Insert login data
  $sql_insert = "INSERT INTO logins (email, password) VALUES ('$email', '$user_password')";

  if ($conn->query($sql_insert) === TRUE) {
    echo "Login recorded successfully<br>";
  } else {
    echo "Error: " . $sql_insert . "<br>" . $conn->error;
  }

  // Get the current month
  $currentMonth = date('Y-m');

  // Get login count for the current month
  $sql_select = "SELECT COUNT(*) AS login_count FROM logins WHERE DATE_FORMAT(login_time, '%Y-%m') = '$currentMonth'";
  $result = $conn->query($sql_select);

  if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
      echo "Logins this month: " . $row["login_count"];
    }
  } else {
    echo "0 results";
  }

  $conn->close();
  ?>
</body>
</html>