<?php
if (!empty($_GET['status'])) {
    echo $_GET['status'];
}
?>

<h1>Login</h1><br>



<form action="<?= base_url('index.php/User/login') ?>" method="post">
    Email: <input type="email" name="email"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form><a href="<?= base_url('index.php/User/register_user') ?>">Register here..</a>

