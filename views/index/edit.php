<form method="post" action="<?php echo $this->edit_save ?>">
    <?php foreach ($this->forms as $form_name) {
        if ($form_name['form']) {
            ?>
            <div class="form-group">
                <label for="<?php echo $form_name['field'] ?><"><?php echo $form_name['label'] ?></label>
                <input type="text" class="form-control" name="<?php echo $form_name['field'] ?>"
                       value='<?php echo $this->userinfo[$form_name["field"]];?>' id="<?php echo $form_name['field'] ?>">
            </div>
        <?php }
    } ?>
    <button type="submit" class="btn btn-default">Save</button>
</form>