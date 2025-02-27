<?php
include 'config/db.php';

$id = $_GET['id'];
$sql = "delete from users where id =:id";
$query = $pdo->prepare($sql);
$query->bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
echo "<script>alert('User deleted');</script>";
echo "<script>window.location.href = 'userList.php'</script>";

?>