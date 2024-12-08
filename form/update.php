<?php
require 'db_config.php';
include 'navbar.php';
$id = $_GET['id'];
$contactData = $contact->getContactById($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['Name'];
    $last = $_POST['Last'];
    $email = $_POST['Email'];
    $date = $_POST['Date'];
    $gender = $_POST['Gender'];
    $description = $_POST['Description'];
    $city = $_POST['City'];
    $photo = $_POST['Photo'];

     if($contact->update($id, $name, $last, $email, $date, $gender, $description, $city, $photo)) {
        header('Location: index.php');
    } else {
        echo "Error updating contact.";
    }
}
?>
<style>
    form{border-width: 4px;
    border-style:solid; }
</style>
    <div class="container mt-5">

        <form method="POST" class="container mt-4">
            <h2 class="text-center mb-4">Update Contact</h2>
            <div style="margin-bottom: 15px;">
                <label for="Name" style="display: block; margin-bottom: 5px; font-weight: bold;">Name:</label>
                <input type="text" name="Name" value="<?= $contactData['Name'] ?>"style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" required>
    </div>
    <div style="margin-bottom: 15px;">
        <label for="last" style="display: block; margin-bottom: 5px; font-weight: bold;">Last:</label>
        <input type="text" name="Last" value="<?= htmlspecialchars( $contactData['Last'] ?? '') ?>" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" required>
    </div>
    <div style="margin-bottom: 15px;">
        <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold;">Email:</label>
        <input type="email" name="Email" value="<?= htmlspecialchars($contactData['Email'] ?? '') ?>" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" required>
    </div>
    <div style="margin-bottom: 15px;">
        <label for="date" style="display: block; margin-bottom: 5px; font-weight: bold;">Date of Birth:</label>
        <input 
        type="date" 
        class="form-control" 
        id="dob" value="<?= htmlspecialchars($contactData['Date'] ?? '') ?>"
        required 
        name="Date" 
        max="<?= date('Y-m-d'); ?>" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"   >
    </div>
    <div style="margin-bottom: 15px;">
        <label for="gender" style="display: block; margin-bottom: 5px; font-weight: bold;">Gender:</label>
        <input type="text" name="Gender" value="<?= htmlspecialchars($contactData['Gender'] ?? '') ?>" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" required>
    </div>
    <div style="margin-bottom: 15px;">
        <label for="description" style="display: block; margin-bottom: 5px; font-weight: bold;">Description:</label>
        <textarea name="Description" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" rows="4" required><?= htmlspecialchars($contactData['Description'] ?? '') ?></textarea>
    </div>
    <div style="margin-bottom: 15px;">
        <label for="city" style="display: block; margin-bottom: 5px; font-weight: bold;">City:</label>
        <input type="text" name="City" value="<?= htmlspecialchars($contactData['city'] ?? '') ?>" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" required>
    </div>
    <div style="margin-bottom: 15px;">
        <label for="photo" style="display: block; margin-bottom: 5px; font-weight: bold;">Photo:</label>
        <div class="mb-3">
            <label for="photo" class="form-label">Upload Photo</label>
            <input 
            class="form-control" 
            type="file" 
            id="photo" 
            name="photo" 
            accept=".jpg,.jpeg,.pdf" 
            >
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Update</button>
</form>