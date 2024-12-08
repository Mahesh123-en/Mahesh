<?php
require 'db_config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container mt-4">
        <h2 class="text-center">Employee Records</h2>
        <table id="resultsTable" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Last</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Gender</th>
                    <th>Description</th>
                    <th>City</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $contact->getAllContacts();
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['Name']}</td>
                        <td>{$row['Last']}</td>
                        <td>{$row['Email']}</td>
                        <td>{$row['date']}</td>
                        <td>{$row['Gender']}</td>
                        <td>{$row['description']}</td>
                        <td>{$row['city']}</td>
                        <td><img src='{$row['photo']}' alt='Photo' width='50'></td>
                        <td>
                            <a href='update.php?id={$row['id']}' class='btn btn-primary btn-sm'>Edit</a>
                            <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
   <script>
    $(document).ready(function () {
    $('#searchBtn').on('click', function () {
        const query = $('#searchInput').val();
        if (query) {
            searchDatabase(query);
        }
    });

    $('#searchInput').on('keypress', function (e) {
        if (e.which === 13) { // Enter key
            const query = $(this).val();
            if (query) {
                searchDatabase(query);
            }
        }
    });
});

function searchDatabase(query) {
    $.ajax({
        url: 'search.php',
        type: 'POST',
        data: { search: query },
        success: function (response) {
            $('#searchResults').html(response);
        },
        error: function () {
            alert('Error performing search. Please try again.');
        }
    });
}

   </script>
</body>
</html>
