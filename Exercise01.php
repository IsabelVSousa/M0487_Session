
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pr4 Sessions PHP</title>
</head>

<body>

    <?php
    session_start(); // Resume the session
    if(isset ($_SESSION['number'])) {
        $array = [10, 20, 30]; 
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Store the user input in the session
        if (isset($_SESSION['modify'])) { //en el caso que haya clicado modify
            $value = $_SESSION['modify']; //guardamos en una variable
            $position = $_SESSION['position']; //tmb

            //modify position selected


        } else {
            echo "<h1>No session data found!</h1>";
        }
    }
    ?>



    <h1>Modify array saved in session</h1>
    <form action="Exercise01_2.php" method="POST">
        <label for="value">Position to modify:</label>
        <select name="position" id="position">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
        <br>
        <br>
        <label for="value">New value:</label>
        <input type="number" id="value" name="value" required><br><br>
        <button type="submit" name="modify">Modify</button>
        <button type="submit" name="average">Average</button>
        <button type="reset" naem="reset">Reset</button>
        <!-- puede que los button sean input -->
    </form>
    <p>Current Array: <?php echo implode(separator: ", ", array: $_SESSION['numbers']); ?></p>
    <?php if (isset($average)) {
        echo "<p>Average: $average </p>";
    } ?>
</body>

</html>