<?php
session_start();
$adminJSON = file_get_contents('../json/admins.json');
$admins = json_decode($adminJSON, true);
foreach($admins as $id => $admin){
    // var_dump($admin);
    if($_POST['login-mail'] == $admin['email'] && $_POST['login-pass'] == $admin['password']){
    $_SESSION['user'] = $admin['email'];
        header("Location: admin-panel.php");
    }else{
        header("Location: admin-login.php");
    }
    echo $_POST['login-pass'];
    echo  $admin['password'];
};

?>