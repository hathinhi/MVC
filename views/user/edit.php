<div>
    <h2>Edit User</h2>
    <form method="post" action="<?php echo URL ?>/user/editSave/<?php echo $this->user['id'] ?>">
        Username: <input type="text" name="username" value="<?php echo $this->user['username']; ?>"><br/>
        <input type="submit">
    </form>
</div>