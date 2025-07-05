<?php 
    $db_server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_database = "login_system";

    try {
        // Create connection
        $conn = new mysqli($db_server, $db_username, $db_password, $db_database);

        // Check connection
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    

?>