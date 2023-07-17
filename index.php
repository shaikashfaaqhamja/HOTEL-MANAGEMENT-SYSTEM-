<!DOCTYPE html>
<html>
<head>
  <title>Restaurant Management System</title>
</head>
<body>
  <h1>Restaurant Management System</h1>

  <!-- Customer Management Section -->
  <h2>Customer Management</h2>
  <form method="post" action="add_customer.php">
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="phone" placeholder="Phone" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Add Customer</button>
  </form>

  <!-- Order Placement Section -->
  <h2>Order Placement</h2>
  <form method="post" action="place_order.php">
    <select name="customer_id" required>
      <option value="" disabled selected>Select Customer</option>
      <!-- Fetch and populate customer options dynamically from the database -->
      <?php
      // Establish database connection
      $servername = "localhost";
      $username = "ashfaaq";
      $password = "ashfaaq";
      $dbname = "restaurant_management";
      $conn = new mysqli($servername, $username, $password, $dbname);
      
      // Fetch customers from the database
      $sql = "SELECT CustomerID, Name FROM Customers";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
        echo "<option value='".$row['CustomerID']."'>".$row['Name']."</option>";
      }
      ?>
    </select>
    <input type="date" name="order_date" required>
    <input type="text" name="total_amount" placeholder="Total Amount" required>
    <button type="submit">Place Order</button>
  </form>

  <!-- Menu Item Management Section -->
  <h2>Menu Item Management</h2>
  <form method="post" action="add_menu_item.php">
    <input type="text" name="item_name" placeholder="Item Name" required>
    <input type="text" name="item_price" placeholder="Item Price" required>
    <textarea name="item_description" placeholder="Item Description" required></textarea>
    <button type="submit">Add Menu Item</button>
  </form>

  <!-- Order Item Management Section -->
  <h2>Order Item Management</h2>
  <form method="post" action="add_order_item.php">
    <select name="order_id" required>
      <option value="" disabled selected>Select Order</option>
      <!-- Fetch and populate order options dynamically from the database -->
      <?php
      // Fetch orders from the database
      $sql = "SELECT OrderID FROM Orders";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
        echo "<option value='".$row['OrderID']."'>".$row['OrderID']."</option>";
      }
      ?>
    </select>
    <select name="item_id" required>
      <option value="" disabled selected>Select Menu Item</option>
      <!-- Fetch and populate menu item options dynamically from the database -->
      <?php
      // Fetch menu items from the database
      $sql = "SELECT ItemID, Name FROM MenuItems";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
        echo "<option value='".$row['ItemID']."'>".$row['Name']."</option>";
      }
      ?>
    </select>
    <input type="text" name="quantity" placeholder="Quantity" required>
    <button type="submit">Add Order Item</button>
  </form>

</body>
</html>