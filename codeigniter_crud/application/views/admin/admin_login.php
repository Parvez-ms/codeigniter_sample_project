<?php
if (!empty($_GET['status'])) {
    echo $_GET['status'];
}
?>

<h1>Admin-Login</h1><br>



<form action="<?= base_url('index.php/Admin/admin_login') ?>" method="post">
    Email: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>


<br>

<a href="<?= base_url('') ?>">Login as User</a>
