<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Search</title>
</head>
<body>

    <h2>Search for a Car Model</h2>

    <!-- Search form sends the car model to search_result.php using GET -->
    <form method="get" action="search_result.php">
        <label for="model">Enter Car Model:</label>

        <input 
            type="text" 
            id="model" 
            name="model"
        >

        <input type="submit" value="Search">
    </form>

</body>
</html>
