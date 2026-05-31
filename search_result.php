<?php
    require_once("setting.php");

    // Check if the model was sent from the search form
    if (!isset($_GET['model'])) {
        die("Please search from search_form.php");
    }

    // Clean the user input before using it in the SQL query
    $model = mysqli_real_escape_string($dbconn, $_GET['model']);

    // Search for cars where the model contains the entered text
    $query = "SELECT car_id, make, model, price, yom 
              FROM cars 
              WHERE model LIKE '%$model%'";

    // Run the query
    $result = mysqli_query($dbconn, $query);

    // Check if matching cars were found
    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";

        echo "
            <tr>
                <th>Car ID</th>
                <th>Make</th>
                <th>Model</th>
                <th>Price</th>
                <th>YOM</th>
            </tr>
        ";

        // Display each matching car in a table row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
                <tr>
                    <td>{$row['car_id']}</td>
                    <td>{$row['make']}</td>
                    <td>{$row['model']}</td>
                    <td>{$row['price']}</td>
                    <td>{$row['yom']}</td>
                </tr>
            ";
        }

        echo "</table>";
    } else {
        echo "<p>No cars found.</p>";
    }

    // Close the database connection
    mysqli_close($dbconn);
?>
