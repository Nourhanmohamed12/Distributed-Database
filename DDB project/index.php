<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System</title>
    <link rel="stylesheet" href="./src/styles_.css">
</head>
<body>
    <h1>Inventory Management System</h1>
    <div class="tables-row">

    <section>
        <h2>Product</h2>
        <button onclick="location.href='add_product.php'">ADD ROW</button>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('config.php');
                $query = "SELECT * FROM Products";
                $result = sqlsrv_query($conn, $query);
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$row['ProductID']}</td>";
                    echo "<td>{$row['ProductName']}</td>";
                    echo "<td>{$row['Category']}</td>";
                    echo "<td>{$row['Price']}</td>";
                    echo "<td>
                            <a href='view_product.php?ProductID={$row["ProductID"]}'>👁️</a>
                            <a href='update_product.php?ProductID={$row["ProductID"]}'>✏️</a>
                            <a href='delete_product.php?ProductID={$row["ProductID"]}'>🗑️</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <section>
        <h2>Locations</h2>
        <button onclick="location.href='add_location.php'">ADD ROW</button>
        <table>
            <thead>
                <tr>
                    <th>Location ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM Locations";
                $result = sqlsrv_query($conn, $query);
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$row['LocationID']}</td>";
                    echo "<td>{$row['LocationName']}</td>";
                    echo "<td>{$row['Address']}</td>";
                    echo "<td>
                            <a href='view_location.php?LocationID={$row['LocationID']}'>👁️</a>
                            <a href='update_location.php?LocationID={$row['LocationID']}'>✏️</a>
                            <a href='delete_location.php?LocationID={$row['LocationID']}'>🗑️</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <section class="standalone-section">
        <h2>Inventory</h2>
        <button onclick="location.href='add_inventory.php'">ADD ROW</button>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Location ID</th>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM Inventory";
                $result = sqlsrv_query($conn, $query);
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$row['InventoryID']}</td>";
                    echo "<td>{$row['LocationID']}</td>";
                    echo "<td>{$row['ProductID']}</td>";
                    echo "<td>{$row['Quantity']}</td>";
                    echo "<td>
                            <a href='view_inventory.php?InventoryID={$row['InventoryID']}'>👁️</a>
                            <a href='update_inventory.php?InventoryID={$row['InventoryID']}'>✏️</a>
                            <a href='delete_inventory.php?InventoryID={$row['InventoryID']}'>🗑️</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
</div>
</body>
</html>
