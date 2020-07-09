<?php
$adminJson = file_get_contents('../json/admins.json');
$admins = json_decode($adminJson, true);
if ($admins[$_GET['id']] == end($admins)) $admins['last_id']--;
unset($admins[$_GET['id']]);
$deleteUser = json_encode($admins);
file_put_contents('../json/admins.json', $deleteUser);
var_dump($admins);
header('Location: admin-update.php');
?>