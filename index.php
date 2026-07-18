<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="p-5">
    <div class="container">
        <h2>Users Management</h2>
        <form id="userForm" class="row g-3 mb-4">
            <div class="col-auto">
                <input type="text" id="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="col-auto">
                <input type="number" id="age" class="form-control" placeholder="Age" required>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        
        <table class="table table-striped table-hover border">
            <thead class="table-dark">
                <tr><th>ID</th><th>Name</th><th>Age</th><th>Status</th><th>Action</th></tr>
            </thead>
            <tbody id="tableBody"></tbody>
        </table>
    </div>

    <script>
        function loadData() { $('#tableBody').load('process.php'); }
        
        $('#userForm').submit(function(e) {
            e.preventDefault();
            $.post('process.php', {name: $('#name').val(), age: $('#age').val()}, function() {
                loadData(); $('#userForm')[0].reset();
            });
        });

        function toggleStatus(id) { $.post('toggle.php', {id: id}, function() { loadData(); }); }

        function editRow(id) {
            let row = $('#row_' + id);
            row.find('.val, .edit-btn').hide();
            row.find('.edit-input, .save-btn').show();
        }

        function saveRow(id) {
            let row = $('#row_' + id);
            $.post('update.php', {id: id, name: row.find('input').eq(0).val(), age: row.find('input').eq(1).val()}, function() { loadData(); });
        }

        function deleteRow(id) {
            if (confirm("Are you sure?")) {
                $.post('delete.php', {id: id}, function() { loadData(); });
            }
        }

        $(document).ready(function() { loadData(); });
    </script>
</body>
</html>