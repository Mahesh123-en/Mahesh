<?php
// Set a cookie named "user" with a value "John Doe" that expires in 1 day
setcookie("user", "John Doe", time() + (86400), "localhost/CONTACTS/form/"); // 86400 = 1 day
?>
<!DOCTYPE html>
<html>
<body>

<?php
if (!isset($_COOKIE["user"])) {
    echo "Cookie named 'user' is not set!";
} else {
    echo "Cookie 'user' is set!<br>";
    echo "Value: " . $_COOKIE["user"];
}
?>

</body>
</html>
