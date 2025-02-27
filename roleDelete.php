<?php
include 'config/db.php';

$role_id = $_GET['role_id'];
$sql = "delete from roles where role_id =:role_id";
$query = $conn->prepare($sql);
$query->bindParam(':role_id', $role_id, PDO::PARAM_STR);
$query->execute();
echo "<script>alert('role deleted');</script>";
echo "<script>window.location.href = 'roleList.php'</script>";

?>