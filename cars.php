<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Display</title>
</head>
<body>

    <h1>Car Exhibition List</h1>

    <?php
        require_once("setting.php");

        // Connect to the database
        $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);

        if ($dbconn) {
            // Prepare the SQL query
            $query = "SELECT car_id, make, model, price, yom FROM cars";

            // Run the query
            $result = mysqli_query($dbconn, $query);

            // Check if cars were found
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

                // Display each car in a table row
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

                // Free result memory
                mysqli_free_result($result);
            } else {
                echo "<p>There are no cars to display.</p>";
            }

            // Close database connection
            mysqli_close($dbconn);
        } else {
            echo "<p>Unable to connect to the db.</p>";
        }
    ?>

</body>
</html>
