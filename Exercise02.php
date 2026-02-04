<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pr4 Sessions PHP</title>
</head>

<body>

    <?php
    session_start(); // Resume the session
    if (!isset($_SESSION['numbers'])) { //!si no existe el array
        $_SESSION['numbers'] = [10, 20, 30];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Store the user input in the session
        if (isset($_POST['modify'])) { //en el caso que haya clicado modify

            $value = $_POST['value']; //guardamos en una variable
            $position = $_POST['position']; //tmb

            //modify position selected
            //alteramos los datos guardados en el session con los datos post
            $_SESSION['numbers'][$position] = $value;

        } 
        // else {
        //     echo "<h1>No session data found!</h1>";
        // }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Store the user input in the session
        if (isset($_POST['average'])) { //en el caso que haya clicado average
           
            //sumar y contar el array
            $total = array_sum($_SESSION['numbers']);
            $count = count($_SESSION['numbers']);

            $average = number_format($total/$count, 2);
        } 
        // else {
        //     echo "<h1>No session data found!</h1>";
        // }
    }
    ?>

    <h1>Supermarket managemen</h1>
    <form method="POST">
        <input type="string" id="name" name="name"><br>
        <br>

        <h2>Choose product:</h2>
        <select name="position" id="position">
            <option value="milk">Milk</option>
            <option value="soft_milk">Soft Milk</option>
        </select>
        <br>

        <br>
        <label for="value">Product quantity:</label>
        <input type="number" id="value" name="value"><br><br>
        <button type="submit" name="modify">Modify</button>
        <button type="submit" name="remove">Remove</button>
        <button type="reset" naem="reset">Reset</button>
        <!-- puede que los button sean input -->
    </form>

    <h2>Inventory:</h2>
    <?php if (isset($average)) {
        echo "<p>Worker: $average </p>";
        echo "<p>Units milk: $average </p>";
        echo "<p>Units soft drink: $average </p>";
    } ?>
</body>

</html>