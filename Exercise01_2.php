<!-- page2.php -->
<?php
session_start(); // Resume the session
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Store the user input in the session
    $_SESSION['name'] = $_POST['name'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Pr4 Sessions PHP</title>
</head>

<body>
    <?php
    if (isset($_SESSION['modify'])) { //en el caso que haya clicado modify
        $value = $_SESSION['modify']; //guardamos en una variable
        $position = $_SESSION['position']; //tmb
        //modify position selected
        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();
    } else {
        echo "<h1>No session data found!</h1>";
    }
    ?>
</body>

</html>