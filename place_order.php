<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $customerID = $_POST["customer_id"];
  $orderDate = $_POST["order_date"];
  $totalAmount = $_POST["total_amount"];

  // Establish database connection
  $servername = "localhost";
  $username = "ashfaaq";
  $password = "ashfaaq";
  $dbname = "restaurant_management";
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Insert order into the database
  $sql = "INSERT INTO Orders (CustomerID, OrderDate, TotalAmount) VALUES ($customerID, '$orderDate', $totalAmount)";
  if ($conn->query($sql) === TRUE) {
    echo "Order placed successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close database connection
  $conn->close();
}
?>