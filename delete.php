<?php
include 'db.php';
if (isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    $conn->query("DELETE FROM users WHERE id = $id");
}
?>
