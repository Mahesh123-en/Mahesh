<?php
require './db_config.php';
// require_once 'Contact.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
   
    // Check if email exists
    $result = $contact->checkEmail($email, $id = null);
 
    echo json_encode(['exists' => $result['counter']]);
}
?>
