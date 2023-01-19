<?php

    require_once('function.php');
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $query = "SELECT * FROM book WHERE book_id=$id;";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    }

?>