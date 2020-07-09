<?php
session_start();
$adminJSON = file_get_contents('../json/admins.json');
$admins = json_decode($adminJSON, true);
$foundAdmin = false;

foreach($admins as $id => $admin){

        echo $id;
        echo '<br>';
    if($_POST['login-mail'] == $admin['email'] && $_POST['login-pass'] == $admin['password']){
        $foundAdmin = true;
        $_SESSION['user'] = $admin['username'];
            header("Location: admin-panel.php");
        }
};

if($foundAdmin == false){
    header("Location: admin-login.php");
}
?>