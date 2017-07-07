<div>
    <h2>Users</h2>
    <a href="<?php echo URL; ?>user/add">Add</a>
    <table border="1">
        <tr>
            <td>Username</td>
            <td></td>
            <td></td>
        </tr>
        <?php foreach ($this->users as $i => $user) {
            ?>
            <tr>
                <td><?php echo $user['username']; ?></td>
                <td><a href="<?php echo URL; ?>user/edit/<?php echo $user['id'] ?>">Edit</a></td>
                <td><a href="<?php echo URL; ?>user/delete/<?php echo $user['id'] ?>"> Delete</a></td>
            </tr>
        <?php } ?>
    </table>
</div>