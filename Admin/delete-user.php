<?php
$adminJson = file_get_contents('../json/admins.json');
$admins = json_decode($adminJson, true);
unset($admins[$_GET['id']]);
$admins['last_id']--;
$deleteUser = json_encode($admins);
file_put_contents('../json/admins.json', $deleteUser);
// var_dump($admins);
header('Location: admin-update.php');
?>