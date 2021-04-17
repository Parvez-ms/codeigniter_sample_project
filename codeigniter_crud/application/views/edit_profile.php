<h1>Edit Profile</h1><br>



<form action="<?= base_url('index.php/User/update_user') ?>" method="post">
    Name: <input type="text" name="name" value="<?= $user->name ?>"><br>
    Email: <input type="email" name="email" value="<?= $user->email ?>"><br>
    Mobile: <input type="number" name="mobile" value="<?= $user->mobile ?>"><br>
    <input type="submit" value="Update">
</form>

<br> <a href="<?= base_url('index.php/User/logout') ?>">Logout</a>