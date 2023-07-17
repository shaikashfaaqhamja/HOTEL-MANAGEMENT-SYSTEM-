<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];

  // Establish database connection
  $servername = "localhost";
  $username = "ashfaaq";
  $password = "ashfaaq";
  $dbname = "restaurant_management";
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Insert customer into the database
  $sql = "INSERT INTO Customers (Name, Phone, Email) VALUES ('$name', '$phone', '$email')";
  if ($conn->query($sql) === TRUE) {
    echo "Customer added successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close database connection
  $conn->close();
}
?>