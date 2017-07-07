<div>
    <h2>Edit User</h2>
    <form method="post" action="<?php echo site_url("user/editSave/" . $this->user[0]['id']) ?>">
        Username: <input type="text" name="username" value="<?php echo $this->user[0]['username']; ?>"><br/>
        <input type="submit">
    </form>
</div>