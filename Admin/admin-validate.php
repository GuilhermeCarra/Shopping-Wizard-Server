<?php
if($_POST['login-mail'] === 'wizard@gmail.com' && $_POST['login-pass'] === '1234567'){
    session_start();
$_SESSION['user'] = $_POST['login_mail'];
header("Location: admin-panel.php");
}else{
    header("Location: admin-login.php");
}
?>