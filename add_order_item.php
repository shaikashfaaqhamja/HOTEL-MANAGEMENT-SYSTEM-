<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $orderID = $_POST["order_id"];
  $menuItemID = $_POST["item_id"];
  $quantity = $_POST["quantity"];

  // Establish database connection
  $servername = "localhost";
  $username = "ashfaaq";
  $password = "ashfaaq";
  $dbname = "restaurant_management";
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Insert order item into the database
  $sql = "INSERT INTO OrderItems (OrderID, ItemID, Quantity) VALUES ($orderID, $menuItemID, $quantity)";
  if ($conn->query($sql) === TRUE) {
    echo "Order item added successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close database connection
  $conn->close();
}
?>
