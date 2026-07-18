<?php
include 'db.php';
if (isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    $conn->query("UPDATE users SET status = NOT status WHERE id = $id");
}
?>