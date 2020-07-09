<?php
$productJson = file_get_contents('../json/catalog.json');
$catalog = json_decode($productJson, true);
if ($catalog[$_GET['id']] == end($catalog)) $catalog['last_id']--;
unset($catalog[$_GET['id']]);
$catalogUpdate = json_encode($catalog);
file_put_contents('../json/catalog.json', $catalogUpdate);
header('Location: admin-product-update.php');
?>