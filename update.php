<?php
include 'db.php';
if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['age'])) {
    $id = (int)$_POST['id'];
    $name = $conn->real_escape_string($_POST['name']);
    $age = (int)$_POST['age'];
    $conn->query("UPDATE users SET name='$name', age='$age' WHERE id=$id");
}
?>