<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $itemName = $_POST["item_name"];
  $itemPrice = $_POST["item_price"];
  $itemDescription = $_POST["item_description"];

  // Establish database connection
  $servername = "localhost";
  $username = "ashfaaq";
  $password = "ashfaaq";
  $dbname = "restaurant_management";
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Insert menu item into the database
  $sql = "INSERT INTO MenuItems (Name, Price, Description) VALUES ('$itemName', $itemPrice, '$itemDescription')";
  if ($conn->query($sql) === TRUE) {
    echo "Menu item added successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close database connection
  $conn->close();
}
?>