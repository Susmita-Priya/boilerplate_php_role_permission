<?php
include 'config/db.php';

$id = $_GET['id'];

// Fetch product details
$sql = "SELECT * FROM products WHERE id = :id";
$query = $conn->prepare($sql);
$query->bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$product = $query->fetch(PDO::FETCH_ASSOC);

// Delete product image if it exists
if ($product && file_exists('resources/uploads/' . $product['product_image'])) {
    unlink('resources/uploads/' . $product['product_image']);
}

// Delete product from database
$sql = "DELETE FROM products WHERE id = :id";
$query = $conn->prepare($sql);
$query->bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();

echo "<script>alert('Product deleted');</script>";
echo "<script>window.location.href = 'productList.php'</script>";

?>