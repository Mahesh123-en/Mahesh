<?php
require 'db_config.php';
include 'navbar.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['Name'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $description = $_POST['description'];
    $city = $_POST['city'];
    $photo = $_POST['photo'];

    if ($contact->insert($name, $last, $email, $date, $gender, $description, $city, $photo)) {
        header('Location: index.php');
    } else {
        echo "Error adding contact.";
    }
}
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <title>Add New User</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Registration Form</h2>
    <form id="userForm" method="POST">
        <div>
             <label for="Name">First Name:</label>
            <input type="text" id="Name" name="Name" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"required><br>
            </div>
            <div>
                <label for="last">Last Name:</label>
                <input type="text" id="last" name="last"  style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"required><br>
            </div>
            <div>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" required>
                <span id="emailError" style="color: red;"></span><br>
            </div>
        <!-- <Div>
             <label for="date">Date:</label>
            <input type="date" id="date" name="date" required><br>
        </Div> -->
        <div class="mb-3">
            <label for="date" class="form-label">Date of Birth</label>
            <input 
            type="date" 
            class="form-control" 
            id="dob" 
            required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" 
            name="date" 
            max="<?= date('Y-m-d'); ?>"
            >
        </div>
            <div>

                <label for="gender">Gender:</label>
                <select id="gender" name="gender" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select><br>
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="description"  style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" ></textarea><br>
            </div>
            <div>
            <label for="city">City:</label>
            <input type="text" id="city" name="city" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"><br>
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

        <button type="submit" id="submitBtn">Submit</button>
    </form>
</div>

    <script>
        $(document).ready(function () {
            $('#email').on('blur', function () {
                const email = $(this).val();
                if (email) {
                    $.ajax({
                        url: 'check_email.php',
                        type: 'POST',
                        data: { email: email },
                        dataType: 'json',
                        success: function (response) {
                            if (response.exists) {
                                $('#emailError').text('Email already exists. Please choose another.');
                                $('#submitBtn').prop('disabled', true);
                            } else {
                                $('#emailError').text('');
                                $('#submitBtn').prop('disabled', false);
                            }
                        },
                        error: function () {
                            alert('Error checking email. Please try again.');
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>