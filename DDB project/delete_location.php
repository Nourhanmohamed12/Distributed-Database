<?php
// delete.php: Script to delete records
include 'config.php';

if (isset($_GET['LocationID'])) {
    $id = $_GET['LocationID'];
    $query = "delete from Locations WHERE LocationID = ?";
    $params = [$id]; 

    $stmt = sqlsrv_query($conn, $query, $params);
    
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    header('Location: index.php');
    exit;
}
?>