<div class="x_title">
    <h2>Edit <?php echo $this->title ?></h2>
    <div class="clearfix"></div>
</div>
<form method="post" action="<?php echo $this->edit_save ?>">
    <?php foreach ($this->forms as $form_name) {
        if ($form_name['form']) {
            $type = $form_name['form']['type'] ? $form_name['form']['type'] : 'text';
            ?>
            <div class="form-group">
                <label for="<?php echo $form_name['field'] ?><"><?php echo $form_name['label'] ?></label>
                <?php if ($type == 'textarea') { ?>
                    <textarea rows="4" class="form-control"
                        <?php echo (isset($form_name['required']) && $form_name['required']) ? 'required' : NULL ?>
                              name="<?php echo $form_name['field'] ?>"
                              id="<?php echo $form_name['field'] ?>">
                        <?php echo $this->userinfo[$form_name["field"]]; ?>
                    </textarea>
                <?php } else { ?>
                    <input type="<?php echo $type ?>" class="form-control"
                        <?php echo (isset($form_name['required']) && $form_name['required']) ? 'required' : NULL ?>
                           name="<?php echo $form_name['field'] ?>"
                           value='<?php echo $this->userinfo[$form_name["field"]]; ?>'
                           id="<?php echo $form_name['field'] ?>">
                <?php } ?>
            </div>
        <?php }
    } ?>
    <button type="submit" class="btn btn-default">Save</button>
</form>