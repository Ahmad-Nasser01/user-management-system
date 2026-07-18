<?php
include 'db.php';
if (isset($_POST['name']) && isset($_POST['age'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $age = (int)$_POST['age'];
    $conn->query("INSERT INTO users (name, age, status) VALUES ('$name', '$age', 0)");
}
$result = $conn->query("SELECT * FROM users");
while($row = $result->fetch_assoc()) {
    echo "<tr id='row_{$row['id']}'>
            <td>{$row['id']}</td>
            <td><span class='val'>{$row['name']}</span><input type='text' class='edit-input form-control' value='{$row['name']}' style='display:none;'></td>
            <td><span class='val'>{$row['age']}</span><input type='number' class='edit-input form-control' value='{$row['age']}' style='display:none;'></td>
            <td>" . ($row['status'] == 1 ? "Active" : "Inactive") . "</td>
            <td>
                <button class='btn btn-sm btn-warning' onclick='toggleStatus({$row['id']})'>Toggle</button>
                <button class='btn btn-sm btn-info edit-btn' onclick='editRow({$row['id']})'>Edit</button>
                <button class='btn btn-sm btn-success save-btn' onclick='saveRow({$row['id']})' style='display:none;'>Save</button>
                <button class='btn btn-sm btn-danger' onclick='deleteRow({$row['id']})'>Delete</button>
            </td>
          </tr>";
}
?>