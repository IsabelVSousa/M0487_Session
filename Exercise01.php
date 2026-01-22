<!-- page1.php -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pr4 Sessions PHP</title>
</head>

<body>
    <h1>Modify array saved in session</h1>
    <form action="Exercise01_2.php" method="post">
        <select name="position" id="position">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
        <label for="value">New value:</label>
        <input type="text" id="value" name="value" required>
        <button type="submit">Modify</button>
        <button type="submit">Average</button>
        <button type="submit">Reset</button>
    </form>
</body>

</html>