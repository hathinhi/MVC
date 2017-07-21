<?php

require '../config.php';
require '../libs/Form.php';
require '../libs/Database.php';

if (isset($_REQUEST['run'])) {
    try {

        $form = new Form();

        $form	->post('username')
            ->val('minlength', 2)
            ->post('email')
            ->val('minlength', 2);

        $form	->submit();

        echo 'The form passed!';
        $data = $form->fetch();

        echo '<pre>';
        print_r($data);
        echo '</pre>';

        $db = new Database();
        $db->insert('users', $data);

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>

<form method="post" action="?run">
    username<input type="text" name="username" />
    email <input type="text" name="email" />
    <input type="submit" />
</form>