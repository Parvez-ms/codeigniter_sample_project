<h1>Register</h1><br>



<form action="<?= base_url('index.php/User/register_user') ?>" method="post">
    Name: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    Password: <input type="password" name="password"><br>
    Mobile: <input type="number" name="mobile"><br>
    <input type="submit" value="Register">
</form><a href="<?= base_url('') ?>">Login here..</a>