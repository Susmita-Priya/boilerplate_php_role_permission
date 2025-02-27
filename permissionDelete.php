<?php
include 'config/db.php';

$permission_id = $_GET['permission_id'];
$sql = "delete from permissions where permission_id =:permission_id";
$query = $conn->prepare($sql);
$query->bindParam(':permission_id', $permission_id, PDO::PARAM_STR);
$query->execute();
echo "<script>alert('Permission deleted');</script>";
echo "<script>window.location.href = 'permissionList.php'</script>";

?>