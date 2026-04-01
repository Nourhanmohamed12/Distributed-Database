<?php
// view.php: Script to view record details
include 'config.php';

if (isset($_GET['InventoryID'])) {
    $id = $_GET['InventoryID'];

    $query = "SELECT * FROM Inventory WHERE InventoryID = ?";
    $params = [$id];

    $stmt = sqlsrv_query($conn, $query, $params);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $record = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5fa;
            color: #333;
            text-align: center;
        }

        h1 {
            background-color: #e7eaf6;
            padding: 20px;
            margin: 0;
            color: #4a4a7a;
            font-size: 2.5rem;
        }

        table {
            width: 60%;
            margin: 40px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        table th,
        table td {
            padding: 20px;
            border: 5px solid rgb(223, 230, 238);
            text-align: left;
            font-size: 1rem;
        }

        th {
            background-color: #4a90e2;
            color: #fff;
        }

        button {
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #4a90e2;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #357abd;
        }
    </style>
    </head>
<body>
    <h1>View Record</h1>
    <table>
        <tbody>
            <?php
            foreach ($record as $field => $value) {
                echo "<tr><th>$field</th><td>$value</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <button onclick="history.back()">Back</button>
</body>
</html>