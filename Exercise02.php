<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pr4 Sessions PHP</title>
</head>

<body>

    <?php
    session_start(); // Resume the session


    if (!isset($_SESSION['market']) && !isset($_SESSION['worker'])) { //!si no existe el array
        $_SESSION['market'] = array("milk" => 0, "soft_drink" => 0);
        $_SESSION['worker'] = " ";
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Store the user input in the session
        if (!empty($_POST['name'])) {
            $_SESSION['worker'] = $_POST['name'];
        }

        if (isset($_POST['add'])) { //en el caso que haya clicado add

            // $worker = $_POST['name'];

            $value = $_POST['value']; //guardamos en una variable
            $drink = $_POST['position']; //tmb

            //modify position selected
            //alteramos los datos guardados en el session con los datos post
            $_SESSION['market'][$drink] += $value;
        }
        if (isset($_POST['remove'])) { //en el caso que haya clicado average

            // $worker = $_POST['name'];
            //sumar y contar el array
            $value = $_POST['value']; //guardamos en una variable
            $drink = $_POST['position']; //tmb

            //modify position selected
            //alteramos los datos guardados en el session con los datos post
            if ($value <= $_SESSION['market'][$drink]) {
                $_SESSION['market'][$drink] = $_SESSION['market'][$drink] - $value;
            } else {
                echo "<h1>Error: value bigger than inventory</h1>";
            }
        }
    }
    ?>

    <h1>Supermarket management</h1>
    <form method="POST">
        <input type="string" id="name" name="name"><br>
        <br>

        <h2>Choose product:</h2>
        <select name="position" id="position">
            <option value="milk">Milk</option>
            <option value="soft_drink">Soft Drink</option>
        </select>
        <br>

        <br>
        <label for="value">Product quantity:</label>
        <input type="number" id="value" name="value"><br><br>
        <button type="submit" name="add">Add</button>
        <button type="submit" name="remove">Remove</button>
        <button type="reset" name="reset">Reset</button>
        <!-- puede que los button sean input -->
    </form>

    <h2>Inventory:</h2>
    <?php if (isset($_SESSION['market'])) {
        echo "<p>Worker's name:" .  $_SESSION['worker'] . "<p>";
        //cambiar el nombre de las variables
        // echo implode(separator: ", ", array: $_SESSION['market']);
        var_dump($_SESSION['market']);
    } ?>
</body>

</html>