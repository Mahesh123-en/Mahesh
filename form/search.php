<?php
require './db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $search = "%" . $_POST['search'] . "%"; // Add wildcards for partial matching
    $sql = "SELECT * FROM contacts WHERE Name LIKE ? OR Email LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $search, $search);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
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
    } else {
        echo "<tr><td colspan='10'>No results found</td></tr>";
    }
}
?>
