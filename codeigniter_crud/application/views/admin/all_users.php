


<html>
    <body>
        <table border="1">
            <thead>
            <th>S.No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Gender</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            <?php
            $users = $this->db->get('users')->result();
            $i = 1;
            foreach ($users as $user) {
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->mobile ?></td>
                    <td><?= $user->gender ?></td>
                    <td><a href="<?= base_url('index.php/Admin/edit_user/' . $user->uid) ?>">Edit</a></td>
                    <td><a href="<?= base_url('index.php/Admin/delete_user/' . $user->uid) ?>">Delete</a></td>
                </tr>
                <?php
                $i++;
            }
            ?>



        </tbody>
    </table>
        
       <br> <a href="<?= base_url('index.php/Admin/logout') ?>">Logout</a>
</body>
</html>