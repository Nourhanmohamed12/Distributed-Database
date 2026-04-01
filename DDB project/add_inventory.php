
<?php
// add_inventory.php: Script to add inventory
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $locationId = $_POST['locationId'];
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];

    $query = "INSERT INTO Inventory (LocationID, ProductID, Quantity) VALUES (?, ?, ?)";
    $params = [$locationId, $productId, $quantity];

    $stmt = sqlsrv_query($conn, $query, $params);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Inventory</title>
    <style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f7f7fc;
    margin: 0;
    padding: 0;
    text-align: center;
  }

  h1 {
    text-align: center;
    font-size: 2em;
    color: #4b4b7c;
    margin: 20px 0;
    padding: 10px;

  }

  .form-container {
    background-color: white;
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  form {
    display: inline-block;
    flex-direction: column;
    width: 600px;
    margin: 50px auto;
    padding: 20px;
  }

  label {
    font-size: 1em;
    margin: 10px 0 5px;
    color: #333;
  }

  input, select, textarea {
    font-size: 1em;
    padding: 10px;
    margin: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 100%;
  }

  input:focus, select:focus, textarea:focus {
    outline: none;
    border-color: #6c63ff;
    box-shadow: 0 0 5px rgba(108, 99, 255, 0.5);
  }

  .buttons {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
  }

  button {
    background-color: #6c63ff;
    color: white;
    border: none;
    padding: 10px 15px;
    font-size: 14px;
    border-radius: 4px;
    cursor: pointer;
  }

  button:hover {
    background-color: #554ee5;
  }

  button.cancel {
    background-color: #ff6b6b;
  }

  button.cancel:hover {
    background-color: #e65c5c;
  }
</style>
</head>
<body>
    <h1>Add Inventory</h1>
    <form method="POST">
        <label for="locationId">Location ID:</label>
        <input type="number" id="locationId" name="locationId" required><br>

        <label for="productId">Product ID:</label>
        <input type="number" id="productId" name="productId" required><br>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required><br>

        <button type="submit">Add Inventory</button>
    </form>
</body>
</html>
