<?php
// Include your database connection file
include 'db.php';

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Prepare and execute the SQL query to delete the item from the cart table
    $sql = "DELETE FROM cart WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);

    if ($stmt->execute()) {
        // Item deleted from cart successfully
        // Redirect back to the cart page
        header("Location: add_to_cart.php");
        exit();
    } else {
        // Error deleting item from cart
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

