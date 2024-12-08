<?php
require 'db_config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($contact->delete($id)) {
        header('Location: index.php');
    } else {
        echo "Error deleting contact.";
    }
}
?>
