<h1>Edit <?= $user->name ?></h1><br>



<form action="<?= base_url('index.php/Admin/update_user') ?>" method="post">
    <input type="hidden" name="uid" value="<?= $user->uid ?>">
    Name: <input type="text" name="name" value="<?= $user->name ?>"><br>
    Email: <input type="email" name="email" value="<?= $user->email ?>"><br>
    Mobile: <input type="number" name="mobile" value="<?= $user->mobile ?>"><br>
    <input type="submit" value="Update">
</form>



<a href="<?= base_url('index.php/Admin/logout') ?>">Logout</a>