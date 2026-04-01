<?php
// update_product.php: Script to update a product
include 'config.php';

// Check if ProductID is provided in the query string
if (isset($_GET['ProductID'])) {
    $productId = $_GET['ProductID'];

    // Fetch the existing product details
    $query = "SELECT * FROM Products WHERE ProductID = ?";
    $params = [$productId];
    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $product = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if (!$product) {
        die("Product not found.");
    }
} else {
    die("No ProductID provided.");
}

// Handle the form submission for updating the product
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $query = "UPDATE Products SET ProductName = ?, Category = ?, Price = ? WHERE ProductID = ?";
    $params = [$name, $category, $price, $productId];

    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
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
    <h1>Update Product</h1>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($product['ProductName']) ?>" required><br>

        <label for="category">Category:</label>
        <input type="text" id="category" name="category" value="<?= htmlspecialchars($product['Category']) ?>" required><br>

        <label for="price">Price:</label>
        <input type="number" step="0.01" id="price" name="price" value="<?= htmlspecialchars($product['Price']) ?>" required><br>

        <button type="submit">Update Product</button>
    </form>
</body>
</html>


