<?php
// Include your database connection file
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Retrieve product price from the add_product table
    $price_query = "SELECT price FROM add_product WHERE id = ?";
    $stmt_price = $conn->prepare($price_query);
    $stmt_price->bind_param("i", $product_id);
    $stmt_price->execute();
    $result_price = $stmt_price->get_result();
    $row_price = $result_price->fetch_assoc();
    $product_price = $row_price['price'];

    // Calculate total price based on the new quantity
    $total_price = $quantity * $product_price;

    // Prepare and execute the SQL query to update the quantity and total price in the cart table
    $sql = "UPDATE cart SET quantity = ?, total_price = ? WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("idi", $quantity, $total_price, $product_id);

    if ($stmt->execute()) {
        // Quantity and total price updated successfully
        // Redirect back to the cart page
        header("Location: add_to_cart.php");
        exit();
    } else {
        // Error updating quantity and total price
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the prepared statements
    $stmt_price->close();
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
