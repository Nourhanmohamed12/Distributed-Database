<?php

// Connection details
$serverName = "DESKTOP-0EL844C"; // Replace with your server name or IP address
$connectionOptions = [
    "Database" => "MultiSiteInventory", // Replace with the database name from your .sql file
    "Uid" => "",        // Replace with your SQL Server username
    "PWD" => ""         // Replace with your SQL Server password
];

// Establish the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check the connection
// if ($conn === false) {
//     die(print_r(sqlsrv_errors(), true));
// } else {
//     echo "Connected to the SQL Server database successfully!";
// }
?>
