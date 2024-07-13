<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: orange;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top:70px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            text-align: center;
        }

        input[type="text"] {
            width: 70%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .results {
            margin-top: 20px;
        }

        .result-item {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s ease;
        }

        .result-item:last-child {
            border-bottom: none;
        }

        .result-item:hover {
            background-color: #f9f9f9;
        }

        .product-image {
            max-width: 100px; /* Adjust image size as needed */
            height: auto;
        }
    </style>
</head>
<body>

<?php
include "inc/header.php";
?>
<br><br><br><br><br><br><br><br><br>
<div class="container mt-5">
    <h1>Product Search</h1>
    <form method="GET">
        <input type="text" name="query" placeholder="Search for products...">
        <button type="submit">Search</button>
    </form>
    <?php
    if(isset($_GET['query'])) {
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "db_pahunchaar";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch search query
        $search_query = $_GET['query'];

        // Perform search query
        $sql = "SELECT ptitle, pcategory, thumb1 FROM `add_product` WHERE ptitle LIKE '%$search_query%'";

        $result = $conn->query($sql);

        // Display search results
        if ($result->num_rows > 0) {
            echo '<div class="results">';
            while($row = $result->fetch_assoc()) {
                echo '<div class="result-item">';
                echo '<div>' . $row["ptitle"] . '</div>';
                echo '<div>' . $row["pcategory"] . '</div>';
                // Display product image
                echo '<img src="' . $row["thumb1"] . '" alt="Product Image" class="product-image">';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo '<div class="results">';
            echo '<div class="result-item">No results found</div>';
            echo '</div>';
        }

        $conn->close();
    }
    ?>
</div>

<?php
include "inc/footer.php";
?>

</body>
</html>
